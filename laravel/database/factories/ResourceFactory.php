<?php

namespace Database\Factories;

use App\Models\Seance;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResourceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'url'=>$this->faker->file($sourceDir = 'public', $targetDir = 'storage\img'),
           'type'=>$this->faker->fileExtension(),
          // 'id_seance'=>$this->faker->numberBetween(10, 500),
           'id_seance'=>Seance::get('id_seance')->random(),
           'created_at'=>now()
        ];
    }
}
