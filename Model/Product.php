<?php

namespace Model;

class Product
{
    public int $id;
    public string $brand;
    public string $type;
    public float $price;

    public function __construct(int $id, string $brand,string $type,float $price)
    {
        $this->id = $id;
        $this->brand = $brand;
        $this->price = $price;
        $this->type = $type;
    }

}