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

            'specialite' =>$this->faker->word,
            'created_at' => now(),
        ];
    }
}
