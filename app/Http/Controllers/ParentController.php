<?php namespace App\Http\Controllers;

use App\User\User;
use App\User\UserRepositoryInterface;
use App\Adress\AdressRepositoryInterface;
use App\Postal\PostalRepositoryInterface;
use App\Phone\PhoneRepositoryInterface;
use App\Commands\EditProfileCommand;
use App\Commands;
use App\Commands\ShowParentCommand;
use App\Http\Requests;
use App\Nursery;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ParentController extends Controller {


    public function __construct(AdressRepositoryInterface $adressRepo, PostalRepositoryInterface $postal_codeRepo, PhoneRepositoryInterface $phoneRepo, UserRepositoryInterface $userRepo)
    {
        $this->middleware('auth');
        $this->adressRepo = $adressRepo;
        $this->postal_codeRepo = $postal_codeRepo;
        $this->phoneRepo = $phoneRepo;
        $this->userRepo = $userRepo;
    }

    public function index()
    {
        $user = Auth::user();

        $children = $this->dispatch(new ShowParentCommand($user));

        return view("parent.index", compact('children'));
    }
    
    public function profile()
    {
        $user = Auth::user();
        //$user = $this->user->getUserById($id);
        //dd($user);
        
        $adress = $this->adressRepo->getAdressById($user->adress_id);
        //dd($adress);
        
        $postal_codes = $this->postal_codeRepo->getPostalCodes();
        //dd($postal_codes);
        
        $phone = $this->phoneRepo->getPhoneNumberByUserId($user->id);
        //dd($phones);

        return view("parent.profile", compact('user', 'adress', 'postal_codes', 'phone'));
    }
    
    public function editProfile(Request $request)
    {
        $this->dispatchFrom(EditProfileCommand::class, $request);

        return redirect()->route('parent');
    }
}
