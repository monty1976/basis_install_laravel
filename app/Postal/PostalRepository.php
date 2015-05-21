<?php namespace App\Postal;

class PostalRepository implements PostalRepositoryInterface{

    public function getPostalCodes(){
        return Postal::selectRaw('CONCAT(postal_code, " ", city) as postal_code_city, postal_code')->lists('postal_code_city', 'postal_code');
    }
}

