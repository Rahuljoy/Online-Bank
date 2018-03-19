<?php
/**
 * Created by .
 * User: RaHuL
 * Date: 2/24/2018
 * Time: 2:11 PM
 */
class User
{
//    private $DBConnect;
//    private $connection;
//    private $result;
//    private $id;
    private $username;
    private $password;
    private $typeId;
    private $active;

    public function __construct($_username, $_password, $_typeId)
    {
//        $this->DBConnect = new DBConnection();
//        $this->DBConnect->createConnection();
//        $this->connection = $this->DBConnect->getConnection();
        //echo "connection Establish ";
        $this->username = $_username;
        $this->password = $_password;
        $this->typeId = $_typeId;
    }

//    public function checkUsernamePassword($_username, $_password)
//    {
//        $isMatched = false;
//        $this->result = $this->connection->read("SELECT * FROM `b_user` WHERE user_name=$_username AND user_password=$_password", $this->connection);
//        echo $this->result;
//        //return $this->result;
//        return $isMatched;
//    }
//
//    public function checkIfAdmin($_username, $_typeId)
//    {
//        $isAdmin = false;
//
//        return $isAdmin;
//    }
//
//    public function checkIfUser($_username, $_typeId)
//    {
//        $isUser = false;
//
//        return $isUser;
//    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @param mixed $typeId
     */
    public function setTypeId($typeId)
    {
        $this->typeId = $typeId;
    }

    /**
     * @param mixed $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getTypeId()
    {
        return $this->typeId;
    }

    /**
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }
    //    public function LogIn($user_name, $user_password, $type_id){
//        if(!empty($user_name)&&!empty($user_password)){
//            if($type_id){
//                $statement=$this->database->prepare("SELECT * FROM `b_user` WHERE user_name=$user_name AND user_password=$user_password AND type_id=$type_id");
//                $statement->bind ->parameter($user_name,$user_password,$type_id);
//                $statement->execute();
//                $statement->fetchAll(PDO::FETCH_ASSOC);
//
//
//                if ($type_id==1){
//                 echo "admin";
//                }else{
//                    echo "Try again";
//                }
//            }else{
//                echo "Not match";
//            }
//
//        }else{
//            echo "Please enter user name & password" ;
//        }
//
//    }
}
//$DBConnect->closeConnection();
