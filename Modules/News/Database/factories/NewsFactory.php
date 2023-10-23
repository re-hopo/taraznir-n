<?php

namespace Modules\News\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\News\Models\News;

class NewsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = News::class;

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
            'status'  => fake()->randomElement(['publish' ,'draft']),
            'chosen'  => fake()->randomNumber(),
        ];
    }
}

