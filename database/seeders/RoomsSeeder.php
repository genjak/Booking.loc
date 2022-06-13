<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // заполение случаными данными - фото из папки и типами комнат... в будущем можно типы комнат брать из таблицы БД
      for ($i = 1 ;$i < 40; $i++){
        $typeRooms=['1 bedroom', '2 bedroom', 'VIP', 'Superior'];
        $ptotoSelect=['rooms\June2022\Z9g2CgoFGqETYhPLJ6PU.jpeg', 'rooms\June2022\QC2ryc7TWjlfTriR1tKR.jpeg', 'rooms\June2022\8dVSJgom7XbZ8F1o9vs1.jpg', 'rooms\June2022\bFRY6A54nDmym7adOjSN.jpg', 'rooms\June2022\bFRY6A54nDmym7adOjSN.jpg'];
        \DB::table('rooms')->insert([
            'type' => $typeRooms[array_rand($typeRooms)],
            'number' => $i,
            'price' => rand(50, 100),
            'size' => rand(50, 100),
            'description' => '',
            'wifi' => rand(0, 1),
            'bar' => rand(0, 1),
            'restaurant' => rand(0, 1),
            'free_parking' => rand(0, 1),
            'photo' => $ptotoSelect[array_rand($ptotoSelect)],/**/
        ]);            
      }/**/
      
    }
}
