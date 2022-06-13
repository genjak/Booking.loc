<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for ($i = 1 ;$i < 10; $i++)
      {                
        $dateNow = strtotime(date("Y-m-d"));
        $randNow=rand(0,4);
        $dateCheckIn = strtotime("+".$randNow." day", $dateNow);

        $dateCheckOut = strtotime("+".($randNow + rand(1,6))." day", $dateNow);

        \DB::table('bookings')->insert([
            'idRoom' => rand(0,40),
            'dateCheckIn' =>  date("Y-m-d",$dateCheckIn),
            'dateCheckOut' => date("Y-m-d",$dateCheckOut),            
        ]);            
      }/**/
    }
}
