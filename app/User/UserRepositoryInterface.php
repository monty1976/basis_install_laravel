<?php
namespace App\User;

interface UserRepositoryInterface
{
    public function getChildrenActivitiesByUser($user);
    
    public function getNurseryByUser($user);

    public function createUser($user);

    public function getAllParentAsList();
    
}