<?php

class Admin extends CI_Controller{
    
    public function index(){
        
        $this->load->helper('url');
        
        $this->load->view('admin/admin_head');
        $this->load->view('head_end');
        $this->load->view('body_start');
        
        $this->load->view('admin/sign_in');
        
        $this->load->view('body_end');
        $this->load->view('js_essential');
        $this->load->view('html_end');
    }
}
