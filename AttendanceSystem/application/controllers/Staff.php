<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// use Restserver\Libraries\REST_Controller;
class Staff extends CI_Controller 
{
    public $fName;
    public $lName;

        function __construct() {
                parent::__construct();
                $this->load->helper('url');
                // $this->load->model('Student_model');
        }

        public function index()
        {
            if($this->session->userdata('Login_Email') === null && $this->session->userdata('Login_ID') === null)
            {
                redirect('');
            }
            else
            {
                // var_dump($this->session);
                    $page_name = 'StaffHomePage';
                    if ( ! file_exists(APPPATH.'views/pages/'.$page_name.'.php'))
                    {
                            // Whoops, we don't have a page for that!
                            show_404();
                    }
                    //Set Student ID
                    $this->Staff_model->setStaff_ID($this->session->userdata('Login_ID'));
                    //Get Student Module
                    $staffDetails['staff_details'] = $this->Staff_model->get_staff_details();
                    //Set Details
                    $this->fName = $staffDetails['staff_details'][0]->First_Name;
                    $this->lName = $staffDetails['staff_details'][0]->Last_Name;
                    $headerData = array('fName' => $staffDetails['staff_details'][0]->First_Name,
                            'lName' => $staffDetails['staff_details'][0]->Last_Name);
                    // var_dump($data['upcoming_module']);

                    $this->load->view('templates/staffHeader',$headerData);
                    $this->load->view('pages/'.$page_name);
                    $this->load->view('templates/staffFooter');
            }
        }

        public function Attendance()
        {
            if($this->session->userdata('Login_Email') === null && $this->session->userdata('Login_ID') === null)
            {
                redirect('');
            }
            else
            {
                // var_dump($this->session);
                    // $page_name = 'Attendance';
                    // if ( ! file_exists(APPPATH.'views/pages/'.$page_name.'.php'))
                    // {
                    //         // Whoops, we don't have a page for that!
                    //         show_404();
                    // }
                    // //Set Student ID
                    // // $this->Staff_model->setStaff_ID($this->session->userdata('Login_ID'));
                    // // //Get Student Module
                    // // $staffDetails['staff_details'] = $this->Staff_model->get_staff_details();
                    // $headerData = array('fName' => $this->fName, 'lName' => $this->lName);
                    // // var_dump($data['upcoming_module']);

                    // $this->load->view('templates/header',$headerData);
                    // $this->load->view('pages/'.$page_name);
                    // $this->load->view('templates/footer');
            }
        }
}