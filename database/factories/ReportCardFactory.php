<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReportCard>
 */
class ReportCardFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition()
  {
    return [
      'student_id' => $this->faker->randomElement(Student::all()->pluck("id")->toArray()),
      'teachers_comment' => $this->faker->paragraph(2),
      'term' => $this->faker->numberBetween(1, 3),
      'year' => $this->faker->numberBetween(2015, now()->year),
    ];
  }
}
