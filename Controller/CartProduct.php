<?php

namespace Controller;

use Config;
use Exception;
use Model\CartProduct as CartProductM;

include_once __DIR__ . "/../Model/CartProduct.php";

class CartProduct
{
    public function getCartProducts(int $idCart)
    {
        $req = "SELECT * FROM cart_product WHERE idCart=$idCart";
        $db = Config::getConnection();

        try {
            $query = $db->query($req);
            return $query->fetchAll();
        } catch (Exception $e) {
            die("Error: " . $e);
        }
    }

    public function getCartProduct(int $idCart, int $idProduct)
    {
        $req = "SELECT * FROM cart_product WHERE idCart=$idCart AND idProduct=$idProduct";
        $db = Config::getConnection();

        try {
            $query = $db->query($req);
            return $query->fetchAll();
        } catch (Exception $e) {
            die("Error: " . $e);
        }
    }

    public function addCartProduct(CartProductM $cartProd): void
    {
        $db = Config::getConnection();
        $req = "SELECT * FROM cart_product WHERE idCart=$cartProd->idCart AND idProduct=$cartProd->idProduct";

        try {
            $query = $db->query($req);
            $result = $query->fetch();
            if ($result) {
                $req = "UPDATE cart_product SET qte=qte+1 WHERE idCart=$cartProd->idCart AND idProduct=$cartProd->idProduct";
                $db->query($req);
            } else {
                $req = "INSERT INTO cart_product (idCart, idProduct, qte) VALUES ($cartProd->idCart, $cartProd->idProduct, $cartProd->qte)";
                $db->query($req);
            }
        } catch (Exception $e) {
            die("Error: " . $e);
        }
    }

    public function deleteCartProducts(int $idCart): void
    {
        $db = Config::getConnection();
        $req = "DELETE FROM cart_product WHERE idCart = $idCart";
        try {
            $db->query($req);
        } catch (Exception $e) {
            die("Error: " . $e);
        }
    }

    public function deleteCartProduct(int $id): void
    {
        $db = Config::getConnection();
        $req = "DELETE FROM cart_product WHERE id= $id";
        try {
            $db->query($req);
        } catch (Exception $e) {
            die("Error: " . $e);
        }
    }

    public function updateCartProduct($cartProd): void
    {
        $db = Config::getConnection();

        $qte = $cartProd['qte'];
        $id = $cartProd['id'];

        $req = "UPDATE cart_product SET qte=$qte WHERE id=$id";
        
        try {
            $db->query($req);
        } catch (Exception $e) {
            die("Error: " . $e);
        }
    }
}