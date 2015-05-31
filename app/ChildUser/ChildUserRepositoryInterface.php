<?php
/**
 * Created by PhpStorm.
 * User: Rene
 * Date: 28-05-2015
 * Time: 18:37
 */
namespace App\ChildUser;

interface ChildUserRepositoryInterface
{
    public function createChildUser($child_user);
}