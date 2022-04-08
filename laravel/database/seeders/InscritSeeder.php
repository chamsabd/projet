<?php

namespace Database\Seeders;
use App\Models\Inscrit;
use Illuminate\Database\Seeder;

class InscritSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Inscrit::factory()->count(5)->create();
    }
}
