<?php namespace App\Commands;

use App\Image\Image;
use App\Commands\Command;

use App\Image\ImageRepositoryInterface;
Use Intervention\Image\Facades\Image as IntervetionImage;
use Illuminate\Contracts\Bus\SelfHandling;

class UploadImageCommand extends Command implements SelfHandling {
    /**
     * @var
     */
    private $file;
    /**
     * @var
     */
    private $name;

    /**
     * Create a new command instance.
     *
     * @param $file
     * @param $name
     * @return \App\Commands\UploadImageCommand
     */
	public function __construct($file, $name)
	{
		//
        $this->file = $file;
        $this->name = $name;
    }

    /**
     * Execute the command.
     *
     * @param ImageRepositoryInterface $repo
     * @return void
     */
	public function handle(ImageRepositoryInterface $repo)
	{
        //image with 200, and it is a data-url
        $data = (string) IntervetionImage::make($this->file->getRealPath())
            ->resize(200,null, function($constraint){
                $constraint->aspectRatio();
            })->encode('data-url');





        //$content = file_get_contents($this->file);
        //$base64 = base64_encode($content);

        $image = new Image();
        $image->image_name = $this->name;
        $image->image_base_64 = $data;

        $repo->createImage($image);

	}

}
