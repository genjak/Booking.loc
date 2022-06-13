@extends('layout')

@section('title', 'Rooms Booking')

@section('content')

<div class="rooms">
  @if (count($rooms) > 0)
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
  {{ $rooms->links() }}
</div>

  @else
    <h2>all is booked</h2>
  @endif
</div>

@endsection