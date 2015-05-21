<?php namespace App\Sleep;

use App\Sleep\Sleep;

class SleepRepository implements SleepRepositoryInterface{
    
    public function getChildSleeps($child_id){
        return Sleep::where('child_id', '=', $child_id)->get();
    }
    
    public function insertSleep(Sleep $sleep){
        $sleep->save(); 
    }
}

