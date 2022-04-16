<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Professeur;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker ;
use app\order ;
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
           // 'professeur_id'=>Professeur::get('id')->random(),
           'admin_id'=>Admin::get('id')->random(),
           'created_at'=> now() ,
           'updated_at'=> now(),
        
        ];
    }
}
