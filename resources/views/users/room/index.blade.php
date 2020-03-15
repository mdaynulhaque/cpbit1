@extends('users.layouts.room-master')


{{-- top_content start  --}}
@section('top_content')
<!-- Page Title Start -->
<section id="" class="section-paddings overlay">
  <div class="container">
      <div class="col-lg-12">
         <div class="section-title  text-center mb-3">
            <h2>Our Booking Room</h2>
           <span class="title-line"><i class="fa fa-home text-lg"></i></span>
        </div>
      </div>
    </div>
</section>          <!-- Page Title End -->
@endsection
{{-- top-content end here --}}


@section('content')
<div class="container">
  <div class="row">
  @foreach($rooms as $room)
  @if($room->status ==1)
  <div class="col-lg-6 col-md-6">
    <div class="single-car-wrap mt-4 mb-3">
      <div class="car-list-thumb car-thumb-1"><a href="{{ route('booking.details', $room->id) }}"> <img src="{{asset('').$room->image}}" height="100" ></a></div>
      <div class="car-list-info without-bar">
        <h2 class="text-center mt-5">{{$room->name}}</h2>
        <ul class="car-info-list">
          <li>Room Capacity</li>
          <li>{{$room->capacity}}&nbsp; Person</li>
        </ul>
        <div align="center"><a href="{{ route('booked.room', $room->id) }}" class="rent-btn">Book It</a></div>
      </div>
    </div>
  </div>
  @endif
  @endforeach
</div>
</div>
@endsection