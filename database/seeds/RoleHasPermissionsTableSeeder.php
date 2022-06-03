<?php

use Illuminate\Database\Seeder;

class RoleHasPermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('role_has_permissions')->delete();
        
        \DB::table('role_has_permissions')->insert(array (
            0 => 
            array (
                'permission_id' => 2,
                'role_id' => 3,
            ),
            1 => 
            array (
                'permission_id' => 2,
                'role_id' => 4,
            ),
            2 => 
            array (
                'permission_id' => 2,
                'role_id' => 6,
            ),
            3 => 
            array (
                'permission_id' => 2,
                'role_id' => 7,
            ),
            4 => 
            array (
                'permission_id' => 2,
                'role_id' => 8,
            ),
            5 => 
            array (
                'permission_id' => 2,
                'role_id' => 9,
            ),
            6 => 
            array (
                'permission_id' => 2,
                'role_id' => 10,
            ),
        ));
        
        
    }
}