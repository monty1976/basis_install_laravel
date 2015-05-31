<?php
namespace App\Image;



class ImageRepository implements ImageRepositoryInterface
{

    public function createImage($image){
        $image->save();
    }

    /**
     * @return mixed
     */
    public function getImagesAsList(){
        return Image::lists('image_name', 'id');
    }

} 