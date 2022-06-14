<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    public function all(){
      return view('rooms',[
          'rooms' => \DB::table('rooms')->SimplePaginate(15)
      ]);            
    }

    public function filter(){
      $dataCheckIn=\Request::query()['dateCheckIn']; 
      $dataCheckOut=\Request::query()['dateCheckOut']; 
      /* // example query
      SELECT * FROM rooms WHERE id NOT IN(
      SELECT idRoom
      from bookings b
      WHERE 
      ('2022-06-16' BETWEEN b.dateCheckIn AND b.dateCheckOut) or 
      ('2022-06-17' BETWEEN b.dateCheckIn AND b.dateCheckOut) OR 
      (b.dateCheckIn between '2022-06-16' and '2022-06-17') OR 
      (b.dateCheckOut between '2022-06-16' and '2022-06-17') or
      (b.dateCheckIn > '2022-06-16' AND b.dateCheckOut < '2022-06-17')
      )/**/
       
     $selectSql="select * from rooms where id NOT IN( SELECT idRoom from bookings b WHERE ('".$dataCheckIn."' BETWEEN b.dateCheckIn AND b.dateCheckOut) or ('".$dataCheckOut."' BETWEEN b.dateCheckIn AND b.dateCheckOut) OR (b.dateCheckIn between '".$dataCheckIn."' and '".$dataCheckOut."') OR (b.dateCheckOut between '".$dataCheckIn."' and '".$dataCheckOut."') or      (b.dateCheckIn > '".$dataCheckIn."' AND b.dateCheckOut < '".$dataCheckOut."') ) order by number";

      $results = \DB::select($selectSql);

      return view('rooms',[
        'rooms' => $results,
        'dataCheckIn' => $dataCheckIn,
        'dataCheckOut' => $dataCheckOut
      ]);   
    }

    public function one($id){
      return view('room',[
          'room' => \DB::table('rooms')->find($id)
      ]);      
    }
}
