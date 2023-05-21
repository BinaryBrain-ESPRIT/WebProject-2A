<?php

declare(strict_types=1);

namespace Controller;

use Config;
use Exception;
use Model\Command as CommandM;

include_once __DIR__ . "/../Config.php";
include_once __DIR__ . "/../Model/Command.php";

class Command
{
    public function getCommands()
    {
        $req = "SELECT * FROM command";
        $db = Config::getConnection();

        try {
            return $db->query($req)->fetchAll();
        } catch (Exception $e) {
            die("Error: " . $e);
        }
    }

    public function getNbCommands()
    {
        $req = "SELECT COUNT(*) as nb FROM command";
        $db = Config::getConnection();

        try {
            return $db->query($req)->fetch();
        } catch (Exception $e) {
            die("Error: " . $e);
        }
    }

    public function getNbCommand(int $idUser)
    {
        $req = "SELECT COUNT(*) as nb FROM command WHERE idUser = $idUser";
        $db = Config::getConnection();

        try {
            return $db->query($req)->fetch();
        } catch (Exception $e) {
            die("Error: " . $e);
        }
    }

    public function getCommandsTotal()
    {
        $req = "SELECT SUM(total) as total FROM command";
        $db = Config::getConnection();

        try {
            return $db->query($req)->fetch();
        } catch (Exception $e) {
            die("Error: " . $e);
        }
    }

    public function getCommandTotal(int $idUser)
    {
        $req = "SELECT SUM(total) as total FROM command WHERE idUser = $idUser";
        $db = Config::getConnection();

        try {
            return $db->query($req)->fetch();
        } catch (Exception $e) {
            die("Error: " . $e);
        }
    }

    public function getCommandsByUsersDistinct()
    {
        $req = "SELECT DISTINCT idUser FROM `command` ORDER BY idUser";
        $db = Config::getConnection();
        try {
            return $db->query($req)->fetchAll();
        } catch (Exception $e) {
            die("Error: " . $e);
        }
    }

    public function getCommand(int $idUser)
    {
        $req = "SELECT * FROM command WHERE idUser=$idUser ORDER BY id DESC LIMIT 1";
        $db = Config::getConnection();

        try {
            $query = $db->query($req);
            return $query->fetch();
        } catch (Exception $e) {
            die("Error: " . $e);
        }
    }

    public function addCommand(CommandM $command): bool|string
    {
        $req = "INSERT INTO command (idUser, total) VALUES ($command->idUser, $command->total)";

        $db = Config::getConnection();

        try {
            $db->query($req);
            return $db->lastInsertId();
        } catch (Exception $e) {
            die("Error: " . $e);
        }
    }

    public function deleteCommand(int $idCommand): void
    {
        $req = "DELETE FROM command WHERE id=$idCommand";

        $db = Config::getConnection();

        try {
            $query = $db->query($req);
        } catch (Exception $e) {
            die("Error: " . $e);
        }
    }


}