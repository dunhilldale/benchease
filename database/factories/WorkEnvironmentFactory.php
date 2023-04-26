<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WorkEnvironment>
 */
class WorkEnvironmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $employee = User::where('employee_id', '2022-003')->firstOrFail();
        $names = ['onsite', 'wfh', 'hybrid']; 
        $name = array_rand($names, 1);

        return [
            'user_id' => $employee->id,
            'name' => $names[$name],
        ];
    }
}
