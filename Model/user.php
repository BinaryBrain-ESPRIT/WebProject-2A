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
    public function getId()
    {
      return $this->id;
    }
    public function setId()
    {
      $this->id= $id;
      return $this;
    }


    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail()
    {
      $this->Email= $Email;
      return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword()
    {
        $this->password= $password;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }
    public function setName()
    {
        $this->Name= $Name;
        return $this;
    }

    public function getAge()
    {
        return $this->age;
    }
    public function setAge()
    {
        $this->Age= $Age;
        return $this;
    }

    public function getIsBanned()
    {
        return $this->isBanned;
    }
    public function setIsBanned()
    {
        $this->IsBanned= $IsBanned;
        return $this;
    }

}