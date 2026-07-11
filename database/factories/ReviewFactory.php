<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name'         => $this->faker->name(),
            'email'        => $this->faker->optional()->safeEmail(),
            'phone'        => $this->faker->phoneNumber(),
            'nationality'  => $this->faker->country(),
            'rating'       => $this->faker->numberBetween(1, 5),
            'comment'      => $this->faker->paragraph(),
            'is_approved'  => false,
            'is_featured'  => false,
        ];
    }

    public function approved(): static
    {
        return $this->state(['is_approved' => true]);
    }

    public function featured(): static
    {
        return $this->state(['is_approved' => true, 'is_featured' => true]);
    }

    public function withEmail(): static
    {
        return $this->state(['email' => $this->faker->safeEmail()]);
    }
}
