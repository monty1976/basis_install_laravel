<?php namespace App\Sleep;

interface SleepRepositoryInterface
{
    public function getChildSleeps($child_id);
     
    public function insertSleep(Sleep $sleep);
}

