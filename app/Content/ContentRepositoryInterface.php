<?php
/**
 * Created by PhpStorm.
 * User: Rene
 * Date: 16-05-2015
 * Time: 10:51
 */
namespace App\Content;

interface ContentRepositoryInterface
{
    public function saveContent($content);
    public function findContentById($content_id);
}