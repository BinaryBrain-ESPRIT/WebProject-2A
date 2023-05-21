<?php

namespace Model;

class User
{
    public int $id;
    public string $email;
    public string $password;
    public string $name;
    public int $age;
    public string $address;
    public int $isBanned;
    public int $isAdmin;

    public function __construct(int $id, string $email, string $password, string $name, int $age, string $address, int $isBanned, int $isAdmin)
    {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->age = $age;
        $this->address = $address;
        $this->isBanned = $isBanned;
        $this->isAdmin = $isAdmin;
    }

}