@extends('users.layouts.car-master')
{{-- top_content start  --}}
@section('top_content')
<!-- Page Title Start -->
<section id="" class="section-paddings overlay">
  <div class="container">
    <div class="col-lg-12">
      <div class="section-title  text-center mb-3">
        <h2>Our Booking Car</h2>
        <span class="title-line"><i class="fa fa-home text-lg"></i></span>
      </div>
    </div>
  </div>
  </section>          <!-- Page Title End -->
  @endsection
  {{-- top-content end here --}}
  @section('content')
  <div class="container">

@foreach($car_drivers as $driver)
  @if($driver->driver->temporary==1)
    <div class="row mt-4">

      <!-- Single Car Start -->
      <div class="single-car-wrap">
       {{-- // <button class="btn btn-warning btn-sm">Booked</button> --}}
        <div class="row">
          <!-- Single Car Thumbnail -->
         

          <div class="col-lg-5 ">
            <div class="car-list-thumb car-thumb-2 p-3">
              <div class="img-hover-zoom"> 
                  {{-- relationship with carpool Car methon driver --}}
             <a href="{{ route('car_booking.details',$driver->driver->id)  }}"> <img src="{{ asset('/').$driver->driver->image }}" alt=""></a>
              </div>
          
            </div>
             {{-- <button class="btn btn-warning" style="margin-left: 400px; margin-top: : 300px;">Booked</button> --}}
          </div>
            
          <!-- Single Car Thumbnail -->
          <!-- Single Car Info -->
          <div class="col-lg-5 text-center">
            <div class="display-table">
              <div class="display-table-cell">
                <div class="car-list-info">
                  <div class="row m-0">
                    <div class="col-md-6" align="right">
                      <p  class=" "><b>Car Name: </b></p> 
                    </div>
                     <div class="col-md-6" align="left">
                      {{ $driver->driver->name }}
                    </div>
                  </div>
                  <hr>
                   <div class="row m-0">
                    <div class="col-md-6" align="right">
                      <p  class=" "><b>Car Number: </b></p> 
                    </div>
                     <div class="col-md-6" align="left">
                      {{ $driver->driver->number }}
                    </div>
                  </div>
                  <hr>
                 
                    <div class="row mb-3">
                    <div class="col-md-6" align="right">
                      <p  class=" "><b>Car Capacity: </b></p> 
                    </div>
                     <div class="col-md-6" align="left">
                      {{ $driver->driver->capacity }}
                    </div>
                  </div>
                

                  
                
                  <a href="{{route("car_booking.view" ,$driver->driver->id) }}}" class="btn btn-outline-dark ">Book It <i class="fa fa-long-arrow-right"></i></a>
                </div>
              </div>
            </div>
          </div>
          <!-- Single Car info -->
          <div class="col-md-2 text-center ">
             <div class="">
             <img src="{{ asset('/').$driver->image }}" alt="" class="p-3">
             <p class="bg-dark pr-2 text-light">{{ $driver->name }}</p><br>
             <p  class="bg-dark pr-2 text-light"><i class="fa fa-phone text-light border-right">&nbsp;&nbsp;</i>{{ $driver->contact }}</p>
            </div>
          </div>
        </div>
      </div>
      <!-- Single Car End -->
    </div>
    @endif
    @endforeach
   
  </div>
  @endsection