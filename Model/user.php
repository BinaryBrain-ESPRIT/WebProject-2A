<?php

namespace Model;

class User
{
    public int $id;
    public string $email;
    public string $password;
    public string $name;
    public int $age;
    public string $isBanned; 
    public function __construct(int $id, string $email, string $password, string $name, int $age,string $isBanned)
    {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->age = $age;
        $this->isBanned = $isBanned;
    }
}