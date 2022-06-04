<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 2,
                'name' => 'globale',
                'guard_name' => 'web',
                'created_at' => '2020-10-13 04:45:40',
                'updated_at' => '2020-10-13 04:45:40',
            ),
            1 => 
            array (
                'id' => 3,
                'name' => 'paramètre de base',
                'guard_name' => 'web',
                'created_at' => '2020-10-13 04:45:55',
                'updated_at' => '2020-10-13 04:45:55',
            ),
            2 => 
            array (
                'id' => 5,
                'name' => 'paramètre d\' accès',
                'guard_name' => 'web',
                'created_at' => '2020-10-13 04:46:29',
                'updated_at' => '2022-06-04 06:04:53',
            ),
        ));
        
        
    }
}