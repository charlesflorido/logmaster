<?php


class Admin extends CI_Controller{
    
    public function index(){
        
        $data['title'] = "Admin Log in";
        $data['login_error'] = FALSE;
        
        $this->load->helper('url');
        $this->load->library('session');
        
        if(!empty($this->session->userdata('admin'))){
            redirect('admin/home');
        }
        else{
            $login_name = $this->input->post('admin_name');
            $login_password = $this->input->post('admin_password');
            
            if(isset($login_name) && isset($login_password)){
                $this->load->model('admin_model');
                $result = $this->admin_model->tryLogin($login_name, $login_password);
                
                if($result->isValid()){
                    $this->session->set_userdata($result->getValues());
                    redirect('admin/home');
                }
                else{
                    $data['title'] = "Log in fail";
                    $data['login_error'] = TRUE;
                    
                }
            }
            
            $this->load->view('admin/admin_head', $data);
            $this->load->view('head_end');
            $this->load->view('body_start');



            $this->load->view('admin/sign_in');

            $this->load->view('body_end');
            $this->load->view('js_essential');
            $this->load->view('html_end');
            
        }
        
    }
    
    public function home(){
        
        $this->load->helper('url');
        $this->load->library('session');
        
        if(!empty($this->session->userdata('admin'))){
            
            $user = $this->session->userdata()['admin'];
            $data['title'] = "Homepage";
            $data['admin'] = $user;
            
            $this->load->view('admin/admin_head', $data);
            $this->load->view('head_end');
            $this->load->view('body_start');
            
            $this->load->view('admin/home/home', $data);
            
            $this->load->view('body_end');
            $this->load->view('js_essential');
            $this->load->view('admin/js_admin');
            $this->load->view('admin/home/js_admin_home', $data);
            $this->load->view('html_end');
        }
        else{
            redirect('admin');
        }
        
    }
    
    public function createadmin(){
        
        $data['title'] = "Create Admin";
        
        $this->load->helper('url');
        
        $this->load->view('admin/admin_head', $data);
        $this->load->view('head_end');
        $this->load->view('body_start');
        
        $this->load->view('admin/create_admin');
        
        $this->load->view('body_end');
        $this->load->view('js_essential');
        $this->load->view('admin/js_admin');
        $this->load->view('admin/sign_in/js_admin_register');
        $this->load->view('html_end');
    }
    
    public function logout(){
        $this->load->helper('url');
        $this->load->library('session');
        
        $this->session->sess_destroy();
        redirect('admin/home');
    }
    
    public function update_admin_name(){
        $admin_name = (string)$this->input->post('admin_name');
        
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library("validator");
        
        $validator = new Validator();
          
        if(!empty($this->session->userdata('admin'))){
            $admin_name = (string)$this->input->post('admin_name');
            $userId = $this->session->userdata()['admin']['admin_id'];
            
            if(!ctype_alnum($admin_name)){
            $validator->setInvalid("Admin Name should only contain numbers or letters");
            }
            else if(strlen($admin_name) < 6 || strlen($admin_name) > 12){
                $validator->setInvalid("Admin Name should be 6-12 characters long");
            }
            else{
                $this->load->model('admin_model');
                $validator = $this->admin_model->update_name($userId, $admin_name); 
                
                if($validator->isValid()){
                    $admin = $this->session->userdata()['admin'];
                    $admin['admin_name'] = $admin_name;
                    $this->session->set_userdata('admin', $admin);
                }
            }
            
            echo json_encode($validator->getValues());
        }
        else{
            redirect('admin');
        }
    }
    
    /*
     * Receives and validates POST data for the create of an admin.
     * 
     */
    public function apicreateadmin(){
        $admin_name = (string)$this->input->post('admin_name');
        $password = (string)$this->input->post('admin_password');
        $cpassword = (string)$this->input->post('admin_cpassword');
        
        $this->load->library("validator");
        
        $validator = new Validator();
        
        /* Basic data validation for creating an admin:
         *  -Check if @admin_name is alphanumeric and 6-12 characters long
         *  -Check if @password is alphanumeric and 8-16 characters long
         *  -Check if @cpassword is equal to @password 
         */
        if(!ctype_alnum($admin_name)){
            $validator->setInvalid("Admin Name should only contain numbers or letters");
        }
        else if(strlen($admin_name) < 6 || strlen($admin_name) > 12){
            $validator->setInvalid("Admin Name should be 6-12 characters long");
        }
        else if(strlen($password) < 8 || strlen($password) > 16){
            $validator->setInvalid("Password should be 8-16 characters long");
        }
        else if(!ctype_alnum($password)){
            $validator->setInvalid("Password should only contain numbers or letters");
        }
        else if($cpassword != $password){
            $validator->setInvalid("Confirmation password failed");
        }
        
        
        if($validator->isValid()){
            $this->load->model('admin_model');
            $validator = $this->admin_model->create_admin($admin_name, $password);
        }
        

        
        echo json_encode($validator->getValues());
    }
}
