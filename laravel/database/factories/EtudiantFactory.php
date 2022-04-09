<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Client;
class EtudiantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'carte_etud'=>$this->faker->unique()->numberBetween(0,7),
            'id_clients' => Client::get('id_clients')->random(),
            'id_responsable'=>$this->faker->numberBetween(0,7),
           // 'id_responsable' => Responsable::get('id_responsable')->random(),
            	
        ];
    }
}
