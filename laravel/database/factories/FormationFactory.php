<?php

namespace Database\Factories;

use App\Models\Utilisateur;
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
          
            'titre' =>$this->faker->word,
            'date_debut'=>$this->faker->date($format = 'Y-m-d', $max = 'now'),  
            'description' =>$this->faker->sentence, 
            'date_fin' =>$this->faker->date($format = 'Y-m-d', $max = 'now'),   
            'responsable_id' =>Utilisateur::get('id')->random(),
            'formateur_id' =>Utilisateur::get('id')->random(),
            'formateurexterne_id' =>Utilisateur::get('id')->random(),//table formateurexterne 
            'etat' =>$this->faker->boolean,   
             'nbr_place' =>$this->faker->randomNumber(),
            'created_at'=>now()  
        ];
    }
}
