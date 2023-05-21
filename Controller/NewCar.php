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
        $req = "INSERT INTO new_car (category, brand, model, cylinder, energy, fiscalPower, gearbox, availability, guarantee, imgURL) VALUES ('$car->category', '$car->brand', '$car->model', '$car->cylinder', '$car->energy', '$car->fiscalPower', '$car->gearbox', '$car->availability', '$car->guarantee', '$car->imgURL')";
        
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
            die("Error: " . $e);
        }
    }

    public function deleteCar($id): void
    {
        $db = Config::getConnection();
        $req = "DELETE FROM new_car WHERE id = $id";

        try {
            $db->query($req);
        } catch (Exception $e) {
            die("Error: " . $e);
        }
    }

    public function getCar($id)
    {
        $db = Config::getConnection();
        $req = "SELECT * FROM new_car WHERE id = $id";
        try {
            $query = $db->query($req);
            return $query->fetch();
        } catch (Exception $e) {
            die("Error: " . $e);
        }
    }

    public function updateCar($car)
    {
        $db = Config::getConnection();
        $req = "UPDATE new_car SET category = '$car->category', brand = '$car->brand', model = '$car->model', cylinder = '$car->cylinder', energy = '$car->energy', fiscalPower = '$car->fiscalPower', gearbox = '$car->gearbox', availability = '$car->availability', guarantee = '$car->guarantee' WHERE id = $car->id";

        try {
            $db->query($req);
        } catch (Exception $e) {
            die("Error: " . $e);
        }
    }

    public function filterCar($brand,$fiscalPower, $energy, $gearbox)
    {
        $db = Config::getConnection();
        $req = "SELECT * FROM new_car WHERE brand LIKE '%$brand%' AND energy LIKE '%$energy%' AND gearbox LIKE '%$gearbox%' AND fiscalPower LIKE '%$fiscalPower%'";

        try {
            $query = $db->query($req);
            return $query->fetchAll();
        } catch (Exception $e) {
            die("Error: " . $e);
        }
    }

}