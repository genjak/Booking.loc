<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Booking;

class RoomController extends Controller
{
    public function all(){
      return view('rooms',[
          'rooms' => \DB::table('rooms')->paginate(15)
      ]);            
    }

    public function filter(){
      $dataCheckIn=\Request::query()['dateCheckIn']; 
      $dataCheckOut=\Request::query()['dateCheckOut']; 
      
      $results = Room::getFilterBooking($dataCheckIn, $dataCheckOut);

      return view('rooms',[
        'rooms' => $results,
        'dataCheckIn' => $dataCheckIn,
        'dataCheckOut' => $dataCheckOut
      ]);   
    }

    public function one($id){
      return view('room',[
          'room' => \DB::table('rooms')->find($id),
          'info' => \Session::get('info')
      ]);      
    }

    public function booking(Request $request){         
      $valid = $request->validate([        
        'name' => 'required',
        'dateCheckIn' => 'required',
        'dateCheckOut' => 'required',
        'phone' => 'required',
        'email' => 'required',
        'gouests' => 'required',
      ]);

      $idRoom = $request->input('idroom');
      $booking =new Booking();
      $booking->idRoom=$idRoom;
      $booking->name=$request->input('name');
      $booking->dateCheckIn=$request->input('dateCheckIn');
      $booking->dateCheckOut=$request->input('dateCheckOut');
      $booking->goests_count=$request->input('gouests');
      $booking->phone=$request->input('phone');
      $booking->email=$request->input('email');

      $booking->save();

      return redirect()->route('room',['id' => $idRoom])->with(['info'=> 'Room Booked!!!']);
    }    
}
