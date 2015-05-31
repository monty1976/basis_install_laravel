<?php
namespace App\ChildUser;


class ChildUserRepository implements ChildUserRepositoryInterface
{

    public function createChildUser($child_user){
        $child_user->save();
    }

} 