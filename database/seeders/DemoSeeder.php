<?php

namespace Database\Seeders;

use App\Models\Candidate;
use App\Models\Company;
use App\Models\JobListing;
use App\Models\User;
use Spatie\Tags\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DemoSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create(['email' => 'admin@admin.com']);

        $this->call([
            TagSeeder::class,
        ]);

        $companies = Company::factory(20)->create();

        $listings = JobListing::factory(100)->create();

        $allSkills = Tag::whereType('skill')->get();

        foreach ($listings as $listing) {
            $nSkills = rand(3,7);
            $someSkills = $allSkills->random($nSkills)->pluck('name')->toArray();
            $listing->syncTagsWithType($someSkills, 'skill');
        }

        $candidates = Candidate::factory(100)->create();
    }
}
