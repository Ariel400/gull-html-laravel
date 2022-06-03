<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'guard_name' => 'web',
                'created_at' => '2020-10-13 04:45:28',
                'updated_at' => '2020-11-14 03:53:50',
            ),
            1 => 
            array (
                'id' => 3,
                'name' => 'DG',
                'guard_name' => 'web',
                'created_at' => '2021-09-12 11:58:39',
                'updated_at' => '2021-09-12 11:58:39',
            ),
            2 => 
            array (
                'id' => 4,
                'name' => 'Gestionnaire contentieux',
                'guard_name' => 'web',
                'created_at' => '2021-09-12 11:59:05',
                'updated_at' => '2021-09-12 11:59:05',
            ),
            3 => 
            array (
                'id' => 5,
                'name' => 'Gestionnaire Comptes',
                'guard_name' => 'web',
                'created_at' => '2021-09-12 11:59:26',
                'updated_at' => '2021-09-12 11:59:26',
            ),
            4 => 
            array (
                'id' => 6,
                'name' => 'Gestionnaire Contrat',
                'guard_name' => 'web',
                'created_at' => '2021-09-12 11:59:43',
                'updated_at' => '2021-09-12 11:59:43',
            ),
            5 => 
            array (
                'id' => 7,
                'name' => 'Gestionnaire Litige',
                'guard_name' => 'web',
                'created_at' => '2021-09-12 11:59:53',
                'updated_at' => '2021-09-12 11:59:53',
            ),
            6 => 
            array (
                'id' => 8,
                'name' => 'Gestionnaire Demande',
                'guard_name' => 'web',
                'created_at' => '2021-09-12 12:00:12',
                'updated_at' => '2021-09-12 12:00:12',
            ),
            7 => 
            array (
                'id' => 9,
                'name' => 'Commercial',
                'guard_name' => 'web',
                'created_at' => '2021-09-12 12:00:33',
                'updated_at' => '2021-09-12 12:00:33',
            ),
            8 => 
            array (
                'id' => 10,
                'name' => 'Responsable RH',
                'guard_name' => 'web',
                'created_at' => '2021-09-12 12:00:46',
                'updated_at' => '2021-09-12 12:00:46',
            ),
            9 => 
            array (
                'id' => 11,
                'name' => 'Caissier',
                'guard_name' => 'web',
                'created_at' => '2021-09-12 12:01:01',
                'updated_at' => '2021-09-12 12:01:01',
            ),
        ));
        
        
    }
}