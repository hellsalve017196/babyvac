<?php

defined('BASEPATH') OR exit('No direct script access allowed');


require_once APPPATH . 'libraries/REST_Controller.php';


class login extends REST_Controller
{
    public function index_get()
    {
        $flag = array("message"=>"Login Rest Api");

        $this->response($flag,200);
    }

    // signing up to the website
    public function sign_up_post()
    {
        $this->load->model('login_model','l');
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

    public function getting_in_post()
    {
        $this->load->model('login_model','l');

        $response = array();

        $user = json_decode($this->post('user'),true);

        if(sizeof($user) > 0)
        {
            if($this->l->login_task($user))
            {
                $response = array("status" => "success","message" => "Successfully Logging in");
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

    public function current_session_get()
    {

        $this->load->model("login_model","l");

        $user = $this->l->get_session();

        if(sizeof($user) > 0)
        {
            $this->response($user,200);
        }
        else
        {
            $this->response(array("u_id" => "0"),200);
        }
    }

    public function getting_out_get()
    {
        $this->load->model("login_model","l");

        $response = array();

        if($this->l->logging_out())
        {
            $response = array("status" => "success","message" => "Successfully logged out");
        }
        else
        {
            $response = array("status" => "error","message" => "Currently No Session");
        }

        $this->response($response,200);
    }

    public function forgot_password()
    {
        $this->load->model('login_model','l');
        $this->load->model('notification','n');

        $email = json_decode($this->post('email'),true);

        $user_data = $this->l->password_retrive($email);

        $res = array();

        if(sizeof($user_data) > 0)
        {
            $notification = array("emails" => $user_data['u_email'],"subject" => "Password Retrive","message" => "Your password : ".$user_data['u_password']);

            $this->n->send_mail($notification);

            $response = array("status" => "success", "message" => "Successfully Signed Up");
        }
        else
        {
            $res = array("status" => "error","message" => "Following Email Address Has n't been Registered");
        }

        $this->response($res,200);
    }

    public function sign_up_via_google_api()
    {

    }

    public function sign_up_via_facebook_api()
    {

    }
}

?>