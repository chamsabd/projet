<?php

namespace Database\Factories;

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
            //'id_admin' => Admin::get('id_admin')->random(),
            'id_admin' => $this->faker->numberBetween(10, 500),
            'created_at' => now(),

        ];
    }
}
