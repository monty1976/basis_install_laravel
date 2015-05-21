<?php
namespace App\Child;

interface ChildRepositoryInterface
{
    public function getChildById($id);
    
    public function getAllChildrenNames();
}

