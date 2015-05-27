<?php
namespace App\Child;

interface ChildRepositoryInterface
{
    public function getChildById($id);
    
    //public function getAllChildrenNames();
    
    public function getChildUsers($id);
    
    public function getChildrenByNursery($nursery);
}

