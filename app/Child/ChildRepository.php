<?php
namespace App\Child;

class ChildRepository implements ChildRepositoryInterface
{    
    public function getChildById($id){
      return  Child::where('id', '=', $id)->with('nursery')->first();
    }
    
    public function getAllChildrenNames(){
        return Child::selectRaw('CONCAT(first_name, " ", last_name) as fullname, id')->lists('fullname', 'id');
    }
}

