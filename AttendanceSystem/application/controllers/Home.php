<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Restserver\Libraries\REST_Controller;
class Home extends CI_Controller 
{

        public function index()
        {
                if( !isset($_SERVER['HTTP_REFERER']) || strpos($_SERVER['HTTP_REFERER'], "LoginController/login") === -1 ) {
                        $this->load->helper('url');
                        redirect('/page404');
                }
                else
                {
                        $page_name = 'HomePage';
                        if ( ! file_exists(APPPATH.'views/pages/'.$page_name.'.php'))
                        {
                                // Whoops, we don't have a page for that!
                                show_404();
                        }
        
                        $data['module_details'] = $this->Module_model->get_module();
                        // var_dump($data['module_details']);
                        // $this->load->view('templates/header', $other);
                        $this->load->view('pages/'.$page_name, $data);
                        // $this->load->view('templates/footer', $other);
                }
               
        }
}