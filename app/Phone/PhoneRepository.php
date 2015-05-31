<?php  namespace App\Phone;

class PhoneRepository implements PhoneRepositoryInterface{
    
    public function getPhoneNumberByUserId($user_id){
        return Phone::where('user_id', '=', $user_id)->first();
    }

    public function createPhone($phone){
        $phone->save();
    }
}

