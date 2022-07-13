<?php
class User extends Controller{
    public function register(){
        $validation = $this->model('Validation');
        $terms= array('username'=>array(
            'required'=>true,
            'min'=>5,
            'max'=>15,
            'unique'=>true
        ),'password'=>array(
            'required'=>true,
            'min'=>5,
        ));
        if($validation->check($_POST,$terms)->passed()){
            if($this->model('User_model')->userRegister($_POST['username'],$_POST['password'])>0){
                echo "udah masuk";
            }else{
                
            }
        }else{
            echo "masih salah";
        }
    }
}
?>