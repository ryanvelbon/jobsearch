<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class JobListingFactory extends Factory
{
    protected $model = \App\Models\JobListing::class;

    public function definition(): array
    {
        $createdAt = fake()->dateTimeBetween('-1 year', 'now');

        return [
            'title' => fake()->jobTitle,
            'description' => fake()->paragraphs(3, true),
            'company_id' => \App\Models\Company::inRandomOrder()->first(),
            'salary' => round(fake()->randomFloat(2, 500, 5000) / 50) * 50,
            'closing_date' => fake()->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
            'status' => fake()->randomElement(['draft', 'published', 'expired']),
            'created_at' => $createdAt,
            'published_at' => $createdAt,
            // 'expired_at' => fake()->dateTimeBetween('now', '+1 year'),
        ];
    }
}
