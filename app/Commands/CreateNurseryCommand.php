<?php namespace App\Commands;

use App\Commands\Command;

use App\Nursery\Nursery;
use App\Nursery\NurseryRepositoryInterface;
use Illuminate\Contracts\Bus\SelfHandling;

class CreateNurseryCommand extends Command implements SelfHandling {
    /**
     * @var
     */
    private $nursery_name;
    /**
     * @var
     */
    private $nursery_type;
    /**
     * @var
     */
    private $nursery_color;

    /**
     * Create a new command instance.
     *
     * @param $nursery_name
     * @param $nursery_type
     * @param $nursery_color
     * @return \App\Commands\CreateNurseryCommand
     */
	public function __construct($nursery_name, $nursery_type, $nursery_color)
	{
		//
        $this->nursery_name = $nursery_name;
        $this->nursery_type = $nursery_type;
        $this->nursery_color = $nursery_color;
    }

    /**
     * Execute the command.
     *
     * @param NurseryRepositoryInterface $nurseryRepo
     * @return void
     */
	public function handle(NurseryRepositoryInterface $nurseryRepo)
	{
        //remove # from string
        $colorString = ltrim ($this->nursery_color, '#');


        $nursery = new Nursery();

        $nursery->nursery_name = $this->nursery_name;
        $nursery->nursery_color = $colorString;
        $nursery->nursery_type_id = $this->nursery_type;

        $nurseryRepo->createNursery($nursery);


	}

}
