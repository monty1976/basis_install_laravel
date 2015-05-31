<?php namespace App\Commands;

use App\Adress\Adress;
use App\Adress\AdressRepositoryInterface;
use App\Commands\Command;

use App\Nursery\NurseryRepositoryInterface;
use App\Nursery\NurseryUser;
use App\Phone\Phone;
use App\Phone\PhoneRepositoryInterface;
use App\User\User;
use App\User\UserRepositoryInterface;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Support\Facades\Hash;

class CreateParentCommand extends Command implements SelfHandling {
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
    private $adress;
    /**
     * @var
     */
    private $number;
    /**
     * @var
     */
    private $postal_code;
    /**
     * @var
     */
    private $phone;
    /**
     * @var
     */
    private $password;
    /**
     * @var
     */
    private $email;
    /**
     * @var
     */
    private $nursery;

    /**
     * Create a new command instance.
     *
     * @param $first_name
     * @param $last_name
     * @param $email
     * @param $street
     * @param $number
     * @param $postal_code
     * @param $phone
     * @param $password
     * @param $nursery
     * @internal param $adress
     * @return \App\Commands\CreateParentCommand
     */
	public function __construct($first_name, $last_name, $email, $street ,$number,$postal_code,$phone,$password, $nursery)
	{
		//
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->adress = $street;
        $this->number = $number;
        $this->postal_code = $postal_code;
        $this->phone = $phone;
        $this->password = $password;
        $this->email = $email;
        $this->nursery = $nursery;
    }

    /**
     * Execute the command.
     *
     * @param UserRepositoryInterface $userRepo
     * @param PhoneRepositoryInterface $phoneRepo
     * @param AdressRepositoryInterface $adressRepo
     * @return void
     */
	public function handle(NurseryRepositoryInterface $nurseryRepo, UserRepositoryInterface $userRepo, PhoneRepositoryInterface $phoneRepo, AdressRepositoryInterface $adressRepo)
	{

       $adress = new Adress();

       $adress->street = $this->adress;
       $adress->number =  $this->number;
       $adress->postal_code =  $this->postal_code;

       $adressRepo->createAdress($adress);

        $user = new User();

        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->password = Hash::make($this->password);
        $user->email =  $this->email;
        $user->role_id = 2;
        $user->is_public = 0;
        $user->adress_id = $adress->id;

        $userRepo->createUser($user);

        $nurseryUser = new NurseryUser();
        $nurseryUser->user_id = $user->id;
        $nurseryUser->nursery_id =  $this->nursery;

        $nurseryRepo->nurseryUser($nurseryUser);



        $phone = new Phone();
        $phone->number = $this->phone;
        $phone->user_id = $user->id;

        $phoneRepo->createPhone($phone);

	}

}
