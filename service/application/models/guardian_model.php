<?php

class guardian_model extends CI_Model
{
    /*   self   */

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

    /*   self   */


    /*        child section           */

    // adding new child
    public function adding_child($data)
    {
        $flag = false;

        $parent = $this->session->userdata("user_login");

        $data['p_id'] = $parent['p_id'];

        if($this->db->insert('children_list',$data))
        {
            $flag = true;
        }

        return $flag;
    }

    //removing child
    public function removing_child($data)
    {
        $flag = false;

        if($this->db->delete("children_list",$data))
        {
            $flag = true;
        }

        return $flag;
    }

    // current age calculation
    public function current_age_calcuation($key)
    {
        $data = array();

        $query = $this->db->get_where("children_list",$key);

        if($query->num_rows() > 0)
        {
            $temp = $query->row_array();

            $data["current_age_timestamp"] = time() - $temp["c_dob"];
            $data["birth_date"] = date("d-m-Y",$temp["c_dob"]);
            $data["current_age_year"] = $this->computeAge($temp["c_dob"],time());

        }

        return $data;
    }

    // year calcuation
    function computeAge($starttime,$endtime)
    {
        $age = date("Y",$endtime) - date("Y",$starttime);
        //if birthday didn't occur that last year, then decrement
        if(date("z",$endtime) < date("z",$starttime)) $age--;
        return $age;
    }


    // vaccine suggetion
    public function vaccine_suggetion_to_child($c_id)
    {
        $data = array();

        $query = $this->db->get_where("children_immu_details",$key);

        if($query->num_rows() > 0)
        {
            $query = $this->db->query("SELECT immunization_list.i_id,immunization_list.i_name,immunization_list.i_time FROM immunization_list WHERE i_id NOT IN (SELECT children_immu_details.i_id FROM children_immu_details WHERE children_immu_details.c_id = ".$key['c_id'].")");

            if($query->num_rows() > 0)
            {
                $data = $query->row_array();
            }
        }
        else
        {
            $data = $this->db->get("immunization_list")->result_array();
        }

        return $data;
    }


    // checking if child exist or not
    public function child_check($data)
    {
        $flag = false;

        if($this->db->get_where('children_list',$data)->num_rows() > 0)
        {
            $flag = true;
        }

        return $flag;
    }

    // updating child info
    public function child_update($data)
    {
        $flag = false;

        if($this->db->update('children_list',$data,array("c_id" => $data['c_id'])))
        {
            $flag = true;
        }

        return $flag;
    }


    // children list
    public function child_list($key)
    {
        $data = array();
        $query = $this->db->get_where("children_list",$key);

        if($query->num_rows() > 0)
        {
            $data = $query->result_array();
        }

        return $data;
    }


    /*        child section           */


    /*     vaccine info     */

    public function insert_immune($initial,$detail)
    {
        $flag = false;

        if($this->db->insert("children_immu_info",$initial))
        {
            $detail['c_i_id'] = $this->db->insert_id();

            if($this->db->insert("children_immu_details",$detail))
            {
                $flag = true;
            }
        }

        return $flag;
    }

    public function update_immune($initial,$detail)
    {
        $flag = false;

        if($this->db->update("children_immu_info",$initial,array("c_i_id" => $initial['c_i_id'])))
        {
            if($this->db->update("children_immu_details",$detail,array("c_i_d_id" => $detail["c_i_d_id"])))
            {
                $flag = true;
            }
        }

        return $flag;
    }

    public function delete_immune($c_id)
    {
        $flag = false;

        $query1 = $this->db->get_where("children_immu_info",array("c_id" => $c_id));

        $c_i = $query1->row_array();

        if($this->db->delete("children_immu_details",array("c_i_id" => $c_i['c_i_id'])))
        {
            if($this->db->delete("children_immu_info",array("c_id" => $c_id)))
            {
                $flag = true;
            }
        }

        return $flag;
    }

    public function get_vaccine_initial_info_list($key)
    {
        $data = array();

        $query = $this->db->get_where("children_immu_info",$key);

        if($query->num_rows() > 0)
        {
            $data = $query->result_array();
        }

        return $data;
    }

    public function get_vaccine_detail_info_list($key)
    {
        $data = array();

        $query = $this->db->query("SELECT children_immu_info.c_i_id,children_immu_info.c_i_type,children_immu_info.c_i_date,children_immu_details.c_i_d_id,children_immu_details.hse,children_immu_details.doctor_name,children_immu_details.Lot FROM children_immu_info JOIN children_immu_details ON children_immu_info.c_i_id = children_immu_details.c_i_id WHERE children_immu_info.c_i_id = ".$key);

        if($query->num_rows() > 0)
        {
            $data = $query->row_array();
        }

        return $data;
    }

    /*     vaccine info     */




    /*          static data            */

    public function getting_vaccine_list($key)
    {
        $data = array();

        $query = $this->db->get_where("children_immu_details",$key);

        if($query->num_rows() > 0)
        {
            $query = $this->db->query("SELECT immunization_list.i_id,immunization_list.i_name,immunization_list.i_time FROM immunization_list WHERE i_id NOT IN (SELECT children_immu_details.i_id FROM children_immu_details WHERE children_immu_details.c_id = ".$key['c_id'].")");

            if($query->num_rows() > 0)
            {
                $data = $query->result_array();
            }
        }
        else
        {
            $data = $this->db->get("immunization_list")->result_array();
        }

        return $data;
    }


    /*          static data            */

}

?>