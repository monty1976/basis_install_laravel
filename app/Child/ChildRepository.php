<?php
namespace App\Child;

class ChildRepository implements ChildRepositoryInterface
{    
    public function getChildById($id){
      return  Child::where('id', '=', $id)->with('nursery')->first();
    }
}

