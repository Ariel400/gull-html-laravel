<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'code' => 'accessoires-de-bureau',
                'nom' => 'Accessoires de bureau /',
                'images' => NULL,
                'enabled' => 1,
                'deleted_at' => NULL,
                'created_at' => '2021-06-19 16:26:38',
                'updated_at' => '2021-06-19 16:26:38',
            ),
            1 => 
            array (
                'code' => 'armoire',
                'nom' => 'Armoire',
                'images' => NULL,
                'enabled' => 1,
                'deleted_at' => NULL,
                'created_at' => '2021-06-19 16:26:04',
                'updated_at' => '2021-06-19 16:26:10',
            ),
        ));
        
        
    }
}