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

       
        $this->call(UtilisateurSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(DepartementSeeder::class);
        $this->call(ClientSeeder::class);
        $this->call(ResponsableSeeder::class);
        $this->call(ProfesseurSeeder::class);
        $this->call(FormationSeeder::class);
        $this->call(SeanceSeeder::class);
        $this->call(ResourceSeeder::class);
        $this->call(DemandeSeeder::class);
        $this->call(EtudiantSeeder::class);
       
      //  $this->call(InscritSeeder::class);

    }
}
