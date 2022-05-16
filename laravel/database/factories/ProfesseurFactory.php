<?php

namespace Database\Factories;
use App\Models\Responsable;
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
             //'responsable_id' => Responsable::get('id')->random(),
             'responsable_id' => $this->faker->numberBetween(10, 500),
             'created_at' => now(),
        ];
    }
}
