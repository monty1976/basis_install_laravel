<?php
/**
 * Created by PhpStorm.
 * User: Rene
 * Date: 28-05-2015
 * Time: 18:18
 */
namespace App\Image;

interface ImageRepositoryInterface
{
    public function createImage($image);

    public function getImagesAsList();
}