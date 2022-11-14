<?php

namespace Model;

class Cart
{
    public int $id;
    public int $idUser;
    public float $total;

    public function __construct(int $id, int $idUser, float $total)
    {
        $this->id = $id;
        $this->idUser=$idUser;
        $this->total=$total;
    }

}