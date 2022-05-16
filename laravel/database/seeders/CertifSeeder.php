<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Certif;
class CertifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Certif::factory()->count(5)->create();

    }
}
