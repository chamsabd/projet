<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            
        'ncin'=>$this->faker->unique()->randomNumber($nbDigits = 8, $strict = true),
        'email' => $this->faker->unique()->safeEmail(),
        'nom' => $this->faker->name(),
        'prenom' => $this->faker->name(),
        'role' => $this->faker->randomElement($array = array ('admin','etud','prof','agent')),
        'avatar' => $this->faker->imageUrl($width = 640, $height = 480),
        'remember_token' => Str::random(10),
        'created_at'=>now()
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
