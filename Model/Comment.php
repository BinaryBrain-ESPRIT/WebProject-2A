<?php

namespace Model;

class Comment
{
    public int $id;
    public int $idPost;
    public int $idCar;
    public int $idUser;
    public string $description;
    public string $date;
    public int $type;

    public function __construct($id, $idPost,$idCar,  $idUser, $description, $date, $type)
    {
        $this->id = $id;
        $this->idPost = $idPost;
        $this->idCar = $idCar;
        $this->idUser = $idUser;
        $this->description = $description;
        $this->date = $date;
        $this->type = $type;
    }
}