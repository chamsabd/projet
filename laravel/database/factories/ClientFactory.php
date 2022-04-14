<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Departement;
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
           'departement_id'=>Departement::get('id')->random()

        ];
    }
}
