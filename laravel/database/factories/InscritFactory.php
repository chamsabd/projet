<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Formation;
use App\Models\Inscrit;
use App\Models\User;
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
          
           'user_id' =>User::get('id')->unique()->random(),
            'formation_id' =>Formation::get('id')->unique()->random(),
          // 'date_inscrit' =>now(),
           'created_at'=>now()  
        ];
    }
}
