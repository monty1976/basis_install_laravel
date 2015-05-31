<?php

use Illuminate\Database\Seeder;

class PostalSeeder extends Seeder {

    public function run(){

        $path = public_path();
        $xml = simplexml_load_file($path . '\xml_postal\postnummer.xml');

        $postal = $xml->xpath('//ss:Row/ss:Cell[position()>4]');

        for ($i = 0; $i < count($postal); $i++) {
            if ($i % 2 === 0) {
                $j = $i + 1;

                $post = DB::table('postals')->where('postal_code',$postal[$i]->Data)->first();

                if( ! $post){
                    DB::table('postals')->insert(
                        array('postal_code' => $postal[$i]->Data, 'city' => $postal[$j]->Data)
                    );
                }
            }
        }
    }
} 