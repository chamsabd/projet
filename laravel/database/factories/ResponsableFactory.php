<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker ;
class ResponsableFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'metier' => $this->faker->word(),
           'created_at'=> now() ,
           'updated_at'=> now()
        ];
    }
}
