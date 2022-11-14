<?php

namespace Model;

class NewCar
{
    public int $id;
    public string $category;
    public string $brand;
    public string $model;
    public string $cylinder;
    public string $energy;
    public string $fiscalPower;
    public string $gearbox;
    public string $availability;
    public string $guarantee;
    public string $rate;

    public function __construct(string $category, string $brand, string $model, string $cylinder, string $energy, string $fiscalPower, string $gearbox, string $availability, string $guarantee)
    {
        $this->category = $category;
        $this->brand = $brand;
        $this->model = $model;
        $this->cylinder = $cylinder;
        $this->energy = $energy;
        $this->fiscalPower = $fiscalPower;
        $this->gearbox = $gearbox;
        $this->availability = $availability;
        $this->guarantee = $guarantee;
    }


}