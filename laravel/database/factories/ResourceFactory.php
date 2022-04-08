<?php

namespace Database\Factories;

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
            // $table->string('url');
           //// $table->string('type');
           // $table->string('id_seance');
           // $table->foreign('id_seance')->references('id_seance')->on('seances')->onDelete('cascade')->onUpdate('cascade');
         'url'=>$this->faker->file($sourceDir = 'public', $targetDir = 'storage\img'),
           'type'=>$this->faker->fileExtension(),
           'id_seance'=>$this->faker->numberBetween(10, 500),
           'created_at'=>now()
        ];
    }
}
