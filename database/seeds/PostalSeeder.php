<?php

use Illuminate\Database\Seeder;

class PostalSeeder extends Seeder {

    public function run(){

        DB::table('postals')->insert(
            array('postal_code' => 4100, 'city' => 'Ringsted')
        );
    }
} 