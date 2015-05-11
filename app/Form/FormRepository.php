<?php
namespace App\Form;

class FormRepository implements FormRepositoryInterface 
{
    public function getFormTypes(){
        return FormType::lists('form_type_name', 'id');
    }
    
    public function insertForm(Form $form){
        $form->save();
    }
}

