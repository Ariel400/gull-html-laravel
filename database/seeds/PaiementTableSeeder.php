<?php

use Illuminate\Database\Seeder;

class PaiementTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('paiement')->delete();
        
        \DB::table('paiement')->insert(array (
            0 => 
            array (
                'id' => 1,
                'id_demande' => 'Crédit auto neuveCrédit auto neuve500',
                'id_agent' => '8',
                'montant' => '0',
                'reste_a_payer' => '500',
                'created_at' => '2022-06-04 08:03:12',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}