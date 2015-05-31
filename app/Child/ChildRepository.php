<?php
namespace App\Child;

class ChildRepository implements ChildRepositoryInterface
{    
    public function getChildById($id){
      return  Child::where('id', '=', $id)->with('nursery')->first();
    }
    
//    public function getAllChildrenNames(){
//        //List is a key-value. Id is the key and fullname is the value
//        return Child::selectRaw('CONCAT(first_name, " ", last_name) as fullname, id')->lists('fullname', 'id');  
//    }
    
    public function getChildUsers($id){
        return Child::where('id', '=', $id)->with(['users'])->first();
    }
    
    public function getChildrenByNursery($nursery){
        return Child::selectRaw('CONCAT(first_name, " ", last_name) as fullname, id')
                ->where('nursery_id', '=', $nursery->id)
                ->lists('fullname', 'id');  
    }

    public function createChild($child){
        $child->save();
    }
}

