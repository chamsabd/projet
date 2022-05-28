<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Formation;
use App\Models\User;
class CertificationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'formation_id' =>Formation::get('id')->unique()->random(),
            'user_id' =>User::get('id')->unique()->random(),
            'score'=>$this->faker->randomFloat(2,0,99),
            //'date_Certif'=>$this->faker->unique()->date($format = 'Y-m-d', $max = 'now'),
            'created_at'=>now() 
        ];
    }
}
