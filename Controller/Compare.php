<?php

namespace Controller;

use Config;
use Exception;

include_once __DIR__ . "/../Model/Compare.php";
include_once __DIR__ . "/../Config.php";

class Compare
{
    public function listCompare($idUser)
    {
        $sql = "SELECT * FROM compare WHERE idUser = $idUser";
        $db = Config::getConnection();
        try {
            return $db->query($sql)->fetchAll();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteCompare(\Model\Compare $compare): void
    {
        $sql = "DELETE FROM compare WHERE idCar = :idCar AND idUser = :idUser";
        $db = Config::getConnection();
        $req = $db->prepare($sql);
        $req->bindValue(':idCar', $compare->idCar);
        $req->bindValue(':idUser', $compare->idUser);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addCompare(\Model\Compare $compare): void
    {
        try {
            if (!$this->checkIfExist($compare)) {
                $sql = "INSERT INTO compare (idUser, idCar) VALUES (:idUser, :idCar)";
                $db = Config::getConnection();
                $req = $db->prepare($sql);
                $req->bindValue(':idUser', $compare->idUser);
                $req->bindValue(':idCar', $compare->idCar);
                $req->execute();
            }
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function checkIfExist(\Model\Compare $compare)
    {
        $sql = "SELECT * FROM compare WHERE idUser = :idUser AND idCar = :idCar";
        $db = Config::getConnection();
        $req = $db->prepare($sql);
        $req->bindValue(':idUser', $compare->idUser);
        $req->bindValue(':idCar', $compare->idCar);

        try {
            $req->execute();
            $result = $req->fetch();
            if ($result == null) {
                return false;
            }
            return true;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

}