<?php
declare(strict_types=1);

namespace Controller;

use Config;
use Exception;

include_once __DIR__."/../Config.php";
include "/../Model.php/user.php";
class User
{
    public function listUser()
    {
        $sql = "SELECT * FROM user";
        $db = config::getConnection();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteUser($id)
    {
        $sql = "DELETE FROM user WHERE id = :id";
        $db = config::getConnection();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addUser($user)
    {
        $sql = "INSERT INTO user  
        VALUES (NULL, :fn,:ln, :ad,:dob)";
        $db = config::getConnection();
        try {
            print_r($user->getDob()->format('Y-m-d'));
            $query = $db->prepare($sql);
            $query->execute([
                'em' => $user->getemail(),
                'mdp' => $user->getpassword(),
                'n' => $user->getname(),
                'ag' => $user->getage(),
                'isB' => $user->isBanned(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateUser($user, $id)
    {
        try {
            $db = config::getConnection();
            $query = $db->prepare(
                'UPDATE user SET 
                    email = :email, 
                    password = :password, 
                    name = :name, 
                    age = :age,
                    age = :age,
                    isBanned = :isBanned,
                WHERE id= :id'
            );
            $query->execute([
                'id' => $id,
                'firstName' => $user->getemail(),
                'lastName' => $user->getpassword(),
                'address' => $user->getname(),
                'ag' => $user->getage(),
                'isB' => $user->isBanned(),
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showUser($id)
    {
        $sql = "SELECT * from user where id = $id";
        $db = config::getConnection();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $user = $query->fetch();
            return $user;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }  

}