<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
    
    public function view($page)
    {
        if(!file_exists(APPPATH.'views/'.$page.'.php'))
        {
            show_404();
        }
        else
        {
            $this->load->helper('html');
            $this->load->view('template/header');
            $this->load->view($page);
            $this->load->view('template/footer');
        }
    }    
    
}
