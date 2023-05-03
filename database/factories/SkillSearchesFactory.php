<?php

namespace Database\Factories;

use App\Models\Skills;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SkillSearches>
 */
class SkillSearchesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $array_skills = [];
        $skills = Skills::where('approved', true)->get();
        foreach ($skills as $skill) {
            array_push($array_skills, $skill->title);
        }

        return [
            'title' => $array_skills[array_rand($array_skills, 1)],
        ];
    }
}
