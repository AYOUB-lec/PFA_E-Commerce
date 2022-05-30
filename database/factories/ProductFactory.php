<?php

namespace Database\Factories;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->sentence();
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            "description" => $this->faker->paragraph(),
            "price" => $this->faker->numberBetween($min = 100 , $max = 900),
            "old_price" => $this->faker->numberBetween($min = 100 , $max = 900),
            "inStock" => $this->faker->numberBetween($min = 1 , $max = 10),
            "image" => $this->faker->imageUrl($width = 640 , $height = 480),
            "category_id" => $this->faker->numberBetween($min = 31 , $max = 40),
        ];
    }
}
