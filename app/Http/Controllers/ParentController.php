<?php namespace App\Http\Controllers;


use App\Commands;
use App\Commands\ShowParentCommand;
use App\Http\Requests;
use App\Nursery;
use Illuminate\Support\Facades\Auth;

class ParentController extends Controller {


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

        $children = $this->dispatch(new ShowParentCommand($user));

        return view("parent.index", compact('children'));
    }
}
