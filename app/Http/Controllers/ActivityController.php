<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Commands\RegisterActivityCommand;

use App\Http\Requests\ActivityRequest;
use Illuminate\Http\Request;

class ActivityController extends Controller {

    public function createActivity(){
        return view('activity');
    }
    
    public function registerActivity(ActivityRequest $request){
        $this->dispatchFrom(RegisterActivityCommand::class, $request);
        
        return view('activity_created');
    }

}
