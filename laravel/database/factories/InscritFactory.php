<?php

namespace Database\Factories;

use App\Models\Formation;
use App\Models\Inscrit;
use Illuminate\Database\Eloquent\Factories\Factory;

class InscritFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
      
        return [
           //'id_clients' =>Client::get('id_clients')->random(),
           'id_clients' =>$this->faker->unique()->numberBetween(10, 500),
            'id_formation' =>Formation::get('id_formation')->unique()->random(),
           'date_inscrit' =>$this->faker->unique()->date($format = 'Y-m-d', $max = 'now'),
           'created_at'=>now()  
        ];
    }
}
