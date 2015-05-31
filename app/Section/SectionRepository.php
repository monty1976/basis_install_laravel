<?php
namespace App\Section;


class SectionRepository implements SectionRepositoryInterface
{

    public function getSectionById($sectionId){
       $section = Section::where('id', $sectionId)->with(['columns.contentType'])->first();
        return $section;
    }

    public function save($section){
        $section->save();
    }

    public function deleteSection($sectionId){
        $section = Section::find($sectionId);
        $section->delete();
    }
} 