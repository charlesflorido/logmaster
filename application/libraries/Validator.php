<?php

if ( ! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Validator{
    private $values;
    
    public function __construct() {
        $this->values = array();
        $this->values["message"] = "";
        $this->values["valid"] = TRUE;
    }
    
    public function setValid(){
        $this->values["valid"] = TRUE;
    }
    
    public function setInvalid($message){
        $this->values["message"] = (string)$message;
        $this->values["valid"] = FALSE;
    }
    
    public function setMessage($message){
        $this->values["message"] = (string)$message;
    }
    
    public function addValue($key, $value){
        $key = (string)$key;
        $this->values[$key] = $value;
    }
    
    public function isValid(){
        return (bool)$this->values["valid"];
    }
    
    public function getValues(){
        return $this->values;
    }
}
