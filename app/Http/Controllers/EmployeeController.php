<?php namespace App\Http\Controllers;

use App\Commands\CreateChildCommand;
use App\Commands\CreateParentCommand;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateChildRequest;
use App\Http\Requests\CreateParentRequest;
use App\Nursery\NurseryRepositoryInterface;
use App\Postal\PostalRepositoryInterface;
use App\User\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class EmployeeController extends Controller {

    /**
     * @var PostalRepositoryInterface
     */
    private $postal_codeRepo;
    /**
     * @var NurseryRepositoryInterface
     */
    private $nurseryRepo;
    /**
     * @var UserRepositoryInterface
     */
    private $userRepo;

    /**
     * @param PostalRepositoryInterface $postal_codeRepo
     * @param NurseryRepositoryInterface $nurseryRepo
     * @param UserRepositoryInterface $userRepo
     */
    public function __construct(PostalRepositoryInterface $postal_codeRepo, NurseryRepositoryInterface $nurseryRepo, UserRepositoryInterface $userRepo)
    {
        $this->middleware('auth');
        $this->middleware('role_check');
        $this->postal_codeRepo = $postal_codeRepo;
        $this->nurseryRepo = $nurseryRepo;
        $this->userRepo = $userRepo;
    }

    public function index()
    {
        $user = Auth::user();
        
        $nursery = $user->nursery()->first();
        //dd($nursery);
        return view("employee.index", compact('nursery'));
    }
    
    public function post(){
        $user = Auth::user();
        
        $nursery = $user->nursery()->first();
        
        return view('employee.post', compact('nursery'));
    }
    
    public function sleep(){
        //$user = Auth::user();
        
        //return redirect()->route('sleep');
        return view('employee.sleep');
    }

    public function activity(){
        //$user = Auth::user();
        
        //return redirect()->route('activity');
        return view('employee.activity');
    }

    public function showCreateParent(){

        $postal_codes = $this->postal_codeRepo->getPostalCodes();
        $nurseries = $this->nurseryRepo->getAllAsList();
        return view('employee.parent', compact('postal_codes', 'nurseries'));
    }

    public function doCreateParent(CreateParentRequest $request){

        $this->dispatchFrom(CreateParentCommand::class, $request);

        $this->createSuccessMessage('Forældre er oprettet');
        return redirect()->route('employee');
    }

    public function showCreateChild(){
        $nurseries = $this->nurseryRepo->getAllAsList();
        $parents = $this->userRepo->getAllParentAsList();
        return view('child.create', compact('nurseries', 'parents'));
    }

    public function doCreateChild(CreateChildRequest $request){
        $file = Input::file('image');
        $file_name = Input::file('image')->getClientOriginalName();

        $parent_id = Input::get('parent');
        $nursery_id = Input::get('nursery');
        $first_name = Input::get('first_name');
        $last_name = Input::get('last_name');
        $birthday = Input::get('birthday');

        $this->dispatch(new CreateChildCommand($file, $file_name, $parent_id, $nursery_id, $first_name, $last_name, $birthday));

        $this->createSuccessMessage('Barn er oprettet');
        return redirect()->route('employee');
    }
}
