<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition()
  {
    return [
      'name' => $this->faker->name(),
      'brief_description' => $this->faker->paragraph(2),
      'background' => $this->faker->sentence(),

      'dob' => $this->faker->dateTimeBetween('-18 years', '-10 years'),
      'kcpe_marks' =>  $this->faker->randomFloat(1, 250, 440),
      'high_school_name' => $this->faker->words(3, true),
      'ambition' => $this->faker->words(3, true),
      'siblings' => $this->faker->numberBetween(2, 12),
      'language' => $this->faker->word(),
      'liaison_officer' => $this->faker->name(),
      'identifier_key' => $this->faker->regexify('FK\/[0-9]{4}\/2[5-9]'),
    ];
  }
}
