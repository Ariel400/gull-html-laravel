<?php

use Illuminate\Database\Seeder;

class ContratTravailTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('contrat_travail')->delete();
        
        \DB::table('contrat_travail')->insert(array (
            0 => 
            array (
                'id' => 1,
                'libelle' => 'CDI',
                'created_at' => '2022-06-04 11:39:38',
                'updated_at' => '2022-06-04 11:39:38',
            ),
        ));
        
        
    }
}