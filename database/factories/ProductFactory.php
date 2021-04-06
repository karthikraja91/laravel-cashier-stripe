<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'         => $this->faker->name,
            'slug'         => $this->faker->slug,
            'price'        => $this->faker->numberBetween($min = 100, $max = 5000),
            'description'  => $this->faker->paragraph
        ];
    }
}
