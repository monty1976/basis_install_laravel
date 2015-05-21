<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class EmployeeController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
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
}
