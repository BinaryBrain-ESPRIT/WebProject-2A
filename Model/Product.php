<?php

namespace Model;

class Product
{
    public int $id;
    public string $brand;
    public string $type;
    public string $name;
    public int $qte;
    public float $price;


    public function __construct(int $id, string $brand, string $type, string $name, float $price, int $qte)
    {
        $this->id = $id;
        $this->brand = $brand;
        $this->type = $type;
        $this->price = $price;
        $this->name = $name;
        $this->qte = $qte;

    }
}