<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PageController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
            
	}
        
        public function policy()
	{
            return view('policies');
	}
        
        public function about()
        {
            return view('about');
        }
        
        public function contact()
        {
            return view('contact');
        }

}
