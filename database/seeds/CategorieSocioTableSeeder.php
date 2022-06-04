<?php

use Illuminate\Database\Seeder;

class CategorieSocioTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categorie_socio')->delete();
        
        \DB::table('categorie_socio')->insert(array (
            0 => 
            array (
                'id' => 1,
                'libelle' => 'Cadre supérieur',
                'created_at' => '2022-06-04 11:39:29',
                'updated_at' => '2022-06-04 11:39:29',
            ),
        ));
        
        
    }
}