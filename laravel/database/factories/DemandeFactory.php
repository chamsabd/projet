<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Client;
use App\Models\Formation;
use App\Models\Responsable;

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
            'client_id' => Client::get('id')->random(),
           // 'formation_id'=> $this->faker->numberBetween(10,200),
           'formation_id' => Formation::get('id')->random(),

            'date_demande'=>$this->faker->date($format = 'Y-m-d', $max = 'now'),
            //'responsable_id'=> $this->faker->numberBetween(10,200),
            'responsable_id' => Responsable::get('id')->random(),


        ];
    }
}

