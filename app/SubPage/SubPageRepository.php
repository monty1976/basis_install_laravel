<?php
namespace App\SubPage;

class SubPageRepository implements SubPageRepositoryInterface
{
    public function savePageSubPage($pageSub){
        $pageSub->save();
    }
} 