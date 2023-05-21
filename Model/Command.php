<?php

namespace Model;

use DateTime;

class Command
{
    public int $id;
    public int $idUser;
    public float $total;
    public string $date;

    public function __construct(int $id, int $idUser, float $total, string $date)
    {
        $this->id = $id;
        $this->idUser = $idUser;
        $this->total = $total;
        $this->date = $date;
    }
}