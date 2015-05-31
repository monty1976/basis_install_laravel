<?php namespace App\Commands;

use App\Child\Child;
use App\Child\ChildRepositoryInterface;
use App\ChildUser\ChildUser;
use App\ChildUser\ChildUserRepositoryInterface;
use App\Commands\Command;

use App\Image\Image;
use App\Image\ImageRepositoryInterface;
use Illuminate\Contracts\Bus\SelfHandling;
use Intervention\Image\Facades\Image as IntervetionImage;


class CreateChildCommand extends Command implements SelfHandling {
    /**
     * @var
     */
    private $file;
    /**
     * @var
     */
    private $file_name;
    /**
     * @var
     */
    private $parent_id;
    /**
     * @var
     */
    private $nursery_id;
    /**
     * @var
     */
    private $first_name;
    /**
     * @var
     */
    private $last_name;
    /**
     * @var
     */
    private $birthday;

    /**
     * Create a new command instance.
     *
     * @param $file
     * @param $file_name
     * @param $parent_id
     * @param $nursery_id
     * @param $first_name
     * @param $last_name
     * @param $birthday
     * @return \App\Commands\CreateChildCommand
     */
	public function __construct($file, $file_name, $parent_id, $nursery_id, $first_name, $last_name, $birthday)
	{
		//
        $this->file = $file;
        $this->file_name = $file_name;
        $this->parent_id = $parent_id;
        $this->nursery_id = $nursery_id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->birthday = $birthday;
    }

    /**
     * Execute the command.
     *
     * @param ImageRepositoryInterface $imageRepo
     * @param ChildRepositoryInterface $childRepo
     * @param ChildUserRepositoryInterface $childUserRepo
     * @return void
     */
	public function handle(ImageRepositoryInterface $imageRepo, ChildRepositoryInterface $childRepo, ChildUserRepositoryInterface $childUserRepo)
	{
        //image with 200, and it is a data-url
        $data = (string) IntervetionImage::make($this->file->getRealPath())
            ->resize(null,100, function($constraint){
                $constraint->aspectRatio();
            })->encode('data-url');

        $image = new Image();
        $image->image_name =  $this->file_name;
        $image->image_base_64 = $data;
        $imageRepo->createImage($image);

        $format = "d-m-Y";
        $child = new Child();
        $child->first_name = $this->first_name;
        $child->last_name = $this->last_name;
        $child->birthday = date_create_from_format($format, $this->birthday);
        $child->nursery_id =  $this->nursery_id;
        $child->image_id = $image->id;

        $childRepo->createChild($child);


        $childUser = new ChildUser();
        $childUser->child_id = $child->id;
        $childUser->user_id = $this->parent_id;

        $childUserRepo->createChildUser($childUser);












	}

}
