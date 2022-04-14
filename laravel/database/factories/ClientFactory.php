<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Departement;
use App\Models\Utilisateur;

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
            'utilisateur_id'=>Utilisateur::get('id')->unique()->random(),
           'departement_id'=>Departement::get('id')->random()

        ];
    }
}
