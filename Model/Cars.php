<?php

namespace Model;

class Cars
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
    
    function __construct($category, $brand, $model, $cylinder, $energy, $fiscalPower,$gearbox,$availability,$guarantee,$rate){
        $this->category=$category;
        $this->brand=$brand;
        $this->model=$model;
        $this->cylinder=$cylinder;
        $this->energy=$energy;
        $this->fiscalPower=$fiscalPower;
        $this->gearbox=$gearbox;
        $this->availability=$availability;
        $this->guarantee=$guarantee;
        $this->rate=$rate;
    }
    function getCategory(){
        return $this->numadherent;
    }
    function getNom(){
        return $this->nom;
    }
    function getPrenom(){
        return $this->prenom;
    }
    function getAdresse(){
        return $this->adresse;
    }
    function getEmail(){
        return $this->email;
    }
    function getDateinscription(){
        return $this->dateinscription;
    }
    function setNom(string $nom){
        $this->nom=$nom;
    }
    function setPrenom(string $prenom){
        $this->prenom=$prenom;
    }
    function setAdresse(string $adresse){
        $this->adresse=$adresse;
    }
    function setEmail(string $email){
        $this->email=$email;
    }
    function setdateinscription(string $dateinscription){
        $this->dateinscription=$dateinscription;
    }
    
}
