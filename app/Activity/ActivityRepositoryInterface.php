<?php

namespace App\Activity;

interface ActivityRepositoryInterface {
    
    public function insertActivity(Activity $activity);
}

