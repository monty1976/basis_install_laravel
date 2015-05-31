<?php
namespace App\Nursery;


class NurseryRepository implements NurseryRepositoryInterface
{
    public function getNurseryActivitiesById($id){
        return Nursery::where('id', '=', $id)->with(['activities'])->first();
    }
    
    public function getNurseryById($id){
        return Nursery::where('id', '=', $id)->first();
    }
    
    public function getNurseryUsers($nursery_id){
        return Nursery::where('id', '=', $nursery_id)->with(['users'])->first();
    }

    public function createNurseryType($nursery_type){
        $nursery_type->save();
    }

    public function getNurseryTypes()
    {
       return NurseryType::lists('nursery_type_name', 'id');
    }

    public function createNursery($nursery){
        $nursery->save();
    }

    public function getAllAsList(){
       return Nursery::lists('nursery_name', 'id');
    }

    public function nurseryUser($nurseryUser){
        $nurseryUser->save();
    }
}