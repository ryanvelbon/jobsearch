<?php

namespace Database\Factories;

use App\Enums\AccountType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CandidateFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory()->create(['account_type' => AccountType::Candidate]),
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'dob' => fake()->dateTimeBetween('-50 years', '-18 years')->format('Y-m-d'),
            'sex' => rand(1,10) > 5 ? 'm' : 'f',
            'bio' => fake()->paragraph(),
        ];
    }
}
