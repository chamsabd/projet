<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FormationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          
            'nom_for' =>$this->faker->word,
            'date_debut'=>$this->faker->date($format = 'Y-m-d', $max = 'now'),  
            'description' =>$this->faker->sentence, 
            'date_fin' =>$this->faker->date($format = 'Y-m-d', $max = 'now'),   
            'date_certif' =>$this->faker->date($format = 'Y-m-d', $max = 'now'),  
            'etat' =>$this->faker->boolean,   
            'archi' =>$this->faker->boolean, 
            'nbr_place' =>$this->faker->randomNumber(),
            'created_at'=>now()  
        ];
    }
}
