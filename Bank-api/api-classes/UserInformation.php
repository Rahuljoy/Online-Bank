<?php
class UserInformation
{
// database connection and table name
    private $connection;
    private $table_name = "bank_users";

    // bank_users properties
    public $user_id;
    public $user_name;
    public $user_password;
    public $user_active;

    // constructor with $db as database connection
    public function __construct($db){
        $this->connection = $db;
    }


    // read products
    function read(){

        // select all query
        $query = "SELECT
                c.user_name as user_name, p.user_id, p.user_name, p.user_password, p.type_id, p.user_create_date, p.user_active
            FROM
                " . $this->table_name . " p
                LEFT JOIN
                    bank_users c
                        ON p.user_id = c.user_id
            ORDER BY
                p.user_password DESC";

        // prepare query statement
        $stmt = $this->connection->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }


    // used when filling up the update product form
    function readOne(){

        // query to read single record
        $query = "SELECT
                c.user_name as user_name, p.user_id, p.user_name, p.user_password
            FROM
                " . $this->table_name . " p
                LEFT JOIN
                    bank_users c
                        ON p.user_id = c.user_id
            WHERE
                p.user_id = ?
            LIMIT
                0,1";

        // prepare query statement
        $stmt = $this->connection->prepare( $query );

        // bind id of product to be updated
        $stmt->bindParam(1, $this->user_id);

        // execute query
        $stmt->execute();

        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // set values to object properties
        $this->user_id = $row['user_id'];
        $this->user_name= $row['user_name'];
        $this->user_password = $row['user_password'];

    }


    // create product
    function login(){

        $this->user_name = $_POST['user_name'];
        $this->user_password = $_POST['user_password'];
        // query to select
        $query = "SELECT user_id ,user_active FROM " . $this->table_name . " WHERE  user_name = ? &&  user_password = ?";

        // prepare query
        $stmt = $this->connection->prepare($query);

        // bind values
        $stmt->bindParam(1, $this->user_name);
        $stmt->bindParam(2, $this->user_password);

        // execute query
        $stmt->execute();

        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // set values to object properties
        $this->user_id = $row['user_id'];
        $this->user_active= $row['user_active'];
    }
}