<?php

class Config
{
    private static $pdo=null;

    public static function getConnection(){
        if(!isset($pdo)){
            try{
                self::$pdo = new PDO("mysql:host=localhost;dbname=automobile;", 'root', '',[
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]);
            }catch (Exception $e)
            {
                die("Erreur ".$e->getMessage());
            }
        }
        return self::$pdo;
    }
}