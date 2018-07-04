<?php
/**
 * Created by IntelliJ IDEA.
 * User: rahul
 * Date: 6/25/18
 * Time: 10:57 PM
 */

class Database
{
    // specify your own database credentials
    private $host = "localhost";
    private $db_name = "bank_mobile_wallet";
    private $username = "root";
    private $password = "";
    public $connection;

    // get the database connection
    public function getConnection(){

        $this->connection = null;

        try{
            $this->connection = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->connection->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->connection;
    }
}