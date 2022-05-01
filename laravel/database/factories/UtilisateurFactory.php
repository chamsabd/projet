<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UtilisateurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
     
        'ncin'=>$this->faker->unique()->randomNumber($nbDigits = 8, $strict = true),
        'email' => $this->faker->unique()->safeEmail(),
        'password'=>$this->faker->password(),
        'nom' => $this->faker->name(),
        'prenom' => $this->faker->name(),
        'role' => $this->faker->randomElement($array = array ('admin','etud','prof','agent')),
        'avatar' => $this->faker->imageUrl($width = 640, $height = 480),
        'created_at'=>now()
        ];
    }

}
