<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder {

    public function run(){
        Role::create([
               'role_name' => 'employee'
            ]);

        Role::create([
            'role_name' => 'parent'
        ]);

        Role::create([
            'role_name' => 'superAdmin'
        ]);
    }
} 