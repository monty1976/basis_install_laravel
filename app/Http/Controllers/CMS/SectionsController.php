<?php namespace App\Http\Controllers\CMS;

use App\Commands\CreateSectionCommand;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Page\Page;
use App\Page\PageRepositoryInterface;
use App\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class SectionsController extends Controller {
    /**
     * @var PageRepositoryInterface
     */
    private $pageRepository;
    /**
     * @var Section\SectionRepositoryInterface
     */
    private $sectionRepository;


    /**
     * @param PageRepositoryInterface $pageRepository
     * @param Section\SectionRepositoryInterface $sectionRepository
     */
    function __construct(PageRepositoryInterface $pageRepository, Section\SectionRepositoryInterface $sectionRepository)
    {

        $this->pageRepository = $pageRepository;
        $this->sectionRepository = $sectionRepository;
    }

    public function showCreate($pageId){

        $page = $this->pageRepository->getPageById($pageId);


        return view('cms.sections.create', compact('page'));
    }

    public function doCreate(){

        $pageId = Input::get('pageId');
        $name = Input::get('name');

        $this->dispatch(new CreateSectionCommand($pageId,$name ));

        return redirect()->route('create_section', [$pageId]);
    }

    public function deleteSection($sektionId){
        $this->sectionRepository->deleteSection($sektionId);
        $this->createSuccessMessage('Sektionen er slettet');
        return redirect()->route('show_pages');
    }
}
