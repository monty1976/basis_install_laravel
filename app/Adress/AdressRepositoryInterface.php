<?php namespace App\Adress;

interface AdressRepositoryInterface{
     
    public function getAdressById($id);

    public function createAdress($adress);
}

