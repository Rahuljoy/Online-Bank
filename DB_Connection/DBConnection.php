<?php
/**
 * Created by.
 * User: RaHuL
 * Date: 3/1/2018
 * Time: 2:15 AM
 */

class DBConnection
{
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $connection;

    // Constructor
    public function DBConnection($servername="localhost", $username="root", $password="abc", $dbname="b_m_wallet")
    {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;

        // Object Created

    }

    // Connect to the database
    public function createConnection()
    {
        // Create connection
        $this->connection = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        // Check connection
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    // Get Connection from here
    public function getConnection()
    {
        // return connection variable
        return $this->connection;
    }

    // Save information to database from here
    public function saveInformation($sql, $connection)
    {
        //echo $sql;
        $result = $connection->query($sql);
        //echo $result;
        return mysqli_insert_id($connection);
    }

    // Read information from database from here
    public function read($sql, $connection)
    {
       // echo "Reading Data";
        $result = $connection->query($sql);
        return $result;
    }

    // Update information from here
    public function update($sql, $connection)
    {
        $result = $connection->query($sql);
        return $result;
    }

    // delete information from here
    public function delete($sql, $connection)
    {
        $result = $connection->query($sql);
        return $result;
    }

    // join information from here
    public function join($sql, $connection)
    {
        $result = $connection->query($sql);
        return $result;
    }

    // close Connection
    public function closeConnection()
    {
        $this->connection->close();
    }

}