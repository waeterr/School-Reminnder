<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Classroom;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Assignment>
 */
class AssignmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'classroom_id' => Classroom::factory(),
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'created_by' => User::factory(),
            'due_date' => $this->faker->dateTimeBetween('+1 days', '+30 days'),
            'attachments' => null,
        ];
    }
}
