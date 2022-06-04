<?php

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('clients')->delete();
        
        \DB::table('clients')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nom' => 'sminth',
                'prenom' => 'Emmanuel',
                'genre' => NULL,
                'password' => '$2y$10$pHvwTVGlUpb3zWSavkBKMuOAWDsjJCCbRyskVOLNNoT8rS8eSXTRi',
                'remember_token' => NULL,
                'telephone' => '88364403',
                'solde' => 128000000,
                'dateNaissance' => NULL,
                'lieuNaissance' => NULL,
                'profession' => NULL,
                'experience' => NULL,
                'lieuHabitation' => NULL,
                'siteWeb' => NULL,
                'email' => 'virtus225one@gmail.com',
                'enabled' => 0,
                'deleted_at' => NULL,
                'created_at' => '2020-11-09 21:37:53',
                'updated_at' => '2020-11-10 11:37:03',
            ),
            1 => 
            array (
                'id' => 2,
                'nom' => 'guelade',
                'prenom' => 'kevin',
                'genre' => NULL,
                'password' => '$2y$10$p/GbpiFI1KnT/lxDoPwLW.6vadxOVfd1s9sFmo8XEJdS2lhjp8npO',
                'remember_token' => NULL,
                'telephone' => NULL,
                'solde' => 2000000,
                'dateNaissance' => NULL,
                'lieuNaissance' => NULL,
                'profession' => NULL,
                'experience' => NULL,
                'lieuHabitation' => NULL,
                'siteWeb' => NULL,
                'email' => 'kevinguelade@gmail.com',
                'enabled' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-11-18 08:53:48',
                'updated_at' => '2020-11-18 08:53:48',
            ),
            2 => 
            array (
                'id' => 3,
                'nom' => 'MANI',
                'prenom' => 'Christian',
                'genre' => NULL,
                'password' => '$2y$10$YV4OhNKdb976WSlogVUUROF6KSDzDk3lLbm7FcHsMPLNQXbP8uYyO',
                'remember_token' => NULL,
                'telephone' => '89962084',
                'solde' => 2000000,
                'dateNaissance' => NULL,
                'lieuNaissance' => NULL,
                'profession' => NULL,
                'experience' => NULL,
                'lieuHabitation' => NULL,
                'siteWeb' => NULL,
                'email' => 'Manichristian@yahoo.com',
                'enabled' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-11-18 12:06:40',
                'updated_at' => '2020-11-28 12:16:35',
            ),
            3 => 
            array (
                'id' => 4,
                'nom' => 'Kadio',
                'prenom' => 'Jean',
                'genre' => NULL,
                'password' => '$2y$10$hSk5Bn7XxhZCwaH77GbwsO5u.H3KVxMfVEqzzY.PvlvguSC40M07O',
                'remember_token' => NULL,
                'telephone' => NULL,
                'solde' => 2000000,
                'dateNaissance' => NULL,
                'lieuNaissance' => NULL,
                'profession' => NULL,
                'experience' => NULL,
                'lieuHabitation' => NULL,
                'siteWeb' => NULL,
                'email' => 'kadiojean1017@yahoo.com',
                'enabled' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-11-30 11:24:36',
                'updated_at' => '2020-11-30 11:24:36',
            ),
            4 => 
            array (
                'id' => 5,
                'nom' => 'Doumbia',
                'prenom' => 'Fatim',
                'genre' => NULL,
                'password' => '$2y$10$UDwOHaaRynojaY4ruwcYJeXQBf/SYvzz29otQR3D5V5OyEmE.rs5y',
                'remember_token' => NULL,
                'telephone' => '02109801',
                'solde' => 2000000,
                'dateNaissance' => NULL,
                'lieuNaissance' => NULL,
                'profession' => NULL,
                'experience' => NULL,
                'lieuHabitation' => NULL,
                'siteWeb' => NULL,
                'email' => 'fatim.doumbia020@gmail.com',
                'enabled' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-11-29 10:24:31',
                'updated_at' => '2020-11-29 10:24:58',
            ),
        ));
        
        
    }
}