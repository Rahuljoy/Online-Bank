<?php

//class DB
//{
//
//    private static function connect()
//    {
//        $pdo = new PDO('mysql:host=127.0.0.1;dbname=bank_mobile_wallet;charset=utf8', 'root', 'abc');
//        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//        return $pdo;
//    }
//
//    public static function query($query, $params = array())
//    {
//        $statement = self::connect()->prepare($query);
//        $statement->execute($params);
//
//
//        $data = self::connect()->lastInsertId();
//        echo $data;
//
//        if (explode(' ', $query)[0] == 'SELECT') {
//            $data = $statement->fetchAll();
//            return $data;
//        }
//    }
//
//}





class DB
{

    private static function connect()
    {
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=bank_mobile_wallet;charset=utf8', 'root', 'abc');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,TRUE);
        return $pdo;
    }

    public static function query($query, $params = array())
    {
        $statement = self::connect()->prepare($query);
        self::connect()->beginTransaction();
//        $statement->execute();
        $statement->execute($params);


        $data = self::connect()->lastInsertId();
        echo $data;

        self::connect()->commit();

        if (explode(' ', $query)[0] == 'SELECT') {
            $data = $statement->fetchAll();
            return $data;
        }
    }

}
