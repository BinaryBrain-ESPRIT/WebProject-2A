<?php

namespace Controller;

use Config;
use Exception;

include_once __DIR__ . "/../Config.php";

class NewCar
{
    public function addCar($car)
    {
        $db = Config::getConnection();
        $req = "INSERT INTO new_car (category, brand, model, cylinder, energy, fiscalPower, gearbox, availability, guarantee) VALUES ('$car->category', '$car->brand', '$car->model', '$car->cylinder', '$car->energy', '$car->fiscalPower', '$car->gearbox', '$car->availability', '$car->guarantee')";

        try {
            $db->query($req);
        } catch (Exception $e) {
            die("Erreur: " . $e);
        }
    }

    public function getCars()
    {
        $db = Config::getConnection();
        $req = "SELECT * FROM new_car";

        try {
            $query = $db->query($req);
            return $query->fetchAll();
        } catch (Exception $e) {
            die("Erreur: " . $e);
        }
    }
}