<?php namespace App\Adress;


class AdressRepository implements AdressRepositoryInterface{
    
    public function getAdressById($id){
        return Adress::where('id', '=', $id)->first();
    }

    public function createAdress($adress){
        $adress->save();
    }
}

