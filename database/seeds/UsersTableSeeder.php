<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 3,
                'name' => 'sminth',
                'email' => 'virtus225oneh@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$DeptA760k0qWCUEQF/5MmuTQhIm.q0zzmnNqUQB3kUZ4GJGRDxlhC',
                'remember_token' => 'oDODVsOeL4U5u1O2J33avaNj2VmEhZsr4hTLSqPWLc5mfNwKMaiBNWv1Rs4J',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 6,
                'name' => 'JM',
                'email' => 'virtus225one@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$DeptA760k0qWCUEQF/5MmuTQhIm.q0zzmnNqUQB3kUZ4GJGRDxlhC',
                'remember_token' => NULL,
                'created_at' => '2020-11-20 02:53:32',
                'updated_at' => '2020-11-20 03:00:50',
            ),
            2 => 
            array (
                'id' => 7,
                'name' => 'Mani Yahiri',
                'email' => 'kadiojean0302@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$DeptA760k0qWCUEQF/5MmuTQhIm.q0zzmnNqUQB3kUZ4GJGRDxlhC',
                'remember_token' => NULL,
                'created_at' => '2021-09-12 12:08:41',
                'updated_at' => '2021-09-12 12:08:41',
            ),
        ));
        
        
    }
}