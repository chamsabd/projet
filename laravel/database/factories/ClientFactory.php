<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'specialite'=>$this->faker->sentence(),
            'ncin'=>$this->faker->unique()->numberBetween(0,8),
           'id_departement'=>$this->faker->numberBetween(1,100),


        ];
    }
}
