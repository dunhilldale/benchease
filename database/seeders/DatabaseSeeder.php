<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\ProjectHistory;
use App\Models\RecordedInterview;
use App\Models\ShiftDays;
use App\Models\ShiftHours;
use App\Models\UserJobs;
use App\Models\UserSkills;
use App\Models\WorkEnvironment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(1)->create();
        UserSkills::factory(10)->create();
        ProjectHistory::factory(1)->create();
        RecordedInterview::factory(2)->create();
        UserJobs::factory(1)->create();
        WorkEnvironment::factory(1)->create();
        ShiftDays::factory(1)->create();
        ShiftHours::factory(1)->create();
    }
}
