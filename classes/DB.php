<?php

class DB
{

    private static function connect()
    {
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=bank_mobile_wallet;charset=utf8', 'root', 'abc');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

    public static function query($query, $params = array())
    {
        $statement = self::connect()->prepare($query);
        $statement->execute($params);


        if (explode(' ', $query)[0] == 'SELECT') {
            $data = $statement->fetchAll();
            return $data;
        }
    }

}





//class DB
//{
//
//    private static function connect()
//    {
//        $pdo = new PDO('mysql:host=lcoalhost;dbname=bank_mobile_wallet;charset=utf8', 'root', '');
//        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
////        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,TRUE);
//        return $pdo;
//    }
//
//    /**
//     * @param $query
//     * @param array $params
//     * @return array|string
//     */
//    public static function query($query, $params = array())
//    {
//        $statement = self::connect()->prepare($query);
//        try {
////            self::connect()->beginTransaction();
////        $statement->execute();
//            $statement->execute($params);
//
//            //$data = self::connect()->lastInsertId();
//            //var_dump(self::connect()->lastInsertId());
//            //print $data;
////            self::connect()->commit();
//        } catch (PDOException $e) {
////            self::connect()->rollBack();
//            print "Error!: " . $e->getMessage() . "</br>";
//        }
//
//
//        if (explode(' ', $query)[0] == 'SELECT') {
//            $data = $statement->fetchAll();
//            return $data;
//        }
//    }
//
//    public static function getLastInsertId($tableName, $outParams, $inParams){
//        $sql = 'select '.$outParams.' from'.$tableName.' where user_name'.$inParams;
//    //SELECT user_id FROM bank_user_temps WHERE user_name = "joy";
//    }
//}