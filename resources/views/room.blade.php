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

<div class="card p-3 col-5 mt-5 mb-5">
  <h3>Booking form</h3>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form class="form_room" method="post" action="/rooms/room/booking">
    @csrf
    <input type="hidden" name="idroom" value="{{ $room->id }}">
    <input type="text" name="name" class="form-control" placeholder="Name" required value="Test name booking"><Br>
    Check In <input type="date" name="dateCheckIn" class="form-control" required  value="2022-06-14"><br>    
    Check Out <input type="date" name="dateCheckOut" class="form-control" required value="2022-06-17"><br>
    <select name="gouests" placeholder="Guests count" class="form-control" required>
      <option disabled selected>Guests count</option>
      <option value="1" selected>1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
      <option value="9">9</option>
      <option value="10">10</option>
      <option value="11">11</option>
      <option value="12">12</option>
      <option value="13">13</option>
      <option value="14">14</option>
      <option value="15">15</option>
    </select><Br>
    <input type="tel" name="phone" class="form-control phone" placeholder="Phone" value="555-55-55"><Br>
    <input type="email" name="email" class="form-control" placeholder="Email" required value="test@email.com"><Br>
    <button type="submit" class="btn  btn-primary">Send</button>
  </form>
</div>

@endsection