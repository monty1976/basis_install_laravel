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
    public function __construct($date, $headline, $content, $nursery_id)
    {
        $this->date = $date;
        $this->headline = $headline;
        $this->content = $content;
        $this->nursery_id = $nursery_id;
    }

    /**
     * Execute the command.
     *
     * @return void
     */
    public function handle(ActivityRepositoryInterface $ActivityRepository)
    {
        $activity = new Activity();

        //Dateformat
        $date_dk = $this->date;
        $format = "d-m-Y";
        $date_eng = date_create_from_format($format, $date_dk);
        
        $activity->date = $date_eng;
        $activity->headline = $this->headline;
        $activity->content = $this->content;
        $activity->nursery_id = $this->nursery_id;

        $ActivityRepository->insertActivity($activity);
    }

}
