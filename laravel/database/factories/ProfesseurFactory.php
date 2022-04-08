<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProfesseurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
             'formation_certifier' => $this->faker->sentence,
             //'id_responsable' => Responsable::get('id_responsable')->random(),
             'id_reponsable' => $this->faker->numberBetween(10, 500),
             'created_at' => now(),
        ];
    }
}
