<?php

use Illuminate\Database\Seeder;

class ConfigTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('config')->delete();
        
        \DB::table('config')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nom' => 'Credit Acess',
                'couleur' => 'blue',
                'logo' => 'loljpg',
                'contact' => NULL,
                'email' => NULL,
                'created_at' => '2022-05-26 11:13:04',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}