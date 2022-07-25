<?php
class Article_model{
    private $table = 'article';
    private $db;
    public $total;

    public function __construct(){
        $this->db = Database::getInstance();
    }

    public function getArticles($page){
        $perpage = 5;
        $start = ($page*$perpage)-$perpage;

        $query = "SELECT * FROM $this->table LIMIT :start, :end";
        $this->db->query($query);
        $this->db->bind('start',$start);
        $this->db->bind('end',$perpage);
        $this->db->execute();
        return $this->db->fetch();

    }

    public function getArticlebyid($id){
        $query = "SELECT * FROM $this->table WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id',$id);
        $this->db->execute();
        return $this->db->single();
    }

    public function getArticlebyauthor($user){
        $query = "SELECT * FROM $this->table WHERE author = :author";
        $this->db->query($query);
        $this->db->bind('author',$user);
        $this->db->execute();
        return $this->db->fetch();
    }

    public function addArticle($data){
        $query = "INSERT INTO $this->table(title,tag,content,author) VALUE (:title,:tag,:content,:author)";
        $this->db->query($query);
        $this->db->bind('title',$data['title']);
        $this->db->bind('tag',$data['tag']);
        $this->db->bind('content',$data['content']);
        $this->db->bind('author',$_SESSION['user']);
        $this->db->execute();
        return $this->db->rowCount();

    }

    public function updateArticle($data,$id){
        $query = "UPDATE $this->table SET title = :title, content = :content, tag = :tag  WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('title',$data['title']);
        $this->db->bind('tag',$data['tag']);
        $this->db->bind('content',$data['content']);
        $this->db->bind('id',$id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteArticle($id){
        $query = "DELETE FROM $this->table WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id',$id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function total($param,$user = NULL){
        if($param == 'all'){
            $query = "SELECT * FROM $this->table ";
            $this->db->query($query);
            $this->db->execute();
            return $this->db->rowCount();
        }else if($param == 'user' and $user != NULL){
            $query = "SELECT * FROM $this->table WHERE author = :author";
            $this->db->query($query);
            $this->db->bind('author',$user);
            $this->db->execute();
            return $this->db->rowCount();
        }
    }
}