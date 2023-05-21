<?php

namespace Model;

class ResetPassword
{
    public int $id;
    public int $idUser;
    public int $verifCode;
    public string $date;


    public function __construct(int $id, int $idUser, int $verifCode, string $date)
    {
        $this->id = $id;
        $this->idUser = $idUser;
        $this->verifCode = $verifCode;
        $this->date = $date;
    }


}