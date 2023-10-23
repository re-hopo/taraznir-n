<?php

namespace Modules\Tutorial\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Tutorial\Models\Tutorial;

class TutorialFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tutorial::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'title'   => fake()->realText(80 ),
            'slug'    => fake()->slug(),
            'summary' => fake()->realText(300),
            'content' => fake()->randomHtml(10),
            'cover'   => fake()->imageUrl(640, 480, 'technology' ),
            'status'  => fake()->randomElement(['publish' ,'draft']),
            'chosen'  => fake()->randomNumber(),
        ];
    }
}

