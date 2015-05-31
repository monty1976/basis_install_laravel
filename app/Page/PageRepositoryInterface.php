<?php
/**
 * Created by PhpStorm.
 * User: Rene
 * Date: 15-05-2015
 * Time: 20:11
 */
namespace App\Page;

interface PageRepositoryInterface
{
    public function createPage($page);
    public function getAllPages();
    public function getPageById($pageId);
    public function deletePage($pageId);
    public function getPagesAsList();

}