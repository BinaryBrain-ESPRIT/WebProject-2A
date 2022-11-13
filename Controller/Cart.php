<?php

declare(strict_types=1);

namespace Controller;

use Config;
use Exception;

include_once __DIR__."/../Config.php";

class Cart
{
    public function getCartPurchases(int $idUser)
    {
        $idCart = $this->getCartID($idUser);
        $db = Config::getConnection();

        $req = "SELECT * FROM cart_product WHERE idCart=$idCart";

        try {
            $query = $db->query($req);
            return $query->fetchAll();
        } catch (Exception $e) {
            die("Erreur: " . $e);
        }
    }

    private function getCartID(int $idUser): int
    {
        $req = "SELECT * FROM cart WHERE idUser=$idUser";
        $db = Config::getConnection();

        try {
            $cart = $db->query($req)->fetchAll();
            if (count($cart) > 0) return $cart[0]['id'];
            return -1;
        } catch (Exception $e) {
            die("Erreur: " . $e);
        }

    }
}