<?php
namespace App\ContentType;


class ContentTypeRepository implements ContentTypeRepositoryInterface
{
    public function getContentTypesAsList(){
        return ContentType::lists('name','id');
    }
} 