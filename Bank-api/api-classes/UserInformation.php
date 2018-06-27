<?php
class UserInformation
{
// database connection and table name
    private $conn;
    private $table_name = "bank_users";

    // bank_users properties
    public $user_id;
    public $user_name;
    public $user_password;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }


    // read products
    function read(){

        // select all query
        $query = "SELECT
                c.user_name as user_name, p.user_id, p.user_name, p.user_password
            FROM
                " . $this->table_name . " p
                LEFT JOIN
                    bank_users c
                        ON p.user_id = c.user_id
            ORDER BY
                p.user_password DESC";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

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
        $stmt = $this->conn->prepare( $query );

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
}