<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(RoleHasPermissionsTableSeeder::class);
        $this->call(ModelHasPermissionsTableSeeder::class);
        $this->call(ModelHasRolesTableSeeder::class);

        $this->call(CountrySeeder::class);
        $this->call(ClientsTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(FailedJobsTableSeeder::class);
   
        $this->call(ImageTableSeeder::class);
        $this->call(ConfigTableSeeder::class);
        // $this->call(MessagesTableSeeder::class);
        $this->call(ContratTableSeeder::class);
        $this->call(PaiementTableSeeder::class);
        // $this->call(TypePretTableSeeder::class);
        // $this->call(CategorieSocioTableSeeder::class);
        // $this->call(ContratTravailTableSeeder::class);
    }
}
