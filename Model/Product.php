<?php

namespace Model;

class Product
{
    public int $id;
    public string $brand;
    public string $name;
    public float $price;
    public int $qte;

    public function __construct(string $brand, string $name, float $price, int $qte)
    {
        $this->brand = $brand;
        $this->price = $price;
        $this->name = $name;
        $this->qte = $qte;
    }
}