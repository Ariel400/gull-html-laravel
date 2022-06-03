<?php

use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('messages')->delete();
        
        \DB::table('messages')->insert(array (
            0 => 
            array (
                'id' => 1,
                'idClient' => '2',
                'idAgent' => '6',
                'idRecepteur' => '6',
                'message' => 'Bonjour Mr',
                'created_at' => '2022-06-03 21:36:04',
                'updated_at' => '2022-06-03 21:36:06',
            ),
            1 => 
            array (
                'id' => 2,
                'idClient' => '2',
                'idAgent' => '6',
                'idRecepteur' => '2',
                'message' => 'Bonjour, en quoi puisse vous aider?',
                'created_at' => '2022-06-03 21:36:07',
                'updated_at' => '2022-06-03 21:36:07',
            ),
            2 => 
            array (
                'id' => 3,
                'idClient' => '3',
                'idAgent' => '6',
                'idRecepteur' => '6',
                'message' => 'Hola hola',
                'created_at' => '2022-06-03 21:36:08',
                'updated_at' => '2022-06-03 21:36:09',
            ),
            3 => 
            array (
                'id' => 4,
                'idClient' => '2',
                'idAgent' => '6',
                'idRecepteur' => '6',
                'message' => 'mon compte est bloqué',
                'created_at' => '2022-06-03 21:36:04',
                'updated_at' => '2022-06-03 21:36:06',
            ),
        ));
        
        
    }
}