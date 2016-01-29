<?php

class login_model extends CI_Model
{
    // signing up for the guardian
    public function sign_up($data)
    {
        $flag = false;

        $guardian = array("p_name" => $data['p_name'],"p_address" => $data['p_address'],"p_region" => $data['p_region']);
        $user = array("u_email" => $data['u_email'],"u_password" => $data['u_password'],"u_type" => $data['u_type']);

        if($this->db->insert("users",$user))
        {
            $guardian['u_id'] = $this->db->insert_id();

            if($this->db->insert("parent",$guardian))
            {
                $flag = true;
            }
            else
            {
                $flag = $this->db->_error_message();
            }
        }
        else
        {
            $flag = $this->db->_error_message();
        }

        return $flag;
    }

    // setting session
    public function set_session($data)
    {
        $this->session->set_userdata("user_login",$data);
    }

    // getting session
    public function get_session()
    {
        $data = array();

        if($this->session->userdata("user_login") != NULL)
        {
            $data = $this->session->userdata("user_login");
        }

        return $data;
    }

    //logging out
    public function logging_out()
    {
        $flag = true;

        $this->session->unset_userdata("user_login");

        return $flag;
    }

    // setting cookie
    public function set_cookie()
    {

    }

    //getting cookie
    public function get_cookie()
    {

    }

    // login operation
    public function login_task($data)
    {
        $flag = false;

        $query = $this->db->get_where('users',$data);

        if($query->num_rows() == 1)
        {
            $temp = $query->row_array();

            $user_data = $this->fetch_user($temp['u_type'],$temp['u_id']);

            $this->set_session($user_data);

            $flag = true;
        }

        return $flag;
    }

    // getting basic user info
    public function fetch_user($u_type,$u_id)
    {
        $data = array();

        if($u_type == 'guardian')
        {
            $query = $this->db->query("SELECT users.u_email,users.u_type,parent.p_id,parent.p_name,parent.p_address,parent.p_region,parent.p_img,parent.u_id FROM users JOIN parent ON users.u_id = parent.u_id WHERE users.u_id =".$u_id);

             $data = $query->row_array();
        }

        return $data;
    }

    // password retrive
    public function password_retrive($data)
    {
        $data = array();

        $query = $this->db->get_where('users',$data);

        if($query->num_rows() > 0)
        {
            $data = $query->num_rows();
        }

        return $data;
    }

    // password reset
    public function password_reset()
    {

    }

    // logout user
    public function log_out()
    {

    }

    // user checking
    public function user_checking($data)
    {
        $flag = false;

        if($this->db->get_where('users',$data)->num_rows() > 0)
        {
            $flag = true;
        }
        else
        {
            $flag = $this->db->_error_message();
        }

        return $flag;
    }
}

?>