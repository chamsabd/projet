<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Formation;
use App\Models\User;
class CertifFactory extends Factory
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
            'created_at'=>now()  
        ];
    }
}
