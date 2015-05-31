<?php namespace App\Http\Controllers\CMS;

use App\Column\ColumnRepositoryInterface;
use App\Commands\CreateColumnCommand;
use App\ContentType\ContentTypeRepositoryInterface;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Section\SectionRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ColumnsController extends Controller {


    /**
     * @var SectionRepositoryInterface
     */
    private $sectionRepository;
    /**
     * @var ContentTypeRepositoryInterface
     */
    private $contentTypeRepository;
    /**
     * @var ColumnRepositoryInterface
     */
    private $columnRepostory;

    /**
     * @param SectionRepositoryInterface $sectionRepository
     * @param ContentTypeRepositoryInterface $contentTypeRepository
     * @param ColumnRepositoryInterface $columnRepostory
     */
    function __construct(SectionRepositoryInterface $sectionRepository, ContentTypeRepositoryInterface $contentTypeRepository, ColumnRepositoryInterface $columnRepostory)
    {
        $this->sectionRepository = $sectionRepository;
        $this->contentTypeRepository = $contentTypeRepository;
        $this->columnRepostory = $columnRepostory;
    }

    public function showCreate($sectionId){

        $contentTypes = $this->contentTypeRepository->getContentTypesAsList();

        $section =  $this->sectionRepository->getSectionById($sectionId);
        return view('cms.columns.create', compact('contentTypes', 'section'));
    }

    public function doCreate(Request $request)
    {
        $sectionId = Input::get('sectionId');

        $column = $this->dispatchFrom(CreateColumnCommand::class, $request);

        $contentTypes = $this->contentTypeRepository->getContentTypesAsList();
        $section =  $this->sectionRepository->getSectionById($sectionId);

        return view('cms.columns.create', compact('contentTypes', 'section'));
    }

    public function deleteColumn($columnId){
        $this->columnRepostory->deleteColumn($columnId);
        $this->createSuccessMessage('kolonnen er slettet');
        return redirect()->route('show_pages');
    }
}
