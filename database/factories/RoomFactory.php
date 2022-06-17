<?php

namespace Database\Factories;

use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
  protected $model = Room::class;

  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition()
  {
    return [
      'number' => $this->faker->unique()->randomNumber(2),
      'type' => $this->faker->randomElement(['1 bedroom', '2 bedroom', 'VIP', 'Superior']),
      'price' => rand(50, 100),
      'size' => rand(50, 100),
      'description' => $this->faker->text,
      'wifi' => rand(0, 1),
      'bar' => rand(0, 1),
      'restaurant' => rand(0, 1),
      'free_parking' => rand(0, 1),
      'photo' => $this->faker->randomElement([
        'rooms\June2022\Z9g2CgoFGqETYhPLJ6PU.jpeg',
        'rooms\June2022\QC2ryc7TWjlfTriR1tKR.jpeg',
        'rooms\June2022\8dVSJgom7XbZ8F1o9vs1.jpg',
        'rooms\June2022\bFRY6A54nDmym7adOjSN.jpg',
        'rooms\June2022\bFRY6A54nDmym7adOjSN.jpg'
      ]),
    ];
  }
}
