<?php namespace App\Commands;

use App\Commands\Command;
use App\Post\Post;
use App\Post\PostRepositoryInterface;
use App\Helpers\MailTrait;

use Illuminate\Contracts\Bus\SelfHandling;

class RegisterPostCommand extends Command implements SelfHandling {
    
    use MailTrait;

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
        $user = Auth::user();
        
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

        $data = ['date' => $date_dk,
                'headline' => $post->headline,
                'content' => $post->content];
        
        $mailTo = 'benevc76@hotmail.com'; //Loop through the parents
        $nameTo = 'Benedicte'; //the name of the parent the mail is being sent to
        $mailFrom = 'info@boerneriget';
        $subject = 'Ny besked fra Børneriget';
        
        $PostRepository->insertPost($post);
        
        //Sending mail
        $this->sendMail('emails.welcome', $data, $mailTo, $nameTo, $mailFrom, $subject);
    }

}
