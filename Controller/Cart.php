<?php

declare(strict_types=1);

namespace Controller;

use Config;
use Exception;

include_once __DIR__ . "/CartProduct.php";
include_once __DIR__ . "/Product.php";
include_once __DIR__ . "/../Config.php";

class Cart
{
    public function getCart(int $idUser): array
    {
        $req = "SELECT * FROM cart WHERE idUser=$idUser";
        $db = Config::getConnection();

        try {
            $query = $db->query($req);
            return $query->fetch();
        } catch (Exception $e) {
            die("Error: " . $e);
        }
    }

    public function checkCart(int $idUser)
    {
        $req = "SELECT * FROM cart WHERE idUser=$idUser";
        $db = Config::getConnection();

        try {
            $cart = $db->query($req)->fetch();
            if (!$cart) {
                $req = "INSERT INTO cart VALUES (0, $idUser, 0)";
                $db->query($req);
            }
        } catch (Exception $e) {
            die("Error: " . $e);
        }
    }

    public function updateTotalCart($idCart)
    {
        $req = "SELECT * FROM cart WHERE id=$idCart";
        $db = Config::getConnection();
        $productC = new Product();
        $cartProductC = new CartProduct();
        try {
            $cart = $db->query($req)->fetch();
            $cartProducts = $cartProductC->getCartProducts($cart['id']);
            $total = 0;
            foreach ($cartProducts as $cartProduct) {
                $productPrice = $productC->getProduct($cartProduct['idProduct'])['price'];
                $total += $productPrice * $cartProduct['qte'];
            }
            $req = "UPDATE cart SET total = $total WHERE id = " . $cart['id'];
            $db->query($req);
        } catch (Exception $e) {
            die("Error: " . $e);
        }
    }
}