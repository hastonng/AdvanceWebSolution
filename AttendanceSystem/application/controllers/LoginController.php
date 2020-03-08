<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class LoginController extends CI_Controller 
{

    public function index()
    {
        $page_name = 'LoginPage';
        if ( ! file_exists(APPPATH.'views/pages/'.$page_name.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }
        $this->load->view('pages/'.$page_name);
    }

    public function login()
    {
        //Get POST
        $rawData = json_decode(file_get_contents('php://input'), true);
        $jsonPost = $this->security->xss_clean($rawData);
        $token = $this->security->get_csrf_token_name();
        $hash = $this->security->get_csrf_hash(); 

        //Lode User Model
        $this->load->model('User_model');

        if(empty($jsonPost['inputEmail']) && empty($jsonPost['inputPassword']))
        {
            echo json_encode("");
        }
        else
        {
            $email = $jsonPost['inputEmail'];
            $pass = $jsonPost['inputPassword'];
            $this->User_model->setLoginEmail($jsonPost['inputEmail']);
            $this->User_model->setPassword($jsonPost['inputPassword']);
            $data['result']= $this->User_model->get_login();

            if($data['result'] === false)
            {
                echo json_encode("False");
            }
            else
            {
                if($data['result'] === "True1")
                {
                    $url = array('token'=>$token, 'hash'=>$hash, 'url'=>'index.php/Home/index');

                    echo json_encode($url);

                }
                else if($data['result'] === "True2")
                {
                    echo json_encode("True2");
                }
            }
        }        
    }
}