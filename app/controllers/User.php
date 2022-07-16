<?php
class User extends Controller{
    public function index(){
        header('Location:'.BASEURL);
    }
    public function loginpage(){
        $data["title"]="Login Page";
        $this->view('template/header',$data);
        $this->view('user/loginpage');
        $this->view('template/footer');
    }

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
                $_SESSION['user']=$_POST['username'];
                Flash::setFlash('Register berhasil!','success');
                header('location:'.BASEURL.'/article');
            }else{
                Flash::setFlash('Register gagal!, perhatikan username dan password.','danger');
                header('location:'.BASEURL.'/');
            }
        }else{
            Flash::setFlash($validation->getErrors(),'danger');
            header('location:'.BASEURL.'/');
        }
    }

    public function login(){
        $validation = $this->model('Validation');
        $terms = $terms= array('username'=>array(
            'required'=>true,
            'min'=>5,
            'max'=>15,
            'isThere'=>true
        ),'password'=>array(
            'required'=>true,
            'min'=>5,
        ));
        if($validation->check($_POST,$terms)->passed()){
            if($this->model('User_model')->userLogin($_POST['username'],$_POST['password'])){
                $_SESSION['user']=$_POST['username'];
                Flash::setFlash('Login berhasil!','success');
                header('location:'.BASEURL.'/article');
            }else{
                Flash::setFlash('Login gagal!, perhatikan username dan password.','danger');
                header('location:'.BASEURL.'/user/loginpage');
            }
        }else{
            Flash::setFlash($validation->getErrors(),'danger');
            header('location:'.BASEURL.'/user/loginpage');
        }
    }

    public function logout(){
        session_destroy();
        header('Location:'.BASEURL);
    }
}
?>