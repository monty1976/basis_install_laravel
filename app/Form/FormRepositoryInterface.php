<?php
namespace App\Form;

interface FormRepositoryInterface 
{
    public function getFormTypes();
    
    public function insertForm(Form $form);
}

