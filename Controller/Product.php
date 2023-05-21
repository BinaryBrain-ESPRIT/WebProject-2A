<?php

namespace Controller;

use Config;
use Exception;

include_once __DIR__ . "/../Config.php";

class Product
{

    public function getProducts()
    {
        $req = "SELECT * FROM product";
        $db = Config::getConnection();

        try {
            return $db->query($req)->fetchAll();
        } catch (Exception $e) {
            die("Error: " . $e);
        }
    }

    public function getProduct($id)
    {
        $req = "SELECT * FROM product WHERE id = $id";
        $db = Config::getConnection();

        try {
            return $db->query($req)->fetch();
        } catch (Exception $e) {
            die("Error: " . $e);
        }
    }

    public function addProduct($product): void
    {
        $db = Config::getConnection();
        $req = "INSERT INTO product VALUES ('', '$product->brand','$product->type', '$product->name', '$product->qte', '$product->price')";

        try {
            $db->query($req);
        } catch (Exception $e) {
            die("Error: " . $e);
        }
    }

    public function deleteProduct($id): void
    {
        $db = Config::getConnection();
        $req = "DELETE FROM product WHERE id = $id";

        try {
            $db->query($req);
        } catch (Exception $e) {
            die("Error: " . $e);
        }
    }

    public function updateProduct($product): void
    {
        $db = Config::getConnection();
        $req = "UPDATE product SET brand = '$product->brand', type = '$product->type', name = '$product->name', qte = '$product->qte', price = '$product->price' WHERE id = $product->id";

        try {
            $db->query($req);
        } catch (Exception $e) {
            die("Error: " . $e);
        }
    }

    public function filterProducts($type)
    {
        $db = Config::getConnection();
        $req = "SELECT * FROM product WHERE type LIKE '%$type%' ";

        try {
            return $db->query($req)->fetchAll();
        } catch (Exception $e) {
            die("Error: " . $e);
        }
    }
}