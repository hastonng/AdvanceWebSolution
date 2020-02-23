<?php
class Pages extends CI_Controller 
{

        public function index()
        {
                $page = 'home';
                if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
                {
                        // Whoops, we don't have a page for that!
                        show_404();
                }
        
                $other['title'] = ucfirst($page); // Capitalize the first letter
                $other['test'] = "this is a string~~";
                $other['test2'] = "123";
                $other['test3'] = "456";

                // $this->load->view('templates/header', $other);
                $this->load->view('pages/'.$page, $other);
                // $this->load->view('templates/footer', $other);
        }
}