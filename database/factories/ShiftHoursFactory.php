<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ShiftHours>
 */
class ShiftHoursFactory extends Factory
{
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
            'shift_start' => '6 AM',
            'shift_end' => '3 PM',
        ];
    }
}
