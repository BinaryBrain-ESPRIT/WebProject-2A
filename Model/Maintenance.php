<?php

namespace Model;

class Maintenance
{
    public int $id;
    public string $type;
    public string $description;
    public int $phone;
    public string $adresse;
    public function __construct(int $id, string $type, string $description, int $phone, string $adresse)
    {
        $this->id = $id;
        $this->type = $type;
        $this->description = $description;
        $this->phone = $phone;
        $this->adresse = $adresse;
    }
}
