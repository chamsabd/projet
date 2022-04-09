<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Client;

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
            'id_clients' => Client::get('id_clients')->random(),
            'id_formation'=> $this->faker->numberBetween(10,200),
            //'id_formation' => Formation::get('id_formation')->random(),

            'date_demande'=>$this->faker->date($format = 'Y-m-d', $max = 'now'),
            'id_responsable'=> $this->faker->numberBetween(10,200),
            //'id_responsable' => Responsable::get('id_responsable')->random(),


        ];
    }
}

