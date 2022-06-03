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
        // $this->call(MigrationsTableSeeder::class);
        // $this->call(PasswordResetsTableSeeder::class);
        // $this->call(SliderTableSeeder::class);
        // $this->call(ProduitsTableSeeder::class);
        // $this->call(CategoriesTableSeeder::class);
        // $this->call(TagsTableSeeder::class);
        // $this->call(ArticlesTableSeeder::class);
        // $this->call(ArticleHasTagsTableSeeder::class);
        // $this->call(GestionPadevTableSeeder::class);
        $this->call(PartenairesTableSeeder::class);
        // $this->call(VideoTableSeeder::class);
        $this->call(ImageTableSeeder::class);
        $this->call(ConfigTableSeeder::class);
        $this->call(MessagesTableSeeder::class);
    }
}
