<?php namespace App\Commands;

use App\Commands\Command;

use App\Content\Content;
use App\Content\ContentRepositoryInterface;
use Illuminate\Contracts\Bus\SelfHandling;

class CreateContentCommand extends Command implements SelfHandling {
    /**
     * @var
     */
    private $content_type_id;
    /**
     * @var
     */
    private $text;
    /**
     * @var
     */
    private $image_id;

    /**
     * Create a new command instance.
     *
     * @param $content_type_id
     * @param $text
     * @param $image_id
     * @return \App\Commands\CreateContentCommand
     */
	public function __construct($content_type_id, $text, $image_id)
	{
		//
        $this->content_type_id = $content_type_id;
        $this->text = $text;
        $this->image_id = $image_id;
    }

    /**
     * Execute the command.
     *
     * @param ContentRepositoryInterface $repo
     * @return void
     */
	public function handle(ContentRepositoryInterface $repo)
	{
        $content = new Content();
        //$content->column_id = $columnId;
        $content->content_type_id = $this->content_type_id;
        $content->text = $this->text;
        $content->image_id = $this->image_id;

        $repo->saveContent($content);


        return $content;
	}

}
