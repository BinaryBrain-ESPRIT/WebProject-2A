<?php

namespace Model;

class Maintenance
{
    public int $id;
    public string $type;
    public string $name;
    public string $description;
    public int $phone;
    public string $address;

    public function __construct(int $id, string $name, string $type, string $description, int $phone, string $address)
    {
        $this->id = $id;
        $this->name = $name;
        $this->type = $type;
        $this->description = $description;
        $this->phone = $phone;
        $this->address = $address;
    }
}
