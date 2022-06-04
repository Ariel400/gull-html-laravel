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
                'code' => '111a20000',
                'id_client' => '1',
                'id_agent' => '9',
                'type_pret' => 'Prêt personnel',
                'montant_pret' => '20000',
                'duree_pret' => '12',
                'revenu_mensuel' => '50000000',
                'nbr_enfant' => '3',
                'debut_emprunt' => '2022-06-04',
                'fin_emprunt' => NULL,
                'autre_revenu' => NULL,
                'activite' => 'on',
                'categorie_socio' => 'Chef d\'entreprise',
                'contrat_travail' => 'CDI',
                'type_logement' => 'on',
                'addresse' => '45 ffr2',
                'ville' => 'Abidjan',
                'autre_charge_mensuel' => NULL,
                'loyer_mensuel' => '80000',
                'status' => 'en cours',
                'actif' => '0',
                'created_at' => '2022-06-04 05:10:50',
                'updated_at' => '2022-06-04 06:20:06',
            ),
            1 => 
            array (
                'code' => 'Crédit auto neuveCrédit auto neuve500',
                'id_client' => '2',
                'id_agent' => NULL,
                'type_pret' => 'Crédit auto neuve',
                'montant_pret' => '500',
                'duree_pret' => '24',
                'revenu_mensuel' => '100000000000',
                'nbr_enfant' => '2',
                'debut_emprunt' => NULL,
                'fin_emprunt' => NULL,
                'autre_revenu' => NULL,
                'activite' => 'on',
                'categorie_socio' => 'Prêt personnel',
                'contrat_travail' => 'Crédit auto neuve',
                'type_logement' => 'on',
                'addresse' => 'hjghg',
                'ville' => 'Paris',
                'autre_charge_mensuel' => '150000',
                'loyer_mensuel' => NULL,
                'status' => 'en attente',
                'actif' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'code' => 'sss',
                'id_client' => '3',
                'id_agent' => NULL,
                'type_pret' => 'dsf',
                'montant_pret' => 'sdgr',
                'duree_pret' => '12',
                'revenu_mensuel' => 'fg',
                'nbr_enfant' => '10',
                'debut_emprunt' => '2022-06-03',
                'fin_emprunt' => NULL,
                'autre_revenu' => NULL,
                'activite' => NULL,
                'categorie_socio' => NULL,
                'contrat_travail' => NULL,
                'type_logement' => NULL,
                'addresse' => NULL,
                'ville' => NULL,
                'autre_charge_mensuel' => NULL,
                'loyer_mensuel' => NULL,
                'status' => 'en cours',
                'actif' => '1',
                'created_at' => '2022-06-03 19:31:54',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}