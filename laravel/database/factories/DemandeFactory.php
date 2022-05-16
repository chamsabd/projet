<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Formation;
use App\Models\User;

class DemandeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::get('id')->random(),
           'formation_id' => Formation::get('id')->unique()->random(),
           'date_demande' =>$this->faker->unique()->date($format = 'Y-m-d', $max = 'now'),
     

        ];
    }
}

