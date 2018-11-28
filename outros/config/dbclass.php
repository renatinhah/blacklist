<?php
include '/config.php';
var_dump($DATABASE); die;
class DBClass {

    // private $host = "localhost";
    // private $username = "root";
    // private $password = "root";
    // private $database = "blacklist";

    public $connection;

    public function getConnection(){
        var_dump($host); die;
        $this->connection = null;
        try{
            $this->connection = new PDO("mysql:host=" . $HOST . ";dbname=" . $DATABASE, $USERNAME, $PASSWORD);
            $this->connection->exec("set names utf8");
            var_dump('conectado');
        }catch(PDOException $exception){
            echo "Error: " . $exception->getMessage();
        }
        return $this->connection;
    }
}

$teste = new DBClass();
$teste->getConnection();

?>
