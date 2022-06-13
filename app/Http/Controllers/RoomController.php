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

    public function filter(Request $request){

      $dataCheckIn=$_GET['dateCheckIn'];// это костыль я знаю...
      $dataCheckOut=$_GET['dateCheckOut'];// это костыль я знаю...

      $selectSql=" bookings b, rooms r WHERE '".$dataCheckIn."' NOT BETWEEN b.dateCheckIn AND b.dateCheckOut and '".$dataCheckOut."' NOT BETWEEN b.dateCheckIn AND b.dateCheckOut and b.dateCheckIn not between '".$dataCheckIn."' and '".$dataCheckOut."' AND b.dateCheckOut not between '".$dataCheckIn."' and '".$dataCheckOut."'  AND b.idRoom=r.id";
//dd($selectSql);
      $results = \DB::table(\DB::raw($selectSql))->SimplePaginate(15);

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
