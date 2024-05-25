<?php

namespace Database\Factories;

use App\Enums\ListingStatus;
use App\Enums\WorkType;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobListingFactory extends Factory
{
    protected $model = \App\Models\JobListing::class;

    public function definition(): array
    {
        $createdAt = fake()->dateTimeBetween('-1 year', 'now');

        return [
            'title' => fake()->jobTitle,
            'description' => $this->generateDescription(),
            'work_type' => fake()->randomElement(WorkType::cases()),
            'company_id' => \App\Models\Company::inRandomOrder()->first(),
            'salary' => round(fake()->randomFloat(2, 500, 5000) / 50) * 50,
            'closing_date' => fake()->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
            'status' => fake()->randomElement(ListingStatus::cases()),
            'created_at' => $createdAt,
            'published_at' => $createdAt,
            // 'expired_at' => fake()->dateTimeBetween('now', '+1 year'),
        ];
    }

    private function generateDescription(): string
    {
        $html = "";
        $html .= "<p><strong>" . fake()->paragraph() . "</strong></p>";
        $html .= "<p>" . fake()->paragraph() . "</p>";

        $sections = ['Responsibilities', 'Qualifications & Skills', 'Work Experience', 'Key Capabilities', 'Benefits'];

        shuffle($sections);

        foreach (array_slice($sections, 0, 3) as $section) {
            $html .= "<h3>$section:</h3>";
            $html .= "<ul>";
            for ($i=0; $i < rand(3, 7) ; $i++) {
                $html .= "<li>" . fake()->sentence() . "</li>";
            }
            $html .= "</ul>";
        }

        $html .= "<p>" . fake()->paragraph() . "</p>";

        return $html;
    }
}
