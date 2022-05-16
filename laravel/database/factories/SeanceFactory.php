<?php

namespace Database\Factories;
use App\Models\Professeur;
use App\Models\Formation;
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
           'nom_seance' => $this->faker->name(),
           'date' =>$this->faker->date(),
           'temps_fin' =>$this->faker->dateTime(),
           'temps_debut' =>$this->faker->dateTime(),
           'formation_id'=>Formation::get('id')->random(),
           'created_at'=> now() ,
           'updated_at'=> now()  
        ];
    }
}
