<?php namespace App\Commands;

use App\Commands\Command;

use App\Section\Section;
use App\Section\SectionRepositoryInterface;
use Illuminate\Contracts\Bus\SelfHandling;

class CreateSectionCommand extends Command implements SelfHandling {
    /**
     * @var
     */
    private $pageId;
    /**
     * @var
     */
    private $name;

    /**
     * Create a new command instance.
     *
     * @param $pageId
     * @param $name
     * @return \App\Commands\CreateSectionCommand
     */
	public function __construct($pageId, $name)
	{
		//
        $this->pageId = $pageId;
        $this->name = $name;
    }

    /**
     * Execute the command.
     *
     * @param SectionRepositoryInterface $repo
     * @return void
     */
	public function handle(SectionRepositoryInterface $repo)
	{
        $section = new Section();
        $section->page_id = $this->pageId;
        $section->name = $this->name;
        $repo->save($section);
	}

}
