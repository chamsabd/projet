<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Client;
use App\Models\Responsable;

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
           // 'id'=>$this->faker->unique()->numberBetween(0,7),
          // 'client_id' => Client::get('id')->random(),
           // 'responsable_id'=>$this->faker->numberBetween(0,7),
           // 'id_responsable' => Responsable::get('id_responsable')->random(),
           'responsable_id' => Responsable::get('id')->random(),
           'carte_etud'=>$this->faker->unique()->randomNumber($nbDigits = 8, $strict = true),
           
        ];
    }
}
