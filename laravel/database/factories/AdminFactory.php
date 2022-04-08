<?php

namespace Database\Factories;

use App\Models\Utilisateur;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ncin'=>Utilisateur::get('ncin')->unique()->random(),
            
            'created_at'=>now()
        ];
    }
}
