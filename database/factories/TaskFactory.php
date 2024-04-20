<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\odel=Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence,
            'description' => fake()->paragraph,
            'notes' => fake()->paragraph(7, true),
            'completed' => fake()->boolean,
            'due_date' => fake()->boolean ? Carbon::now()->addDays(fake()->numberBetween(1, 14)) : null,
        ];
    }
}
