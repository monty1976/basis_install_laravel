<?php
/**
 * Created by PhpStorm.
 * User: Rene
 * Date: 15-05-2015
 * Time: 21:42
 */
namespace App\Section;

interface SectionRepositoryInterface
{
    public function getSectionById($sectionId);
    public function save($section);
    public function deleteSection($sectionId);
}