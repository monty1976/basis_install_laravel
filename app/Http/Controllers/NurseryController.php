<?php namespace App\Http\Controllers;

use App\Commands\CreateNurseryCommand;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CreateNurseryRequest;
use App\Http\Requests\CreateNurseryTypeRequest;
use App\Nursery\NurseryRepositoryInterface;
use App\Nursery\NurseryType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class NurseryController extends Controller {


    /**
     * @var NurseryRepositoryInterface
     */
    private $nurseryRepo;

    /**
     * @param NurseryRepositoryInterface $nurseryRepo
     */
    function __construct(NurseryRepositoryInterface $nurseryRepo)
    {
        $this->nurseryRepo = $nurseryRepo;
    }

    public function showCreateNurseryType(){
        return view('nursery.create_nursery_type');
    }

    /**
     * @param CreateNurseryTypeRequest $request
     * @internal param $CreateNurseryTypeRequest $
     * @return \Illuminate\Http\RedirectResponse
     */
    public function doCreateNurseryType(CreateNurseryTypeRequest $request){
        $nursery_type = new NurseryType();
        $nursery_type->nursery_type_name = Input::get('nursery_type_name');

        $this->nurseryRepo->createNurseryType($nursery_type);

        $this->createSuccessMessage('Typen er oprettet');
        return redirect()->route('employee');
    }

    public function showCreateNursery(){

        $nursery_types = $this->nurseryRepo->getNurseryTypes();

        return view('nursery.create_nursery', compact('nursery_types'));

    }

    public function doCreateNursery(CreateNurseryRequest $request){

      $this->dispatchFrom(CreateNurseryCommand::class, $request);

        $this->createSuccessMessage('Stuen er oprettet');
        return redirect()->route('employee');
    }
}
