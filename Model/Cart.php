<?php

namespace Model;

class Cart
{
    public int $id;
    public int $idUser;

    public function __construct(int $id, int $idUser)
    {
        $this->id = $id;
        $this->idUser=$idUser;
    }

}