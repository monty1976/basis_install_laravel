<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Commands\RegisterFormCommand;
use App\Http\Requests\FormRequest;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;

class FormController extends Controller 
{
    public function registerForm(FormRequest $request)
    {
        $this->dispatchFrom(RegisterFormCommand::class, $request);
        
        $this->createSuccessMessage("Mail sendt til Børneriget og dig selv");

        return Redirect::back();
    }

}
