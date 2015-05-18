<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Commands\RegisterPostCommand;

use Illuminate\Http\Request;

class PostController extends Controller {
 
    public function registerPost(PostRequest $request)
    {
        $this->dispatchFrom(RegisterPostCommand::class, $request);
    }

}
