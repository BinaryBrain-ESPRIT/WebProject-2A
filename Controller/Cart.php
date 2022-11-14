<?php

declare(strict_types=1);

namespace Controller;

use Config;
use Exception;

include_once __DIR__."/../Config.php";

class Cart
{

    public function getCartID(int $idUser): int
    {
        $req = "SELECT * FROM cart WHERE idUser=$idUser";
        $db = Config::getConnection();

        try {
            $cart = $db->query($req)->fetchAll();
            if (count($cart) > 0) return $cart[0]['id'];
            return 0;
        } catch (Exception $e) {
            die("Error: " . $e);
        }

    }

    public function updateCartTotal($cart): int
    {
        $req = "UPDATE `cart` SET `total` = $cart->total WHERE id= $cart->id";
        $db = Config::getConnection();

        try {
            $query = $db->query($req);
            if ($query->rowCount() > 0)
                return 1;
            return 0;
        } catch (Exception $e) {
            die("Error: " . $e);
        }
    }



}