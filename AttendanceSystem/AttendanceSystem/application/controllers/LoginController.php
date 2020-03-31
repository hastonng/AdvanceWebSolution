<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class LoginController extends CI_Controller 
{

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
    {
        $page_name = 'LoginPage';
        if ( ! file_exists(APPPATH.'views/pages/'.$page_name.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }
        // if already login
        if($this->session->userdata('Login_Email') !== null && $this->session->userdata('Login_ID') !== null)
        {
            if(strpos($this->session->userdata('Login_Email'), "@anglia"))
            {
                redirect('/Staff/index');
            }
            else if(strpos($this->session->userdata('Login_Email'), "@studentanglia"))
            {
                redirect('/Student/index');
            }
        }
        else
        {
            $this->load->view('pages/'.$page_name);
        }
    }

    public function login()
    {
        //Get POST
        $rawData = json_decode(file_get_contents('php://input'), true);
        $cleanData = $this->security->xss_clean($rawData);


        if(empty($cleanData['inputEmail']) && empty($cleanData['inputPassword']))
        {
            redirect('/page404');
        }
        else
        {
            //Check User Email Type
            if(strpos($cleanData['inputEmail'], "@anglia"))
            {
                $this->Staff_model->setLoginEmail($cleanData['inputEmail']);
                $this->Staff_model->setPassword($cleanData['inputPassword']);
                $data['result'] = $this->Staff_model->staff_login();
            }
            else if(strpos($cleanData['inputEmail'], "@studentanglia"))
            {
                $this->Student_model->setLoginEmail($cleanData['inputEmail']);
                $this->Student_model->setPassword($cleanData['inputPassword']);
                $data['result'] = $this->Student_model->student_login();

            }
            else
            {

            }
            
            //Check if the login successful
            if($data['result'] === false)
            {
                $response = array('message'=>false);
                echo json_encode($response);
            }
            else
            {
                if(strpos($cleanData['inputEmail'], "@anglia"))
                {
                    //Set Session Data
                    $this->session->set_userdata('Login_Email', $data['result'][0]->Login_Email);
                    $this->session->set_userdata('Login_ID', $data['result'][0]->Staff_ID);
                    $this->session->set_userdata('Staff_Type', $data['result'][0]->Staff_Type);

                    $response = array('message'=>true, 'url'=>'Staff/index');
                    echo json_encode($response);
                }
                else if(strpos($cleanData['inputEmail'], "@studentanglia"))
                {
                    //Set Session Data
                    $this->session->set_userdata('Login_Email', $data['result'][0]->Login_Email);
                    $this->session->set_userdata('Login_ID', $data['result'][0]->Student_ID);
                    
                    $response = array('message'=>true, 'url'=>'Student/index');
                    echo json_encode($response);
                }               
            }
        }        
    }
}