<?php

class AdminModel{
    public $admin_id;
    public $admin_name;
    public $admin_password;
    
    public function __construct() {
        
    }
    
    public static function init_array($arr){
        $instance = new self();
        
        $instance->admin_id = $arr['admin_id'];
        $instance->admin_name = $arr['admin_name'];
        $instance->admin_password =$arr['admin_password'];
        
        return $instance;
    }
    
    public static function init_all($admin_id, $admin_name, $admin_password){
        $instance = new self();
        
        $instance->admin_id = $admin_id;
        $instance->admin_name = $admin_name;
        $instance->admin_password = $admin_password;
        
        return $instance;
    }
    
    
    public function array_data(){
        $ret = array();
        $ret["admin_id"] = $this->admin_id;
        $ret["admin_name"] = $this->admin_name;
        $ret["admin_password"] = $this->admin_password;
        
        return $ret;
        
    }
}