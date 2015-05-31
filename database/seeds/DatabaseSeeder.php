<?php

use App\Adress\Adress;
use App\Postal\Postal;
use App\Role;
use App\User\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        //Turn off foregin key check, needs to be done otherwise we cant truncate
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Role::truncate();
        Adress::truncate();
        User::truncate();

       //run this only once, it will take time
       Postal::truncate();

        //run this only once, it will take time
        $this->call('PostalSeeder');

		Model::unguard();

		$this->call('RoleSeeder');
        $this->call('AdressSeeder');
        $this->call('UserSeeder');


        //Turn on foreign key check, not sure if this needs to be here?
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}
