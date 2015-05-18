<?php namespace App\Http\Controllers;

use App\Child\Child;
use App\FormType\FormType;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Child\ChildRepositoryInterface;
use App\Form\FormRepositoryInterface;
use App\Post\PostRepositoryInterface;
use App\Nursery\Nursery;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ChildController extends Controller {

    public function __construct(ChildRepositoryInterface $childRepo, FormRepositoryInterface $formTypeRepo, PostRepositoryInterface $postRepo)
    {
        $this->childRepo = $childRepo;
        $this->form_typeRepo = $formTypeRepo;
        $this->postRepo = $postRepo;
    }
    
//    public function show($id, ChildRepositoryInterface $childRepo, FormRepositoryInterface $formTypeRepo, PostRepositoryInterface $postRepo)
//    {
//        //$child = Child::where('id', '=', $id)->with('nursery')->first(); //flyttet over i repository
//        $child = $childRepo->getChildById($id);
//        //dd($child);
//         
//        //$form_types = FormType::lists('form_type_name', 'id'); 
//        $form_types = $formTypeRepo->getFormTypes();
//        
//        $posts = $postRepo->getPostByNurseryId($child->nursery_id);
//        //dd($post);
//
//        return view('child.index', compact('child', 'form_types', 'posts'));
//    }
    
    public function show1($id)
    {
        //$child = Child::where('id', '=', $id)->with('nursery')->first(); //flyttet over i repository
        $child = $this->childRepo->getChildById($id);
         
        //$form_types = FormType::lists('form_type_name', 'id'); 
        $form_types = $this->form_typeRepo->getFormTypes();
        
        $posts = $this->postRepo->getPostByNurseryId($child->nursery_id);

        return view('child.index', compact('child', 'form_types', 'posts'));
    }
}
