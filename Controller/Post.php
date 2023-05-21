<?php

namespace Controller;

use Config;
use Exception;

require_once __DIR__ . "/../Config.php";
include_once __DIR__."/UsedCar.php";

class Post
{
    public function addPost($post)
    {
        $db = Config::getConnection();
        $req = "INSERT INTO post VALUES ('', '$post->idCar', '$post->idUser', '$post->price', '$post->date')";
        try {
            $db->query($req);
        } catch (Exception $e) {
            die("Error: " . $e);
        }

    }

    public function postsList()
    {
        $db = Config::getConnection();
        $req = "SELECT * FROM post";

        try {
            $query = $db->query($req);
            return $query->fetchAll();
        } catch (Exception $e) {
            die("Error: " . $e);
        }

    }

    public function filterCar($brand, $fiscalPower, $energy, $gearbox)
    {
        $db = Config::getConnection();
        $req = "SELECT * FROM post WHERE idCar IN (SELECT id FROM used_car WHERE brand LIKE '%$brand%' AND fiscalPower LIKE '%$fiscalPower%' AND energy LIKE '%$energy%' AND gearbox LIKE '%$gearbox%')";

        try {
            $query = $db->query($req);
            return $query->fetchAll();
        } catch (Exception $e) {
            die("Error: " . $e);
        }
    }

    public function getLatestPosts()
    {
        $db = Config::getConnection();
        $req = "SELECT * FROM post ORDER BY date DESC LIMIT 3";

        try {
            $query = $db->query($req);
            return $query->fetchAll();
        } catch (Exception $e) {
            die("Error: " . $e);
        }
    }

}