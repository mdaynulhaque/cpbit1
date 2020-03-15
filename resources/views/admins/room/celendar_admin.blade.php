@extends('admins.layouts.room-master')

@section('page-css')
<link href='https://fullcalendar.io/releases/fullcalendar/3.9.0/fullcalendar.min.css' rel='stylesheet' />
<link href='https://fullcalendar.io/releases/fullcalendar/3.9.0/fullcalendar.print.min.css' rel='stylesheet' media='print' />
 <link href="{{asset('/assets/user/assets/css/bootstrap-clockpicker.min.css')}}" rel="stylesheet">



@endsection

@section('content')
  <div class="container mt-4">
    <div class="row ">
      <div class="col card">
        <div class="card-header  text-center mt-2">
          <h2>All Room Booking Report's </h2>
        </div>
        <div class="card-body">
          <div id='calendar' class="mt-5"></div>
        </div>

      </div>
    </div>
  </div>


@endsection

@section('page-js')

<script src='https://fullcalendar.io/releases/fullcalendar/3.9.0/lib/moment.min.js'>
</script>
<script src='https://fullcalendar.io/releases/fullcalendar/3.9.0/fullcalendar.min.js'>
</script>
<script src="{{asset('/assets/user/assets/css/bootstrap-clockpicker.min.js')}}"></script>

{{-- celendar view start here --}}
<script>
  $(document).ready(function() {
   
    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,basicWeek,basicDay'
      },
 
   select: function (start, end, jsEvent, view) {
      

        $("#calendar").fullCalendar('addEventSource', [
        {
            start: start,
            end: end,
            block: true,
            allDay: false,
        },

       ]);
       
    },
    selectOverlap: function(event) {
        return ! event.block;
    },

    events: [
         @foreach($rooms as $room1)
          {
          title: '{{ $room1->purpose }}',
          start: '{{ $room1->start ,$room1->hours }}',
          color: '#257e4a'
        },
        @endforeach

         @foreach($leaves as $leave)
          {
          title: '{{ $leave->title }}',
          start: '{{ $leave->startDate }}',
          end: '{{ $leave->endDate }}',
          color: 'red',
        },
        @endforeach
       
      ],

  

    });

  });
</script>






@endsection