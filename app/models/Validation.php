<?php
class Validation{
    private $_passed = false;
    private $_error = array();
    private $db;

    public function __construct(){
        $this->db = Database::getInstance();
    }

    public function check($data,$terms=array()){
        foreach($terms as $value =>$rules){
            foreach($rules as $rule => $rule_value){
                switch($rule){
                    case 'required':
                        if(empty(trim($data[$value]))){
                            $this->addErrors("$value tidak boleh kosong");
                        }
                        break;
                    case 'min':
                        if(strlen($data[$value])<$rule_value){
                            $this->addErrors("$value minimal $rule_value karakter");
                        }
                        break;
                    case 'max':
                        if(strlen($data[$value])>$rule_value){
                            $this->addErrors("$value maksimal $rule_value karakter");
                        }
                        break;
                    case 'unique':
                        $this->db->query("SELECT * FROM user WHERE ".$value." = :value");
                        $this->db->bind('value',$data[$value]);
                        $this->db->execute();
                        if($this->db->rowCount()>0){
                            $this->addErrors("$value sudah dipakai");
                        }
                        break;
                    case 'isThere':
                        $this->db->query("SELECT * FROM user WHERE ".$value." = :value");
                        $this->db->bind('value',$data[$value]);
                        $this->db->execute();
                        if($this->db->rowCount()==0){
                            $this->addErrors("$value Tidak ditemukan");
                        }
                        break;
                    
                }
            }
        }

        if(empty($this->_error)){
            $this->_passed=true;
        }

        return $this;
    }

    public function addErrors($value){
        $this->_error[]=$value;
    }

    public function getErrors(){
        return $this->_error;
    }

    public function passed(){
        return $this->_passed;
    }
}
?>