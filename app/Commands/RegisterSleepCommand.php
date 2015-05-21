<?php namespace App\Commands;

use App\Commands\Command;
use App\Sleep\SleepRepositoryInterface;
use App\Sleep\Sleep;

use Illuminate\Contracts\Bus\SelfHandling;

class RegisterSleepCommand extends Command implements SelfHandling {
    
    /**
    * @var
    */
    private $date;
    private $start;
    private $end;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct($fullname, $date, $start, $end)
    {
        $this->child_id = $fullname;
        $this->date = $date;
        $this->start = $start;
        $this->end = $end;
    }

    /**
     * Execute the command.
     *
     * @return void
     */
    public function handle(SleepRepositoryInterface $SleepRepository)
    {
        $sleep = new Sleep();
        
        //Dateformat
        $date_dk = $this->date;
        $format = "d-m-Y";
        $date_eng = date_create_from_format($format, $date_dk);


        //Save data in the database
        $sleep->date = $date_eng;
        $sleep->child_id = $this->child_id; //
        $sleep->start = $this->start;
        $sleep->end = $this->end;
        
        $SleepRepository->insertSleep($sleep);
    }

}
