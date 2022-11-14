<?php

namespace Model;

class UsedCar
{
    public int $id;
    public string $category;
    public string $brand;
    public string $model;
    public int $cylinder;
    public string $energy;
    public int $fiscalPower;
    public string $gearbox;
    public string $registerNumber;
    public int $year;
    public int $kilometers;
    public int $rate;

    public function __construct(string $category, string $brand, string $model, int $cylinder, string $energy, string $fiscalPower, string $gearbox, string $registerNumber, int $year,int $kilometers)
    {
        $this->category = $category;
        $this->brand = $brand;
        $this->model = $model;
        $this->cylinder = $cylinder;
        $this->energy = $energy;
        $this->fiscalPower = $fiscalPower;
        $this->gearbox = $gearbox;
        $this->registerNumber = $registerNumber;
        $this->year = $year;
        $this->kilometers = $kilometers;
    }

}