<?php

namespace Database\Factories;
use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;

class DepartementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            
            'nom_dep' => $this->faker->word,
            'admin_id' => Admin::get('id')->random(),
            //'admin_id' => $this->faker->numberBetween(10, 500),
            'created_at' => now(),

        ];
    }
}
