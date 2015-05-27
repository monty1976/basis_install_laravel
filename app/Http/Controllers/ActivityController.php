<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Commands\RegisterActivityCommand;
use App\User\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests\ActivityRequest;
use Illuminate\Http\Request;

class ActivityController extends Controller {
    
    public function __construct(UserRepositoryInterface $UserRepository) {
        $this->userRepo = $UserRepository;
    }
    
    public function showNurseryByUser(){
        $user = Auth::user();
        
        $nursery = $this->userRepo->getNurseryByUser($user);
        
        return view('employee.activity', compact('nursery'));
    }

    public function registerActivity(ActivityRequest $request){

        $this->dispatchFrom(RegisterActivityCommand::class, $request);
        
        $this->createSuccessMessage("Aktivitet uploadet!");
        
        return Redirect::back();
    }

}
