<?php

class Db
{
    public static function getConnection()
    {
        $paramsPath = ROOT . '/config/dataBase.php';
        $params = include($paramsPath);


        $dsn = "mysql:host={$params['host']};dbname={$params['dbName']}";
        $db = new PDO($dsn, $params['user'], $params['password']);

        return $db;
    }
}