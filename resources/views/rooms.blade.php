@extends('layout')

@section('title', 'Rooms Booking')

@section('content')

 
  <form method="get" action="{{ route('rooms') }}">
    <div class="row p-4">
      <div class="col-2">
        <label for="inputDate">Check-in date</label>
        <input type="date" name="dateCheckIn" class="form-control" required value="{{ !empty($dataCheckIn) ? $dataCheckIn : '' }}">
      </div>
      <div class="col-2">
        <label for="inputDate">Check-out date</label>
        <input type="date" name="dateCheckOut" class="form-control" required value="{{ !empty($dataCheckOut) ? $dataCheckOut : '' }}">
      </div>
      <button class="col-1 btn btn-primary">Search</button>
    </div>
  </form>
 

<div class="rooms">
  @if (!empty($rooms))
<table class="table table-hover table-striped">
  <tr>
    <th>Room №</th>
    <th>Price</th>
    <th>Size</th>
    <th>WiFi</th>
    <th>Bar</th>
    <th>Restaurant</th>
    <th>Free Parking</th>
    <th>Photo</th>
    <th></th>
  </tr>
	@foreach($rooms as $room)
	<tr>
    <td><a href="{{ route('room', [$room->id]) }}">№ {{ $room->number }}</a></td>
    <td>{{ $room->price }}$</td>
    <td>{{ $room->size }}m2</td>
    <td>{{ $room->wifi ? 'WiFi' : ''}}</td>
    <td>{{ $room->bar ? 'Bar'  : ''}}</td>
    <td>{{ $room->restaurant ? 'Resaurant'  : ''}}</td>
    <td>{{ $room->free_parking ? 'Free Parking' : ''}}</td>
    <td>@if($room->photo)<img src="{{asset('storage/'.$room->photo)}}" width="200">@endif</td>
    <td><a href="{{ route('room', [$room->id]) }}">Room № {{ $room->number }}</a></td>
  </tr>
	@endforeach
</table>

<div class="text-center p-4">
   @if(!is_array($rooms)) 
   {{ $rooms->links() }}
   @endif
</div>

  @else
    <h2>all is booked</h2>
  @endif
</div>

@endsection