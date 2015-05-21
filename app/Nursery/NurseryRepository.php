<?php
namespace App\Nursery;


class NurseryRepository implements NurseryRepositoryInterface
{
    public function getNurseryActivitiesById($id){
        return Nursery::where('id', '=', $id)->with(['activities'])->first();
    }
} 