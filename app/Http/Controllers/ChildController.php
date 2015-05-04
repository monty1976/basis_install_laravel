<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ChildController extends Controller {

	//

    function index($id){
       // $id = Input::get('user_id');

        return view('child.index', compact('id'));
    }

}
