<?php
class Connect{
    public $server;
    public $user;
    public $password;
    public $dbName;

    public function __construct()
    {
        $this->server = "eanl4i1omny740jw.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
        $this->user = "dtf3m8qibwzpew8x";
        $this->password = "cop4n57z9y651va1";
        $this->dbName ="v59siuykznah0n8l";
    }

    //Option 1: use mysqli
    function connectToMySQL():mysqli{
        $conn_my = new mysqli($this->server,
        $this->user, $this ->password, $this->dbName);
        if($conn_my->connect_error){
            die("Failed ".$conn_my->connect_error);
        }else{
            
        }
        return $conn_my;
    }

    //Option 2: use PDO
    function connectToPDO():PDO{
        try{
             $conn_pdo = new PDO("mysql:host=$this->server;dbname=$this->dbName", $this->user, $this->password);
            $conn_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $conn_pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        }catch(PDOException $e){
            die("Failed $e");
        }
        return $conn_pdo;
    }
}
$c = new Connect();
$c->connectToMySQl();

$c = new Connect();
$c->connectToPDO();
?>