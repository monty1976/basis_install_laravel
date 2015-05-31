<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ImagePost;
use App\Post\PostRepositoryInterface;
use App\Nursery\NurseryRepositoryInterface;
use App\Http\Requests\PostRequest;
use App\Commands\RegisterPostCommand;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use App\Post\Post;
use App\Helpers\MailTrait;
use Intervention\Image\Facades\Image as IntervetionImage;
use App\Image\Image;
use App\Image\ImageRepositoryInterface;

use Illuminate\Http\Request;

class PostController extends Controller {
    use MailTrait;

    /**
     * @var ImageRepositoryInterface
     */
    private $ImageRepository;

    public function __construct(PostRepositoryInterface $PostRepository, NurseryRepositoryInterface $NurseryRepository, ImageRepositoryInterface $ImageRepository){


        $this->middleware('auth');
        $this->middleware('role_check');

        $this->ImageRepository = $ImageRepository;
        $this->postRepo = $PostRepository;
        $this->nurseryRepo = $NurseryRepository;

    }

    public function registerPost(PostRequest $request)
    {
        $post = new Post;
        $file = Input::file('image');


        if(! is_null($file))  {
            $file_name = Input::file('image')->getClientOriginalName();

        //image with 200, and it is a data-url
        $data = (string) IntervetionImage::make($file->getRealPath())
            ->resize(250,null, function($constraint){
                $constraint->aspectRatio();
            })->encode('data-url');

            $image = new Image();
            $image->image_name =  $file_name;
            $image->image_base_64 = $data;
            $this->ImageRepository->createImage($image);
        }
        //Dateformat
        $date_dk = Input::get('date');
        $format = "d-m-Y";
        $date_eng = date_create_from_format($format, $date_dk);

        //Get inputs from the form
        $post->date = $date_eng;
        $post->headline = Input::get('headline');
        $post->content = Input::get('content');
        $post->nursery_id = Input::get('nursery_id');

        //Whom to sending the email to
        $nursery = $this->nurseryRepo->getNurseryUsers($post->nursery_id);

        //Loop through users
        foreach($nursery->users as $user){
           if($user->role_id === 2){

                $user_fullname = $user->first_name . " " . $user->last_name;
                
                $template = 'emails.post';
                //The data that will be applied in the email
                $data = ['date' => $date_dk,
                    'headline' => $post->headline,
                    'content' => $post->content,
                    'user_name' => $user_fullname,
                    'nursery_name' => $nursery->nursery_name];
                $mailTo = $user->email;
                $nameTo = $user->first_name;
                $mailFrom = 'info@boerneriget.dk';
                $subject = 'Ny besked fra Børneriget';

              // dd($mailTo);


                
                //Sending mail
                $this->sendMail($template, $data, $mailTo, $nameTo, $mailFrom, $subject);   
            }
        }




        //Insert data in the database
        $this->postRepo->insertPost($post);

        if(! is_null($file)) {
            $imagePost = new ImagePost();
            $imagePost->image_id = $image->id;
            $imagePost->post_id = $post->id;

            $this->postRepo->imagePost($imagePost);
        }


        //$this->dispatchFrom(RegisterPostCommand::class, $request);
        
        $this->createSuccessMessage("Mail sendt!");
        
        return Redirect::back();
    }

}
