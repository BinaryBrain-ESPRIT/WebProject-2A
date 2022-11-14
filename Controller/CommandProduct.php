<?php

namespace Controller;

use Config;
use Exception;

include_once __DIR__ . "/../Config.php";


class CommandProduct
{
    public function addProductCommand($commandProduct)
    {
        $req = "INSERT INTO command_product VALUES ('', $commandProduct->idCommand, $commandProduct->idProduct, $commandProduct->qte, $commandProduct->totalPrice)";

        $db = Config::getConnection();

        try {
            $query = $db->query($req);

            if ($query->rowCount() > 0) {
                return 1;
            }
            return 0;
        } catch (Exception $e) {
            die("Error: " . $e);
        }
    }

}