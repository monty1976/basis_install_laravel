<?php namespace App\Http\Controllers;

use App\Http\Requests\ParentRequest;
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
use Illuminate\Support\Facades\Input;

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

        $adress = $this->adressRepo->getAdressById($user->adress_id);
        //dd($adress);
        
        $postal_codes = $this->postal_codeRepo->getPostalCodes();


        //dd($postal_codes);
        
        $phone = $this->phoneRepo->getPhoneNumberByUserId($user->id);
       // dd($phone);

        if($user->is_public === 0){
            $checkboxClass = [];
        }
        else{
            $checkboxClass = ['checked' => 'checked'];
        }

        return view("parent.profile", compact('user', 'adress', 'postal_codes', 'phone', 'checkboxClass'));
    }
    
    public function editProfile(ParentRequest $request)
    {
        $first_name = Input::get('first_name');
        $last_name = Input::get('last_name');
        $email = Input::get('email');
        $street = Input::get('street');
        $number = Input::get('number');
        $postal_code = Input::get('postal_code');
        $phone = Input::get('phone');
        $password = Input::get('password');
        $new_password = Input::get('new_password');      
        $is_public = Input::get('is_public');
        
        if($is_public === null){
            $is_public = 0;
        }
        
        $this->dispatch(new EditProfileCommand($first_name, $last_name, $email, $street, $number, $postal_code, $phone, $password, $new_password, $is_public));
        
        return redirect()->route('parent');
    }
}
