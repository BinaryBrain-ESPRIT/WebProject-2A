<?php

namespace Controller;

use Config;
use Exception;

include_once __DIR__ . "/../Config.php";

class UsedCar
{
    public function addCar($car)
    {
        $db = Config::getConnection();
        $req = "INSERT INTO used_car (category, brand, model, cylinder, energy, fiscalPower, gearbox, registerNumber, year, kilometers) VALUES ('$car->category', '$car->brand', '$car->model', '$car->cylinder', '$car->energy', '$car->fiscalPower', '$car->gearbox', '$car->registerNumber', '$car->year', '$car->kilometers')";

        try {
            $db->query($req);
        } catch (Exception $e) {
            die("Erreur: " . $e);
        }
    }

    public function getCars()
    {
        $db = Config::getConnection();
        $req = "SELECT * FROM used_car";

        try {
            $query = $db->query($req);
            return $query->fetchAll();
        } catch (Exception $e) {
            die("Erreur: " . $e);
        }
    }
}