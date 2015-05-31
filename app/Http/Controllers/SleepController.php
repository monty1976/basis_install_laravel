<?php namespace App\Http\Controllers;

use App\Sleep\Sleep;
use App\Http\Requests;
use App\Http\Requests\SleepRequest;
use App\Http\Controllers\Controller;
use App\Child\ChildRepositoryInterface;
use App\Sleep\SleepRepositoryInterface;
use App\User\UserRepositoryInterface;
use App\Commands\RegisterSleepCommand;
use Illuminate\Support\Facades\Redirect;
use App\Helpers\MailTrait;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class SleepController extends Controller {
    use MailTrait;
    
    public function __construct(ChildRepositoryInterface $childRepo, SleepRepositoryInterface $sleepRepo, UserRepositoryInterface $userRepo)
    {
        $this->childRepo = $childRepo;
        $this->sleepRepo = $sleepRepo;
        $this->userRepo = $userRepo;
        $this->middleware('auth');
    }
    
    public function showChildrenNames()
    { 
        $user = Auth::user();
        $nursery = $this->userRepo->getNurseryByUser($user);
        $children = $this->childRepo->getChildrenByNursery($nursery);

        return view('employee.sleep', compact('children'));
    }

    /**
     * @param SleepRequest $request
     * @internal param $SleepRequest $
     * @return mixed
     */
    public function registerSleep(SleepRequest $request) //SleepRequest $request
    {
        $sleep = new Sleep();
        
        //Dateformat
        $date_dk = Input::get('date');
        $format = "d-m-Y";
        $date_eng = date_create_from_format($format, $date_dk);

        //Get inputs from the form
        $sleep->date = $date_eng;       
        $sleep->child_id = Input::get('fullname'); //fullname contains also the ide from the form. The id that is being returned from the dropdown
        $sleep->start = Input::get('start');
        $sleep->end = Input::get('end');
        
        $child = $this->childRepo->getChildUsers($sleep->child_id);
        //dd($child);
        
        //Loop through the users to find a match to the child
        foreach($child->users as $user)
        {
            if($user->role_id === 2)
            {
                $user_fullname = $user->first_name . " " . $user->last_name;
                $child_fullname = $child->first_name . " " . $child->last_name;
                
                $template = 'emails.sleep';
                //The data that will be applied in the email
                $data = ['date' => $date_dk,
                    'user_name' => $user_fullname,
                    'child_name' => $child_fullname,
                    'start' => $sleep->start,
                    'end' => $sleep->end];
                $mailTo = $user->email;
                $nameTo = $user->first_name;
                $mailFrom = 'info@boerneriget.dk';
                $subject = 'Sovetider fra Børneriget';
                
                //Sending mail
                $this->sendMail($template, $data, $mailTo, $nameTo, $mailFrom, $subject);
            }
        }
        
        $this->sleepRepo->insertSleep($sleep);
        
        //$this->dispatchFrom(RegisterSleepCommand::class, $request);
        
        $this->createSuccessMessage("Mail sendt!");
        
        return Redirect::back();
    }
}
