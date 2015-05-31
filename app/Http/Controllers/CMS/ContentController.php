<?php namespace App\Http\Controllers\CMS;

use App\Column;
use App\Column\ColumnRepositoryInterface;
use App\Commands\CreateContentCommand;
use App\Commands\UpdateColumnIdCommand;
use App\Commands\UpdateContentCommand;
use App\Commands\UploadImageCommand;
use App\Content;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ImageContent;
use App\Image\ImageRepositoryInterface;
use App\Page;
use App\Page\PageRepositoryInterface;
use App\Section;
use App\SubPage\SubPage;
use App\TextContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class ContentController extends Controller {

    /**
     * @var PageRepositoryInterface
     */
    /**
     * @var ColumnRepositoryInterface
     */
    private $columnRepository;
    /**
     * @var ImageRepositoryInterface
     */
    private $imageRepository;

    function __construct(PageRepositoryInterface $pageRepository, ColumnRepositoryInterface $columnRepository, ImageRepositoryInterface $imageRepository)
    {
        $this->pageRepository = $pageRepository;
        $this->columnRepository = $columnRepository;
        $this->imageRepository = $imageRepository;
    }

    public function showPages(){
        $pages = $this->pageRepository->getAllPages();
        return view('cms.pages.pages', compact('pages'));
    }

    public function showPage($pageId){
        $page = $this->pageRepository->getPageById($pageId);
        return view('cms.content.sections', compact('page'));
    }

    public function showCreate($columnId, $pageId){
        $column = $this->columnRepository->getColumnById($columnId);

        $images = [];
        if($column->content_type_id == 2){
            $images =  $this->imageRepository->getImagesAsList();
        }
        return view('cms.content.create', compact('column', 'images', 'pageId'));
    }

    public function doTextContent(Request $request){
        $columnId = Input::get('columnId');
        $content_type_id = Input::get('content_type_id');
        $text = null;
        $pageId = Input::get('pageId');
        $imageId = null;
        $content_id = Input::get('content_id');

        if(Input::has('content')){
            $text = Input::get('content');
        }

        if(Input::has('imageId')){
            $imageId = Input::get('imageId');
        }

        $content = null;

        //new Content if null / else it is a content update
        if(empty($content_id)){

            $content = $this->dispatch(new CreateContentCommand($content_type_id, $text, $imageId));

        }
        else{
            $content = $this->dispatch(new UpdateContentCommand($content_id, $text, $imageId));
        }

         $this->dispatch(new UpdateColumnIdCommand($columnId, $content->id));

        return redirect()->route('show_page', [$pageId]);
    }

    public function showContent($pageId){
        $page = $this->pageRepository->getPageById($pageId);

        $navi = SubPage::where('page_id', $pageId)->get();

        return view('cms.content.showContent', compact('page', 'navi'));
    }

    public function showContentPages(){
        $pages =  $this->pageRepository->getAllParentPages();
        return view('cms.content.pagesList', compact('pages'));
    }

    public function imageUploadShow(){
        return view('cms.content.image');
    }

    public function imageUploadDo(){

        $file = Input::file('image');
        $name = Input::file('image')->getClientOriginalName();

        $this->dispatch(new UploadImageCommand($file, $name));
        return view('cms.content.image');
    }

    public function deletePage($pageId){
      $this->pageRepository->deletePage($pageId);
        return Redirect::back();
    }
}
