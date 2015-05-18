<?php namespace App\Commands;

use App\Commands\Command;
use Illuminate\Support\Facades\Auth;
use App\Adress\AdressRepositoryInterface;
use App\Phone\PhoneRepositoryInterface;

use Illuminate\Contracts\Bus\SelfHandling;

class EditProfileCommand extends Command implements SelfHandling {

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct($first_name, $last_name,$email, $street, $number ,$postal_code, $phone)
	{
            $this->first_name = $first_name;
            $this->last_name = $last_name;
            $this->email = $email;
            $this->street = $street;
            $this->number = $number;
            $this->postal_code = $postal_code;
            $this->phone = $phone;
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle(AdressRepositoryInterface $adressRepo, PhoneRepositoryInterface $phoneRepo)
	{
            $user = Auth::user();
            $adress = $adressRepo->getAdressById($user->adress_id);
            $phone = $phoneRepo->getPhoneNumberByUserId($user->id);

            //Save user inputs in the database
            $user->first_name = $this->first_name;
            $user->last_name = $this->last_name;
            $user->email = $this->email;

            $user->save();

            //Save adress inputs in the database
            $adress->street = $this->street;
            $adress->number = $this->number;
            $adress->postal_code = $this->postal_code;

            $adress->save();

            $phone->number = $this->phone;

            $phone->save();
	}
}
