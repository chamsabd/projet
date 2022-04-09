<?php

namespace Database\Seeders;
use App\Models\Demande;

use Illuminate\Database\Seeder;

class DemandeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Demande::factory()->count(3)->create();
    }
}
