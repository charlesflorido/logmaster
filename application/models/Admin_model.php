<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Admin_model extends CI_Model{
    
            
            
    public function __construct() {
        $this->load->database();
        $this->load->library('validator');
        $this->load->library('AdminModel');
    }
    
    public function tryLogin($name = "", $password = ""){
        $valid = new Validator();
        $query = $this->db->get_where('admin', array('admin_name'=>$name, 'admin_password'=>md5($password)))->result_array();
        
        if(count($query)  > 0){
            $valid->addValue("admin", AdminModel::init_array($query[0])->array_data());
        }
        else{
            $valid->setInvalid("Admin name or password incorrect");
        }
        
        return $valid;
        
    }
    
    public function update_name($id = -1, $name = ""){
        $valid = new Validator();
        
        if($id != null && $name != null){
            if($this->is_exist($name) == FALSE){
               $sql = "UPDATE admin SET admin_name = ? WHERE admin_id = ?";
               $this->db->query($sql, array($name, $id));
            }
            else{
                $valid->setInvalid("<b>". $name . "</b> already exists");
            }
        }
        else{
            $valid->setInvalid("Admin name required");
        }
        
        return $valid;
    }
    
    /*
     * Checks if the parameters are empty or not.
     * Checks if $name (admin.admin_name) already exists in the database
     * 
     * @returns {Validator}
     */
    public function create_admin($name = "", $password = ""){
        $valid = new Validator();
        
        if($name != null && $password != null){
            if($this->is_exist($name) == FALSE){
                $data = array(
                    'admin_name' => $name,
                    'admin_password' => md5($password)
                );
                
                $this->db->insert('admin', $data);
            }
            else{
                $valid->setInvalid("<b>". $name . "</b> already exists");
            }
        }
        else{
            $valid->setInvalid("All fields required.");
        }
        
        return $valid;
    }
    
    
    
    
    /*
     * 
     */
    public function is_exist($name){
        return ( count($this->db->get_where('admin', array('admin_name'=>$name))->result_array()) > 0 ? TRUE : FALSE );  
    }
    
    public function find_admin_by_name($name){
        $query = $this->db->get_where('admin', array('admin_name'=>$name))->result_array();
        $ret = null;
        
        if(count($query) > 0){
            
        }
        
        return $ret;
    }
}