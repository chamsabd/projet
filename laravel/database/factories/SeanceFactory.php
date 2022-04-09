<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker ;
use app\order ;
class SeanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           'nom_cours' => $this->faker->name(),
           'duree' =>$this->faker->randomNumber(),
           'created_at'=> now() ,
           'updated_at'=> now() , 
          // 'id_professeur'=> Professeur::get('id_professeur')->random(),
          //  'id_formation'=> Professeur::get('id_formation')->random()
        ];
    }
}
