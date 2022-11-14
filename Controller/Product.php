<?php

namespace Controller;
use Config;
use Exception;

include_once __DIR__."/../Config.php";

class Product
{

    public function getProducts(){
        $req = "SELECT * FROM product";
        $db = Config::getConnection();

        try {
            $products = $db->query($req)->fetchAll();
            return $products;
        } catch (Exception $e) {
            die("Error: " . $e);
        }
    }
}