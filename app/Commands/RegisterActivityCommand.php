<?php namespace App\Commands;

use App\Commands\Command;
use App\Activity\Activity;
use App\Activity\ActivityRepositoryInterface;

use Illuminate\Contracts\Bus\SelfHandling;

class RegisterActivityCommand extends Command implements SelfHandling {
     
        /**
        * @var
        */
        private $date;
        private $headline;
        private $content;
        
	/**
	 * Create a new command instance.
	 *
	 * @return void
         * Her sættes værdierne
	 */
	public function __construct($date, $headline, $content)
	{
            $this->date = $date;
            $this->headline = $headline;
            $this->content = $content;
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle(ActivityRepositoryInterface $ActivityRepository)
	{
            $activity = new Activity();
            $activity->date = $this->date;
            $activity->headline = $this->headline;
            $activity->content = $this->content;
            
            $ActivityRepository->insertActivity($activity);
	}

}
