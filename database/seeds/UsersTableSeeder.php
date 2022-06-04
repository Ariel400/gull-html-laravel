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
                'name' => 'Toure Ariel',
                'email' => 'arieltoure@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$DeptA760k0qWCUEQF/5MmuTQhIm.q0zzmnNqUQB3kUZ4GJGRDxlhC',
                'remember_token' => 'y98rvmqEJ8Z2uNlZciVfCwtSBatChL2Uaxwx9WrKGxrBeHMSgcT7rNw4LU1h',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 6,
                'name' => 'Sminth Glarou',
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
                'name' => 'Natacha Aya',
                'email' => 'aya@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$DeptA760k0qWCUEQF/5MmuTQhIm.q0zzmnNqUQB3kUZ4GJGRDxlhC',
                'remember_token' => NULL,
                'created_at' => '2021-09-12 12:08:41',
                'updated_at' => '2022-06-04 05:56:08',
            ),
            3 => 
            array (
                'id' => 8,
                'name' => 'koumou steve job anderson junior koffi',
                'email' => 'koffi@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$VBFeGx2VCipcxuIbaVhTqeAQeHIJWBDRPbGVnOLVxvKzU1RKjSca.',
                'remember_token' => NULL,
                'created_at' => '2022-06-04 05:59:10',
                'updated_at' => '2022-06-04 05:59:10',
            ),
            4 => 
            array (
                'id' => 9,
                'name' => 'Kouadio Jean Marc',
                'email' => 'jm@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$uKibGNBsvv5cIfuIpxajZ.98bX86NYbxaT7ZhQjcvsvliGjmgNVqi',
                'remember_token' => NULL,
                'created_at' => '2022-06-04 06:00:47',
                'updated_at' => '2022-06-04 06:00:47',
            ),
        ));
        
        
    }
}