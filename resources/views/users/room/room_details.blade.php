@extends('users.layouts.room-master')
@section('top_content')
<!-- Page Title Start -->
<section id="" class="section-paddings overlay">
	<div class="container">
		<div class="col-lg-12">
			<div class="section-title  text-center mb-3">
				<h2>Our Booking Room</h2>
				<span class="title-line"><i class="fa fa-home"></i></span>
			</div>
		</div>
	</div>
</section>
<!-- Page Title End -->
@endsection
{{-- top-content end here --}}
@section('content')
<!--== Car List Area Start ==-->
<section id="car-list-area" class="mt-3">
	<div class="container">
		<div class="row ">
			<!-- Car List Content Start -->
			<div class="col-lg-8">
				<div class="car-details-content">
					<h2 class="">{{ $room->name }} </h2>
					<div class="car-preview-crousel">
						<div class="single-car-preview">
							<img src="{{asset('/').$room->image  }}" alt="JSOFT">
						</div>
						<div class="single-car-preview">
							<img src="{{asset('/').$room->image2  }}" alt="JSOFT">
						</div>
						<div class="single-car-preview">
							<img src="{{asset('/').$room->image3  }}" alt="JSOFT">
						</div>
					</div>
				</div>
			</div>
			
			
			<!-- Car List Content End -->
			<div class="col-md-4 mt-5">
				<div class="card">
					<div class="card-header bg-info">
						Room Update Information
					</div>
					<div class="card-body ">
						<p><b>Reg Date:</b>{{ $room->created_at }}</p>
						<p><b>Last Update:</b>{{ $room->updated_at }}</p>
					</div>
				</div>
				<br><br>
				<div class="card">
					<div class="card-header bg-info">
						Room Information
					</div>
					<div class="card-body ">
						<table class="table table-bordered">
							<tr>
								<th>Aircondition</th> <th><button class="btn btn-info btn-sm"><i class="fa fa-check"></i></button></th>
							</tr>
							<tr>
								@if($room->projector ==1)
								<th>Projector</th> <th><button class="btn btn-info btn-sm"><i class="fa fa-check"></i></button></th>
								@else
								<th>Projector</th> <th><button class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button></th>
								@endif
							</tr>
							<tr>
								<th>Capacity</th> <th><button class="btn btn-info btn-sm">{{ $room->capacity }}</button></th>
							</tr>
						</table>
					</div>
				</div>
			</div>>
		</div>
	</div>
</section>
<!--== Car List Area End ==-->
@endsection