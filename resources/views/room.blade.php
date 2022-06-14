@extends('layout')

@section('title', 'Rooms Booking')

@section('content')

<div class="card p-3">

  <a href="{{ route('rooms_all') }}">Rooms</a>

  <h1>Room № {{ $room->number }}</h1>

  @if($room->photo)<img src="{{asset('storage/'.$room->photo)}}" width="600">@endif
  
  {!! $room->description !!}

  <dl class="dl-horizontal p-2">   
    <dt>Price</dt><dd>{{ $room->price }}$</dd>
    <dt>Size</dt><dd>{{ $room->size }}m2</dd>
    <dt>WiFi</dt><dd>{{ $room->wifi ? 'WiFi' : ''}}</dd>
    <dt>Bar</dt><dd>{{ $room->bar ? 'Bar'  : ''}}</dd>
    <dt>Restaurant</dt><dd>{{ $room->restaurant ? 'Resaurant'  : ''}}</dd>
    <dt>Free parking</dt><dd>{{ $room->free_parking ? 'Free Parking' : ''}}</dd>
  </dl>
</div>

@endsection