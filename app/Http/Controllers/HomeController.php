<?php

namespace App\Http\Controllers;

use App\User\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Home Controller
      |--------------------------------------------------------------------------
      |
      | This controller renders your application's "dashboard" for users that
      | are authenticated. Of course, you are free to change or remove the
      | controller as you wish. It is just here to get your app started!
      |
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function index() {

        //dd(Auth::user()->role);

        $users = User::all();

        if ($users->isEmpty()) {

            User::create([
                'first_name' => 'Rene',
                'last_name' => 'Thomassen',
                'password' => bcrypt('test'),
                'email' => 'nappelobo@hotmail.com',
                'role_id' => '1',
                'is_public' => '1',
                'adress_id' => '1',
            ]);
        }

        //creates an error message
        $this->createErrorMessage('Dette er en fejl');

        //creates an success message
        $this->createSuccessMessage('JUHUU det gik godt');

        return view('home');
    }

}
