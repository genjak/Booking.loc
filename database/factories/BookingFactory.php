<?php

namespace Database\Factories;

use App\Booking;
use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BookingFactory extends Factory
{
  protected $model = Booking::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $dateNow = strtotime(date("Y-m-d"));
        $randNow=rand(0,4);
        $dateCheckIn = strtotime("+".$randNow." day", $dateNow);
        $dateCheckOut = strtotime("+".($randNow + rand(1,6))." day", $dateNow);
        
        return [
              'idRoom' => $this->faker->randomElement(Room::all())['id'],
              'dateCheckIn' =>  date("Y-m-d",$dateCheckIn),
              'dateCheckOut' => date("Y-m-d",$dateCheckOut),
        ];
    }
}
