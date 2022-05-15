<?php

namespace Database\Factories;

use App\Models\Client;
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
          
           'client_id' =>Client::get('id')->unique()->random(),
            'formation_id' =>Formation::get('id')->unique()->random(),
           'date_inscrit' =>$this->faker->unique()->date($format = 'Y-m-d', $max = 'now'),
           'created_at'=>now()  
        ];
    }
}
