<?php namespace App\Commands;

use App\Column\Column;
use App\Column\ColumnRepositoryInterface;
use App\Commands\Command;

use Illuminate\Contracts\Bus\SelfHandling;

class CreateColumnCommand extends Command implements SelfHandling {
    /**
     * @var
     */
    private $contentType;
    /**
     * @var
     */
    private $sectionId;
    /**
     * @var
     */
    private $name;

    /**
     * Create a new command instance.
     *
     * @param $contentType
     * @param $sectionId
     * @param $name
     * @return \App\Commands\CreateColumnCommand
     */
	public function __construct($contentType,$sectionId,$name)
	{
		//
        $this->contentType = $contentType;
        $this->sectionId = $sectionId;
        $this->name = $name;
    }

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle(ColumnRepositoryInterface $repo)
	{
        $column = new Column();
        $column->name = $this->name;
        $column->section_id = $this->sectionId;
        $column->content_type_id =  $this->contentType;

        $repo->createColumn($column);
        return $column;
	}

}
