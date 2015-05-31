<?php
namespace App\Page;

class PageRepository implements PageRepositoryInterface
{
    public function createPage($page){
        $page->save();
        return $page;
    }

    public function getAllPages(){
        return Page::all();
    }

    public function getAllParentPages(){
        return Page::where('is_subpage', '=', 0)->get();
    }

    public function getPageById($pageId){
        return Page::where('id', $pageId)->with(['sections.columns.contentType'])->first();
    }

    public function getPageByIdWithSections($pageId){
        return Page::where('id','=',$pageId)->with(['sections'])->first();
    }

    public function deletePage($pageId){
        $page = Page::find($pageId);
        $page->delete();
    }

    public function getPagesAsList(){

        return Page::where('is_subpage', '=', 0)->Lists('name', 'id');
    }

} 