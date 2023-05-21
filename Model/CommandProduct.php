<?php

namespace Model;

class CommandProduct
{
    public int $id;
    public int $idCommand;
    public int $idProduct;
    public int $qte;

    function __construct(int $id, int $idCommand, int $idProduct, int $qte)
    {
        $this->id = $id;
        $this->idCommand = $idCommand;
        $this->idProduct = $idProduct;
        $this->qte = $qte;
    }

}


