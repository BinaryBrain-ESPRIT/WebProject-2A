<?php

declare(strict_types=1);

namespace Controller;

use Config;
use Exception;

include_once __DIR__ . "/../Config.php";
include_once __DIR__ . "/../Model/User.php";

class User
{
    public function listUser()
    {
        $sql = "SELECT * FROM user";
        $db = Config::getConnection();
        try {
            $liste = $db->query($sql);
            return $liste->fetchAll();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteUser($id): void
    {
        $sql = "DELETE FROM user WHERE id = :id";
        $db = Config::getConnection();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addUser($user): void
    {
        $sql = "INSERT INTO user (email, password, name, age, address, isBanned, isAdmin) VALUES (:email, :password, :name, :age, :address, :isBanned, :isAdmin)";
        $db = Config::getConnection();
        $req = $db->prepare($sql);
        $req->bindValue(':email', $user->email);
        $req->bindValue(':password', md5($user->password));
        $req->bindValue(':name', $user->name);
        $req->bindValue(':age', $user->age);
        $req->bindValue(':address', $user->address);
        $req->bindValue(':isBanned', $user->isBanned);
        $req->bindValue(':isAdmin', $user->isAdmin);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function updateUser($user): void
    {
        $sql = "UPDATE user SET email = :email, password = :password, name = :name, age = :age, address = :address, isBanned = :isBanned, isAdmin = :isAdmin WHERE id = :id";
        $db = Config::getConnection();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $user->id);
        $req->bindValue(':email', $user->email);
        $req->bindValue(':password', md5($user->password));
        $req->bindValue(':name', $user->name);
        $req->bindValue(':age', $user->age);
        $req->bindValue(':address', $user->address);
        $req->bindValue(':isBanned', $user->isBanned);
        $req->bindValue(':isAdmin', $user->isAdmin);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function showUser($id)
    {
        $sql = "SELECT * FROM user WHERE id = $id";
        $db = Config::getConnection();
        try {

            $query = $db->prepare($sql);
            $query->execute();
            return $query->fetch();
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function getUser($id)
    {
        $sql = "SELECT * FROM user WHERE id = $id";
        $db = Config::getConnection();
        try {
            return $db->query($sql)->fetch();
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function login(\Model\User $user)
    {
        $sql = "SELECT * FROM user WHERE Email = :em AND password = :mdp";
        $db = Config::getConnection();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'em' => $user->email,
                'mdp' => md5($user->password)
            ]);
            return $query->fetch();
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }


    public function banUser(int $idUser): void
    {
        $db = Config::getConnection();
        $sql = "UPDATE user SET isBanned=1 WHERE id = $idUser";
        try {
            $db->query($sql);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function unBanUser(int $idUser): void
    {
        $db = Config::getConnection();
        $sql = "UPDATE user SET isBanned=0 WHERE id = $idUser";
        try {
            $db->query($sql);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    public function getUserByEmail(string $email)
    {
        $db = Config::getConnection();
        $sql = "SELECT * FROM user WHERE email = '$email'";

        try {
            return $db->query($sql)->fetch();
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function Admin(int $idUser)
    {
        $db = Config::getConnection();
        $sql = "UPDATE user SET isAdmin=1 WHERE id = $idUser";
        try {
            $query = $db->query($sql);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function unAdmin(int $idUser)
    {
        $db = Config::getConnection();
        $sql = "UPDATE user SET isAdmin=0 WHERE id = $idUser";
        try {
            $query = $db->query($sql);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public  function checkIsBanned(int $idUser)
    {
        $db = Config::getConnection();
        $sql = "SELECT isBanned FROM user WHERE id = $idUser";
        try {
            $query = $db->query($sql);
            return $query->fetch()['isBanned'];
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}