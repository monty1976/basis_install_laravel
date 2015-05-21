<?php namespace App\Commands;

use App\Commands\Command;
use App\Post\Post;
use App\Post\PostRepositoryInterface;

use Illuminate\Contracts\Bus\SelfHandling;

class RegisterPostCommand extends Command implements SelfHandling {

    private $date;
    private $headline;
    private $content;


    /**
	 * Create a new command instance.
	 *
	 * @return void
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
	public function handle(PostRepositoryInterface $PostRepository)
	{
	    $post = new Post;
            
            //Dateformat
            $date_dk = $this->date;
            $format = "d-m-Y";
            $date_eng = date_create_from_format($format, $date_dk);
            
            //Save inputs in database
            $post->date = $date_eng;
            $post->headline = $this->headline;
            $post->content = $this->content;
            $post->nursery_id = $this->nursery_id;
            
            $PostRepository->insertPost($post);
	}

}
