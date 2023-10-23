<?php

namespace Modules\Product\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Product\Models\ProductFactory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
        ];
    }
}

