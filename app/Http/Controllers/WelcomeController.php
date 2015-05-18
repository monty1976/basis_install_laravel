<?php namespace App\Http\Controllers;

use App\Image;

use Illuminate\Support\Facades\Mail;
use Laracasts\Utilities\JavaScript\JavaScriptFacade;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//$this->middleware('guest');
	}
        
        /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
            Mail::send('emails.welcome', array('key' => 'value'), function($message)
            {
                $message->to('renethomassen@hotmail.com', 'Rene')->subject('Hilsen!');
            });
	}

}
