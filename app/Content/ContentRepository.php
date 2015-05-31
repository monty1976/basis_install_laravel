<?php
namespace App\Content;


class ContentRepository implements ContentRepositoryInterface
{

    public function saveContent($content){
        return $content->save();
    }

    /**
     * @param $content_id
     * @return \Illuminate\Support\Collection|null|static
     */
    public function findContentById($content_id){
        return Content::find($content_id);
    }
} 