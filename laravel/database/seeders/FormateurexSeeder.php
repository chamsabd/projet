<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Formateurex;

class FormateurexSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Formateurex::factory()->count(5)->create();
    }
}
