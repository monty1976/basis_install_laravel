<?php
namespace App\User;


class UserRepository implements UserRepositoryInterface
{
    public function getChildrenActivitiesByUser($user){
        return $user->children()->with(['nursery.activities'])->get();
    }
    
    public function getNurseryByUser($user){
        return $user->nursery()->first();
    }

    public function createUser($user){
        $user->save();
    }

    public function getAllParentAsList(){
        return User::where('role_id', 2)->selectRaw('CONCAT(first_name, " ", last_name) as fullname, id')->lists('fullname', 'id');
    }
} 