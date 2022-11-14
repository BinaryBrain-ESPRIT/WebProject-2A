<?php

namespace Controller;
include_once __DIR__ . "/Cart.php";

use Config;
use Exception;

class CartProduct
{
    public function getCartPurchases(int $idUser)
    {
        $cartC = new Cart();
        $idCart = $cartC->getCartID($idUser);
        $db = Config::getConnection();

        $req = "SELECT * FROM cart_product WHERE idCart=$idCart";

        try {
            $query = $db->query($req);
            return $query->fetchAll();
        } catch (Exception $e) {
            die("Erreur: " . $e);
        }
    }

    public function deleteCartPurchases(int $idUser)
    {
        $cartC = new Cart();
        $idCart = $cartC->getCartID($idUser);
        $db = Config::getConnection();

        $req = "DELETE FROM cart_product WHERE idCart=$idCart";
        try {
            $db->query($req);

        } catch (Exception $e) {
            die("Erreur: " . $e);
        }

    }


    public function deleteCartPurchase($id)
    {
        $req = "DELETE FROM cart_product WHERE id=$id";
        $db = Config::getConnection();

        try {
            $db->query($req);
        } catch (Exception $e) {
            die("Erreur: " . $e);
        }

    }
}