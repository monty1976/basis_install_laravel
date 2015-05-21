<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Commands\RegisterFormCommand;
use App\Http\Requests\FormRequest;

use Illuminate\Http\Request;

class FormController extends Controller 
{
    public function registerForm(FormRequest $request)
    {
        $this->dispatchFrom(RegisterFormCommand::class, $request);
        
        $this->createErrorMessage("det var godt");

        return \Illuminate\Support\Facades\Redirect::back();
    }

}
