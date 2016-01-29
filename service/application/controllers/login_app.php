<?php

defined('BASEPATH') OR exit('No direct script access allowed');


require_once APPPATH . 'libraries/REST_Controller.php';


header("Access-Control-Allow-Origin:*");

class login_app extends REST_Controller
{
    public function index_get()
    {
        $flag = array("message"=>"Login Rest Api");

        $this->response($flag,200);
    }

    // signing up to the website
    public function sign_up_post()
    {
        $this->load->model('login_app_model','l');
        $this->load->model('notification','n');

        $user = json_decode($this->post('user'),true);
        $response = array();

        if (sizeof($user) > 0) {
            try {
                foreach ($user as $key => $value) {
                    if (empty($value)) {
                        throw new Exception("Form Field Error");
                    }
                }

                $email = array("u_email" => $user['u_email']);

                if(!$this->l->user_checking($email))
                {
                    if($this->l->sign_up($user))
                    {
                        $notification = array("emails" => $user['u_email'],"subject" => "Successfully Signed Up to Babyvaccine.com","message" => "Congratulation ".$user['p_name'])." ,You have been successfully Signed Up to Babyvaccine";

                        $this->n->send_mail($notification);

                        $response = array("status" => "success", "message" => "Successfully Signed Up");
                    }
                    else
                    {
                        $response = array("status" => "error", "message" => $this->l->signing_up($user));
                    }
                }
                else
                {
                    if($this->l->user_checking($email))
                    {
                        $response = array("status" => "error","message" => "Following email is already used,use forget password option");
                    }
                    else
                    {
                        $response = array("status" => "error","message" => $this->l->user_checking($email));
                    }
                }


            } catch (Exception $e) {
                $response = array("status" => "error", "message" => $e->getMessage());
            }
        } else {
            $response = array("status" => "error", "message" => "Invalid Post Request");
        }

        $this->response($response,200);
    }


    //getting in
    public function getting_in_post()
    {
        $this->load->model('login_app_model','l');

        $response = array();

        $key = json_decode($this->post('user'),true);

        if(sizeof($key) > 0)
        {
            $user = $this->l->login_task($key);

            if(sizeof($user) > 0)
            {
                $response = array("status" => "success","data" => $user);
            }
            else
            {
                $response = array("status" => "error","message" => "Invalid Username or Password");
            }
        }
        else
        {
            $response = array("status" => "error","message" => "Invalid Post Request");
        }

        $this->response($response,200);
    }

    // sign up and getting in for facebook
    public function sign_up_with_facebook_get()
    {
        $this->load->model('login_app_model','l');
        $response = array();

        $email = $this->get('email');
        $name = $this->get('name');
        $password = $this->get('pass');
        $gender = $this->get('gender');

        if($this->l->user_checking(array("u_email" => $email)))
        {
            $response = array("status" => "error","message" => "email address exists");
        }
        else
        {
            $user = array("p_name" => $name,"u_email" => $email,"u_password" => $password,"u_type" => "guardian","p_gender" => $gender);

            if($this->l->sign_up($user))
            {
                $data = $this->l->login_task(array("u_email" => $user['u_email'],"u_password" => $user['u_password']));
                $response = array("status" => "success","data" => $data);
            }
        }

        $this->response($response,200);
    }

}

?>