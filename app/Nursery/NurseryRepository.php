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
    
} 