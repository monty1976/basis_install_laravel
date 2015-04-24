<?php

namespace App\Activity;

class ActivityRepository implements ActivityRepositoryInterface {
    
    public function insertActivity(Activity $activity) 
    {    
        $activity->save();
    }
}

