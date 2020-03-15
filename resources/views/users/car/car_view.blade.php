{{-- using bootstrap 4 version --}}
@extends('users.layouts.car-master')
{{-- top_content start  --}}
@section('top_content')
<section id="" class="paddig_image overlay">
  <div class="container">
    
  <div class="row">
    
    <div class="car_image " align="left">
        <img src=" {{asset('/').$car->image  }} " class="mt-0" alt="CPBIT" height="100" width="100">
    </div>


    <div class="text">
        <div class=" text-center section-title ">
            <h3 class="text-center text-light">{{ $car->name }}&nbsp;||&nbsp;{{ $car->number }}</h3>
         <span class="title-line text-light mr-4"><i class="fa fa-car"></i></span>
          
        </div>
    </div>
    
     <div class=" d" align="right">
        <img src="{{asset('/').$car->car->image  }}"  alt="CPBIT" height="100" width="100" >
    </div>
</div>
    
  </div>
</section>
@endsection
{{-- top-content end here --}}
@section('page-css')
<link href='https://fullcalendar.io/releases/fullcalendar/3.9.0/fullcalendar.min.css' rel='stylesheet' />
<link href='https://fullcalendar.io/releases/fullcalendar/3.9.0/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<link href="{{asset('/assets/user/assets/css/bootstrap-clockpicker.min.css')}}" rel="stylesheet">
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="col m-auto">
     
      <div class="card-body ">
        <div id='calendar' class="mt-1"></div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade mt-5" id="successModal" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" >
    <div class="modal-content">
      <div class="modal-header bg-info text-light">
        <h4 class="modal-title text-light">Car Booking</h4>
        <button type="button" class="close text-light" data-dismiss="modal">&times;</button>
        
      </div>
      <div class="modal-body">
        <span id="form_result"></span>
        <form id="sample_form"   method="post">
          <input type="hidden" name="carpool_car_id"  value="{{$car->id}}">
          <input type="hidden" name="carpool_driver_id"  value="{{$car->car->id}}">
          @csrf
         <div class="row">
           <div class="col-md-6">
            <div class="form-group mt-4 mb-3">
              <label for="eventtitle">Start Date</label>
              <input type="date" name="start" class="form-control" id="start_event">
            </div>
           </div>
           <div class="col-md-6">
             <div class="form-group mt-4 mb-3">
              <label for="eventtitle">End Date</label>
              <input type="date" name="end" class="form-control" id="end">
            </div>
           </div>
         </div>
          <div class="row mt-4">
            <div class="col-md-6">
              <div class="input-group clockpicker form-group" data-placement="left" data-align="top" data-autoclose="true">
                <input type="text" class="form-control" placeholder="now" name="startTime" id="startTime">
                <span class="input-group-addon">
                  <span ><i class="fa fa-calendar"></i></span>
                </span>
              </div>
            </div>
            <div class="col-md-6 form-group">
              <div class="input-group clockpicker" data-placement="left" data-align="top" data-autoclose="true">
                <input type="text" class="form-control" placeholder="now" name="endTime" id="endTime">
                <span class="input-group-addon">
                  <span ><i class="fa fa-calendar"></i></span>
                </span>
              </div>
            </div>
          </div>
          
          <div class="form-group">
            <label>Destination</label>
            <select class="form-control" name="destination"  onmousedown="if(this.options.length>5){this.size=5;}"  onchange='this.size=0;' onblur="this.size=0;">
              <option>Select Destination</option>
              @foreach($car_destinations as $car_destination)
                <option value="{{ $car_destination->name }}">{{ $car_destination->name }}</option>

              @endforeach
            </select>
          </div>

          
          <div class="form-group mb-3 mt-4 mb-5">
            <label for="eventtitle">Purpose</label>
            <input type="text" name="purpose" class="form-control" id="purpose" placeholder="Purpose enter here">
          </div>
          
          <div class="modal-fotter">
            <div class="row ">
              <div class="col-md-12">
                <button type="submit" id="submit" name="submit" class="btn btn-info  btn-block"><i class="fa fa-plus"></i>&nbsp;Booked</button>
                
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

{{-- modal for  --}}

<!-- Modal -->
<div class="modal fade" id="viewModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Booking Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-4">
              <input  type="text" name="" value="Car Name: " readonly="" style="border:none; font-weight: bold;">
            </div>
            <div class="col-md-8">
              <input  type="text" name="" id="car_name" readonly="" style="border:none; font-weight: bold;">
            </div>
          </div>
          <br>
           <div class="row">
            <div class="col-md-4">
              <input  type="text" name="" value="Car Number: " readonly="" style="border:none; font-weight: bold;">
            </div>
            <div class="col-md-8">
              <input  type="text" name="" id="number" readonly="" style="border:none; font-weight: bold;">
            </div>
          </div>
          <br>
           <div class="row">
            <div class="col-md-4">
              <input  type="text" name="" value="Destination: " readonly="" style="border:none; font-weight: bold;">
            </div>
            <div class="col-md-8">
              <input  type="text" name="" id="Destination" readonly="" style="border:none; font-weight: bold;">
            </div>
          </div>

          <br>
          <div class="row">
            <div class="col-md-4">
              <input  type="text" name="" value="Purpose: " readonly="" style="border:none; font-weight: bold;">
            </div>
            <div class="col-md-8">
              <input  type="text" name="" id="text" readonly="" style="border:none; font-weight: bold;">
            </div>
          </div>
          <br>
           <div class="row">
            <div class="col-md-4">
              <input  type="text" name="" value="Start: " readonly="" style="border:none; font-weight: bold;">
            </div>
            <div class="col-md-8">
              <input  type="text" name="" id="start" readonly="" style="border:none; font-weight: bold;">
            </div>
          </div>


           <br>
           <div class="row">
            <div class="col-md-4">
              <input  type="text" name="" value="End: " readonly="" style="border:none; font-weight: bold;">
            </div>
            <div class="col-md-8">
              <input  type="text" name="" id="End" readonly="" style="border:none; font-weight: bold;">
            </div>
          </div>
          

          
           
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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

var calendar=$('#calendar').fullCalendar({

header: {
left: 'prev,next today',
center: 'title',
right: 'month,basicWeek,basicDay',
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
$("#start_event").val( moment(start).format("YYYY-MM-DD"));



        // date to sting and one day subtruct
          var end = $.fullCalendar.formatDate(end,"Y-MM-DD HH:mm:ss");
           var dt = new Date(end.toString());
          dt.setDate( dt.getDate() - 0);

        // String to Date and 

        var event = new Date(dt);

        let date = JSON.stringify(event)
        date = date.slice(1,11)


        
          // console.log(dt);

     //var title = prompt("Enter Event Title " +dt);

    
       $("#end").val(date);











$("#calendar").fullCalendar("unselect");
},
selectOverlap: function(event) {
return ! event.block;
},
selectable:true,
selectHelper:true,


events: [
  @foreach($car_bookings as $car_booking)
{
  
  car_name: '{{ $car_booking->car->name }}',
  number: '{{ $car_booking->car->number }}',
  title: '{{ $car_booking->purpose }}',
  start: '{{ $car_booking->start }}',
  end:'{{ $car_booking->end  }}',
  destination:'{{ $car_booking->destination  }}',
  

  color: '#257e4a',

},
@endforeach   

@foreach($holidays as $leave)
{
 
  holiday:'{{ $leave->holiday }}',
  title: '{{ $leave->title }}',
  start: '{{ $leave->startDate }}',
  end: '{{ $leave->endDate }}',
  color: '#FF586B',




},
@endforeach   
],

dayRender: function (date, cell) {

 
  },

eventMouseover: function(calEvent, jsEvent) {
    var tooltip = '<div class="tooltipevent" style="position:absolute;z-index:10001;font-weight:bold; background:yellow; padding:10px; border-radius:10px;">' + calEvent.title + '</div>';
    var $tooltip = $(tooltip).appendTo('body');

    $(this).mouseover(function(e) {
        $(this).css('z-index', 10000);
        $tooltip.fadeIn('500');
        $tooltip.fadeTo('10', 1.9);
    }).mousemove(function(e) {
        $tooltip.css('top', e.pageY + 10);
        $tooltip.css('left', e.pageX + 20);
    });
},
eventRender: function(event, element,calEvent) {
      element.bind('dblclick', function() {

// modal hide if date is holiday
        if(event.holiday=='holiday'){
         $('#viewModel').modal("hide");
        }
        else{
         $('#viewModel').modal("show");
        }
      });
},

eventMouseout: function(calEvent, jsEvent) {
    $(this).css('z-index', 8);
    $('.tooltipevent').remove();
},
navLinks: true, // can click day/week names to navigate views
eventLimit: true, // allow "more" link when too many events

eventClick: function(calEvent, jsEvent, view,element) {
    

     // $('#viewModel').modal("show");
   
      $('#text').val(calEvent.title);
      
      $('#start').val(moment(calEvent.start).format('YYYY-MM-DD HH:mm'));

      $('#End').val(moment(calEvent.end).format('YYYY-MM-DD HH:mm')); 

      $('#Destination').val(calEvent.destination); 
      $('#car_name').val(calEvent.car_name); 
      $('#number').val(calEvent.number); 
       
 },



  dayClick: function(date, jsEvent, view) {

    $("#successModal").modal("show");

  },
});










// insert data into database by ajax id
$('#sample_form').on('submit', function(event){
event.preventDefault();

$.ajax({
url:"{{ route('car.booked') }}",
method:"POST",
data: new FormData(this),
contentType: false,
cache:false,
processData: false,
dataType:"json",
success:function(data)
{
var html = '';
if(data.errors)
{
html = '<div class="alert alert-danger">';
  
  html += '<p>' + data.errors + '</p>';
  
html += '</div>';
}
if(data.success)
{

html = '<div class="alert alert-success">' + data.success + '</div>';
calendar.fullCalendar('refetchEvents');
$('#sample_form')[0].reset();
$('#successModal').modal('hide');
 // document.location.reload();

}
$('#form_result').html(html);
}
})
});
// end insert  data from here
});
</script>
{{-- celendar view end here --}}
{{-- date picker --}}
<script type="text/javascript">
$('.clockpicker').clockpicker({ twelvehour: true, 'default': 'now',});


// dayClick: function (day){
//   $(".day-highlight").removeClass("day-highlight");
//   $(this).addClass("day-highlight");
// }
</script>
{{-- time picker end here --}}
@endsection