<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Child\ChildRepositoryInterface;
use App\Form\FormRepositoryInterface;
use App\Post\PostRepositoryInterface;
use App\Sleep\SleepRepositoryInterface;
use App\Nursery\NurseryRepositoryInterface;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ChildController extends Controller {

    public function __construct(ChildRepositoryInterface $childRepo,
                                FormRepositoryInterface $formTypeRepo, 
                                PostRepositoryInterface $postRepo, 
                                SleepRepositoryInterface $sleepRepo,
                                NurseryRepositoryInterface $nurseryRepo)
    {
        $this->middleware('auth');
        $this->childRepo = $childRepo;
        $this->form_typeRepo = $formTypeRepo;
        $this->postRepo = $postRepo;
        $this->sleepRepo = $sleepRepo;
        $this->nurseryRepo = $nurseryRepo;
    }
     
    public function show($id)
    {
        //$child = Child::where('id', '=', $id)->with('nursery')->first(); //flyttet over i repository
        $child = $this->childRepo->getChildById($id);
        
        //$form_types = FormType::lists('form_type_name', 'id'); 
        $form_types = $this->form_typeRepo->getFormTypes();
        
        //Show posts with the child's nursery_id and the institution's id
        $post_with_nursery = $this->postRepo->getPostForNurseries($child->nursery_id);

       // dd($post_with_nursery);

//dd($post_with_nursery);
        
        //Show sleeping time
        $sleeps = $this->sleepRepo->getChildSleeps($child->id);
        //dd($sleeps);

        return view('child.index', compact('child', 'form_types', 'post_with_nursery', 'sleeps'));
    }





}
