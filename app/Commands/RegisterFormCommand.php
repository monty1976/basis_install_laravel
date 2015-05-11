<?php namespace App\Commands;

use App\Commands\Command;
use App\Form\Form;
use App\Form\FormRepositoryInterface;
use App\Child\Child;
use App\Form\FormType;


use Illuminate\Contracts\Bus\SelfHandling;

class RegisterFormCommand extends Command implements SelfHandling {

    /**
        * @var
        */
       private $date;
       private $description;
       private $time_start;
       private $time_end;


       /**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct($date_from, $date_to, $description, $time_start, $time_end, $child_id, $form_types)
	{
            $this->date_from = $date_from;
            $this->date_to = $date_to;
            $this->description = $description;
            $this->time_start = $time_start;
            $this->time_end = $time_end;
            $this->child_id = $child_id;
            $this->form_types = $form_types;
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle(FormRepositoryInterface $FormRepository)
	{
            $form = new Form();
            //$date_dk = "10-03-1976";
            $date_dk_from = $this->date_from;
            $date_dk_to = $this->date_to;
            $format = "d-m-Y";
            $date_eng_from = date_create_from_format($format, $date_dk_from);
            $date_eng_to = date_create_from_format($format, $date_dk_to);
            //dd($date_eng);
      
            $form->date_from = $date_eng_from;
            $form->date_to = $date_eng_to;
            $form->description = $this->description;
            $form->time_start = $this->time_start;
            $form->time_end = $this->time_end;
            $form->child_id = $this->child_id;
            $form->form_type_id = $this->form_types;
            
            $FormRepository->insertForm($form);
	}

}