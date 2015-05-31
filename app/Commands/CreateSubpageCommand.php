<?php namespace App\Commands;

use App\Commands\Command;

use App\Page\Page;
use App\Page\PageRepositoryInterface;
use App\SubPage\SubPage;
use App\SubPage\SubPageRepositoryInterface;
use Illuminate\Contracts\Bus\SelfHandling;

class CreateSubpageCommand extends Command implements SelfHandling {
    /**
     * @var
     */
    private $parent_page;
    private $name;

    /**
     * Create a new command instance.
     *
     * @param $name
     * @param $parent_page
     * @return \App\Commands\CreateSubpageCommand
     */
	public function __construct($name, $parent_page)
	{
        //
        $this->name = $name;
        $this->parent_page = $parent_page;
    }

    /**
     * Execute the command.
     *
     * @param PageRepositoryInterface $repo
     * @param SubPageRepository $subRepo
     * @return void
     */
	public function handle(PageRepositoryInterface $repo, SubPageRepositoryInterface $subRepo)
	{
        $page = new Page();
        $page->name = $this->name;
        $page->is_subpage = true;

        $page = $repo->createPage($page);

        $pageSubPage = new SubPage();



        $pageSubPage->page_id = $this->parent_page;
        $pageSubPage->subpage_id = $page->id;
        $pageSubPage->name = $this->name;




        $subRepo->savePageSubPage($pageSubPage);

        return $page;
	}

}
