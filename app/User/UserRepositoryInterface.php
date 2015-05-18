<?php
namespace App\User;

interface UserRepositoryInterface
{
    public function getChildrenActivitiesByUser($user);
    
}