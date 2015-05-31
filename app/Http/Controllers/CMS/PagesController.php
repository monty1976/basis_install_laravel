<?php namespace App\Http\Controllers\CMS;

use App\Commands\CreatePageCommand;
use App\Commands\CreatePostCommand;
use App\Commands\CreateSubpageCommand;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Page\PageRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PagesController extends Controller {



    public function pages(){
        return 'pages';
    }

    public function showCreate(){
        return view('cms.pages.create');
    }

    public function doCreate(Request $request){

       $page =  $this->dispatchFrom(CreatePageCommand::class, $request);
        return redirect()->route('create_section', [$page->id]);
    }


    public function showCreateSubPage(PageRepositoryInterface $pageRepo){

        $pagesAsList = $pageRepo->getPagesAsList();

        return view('cms.pages.createSubpage', compact('pagesAsList'));
    }

    public function doCreateSubPage(Request $request){

        $page =  $this->dispatchFrom(CreateSubpageCommand::class, $request);
        return redirect()->route('create_section', [$page->id]);
    }

}
