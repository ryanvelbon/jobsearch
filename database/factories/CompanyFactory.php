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
            'name' => $this->faker->company(),
            'description' => $this->faker->paragraph(),
            'website' => $this->faker->url(),
            'email' => $this->faker->companyEmail(),
            'phone' => $this->faker->phoneNumber(),
            'logo' => null,
            'industry' => $this->faker->word(),
            'hq_address' => $this->faker->address(),
            'size' => $this->faker->numberBetween(1, 5),
            'founded_year' => $this->faker->year(),
            'revenue' => $this->faker->numberBetween(100000, 100000000),
        ];
    }
}
