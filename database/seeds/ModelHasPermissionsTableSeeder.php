<?php

use Illuminate\Database\Seeder;

class ModelHasPermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('model_has_permissions')->delete();
        
        \DB::table('model_has_permissions')->insert(array (
            0 => 
            array (
                'permission_id' => 3,
                'model_type' => 'App\\User',
                'model_id' => 5,
            ),
            1 => 
            array (
                'permission_id' => 5,
                'model_type' => 'App\\User',
                'model_id' => 5,
            ),
        ));
        
        
    }
}