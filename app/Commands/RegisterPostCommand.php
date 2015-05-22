<?php namespace App\Commands;

use App\Commands\Command;
use App\Post\Post;
use App\Post\PostRepositoryInterface;
use App\Child\ChildRepositoryInterface;
use App\Nursery\NurseryRepositoryInterface;
use App\Helpers\MailTrait;
use Illuminate\Support\Facades\Mail;

use Illuminate\Contracts\Bus\SelfHandling;

class RegisterPostCommand extends Command implements SelfHandling {
    
    //use MailTrait;

    private $date;
    private $headline;
    private $content;
    
    private $data = [];
    private $mailTo = [];
    private $mailFrom = 'info@boerneriget';
    private $subject = 'Ny besked fra Børneriget';


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
    public function handle(PostRepositoryInterface $PostRepository, NurseryRepositoryInterface $NurseryRepository)
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

        //Whom to sending the email to
        $nursery = $NurseryRepository->getNurseryUsers($this->nursery_id);
        
         //$this->sendMail('emails.test', '$data', 'renethomassen@hotmail.com', '$nameTo', 'renethomassen@hotmail.com', '$subject');
        //Loop through users
        
        
        foreach($nursery->users as $user){
           if($user->role_id === 2){
               
               $temp = [];
              
                $user_fullname = $user->first_name . " " . $user->last_name;
                
                $this->data = ['date' => $date_dk,
                    'headline' => $post->headline,
                    'content' => $post->content,
                    'user_name' => $user_fullname,
                    'nursery_name' => $nursery->nursery_name];
                //dd('hej');
                 array_push($temp, $user->email);
                
                 $this->mailTo = $temp;
                //$nameTo = $user->first_name; //the name of the parent the mail is being sent to
                
                
                
                //Sending mail
               
                
                
                //dd($user);
                
            }    
            dd($this->data);
             $this->sendMail('emails.test', $this->data, $this->mailTo, $this->mailFrom, $this->subject);
        }
        $PostRepository->insertPost($post);
    }
    
    public function sendMail($template, $data, $mailTo, $mailFrom, $subject){
        Mail::send($template, compact('data'), function($message) use ($mailTo, $mailFrom, $subject){
            $message->to($mailTo)->from($mailFrom)->subject($subject);
        });
    }
    
    private function send($template, $data, $mailTo, $nameTo, $mailFrom, $subject){
        $this->sendMail($template, $data, $mailTo, $nameTo, $mailFrom, $subject);
    }
}
