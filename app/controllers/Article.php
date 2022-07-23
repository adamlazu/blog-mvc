<?php
class Article extends Controller{
    public function index($page=1){
        $data['title']='Articles';
        $data['articles']=$this->model('Article_model')->getArticles((int)$page);
        $data['total']=$this->model('Article_model')->total('all');
        $data['pages']=ceil($data['total']/5);
        $this->view('template/header',$data);
        $this->view('article/index',$data);
        $this->view('template/footer');
    }

    public function write(){
        $data['title']='Write Article';
        $this->view('template/header',$data);
        $this->view('article/write');
        $this->view('template/footer');
    }

    public function add(){
        $validation = $this->model('Validation');
        $terms = array('title'=>array(
            'required'=>true,
            'max'=>100
        ),'tag'=>array(
            'required'=>true,
            'max'=>20
        ),'content' => array(
            'required'=>true
        ));
        if($validation->check($_POST,$terms)->passed()){
            if($this->model('Article_model')->addArticle($_POST)>0){
                Flash::setFlash("The article has successfully uploaded.","success");
                header('Location: '.BASEURL.'/article');
            }else{
                Flash::setFlash("Failed to upload.","danger");
                header('Location: '.BASEURL.'/article');
            }
        }else{
            Flash::setFlash($validation->getErrors(),"danger");
                header('Location: '.BASEURL.'/article');
        }
        
    }

    public function read($id){
        $data['article']= $this->model('Article_model')->getArticlebyid((int)$id);
        $data['title']= $data['article']->title;
        $this->view('template/header',$data);
        $this->view('article/read',$data);
        $this->view('template/footer');
    }

    public function myarticle(){
        $data['title'] = 's articles';
        $data['articles'] = $this->model('Article_model')->getArticlebyauthor($_SESSION['user']);
        $data['total']= $this->model('Article_model')->total('user',$_SESSION['user']);
        $data['pages']= ceil($data['total']/5);
        $this->view('template/header',$data);
        $this->view('article/myarticle',$data);
        $this->view('template/footer');
    }
}

?>