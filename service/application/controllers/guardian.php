<?php

defined('BASEPATH') OR exit('No direct script access allowed');


require_once APPPATH . 'libraries/REST_Controller.php';


class guardian extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();

        // setting timezone
        date_default_timezone_set("Asia/Dacca");
    }

    /*                self                              */
    public function upload_pro_pic_post()
    {

    }

    /*                self                              */



    /*              child section                       */

    // adding new child
    public function adding_child_post()
    {
        $res = array();

        $this->load->model("guardian_model","g");

        $data = json_decode($this->post("child"),true);

        $data["c_dob"] = strtotime($data["c_dob"]);

        if(sizeof($data) > 0)
        {
            if($this->g->adding_child($data))
            {
                $res = array("status" => "success","message" => "Successfully Child Added");
            }
            else
            {
                $res = array("status" => "error","message" => "Error Occured");
            }
        }
        else
        {
            $res = array("status" => "error","message" => "Invalid Post Request");
        }


        $this->response($res,200);
    }

    //removing child
    public function removing_child_get()
    {
        $this->load->model('guardian_model','g');

        $res = array();

        $c_id = $this->get('c_id');

        if(!empty($c_id))
        {
            $child = array("c_id" => $c_id);

            if($this->g->child_check($child))
            {
                if($this->g->removing_child($child))
                {
                    $res = array("status" => "success","message" => "Child Succesfully Deleted");
                }
                else
                {
                    $res = array("status" => "error","message" => "Error Occured");
                }
            }
            else
            {
                $res = array("status" => "error","message" => "Invalid Child Id");
            }
        }
        else
        {
            $res = array("status" => "error","message" => "Invalid Get Request");
        }

        $this->response($res,200);
    }

    // editing child
    public function editing_child_post()
    {
        $res = array();

        $this->load->model("guardian_model","g");

        $data = json_decode($this->post("child"),true);


        if(sizeof($data) > 0)
        {
            if($this->g->child_update($data))
            {
                $res = array("status" => "success","message" => "Successfully Child Updated");
            }
            else
            {
                $res = array("status" => "error","message" => "Error Occured");
            }
        }
        else
        {
            $res = array("status" => "error","message" => "Invalid Post Request");
        }


        $this->response($res,200);
    }

    public function getting_child_list_get()
    {
        $this->load->model("guardian_model","g_m");
        $response = array();

        $user = $this->g_m->get_session();

        if(sizeof($user) > 0)
        {
            $data = $this->g_m->child_list();

            if(sizeof($data) > 0)
            {
                $response = array("status" => "success","data" => $data);
            }
            else
            {
                $response = array("status" => "error","message" => "there are currently no child added");
            }
        }
        else
        {
            $response = array("status" => "error","message" => "you are not currently logged in");
        }

        $this->response($response,200);
    }

    public function getting_current_age_child_get()
    {
        $response = array();

        $this->load->model("guardian_model","g_m");
        $user = $this->g_m->get_session();

        if(sizeof($user) > 0)
        {
            $c_id = $this->get("c_id");

            if($c_id != NULL)
            {
                $key = array("c_id" => $c_id);


                $data = $this->g_m->current_age_calcuation($key);

                if(sizeof($data) > 0)
                {
                    $response = array("status" => "success","data" => $data);
                }
                else
                {
                    $response = array("status" => "error","message" => "Invalid Child Id");
                }
            }
            else
            {
                $response = array("status" => "error","message" => "Invalid Get Request");
            }


        }
        else
        {
            $response = array("status" => "error","message" => "You are not currently logged in");
        }

        $this->response($response,200);
    }


    public function upload_child_pic_post()
    {

    }
    /*              child section                       */


    /*                    vaccine section         */
    // insert info
    public function insert_vaccine_info_for_child_post()
    {
        $this->load->model("guardian_model","g_m");
        $user = $this->g_m->get_session();
        $response = array();

        if(sizeof($user) > 0)
        {
            $info = json_decode($this->post("child_info"),true);

            if(sizeof($info) > 0)
            {
                $initial_info = $info['initial_info'];
                $initial_info['c_i_date'] = strtotime($initial_info['c_i_date']);
                $detail_info = $info['detail_info'];

                if($this->g_m->insert_immune($initial_info,$detail_info))
                {
                    $response = array("status" => "success","message" => "Successfully inserted");
                }
                else
                {
                    $response = array("status" => "error","message" => "Error from server");
                }
            }
            else
            {
                $response = array("status" => "error","message" => "Invalid post Request");
            }
        }
        else
        {
            $response = array("status" => "error","message" => "You are not currently logged in");
        }

        $this->response($response,200);
    }

    // update info
    public function edit_vaccine_info_for_child_post()
    {
        $this->load->model("guardian_model","g_m");
        $user = $this->g_m->get_session();
        $response = array();

        if(sizeof($user) > 0)
        {
            $info = json_decode($this->post("child_info"),true);

            if(sizeof($info) > 0)
            {
                $initial_info = $info['initial_info'];
                $detail_info = $info['detail_info'];

                if($this->g_m->update_immune($initial_info,$detail_info))
                {
                    $response = array("status" => "success","message" => "Successfully Updated");
                }
                else
                {
                    $response = array("status" => "error","message" => "Error from server");
                }
            }
            else
            {
                $response = array("status" => "error","message" => "Invalid post Request");
            }
        }
        else
        {
            $response = array("status" => "error","message" => "You are not currently logged in");
        }

        $this->response($response,200);
    }

    // delete info
    public function delete_vaccine_info_for_child_get()
    {
        $response = array();

        $this->load->model("guardian_model","g_m");
        $user = $this->g_m->get_session();

        if(sizeof($user) > 0)
        {
            $c_id = $this->get('c_id');

            if($c_id != NULL)
            {
                if($this->g_m->delete_immune($c_id))
                {
                    $response = array("status" => "success","message" => "Successfully Removed");
                }
                else
                {
                    $response = array("status" => "error","message" => "Error from Server");
                }
            }
            else
            {
                $response = array("status" => "error","message" => "Invalid Get Request");
            }
        }
        else
        {
            $response = array("status" => "error","message" => "You are not currently logged in");
        }

        $this->response($response,200);
    }


    // vaccine initial info
    public function initial_vaccine_info_list_get()
    {
        $response = array();

        $this->load->model("guardian_model","g_m");
        $user = $this->g_m->get_session();

        if(sizeof($user) > 0)
        {
            $c_id = $this->get('c_id');

            if($c_id != NULL)
            {
                $key = array("c_id" => $c_id);

                $initial_list = $this->g_m->get_vaccine_initial_info_list($key);

                if(sizeof($initial_list) > 0)
                {
                    $response = array("status" => "success","data" => $initial_list);
                }
                else
                {
                    $response = array("status" => "error","message" => "No information found");
                }

            }
            else
            {
                $response = array("status" => "error","message" => "Invalid Get Request");
            }

        }
        else
        {
            $response = array("status" => "error","message" => "You are not currently logged in");
        }

        $this->response($response,200);
    }


    // vaccine initial info
    public function detail_vaccine_info_get()
    {
        $response = array();

        $this->load->model("guardian_model","g_m");
        $user = $this->g_m->get_session();

        if(sizeof($user) > 0)
        {
            $c_i_id = $this->get('c_i_id');

            if($c_i_id != NULL)
            {

                $detail = $this->g_m->get_vaccine_detail_info_list($c_i_id);

                if(sizeof($detail) > 0)
                {
                    $response = array("status" => "success","data" => $detail);
                }
                else
                {
                    $response = array("status" => "error","message" => "No information found");
                }

            }
            else
            {
                $response = array("status" => "error","message" => "Invalid Get Request");
            }

        }
        else
        {
            $response = array("status" => "error","message" => "You are not currently logged in");
        }

        $this->response($response,200);
    }


    /*                    vaccine section         */


    /*          static data         */

    public function vaccine_list_get()
    {
        $response = array();

        $this->load->model("guardian_model","g_m");

        $user = $this->g_m->get_session();

        if(sizeof($user) > 0)
        {
            $c_id = $this->get("c_id");

            if($c_id != NULL)
            {
                $key = array("c_id" => $c_id);

                $data = $this->g_m->getting_vaccine_list($key);

                $response = array("status" => "success","data" => $data);
            }
            else
            {
                $response = array("status" => "error","message" => "Invalid Get Request");
            }

        }
        else
        {
            $response = array("status" => "error","message" => "You are not currently logged in");
        }

        $this->response($response,200);
    }

    /*          static data         */


    /*               template        */
    //      file upload
    /*public function file()
    {
        $files = array();
        $config = array();
        if(empty($config))
        {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = '*';
            $config['encrypt_name'] = TRUE;
        }

        $this->load->library('upload', $config);
        $errors = FALSE;
        foreach($_FILES as $key => $value)
        {
            if( ! empty($value['name']))
            {
                if( ! $this->upload->do_upload($key))
                {
                    $data['upload_message'] = $this->upload->display_errors(ERR_OPEN, ERR_CLOSE); // ERR_OPEN and ERR_CLOSE are error delimiters defined in a config file
                    $this->load->vars($data);
                    $errors = TRUE;
                }
                else
                {
                    // Build a file array from all uploaded files
                    $files[] = $this->upload->data();
                }
            }
        }
        // There was errors, we have to delete the uploaded files
        if($errors)
        {
            foreach($files as $key => $file)
            {
                @unlink($file['full_path']);
            }
        }
        elseif(empty($files) AND empty($data['upload_message']))
        {
            echo 'file is empty';
        }
        else
        {
            return $files;
        }
    }*/


    // basic template
    public function template_get()
    {
        $response = array();

        $this->load->model("guardian_model","g_m");
        $user = $this->g_m->get_session();

        if(sizeof($user) > 0)
        {

        }
        else
        {
            $response = array("status" => "error","message" => "You are not currently logged in");
        }

        $this->response($response,200);
    }

    /*               template        */
}

?>