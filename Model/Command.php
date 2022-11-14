<?php

namespace Model;

class Command
{
    public int $id;
    public int $idUser;
    public float $total;

    public function __construct(int $idUser, float $total)
    {
        $this->idUser = $idUser;
        $this->total = $total;
    }

}