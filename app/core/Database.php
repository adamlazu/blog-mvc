<?php
class Database{
    private $host = DBHOST;
    private $name = DBNAME;
    private $password = DBPASSWORD;
    private $user = DBUSER;
    private $connection;
    private $stmt;
    private static $instance;

    public function __construct(){
        $dsn = 'mysql:host='.$this->host.";dbname=".$this->name;
        try{
            $this->connection = new PDO($dsn,$this->user,$this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo $e;
        }
    }

    public static function getInstance(){
        if(!isset(self::$instance)){
            self::$instance = new Database;
        }

        return self::$instance;
    }

    public function query($query){
        $this->stmt = $this->connection->prepare($query);
    }

    public function bind($param,$value,$type=null){
        if(is_null($type)){
            switch(true){
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param,$value,$type);
    }

    public function execute(){
        $this->stmt->execute();
    }

    public function fetch(){
       return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function single(){
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    public function rowCount(){
        return $this->stmt->rowCount();
    }
}

?>