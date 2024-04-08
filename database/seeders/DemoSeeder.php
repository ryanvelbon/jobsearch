<?php

namespace Database\Seeders;

use App\Models\Candidate;
use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DemoSeeder extends Seeder
{
    public function run(): void
    {
        Company::factory(5)->create();

        Candidate::factory(100)->create();
    }
}
