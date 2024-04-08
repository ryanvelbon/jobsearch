<?php

namespace Database\Seeders;

use App\Models\Candidate;
use App\Models\Company;
use App\Models\JobListing;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DemoSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create(['email' => 'admin@admin.com']);

        Company::factory(20)->create();

        JobListing::factory(100)->create();

        Candidate::factory(100)->create();
    }
}
