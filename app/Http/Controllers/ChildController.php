<?php namespace App\Http\Controllers;

use App\Child\Child;
use App\FormType\FormType;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Child\ChildRepositoryInterface;
use App\Form\FormRepositoryInterface;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ChildController extends Controller {

    function index($id)
    {
        return view('child.index', compact('id'));
    }

    public function show($id, ChildRepositoryInterface $childRepo, FormRepositoryInterface $formTypeRepo){

        //$child = Child::where('id', '=', $id)->with('nursery')->first(); //flyttet over i repository
        $child = $childRepo->getChildById($id);
         
        //$form_types = FormType::lists('form_type_name', 'id'); 
        $form_types = $formTypeRepo->getFormTypes();

        return view('child.index', compact('child', 'form_types'));
    }
}
