<?php

namespace Database\Factories;

use App\Enums\AccountType;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(['account_type' => AccountType::Company]),
            'name' => fake()->company(),
            'description' => fake()->paragraph(),
            'website' => fake()->url(),
            'email' => fake()->companyEmail(),
            'phone' => fake()->phoneNumber(),
            'logo' => null,
            'industry' => fake()->word(),
            'hq_address' => fake()->address(),
            'size' => fake()->numberBetween(1, 5),
            'founded_year' => fake()->year(),
            'revenue' => fake()->numberBetween(100000, 100000000),
        ];
    }
}
