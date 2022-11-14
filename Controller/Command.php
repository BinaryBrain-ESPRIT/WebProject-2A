<?php

declare(strict_types=1);
namespace Controller;

use Config;
use Exception;

include_once __DIR__ . "/../Config.php";

class Command
{
    public function addCommand($command): int
    {
        $req = "INSERT INTO command VALUES ('', $command->idUser, $command->total)";
        $db = Config::getConnection();
        try {
            $query = $db->query($req);

            if ($query->rowCount() > 0) {
                return 1;
            }

            return 0;
        } catch (Exception $e) {
            die("Error : " . $e);
        }
    }

    public function getCommandID(int $idUser): int
    {
        $req = "SELECT id FROM command";
        $db = Config::getConnection();

        try {
            $commandID = $db->query($req)->fetchAll()[0]['id'];
            if (isset($commandID))
                return $commandID;

            return 0;
        }
        catch (Exception $e)
        {
            die("Error: ".$e);
        }

    }
}