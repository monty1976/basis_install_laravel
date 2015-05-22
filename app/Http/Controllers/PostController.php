<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post\PostRepositoryInterface;
use App\Nursery\NurseryRepositoryInterface;
use App\Http\Requests\PostRequest;
use App\Commands\RegisterPostCommand;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use App\Post\Post;
use App\Helpers\MailTrait;

use Illuminate\Http\Request;

class PostController extends Controller {
    use MailTrait;
    
    public function __construct(PostRepositoryInterface $PostRepository, NurseryRepositoryInterface $NurseryRepository){
        $this->postRepo = $PostRepository;
        $this->nurseryRepo = $NurseryRepository;
    }

        public function registerPost(PostRequest $request)
    {
        $post = new Post;

        //Dateformat
        $date_dk = Input::get('date');
        $format = "d-m-Y";
        $date_eng = date_create_from_format($format, $date_dk);

        //Save inputs in database
        $post->date = $date_eng;
        $post->headline = Input::get('headline');
        $post->content = Input::get('content');
        $post->nursery_id = Input::get('nursery_id');

        //Whom to sending the email to
        $nursery = $this->nurseryRepo->getNurseryUsers($post->nursery_id);
        
         //$this->sendMail('emails.test', '$data', 'renethomassen@hotmail.com', '$nameTo', 'renethomassen@hotmail.com', '$subject');
        //Loop through users
        
        
        foreach($nursery->users as $user){
           if($user->role_id === 2){
               
               
              
                $user_fullname = $user->first_name . " " . $user->last_name;
                
                $data = ['date' => $date_dk,
                    'headline' => $post->headline,
                    'content' => $post->content,
                    'user_name' => $user_fullname,
                    'nursery_name' => $nursery->nursery_name];
               
                 $mailTo = $user->email;
                 $nameTo = $user->first_name;
                $mailFrom = 'info@boerneriget.dk';
                $subject = 'Ny besked fra Børneriget';
                 $template = 'emails.post';
                
                
                $this->sendMail($template, $data, $mailTo, $nameTo, $mailFrom, $subject);
                
                //Sending mail
//               Mail::queue('emails.post', compact('data'), function($message) use ($mailTo, $mailFrom, $subject) {
//            $message->to($mailTo)->from($mailFrom)->subject($subject);
//        });
                
                
              
                
            }    
            
        }
        $this->postRepo->insertPost($post);
          
        
        
        
        
       // $this->dispatchFrom(RegisterPostCommand::class, $request);
        
        $this->createSuccessMessage("Mail sendt!");
        
        return Redirect::back();
    }

}
