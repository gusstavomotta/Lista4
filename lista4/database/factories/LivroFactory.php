<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LivroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $generos_permitidos = ['Romance', 'Clássico', 'Ficção', 'Mistério', 'Ação', 'Drama'];

        return [
            'titulo' => $this->faker->sentence,
            'autor' => $this->faker->name,
            'data_lancamento' => $this->faker->date,
            'num_paginas' => $this->faker->numberBetween(50, 500),
            'genero' => $generos_permitidos[array_rand($generos_permitidos)]
        ];
    }
}