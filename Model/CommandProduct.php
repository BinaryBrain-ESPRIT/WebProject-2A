<?php

namespace Model;

class CommandProduct
{
    public int $id;
    public int $idCommand;
    public int $idProduct;
    public int $qte;
    public float $totalPrice;

    function __construct($idCommand, $idProduct, $qte, $totalPrice)
    {
        $this->idCommand = $idCommand;
        $this->idProduct = $idProduct;
        $this->qte = $qte;
        $this->totalPrice = $totalPrice;
    }

}


