<?php namespace App\Commands;

use App\Commands\Command;

use App\Page\Page;
use App\Page\PageRepositoryInterface;
use Illuminate\Contracts\Bus\SelfHandling;

class CreatePageCommand extends Command implements SelfHandling {
    /**
     * @var
     */
    private $name;

    /**
     * Create a new command instance.
     *
     * @param $name
     * @return \App\Commands\CreatePostCommand
     */
	public function __construct($name)
	{
		//
        $this->name = $name;
    }

    /**
     * Execute the command.
     *
     * @param PageRepositoryInterface $repo
     * @return void
     */
	public function handle(PageRepositoryInterface $repo)
	{
        $page = new Page();
        $page->name = $this->name;
        $page->is_subpage = false;

        $page = $repo->createPage($page);
        return $page;
	}

}
