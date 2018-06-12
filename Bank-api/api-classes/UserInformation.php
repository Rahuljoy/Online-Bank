<?php
class UserInformation
{
// database connection and table name
    private $pdo;
    private $table_name = "bank_users";

    // UserInformation properties
    public $user_id;
    public $user_name;
    public $user_password;

    // constructor with $db as database connection
    public function __construct($database){
        $this->pdo = $database;
    }

    // read products
    function read(){

        // select all query
        $query = "SELECT
                c.name as category_name, p.id, p.name, p.description, p.price, p.category_id, p.created
            FROM
                " . $this->table_name . " p
                LEFT JOIN
                    categories c
                        ON p.category_id = c.id
            ORDER BY
                p.created DESC";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }
}