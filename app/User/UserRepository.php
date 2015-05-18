<?php
namespace App\User;


class UserRepository implements UserRepositoryInterface
{

    public function getChildrenActivitiesByUser($user){
        return $user->children()->with(['nursery.activities'])->get();
    }  
    
} 