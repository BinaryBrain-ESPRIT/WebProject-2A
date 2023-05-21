<?php

namespace Controller;

use Config;
use Exception;
use Model\CommandProduct as CommandProductM;

include_once __DIR__ . "/../Config.php";
include_once  __DIR__ . "/../Model/CommandProduct.php";

class CommandProduct
{
    public function addProductCommand(CommandProductM $commandProduct)
    {
        $req = "INSERT INTO command_product VALUES (0, $commandProduct->idCommand, $commandProduct->idProduct, $commandProduct->qte)";

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

    public function getCommandProduct(int $idCommand)
    {
        $req = "SELECT * FROM command_product WHERE idCommand=$idCommand";
        $db = Config::getConnection();

        try {
            $query = $db->query($req);
            return $query->fetchAll();
        } catch (Exception $e) {
            die("Error: " . $e);
        }
    }

}