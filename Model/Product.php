<?php

namespace Model;

class Product
{
    public int $id;
    public string $brand;
    public string $name;
    public float $price;

    public function __construct(int $id, string $brand,string $name,float $price)
    {
        $this->id = $id;
        $this->brand = $brand;
        $this->price = $price;
        $this->$name = $name;
    }

}