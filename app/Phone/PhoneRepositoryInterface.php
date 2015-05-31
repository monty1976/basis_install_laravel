<?php namespace App\Phone;

interface PhoneRepositoryInterface{
    
    public function getPhoneNumberByUserId($user_id);

    public function createPhone($phone);
   
}

