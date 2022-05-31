<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FormateurexFactory extends Factory
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

        'email_verified_at' => now(),
        'ncin'=>$this->faker->unique()->randomNumber($nbDigits = 8, $strict = true),
        'email' => $this->faker->unique()->safeEmail(),
        'nom' => $this->faker->name(),
        'prenom' => $this->faker->name(),
        'specialite' =>$this->faker->word,
        'created_at' => now(),
        ];
    }
}
