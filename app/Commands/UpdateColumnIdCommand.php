<?php namespace App\Commands;

use App\Column\ColumnRepositoryInterface;
use App\Commands\Command;

use Illuminate\Contracts\Bus\SelfHandling;

class UpdateColumnIdCommand extends Command implements SelfHandling {
    /**
     * @var
     */
    private $columnId;
    /**
     * @var
     */
    private $content_id;

    /**
     * Create a new command instance.
     *
     * @param $columnId
     * @return \App\Commands\UpdateColumnIdCommand
     */
	public function __construct($columnId, $content_id)
	{
		//
        $this->columnId = $columnId;
        $this->content_id = $content_id;
    }

    /**
     * Execute the command.
     *
     * @param ColumnRepositoryInterface $repo
     * @return void
     */
	public function handle(ColumnRepositoryInterface $repo)
	{

        $column = $repo->getColumnById($this->columnId);
        $column->content_id = $this->content_id;
       $repo->createColumn($column);
	}

}
