<?php

namespace Controller;

use Model\ResetPassword as ResetPasswordM;

include_once __DIR__ . "/../Model/ResetPassword.php";
include_once __DIR__ . "/../Config.php";

use Config;
use Exception;

class ResetPassword
{
    public function AddResetPassword(ResetPasswordM $resetPassword): void
    {
        $idUser = $resetPassword->idUser;
        $verifCode = $resetPassword->verifCode;
        $sql = "INSERT INTO reset_password (idUser, verifCode) VALUES ('$idUser', '$verifCode')";
        $db = Config::getConnection();
        try {
            $query = $db->prepare($sql);
            $db->query($sql);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function checkVerifCode(ResetPasswordM $resetPassword, string $newPass): bool
    {
        $idUser = $resetPassword->idUser;
        $verifCode = $resetPassword->verifCode;
        $sql = "DELETE FROM reset_password WHERE idUser = '$idUser' AND verifCode = '$verifCode'";
        $sql1 = "UPDATE user SET password = '$newPass' WHERE id = '$idUser'";
        $db = Config::getConnection();
        try {
            $query = $db->query($sql);
            $db->query($sql1);
            if ($query->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}