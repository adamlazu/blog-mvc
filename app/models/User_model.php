<?php
class User_model{
    private $db;
    private $table = "user";

    public function __construct(){
        $this->db = Database::getInstance();
    }

    public function userRegister($user,$password){
        $hashed = password_hash($password,PASSWORD_DEFAULT);
        $query = "INSERT INTO $this->table (username, password) VALUES (:username,:password)";
        $this->db->query($query);
        $this->db->bind('username',$user);
        $this->db->bind('password',$hashed);
        $this->db->execute();
        return $this->db->rowCount();
    }
}