<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserSkills>
 */
class UserSkillsFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $employee = User::where('employee_id', '2022-003')->firstOrFail();
        $categories = ['primary', 'secondary', 'others']; 
        $skills = DB::table('skills')->get('id')->all();

        $skill = array_rand($skills, 1);
        $category = array_rand($categories, 1);

        return [
            'user_id' => $employee->id,
            'skill_id' => $skills[$skill]->id,
            'category' => $categories[$category],
        ];
    }
}
