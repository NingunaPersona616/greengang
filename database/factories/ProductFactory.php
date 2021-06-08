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
            'product' => $this->faker->words(2, true),
            'description' => $this->faker->sentence(5),
            'unitprice' => $this->faker->randomfloat(2, 1, 9998),
            'availableunits' => $this->faker->numberBetween(0,100),
            'category_id' =>$this->faker->numberBetween(1,3),
        ];
    }
}
