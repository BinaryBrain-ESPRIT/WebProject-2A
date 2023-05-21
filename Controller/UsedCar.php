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
        $req = "INSERT INTO used_car (category, brand, model, cylinder, energy, fiscalPower, gearbox, registerNumber, year, kilometers, imgURL) VALUES ('$car->category', '$car->brand', '$car->model', '$car->cylinder', '$car->energy', '$car->fiscalPower', '$car->gearbox', '$car->registerNumber', '$car->year', '$car->kilometers', '$car->imgURL')";

        try {
            $db->query($req);
            return $db->lastInsertId();
        } catch (Exception $e) {
            die("Error: " . $e);
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
            die("Error: " . $e);
        }
    }

    public function getNbCarsByBrand(string $brand){
        $db = Config::getConnection();
        $req = "SELECT COUNT(*) as nb FROM used_car WHERE brand = '$brand'";
        try {
            $query = $db->query($req);
            return $query->fetch();
        } catch (Exception $e) {
            die("Error: " . $e);
        }
    }

    public function getLatestCar()
    {
        $db = Config::getConnection();
        $req = "SELECT * FROM used_car ORDER BY id DESC LIMIT 3";

        try {
            $query = $db->query($req);
            return $query->fetchAll();
        } catch (Exception $e) {
            die("Error: " . $e);
        }
    }

    public function deleteCar($id): void
    {
        $db = Config::getConnection();
        $req = "DELETE FROM used_car WHERE id = $id";

        try {
            $db->query($req);
        } catch (Exception $e) {
            die("Error: " . $e);
        }
    }

    public function getCar($id)
    {
        $db = Config::getConnection();
        $req = "SELECT * FROM used_car WHERE id = $id";

        try {
            $query = $db->query($req);
            return $query->fetch();
        } catch (Exception $e) {
            die("Error: " . $e);
        }
    }

    public function updateCar($car): void
    {
        $db = Config::getConnection();
        $req = "UPDATE used_car SET category = '$car->category', brand = '$car->brand', model = '$car->model', cylinder = '$car->cylinder', energy = '$car->energy', fiscalPower = '$car->fiscalPower', gearbox = '$car->gearbox', registerNumber = '$car->registerNumber', year = '$car->year', kilometers = '$car->kilometers' WHERE id = $car->id";

        try {
            $db->query($req);
        } catch (Exception $e) {
            die("Error: " . $e);
        }
    }


}