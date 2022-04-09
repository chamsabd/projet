<?php

namespace Database\Seeders;

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

        $this->call(SeanceSeeder::class);
        $this->call(ResponsableSeeder::class);

        $this->call(UtilisateurSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(ResourceSeeder::class);

    }
}
