<?php

class login_app_model extends CI_Model
{
    // signing up for the guardian
    public function sign_up($data)
    {
        $flag = false;

        $guardian = array("p_name" => $data['p_name'],"p_phone" => $data['p_phone'],"p_gender" => $data['p_gender'],"p_address" => $data['p_address'],"p_region" => $data['p_region']);
        $user = array("u_email" => $data['u_email'],"u_password" => $data['u_password'],"u_type" => $data['u_type']);

        if($this->db->insert("users",$user))
        {
            $guardian['u_id'] = $this->db->insert_id();

            if($this->db->insert("parent",$guardian))
            {
                mail($user["u_email"],"Congragultation ".$guardian["p_name"],"you have successfully signed up in babyvac");
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


    // login operation
    public function login_task($key)
    {
        $user = array();

        $query = $this->db->get_where('users',$key);

        if($query->num_rows() == 1)
        {
            $temp = $query->row_array();

            $user_data = $this->fetch_user($temp['u_type'],$temp['u_id']);

            if(sizeof($user_data) > 0)
            {
                $user = $user_data;
            }
        }

        return $user;
    }

    // getting basic user info
    public function fetch_user($u_type,$u_id)
    {
        $data = array();

        if($u_type == 'guardian')
        {
            $query = $this->db->query("SELECT users.u_email,users.u_type,parent.p_id,parent.p_gender,parent.p_name,parent.p_address,parent.p_region,parent.p_img,parent.u_id,parent.p_phone FROM users JOIN parent ON users.u_id = parent.u_id WHERE users.u_id =".$u_id);

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