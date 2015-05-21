<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\SleepRequest;
use App\Http\Controllers\Controller;
use App\Child\ChildRepositoryInterface;
use App\Commands\RegisterSleepCommand;

use Illuminate\Http\Request;

class SleepController extends Controller {
    
    public function __construct(ChildRepositoryInterface $childRepo)
    {
        $this->childRepo = $childRepo;
    }
    
    public function showChildrenNames()
    { 
        $children = $this->childRepo->getAllChildrenNames();
        //dd($children);
        return view('employee.sleep', compact('children'));
    }

    public function registerSleep(SleepRequest $request)
    {
        $this->dispatchFrom(RegisterSleepCommand::class, $request);
    }

}
