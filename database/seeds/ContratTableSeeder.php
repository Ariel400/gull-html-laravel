<?php

use Illuminate\Database\Seeder;

class ContratTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('contrat')->delete();
        
        \DB::table('contrat')->insert(array (
            0 => 
            array (
                'code' => 'sss',
                'type_pret' => 'dsf',
                'montant_pret' => 'sdgr',
                'duree_pret' => 'fsvgr',
                'revenu_mensuel' => 'fg',
                'nbr_enfant' => NULL,
                'debut_emprunt' => '2022-06-03',
                'autre_revenu' => NULL,
                'activite' => NULL,
                'categorie_socio' => NULL,
                'contrat_travail' => NULL,
                'type_logement' => NULL,
                'addresse' => NULL,
                'ville' => NULL,
                'autre_charge_mensuel' => NULL,
                'loyer_mensuel' => NULL,
                'status' => 'hjgj',
                'actif' => '1',
                'created_at' => '2022-06-03 19:31:54',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}