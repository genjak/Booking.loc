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

    public function one($id){
      return view('room',[
          'room' => \DB::table('rooms')->find($id)
      ]);      
    }
}
