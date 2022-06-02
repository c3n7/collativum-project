<?php

namespace Database\Factories;

use App\Models\ReportCard;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubjectGrades>
 */
class SubjectGradesFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition()
  {
    return [
      'report_card_id' => $this->faker->randomElement(ReportCard::all()->pluck("id")->toArray()),
      'mark' => $this->faker->numberBetween(60, 95),
      'grade' => $this->faker->randomElement(["A", "A-", "B+", "B", "B-", "C+"]),
    ];
  }
}
