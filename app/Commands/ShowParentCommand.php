<?php namespace App\Commands;

use App\Commands\Command;

use Laracasts\Utilities\JavaScript\JavaScriptFacade;
use App\Nursery\NurseryRepositoryInterface;
use App\User\UserRepositoryInterface;
use Illuminate\Contracts\Bus\SelfHandling;

class ShowParentCommand extends Command implements SelfHandling {

    /**
     * Create a new command instance.
     *
     * @param $user
     * @return \App\Commands\ShowParentCommand
     */
	public function __construct($user)
	{
		$this->user = $user;
	}

    /**
     * Execute the command.
     *
     * @param UserRepositoryInterface $userRepo
     * @param NurseryRepositoryInterface $nurseRepo
     * @return void
     */
	public function handle(UserRepositoryInterface $userRepo, NurseryRepositoryInterface $nurseRepo)
	{
        $children =  $userRepo->getChildrenActivitiesByUser($this->user);
        //dd($children);
        //hvordan håndtere vi hele børnehaven?? det er lidt dumt at 3 er hardcoded ind
        $kindergarten = $nurseRepo->getNurseryActivitiesById(3);

        $events = [];

        /*
         * Loop over childre and for each of them
         * find the nursery they are in and the activities for that nursery*/
        foreach($children as $child){
            $color = $child->nursery->nursery_color;

            foreach($child->nursery->activities as $activity){
                $event = ['title' => $activity->headline , 'start' => $activity->date, 'color' => "#{$color}", 'content' => $activity->content ];
                array_push($events,$event);
            }
        }

        //set the color for the kindergarten
        $color = $kindergarten->nursery_color;
        foreach($kindergarten->activities as $activity){
            $event = ['title' => $activity->headline , 'start' => $activity->date, 'color' => "#{$color}", 'content' => $activity->content];
            array_push($events,$event);
        }

        $jsonEvents=  json_encode($events);

        JavaScriptFacade::put(['content' =>$jsonEvents ]);
        return $children;
	}

}
