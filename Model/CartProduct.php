<?php

declare(strict_types=1);

namespace Model;

class CartProduct
{
    public int $id;
    public int $idCart;
    public int $idProduct;
    public int $qte;

    public function __construct(int $id, int $idCart, int $idProduct, int $qte)
    {
        $this->id = $id;
        $this->idCart = $idCart;
        $this->idProduct = $idProduct;
        $this->qte = $qte;
    }

}