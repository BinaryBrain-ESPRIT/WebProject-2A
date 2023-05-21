<?php

namespace Controller;

use Config;
use Exception;

include_once __DIR__ . "/../Controller/Comment.php";
include_once __DIR__ . "/../config.php";


class Comment
{
    public function addComment($comment, $type)
    {
        $db = Config::getConnection();
        if ($type == 0)
            $req = "INSERT INTO comment (idCar, idUser, description, type) VALUES ('$comment->idCar', '$comment->idUser', '$comment->description', '$comment->type')";
        else
            $req = "INSERT INTO comment (idPost, idUser, description, type) VALUES ('$comment->idPost', '$comment->idUser', '$comment->description', '$comment->type')";

        try {
            $db->query($req);
        } catch (Exception $e) {
            die("Error: " . $e);
        }

    }

    public function listComments($type, $id)
    {
        $db = Config::getConnection();
        if ($type == 0)
            $req = "SELECT * FROM comment WHERE idCar = '$id' ORDER BY date DESC";
        else
            $req = "SELECT * FROM comment WHERE idPost = '$id' ORDER BY date DESC";
        try {
            $result = $db->query($req);
            return $result->fetchAll();
        } catch (Exception $e) {
            die("Error: " . $e);
        }
    }

    public function deleteComment($id)
    {
        $db = Config::getConnection();
        $req = "DELETE FROM comment WHERE id = '$id'";
        try {
            $db->query($req);
        } catch (Exception $e) {
            die("Error: " . $e);
        }
    }


}