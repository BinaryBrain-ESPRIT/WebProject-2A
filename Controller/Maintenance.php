<?php

namespace Controller;

use Config;
use Exception;
use Model\Maintenance as MaintenanceM;

include_once __DIR__ . "/../Config.php";
include_once __DIR__ . "/../Model/Maintenance.php";

class Maintenance
{
        public function getMaintenances()
        {
            $req = "SELECT * FROM maintenance";
            $db = Config::getConnection();

            try {
                return $db->query($req)->fetchAll();
            } catch (Exception $e) {
                die("Error: " . $e);
            }
        }

        public function getMaintenance(int $id)
        {
            $req = "SELECT * FROM maintenance WHERE id = $id";
            $db = Config::getConnection();

            try {
                return $db->query($req)->fetch();
            } catch (Exception $e) {
                die("Error: " . $e);
            }
        }

        public function getMaintenanceByType(string $type)
        {
            $req = "SELECT * FROM maintenance WHERE type = '$type'";

            $db = Config::getConnection();

            try {
                return $db->query($req)->fetchAll();
            } catch (Exception $e) {
                die("Error: " . $e);
            }
        }

        public function addMaintenance(MaintenanceM $maintenance): void
        {
            $db = Config::getConnection();
            $req = "INSERT INTO maintenance VALUES ('','$maintenance->name' ,'$maintenance->type','$maintenance->description', '$maintenance->phone', '$maintenance->address')";

            try {
                $db->query($req);
            } catch (Exception $e) {
                die("Error: " . $e);
            }
        }

        public function deleteMaintenance(int $id): void
        {
            $db = Config::getConnection();
            $req = "DELETE FROM maintenance WHERE id = $id";

            try {
                $db->query($req);
            } catch (Exception $e) {
                die("Error: " . $e);
            }
        }

        public function updateMaintenance(MaintenanceM $maintenance): bool
        {
            $db = Config::getConnection();
            $req = "UPDATE maintenance SET type = '$maintenance->type', description = '$maintenance->description', phone = '$maintenance->phone', address = '$maintenance->address' WHERE id = '$maintenance->id'";
                echo $req;
            try {
                if (!$db->query($req))
                    return false;
                return true;

            } catch (Exception $e) {
                die("Error: " . $e);
            }
        }
}