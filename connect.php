<?php
class Connect{
    public $server;
    public $user;
    public $password;
    public $dbName;

    public function __construct()
    {
        $this->server = "eyw6324oty5fsovx.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
        $this->user = "h0ppup4s5gr2w8cp";
        $this->password = "zsfftzsl7b9m016d";
        $this->dbName ="m6ullzkrf2we0o5u";
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