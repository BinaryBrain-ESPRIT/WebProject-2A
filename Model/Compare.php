<?php

namespace Model;

class Compare
{
    public int $id;
    public int $idUser;
    public int $idCar;

    public function __construct(int $id, int $idUser, int $idCar)
    {
        $this->id = $id;
        $this->idUser = $idUser;
        $this->idCar = $idCar;
    }


}