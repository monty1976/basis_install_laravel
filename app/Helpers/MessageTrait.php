<?php namespace App\Helpers;

use Session;

trait MessageTrait {

    public function createErrorMessage($messageText){
        Session::flash('error',$messageText);
    }

    public function createSuccessMessage($messageText){
        Session::flash('success', $messageText);
    }
}