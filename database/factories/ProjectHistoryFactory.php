<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProjectHistory>
 */
class ProjectHistoryFactory extends Factory
{

    protected $model = '\App\Models\ProjectHistory';

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $employee = User::where('employee_id', '2022-003')->firstOrFail();

        return [
            'user_id' => $employee->id,
            'project_name' => fake()->userName(),
            'client_name' => fake()->company(),
            'description' => fake()->sentence(),
            'start_date' => fake()->dateTimeBetween('-1 years', 'now', 'Asia/Manila'),
            'end_date' => fake()->dateTimeBetween('0 years', 'now', 'Asia/Manila'),
        ];
    }
}
