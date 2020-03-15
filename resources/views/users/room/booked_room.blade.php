{{-- using bootstrap 4 version --}}
@extends('users.layouts.room-master')
{{-- top_content start  --}}
@section('top_content')
<section id="" class="section-paddings overlay">
  <div class="container">
    
    <div class="container">
      <div class="row">
        <!-- Page Title Start -->
        <div class="col-lg-12">
          <div class="row">
            <div class="col-md-3">
              <img src="{{asset('/').$room->image  }}" class="mb-4 img-thumbnail" alt="JSOFT" height="200" width="200">
            </div>
            <div class="col-md-6">
              <div class="section-title  text-center mb-3">
                <h2>Our Booking Room</h2>
                <span class="title-line"><i class="fa fa-home"></i></span>
              </div>
            </div>
            <div class="col-md-3">
              
            </div>
          </div>
          
        </div>
        <!-- Page Title End -->
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
      <div class=" mt-2  text-center">
        <h2 class="text-dark">Room Booking Here</h2>
      </div>
      <div class="card-body ">
        <div id='calendar' class="mt-5"></div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade mt-5" id="successModal" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" >
    <div class="modal-content">
      <div class="modal-header bg-info text-light">
        <h4 class="modal-title">Meeting Room Booking</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
      <div class="modal-body">
        <span id="form_result"></span>
        <form id="sample_form"   method="post">
          <input type="hidden" name="id"  value="{{$room->id}}">
          @csrf
          <div class="form-group mt-4 mb-3">
            <label for="eventtitle">Start Date</label>
            <input type="date" name="start_event" class="form-control" id="start_event">
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
          
          
          <div class="form-group mb-3 mt-4 mb-5">
            <label for="eventtitle">Purpose</label>
            <input type="text" name="purpose" class="form-control" id="purpose" placeholder="Purpose enter here">
          </div>
          
          <div class="modal-fotter">
            <div class="row ">
              <div class="col-md-12">
                <button type="submit" id="submit" name="submit" class="btn btn-info  btn-block"><i class="fa fa-plus"></i>&nbsp;Submit</button>
                
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
              <input  type="number" name="" id="End" readonly="" style="border:none; font-weight: bold;">
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

$('#calendar').fullCalendar({

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

$("#calendar").fullCalendar("unselect");
},
selectOverlap: function(event) {
return ! event.block;
},
selectable:true,
selectHelper:true,


events: [
@foreach($rooms as $room1)
{
  title: '{{ $room1->purpose }}',
  start: '{{ $room1->start }}',
  hour:{{ $room1->hours  }},

  color: '#257e4a',

},
@endforeach
@foreach($leaves as $leave)
{
  id:'{{ $leave->id }}',
  title: '{{ $leave->title }}',
  start: '{{ $leave->startDate }}',
  end: '{{ $leave->endDate }}',
  color: '#FF586B',
},
@endforeach

],


eventMouseover: function(calEvent, jsEvent) {
    var tooltip = '<div class="tooltipevent" style="position:absolute;z-index:10001;font-weight:bold; ">' + calEvent.title + '</div>';
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
eventRender: function(event, element) {
      element.bind('dblclick', function() {
         alert('double click!');
      });
   },

eventMouseout: function(calEvent, jsEvent) {
    $(this).css('z-index', 8);
    $('.tooltipevent').remove();
},
navLinks: true, // can click day/week names to navigate views
eventLimit: true, // allow "more" link when too many events

eventClick: function(calEvent, jsEvent, view) {

   
      
       $('#viewModel').modal("show");
      $('#text').val(calEvent.title);
      
      $('#start').val(moment(calEvent.start).format('YYYY-MM-DD'));

      $('#End').val(calEvent.hour); 
       
 },



dayClick: function(date, jsEvent, view) {
$("#successModal").modal("show");
},
});










// insert data into database by ajax id
$('#sample_form').on('submit', function(event){
event.preventDefault();

$.ajax({
url:"{{ route('booked') }}",
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
$('#sample_form')[0].reset();
$('#successModal').modal('hide');
document.location.reload();
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