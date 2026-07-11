<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class HerbFactory extends Factory
{
    public function definition(): array
    {
        $name = $this->faker->unique()->word();

        return [
            'name_en'        => $name,
            'name_ar'        => $this->faker->word(),
            'slug'           => Str::slug($name . '-' . $this->faker->unique()->numberBetween(1, 99999)),
            'description_en' => $this->faker->paragraph(),
            'description_ar' => $this->faker->paragraph(),
            'benefits_en'    => $this->faker->paragraph(),
            'benefits_ar'    => $this->faker->paragraph(),
            'usage_en'       => $this->faker->paragraph(),
            'usage_ar'       => $this->faker->paragraph(),
            'image'          => 'default-herb.jpg',
            'category'       => $this->faker->randomElement(['herbs', 'spices', 'oils', 'flowers']),
            'is_active'      => true,
            'sort_order'     => $this->faker->numberBetween(0, 100),
        ];
    }

    public function inactive(): static
    {
        return $this->state(['is_active' => false]);
    }

    public function inCategory(string $category): static
    {
        return $this->state(['category' => $category]);
    }
}
