@extends('users.layouts.car-master')
@section('top_content')
<!-- Page Title Start -->
<section id="" class="section-paddings overlay">
	<div class="container">
		<div class="col-lg-12">
			<div class="section-title  text-center mb-3">
				<h2>Our Booking Car</h2>
				<span class="title-line"><i class="fa fa-car"></i></span>
			</div>
		</div>
	</div>
</section>
<!-- Page Title End -->
@endsection
{{-- top-content end here --}}
@section('content')
<!--== Car List Area Start ==-->
<section id="car-list-area" class="mt-3 mb-3">
	<div class="container">
		<div class="row ">
			<!-- Car List Content Start -->
			<div class="col-lg-8">
				<div class="">
				
					<h2 class="text-uppercase d-inline-block pl-3">{{ $car->name }} </h2>
					<h2 class="text-uppercase d-inline-block float-right pl-3">{{ $car->number }} </h2>
					<hr class="bg-warning">
					
					<div class="car-preview-crousel card card-body p-1">
						<div class="single-car-preview">
							<img src="{{asset('/').$car->image  }}" alt="JSOFT">
						</div>
						<div class="single-car-preview">
							<img src="{{asset('/').$car->image2  }}" alt="JSOFT">
						</div>
						<div class="single-car-preview">
							<img src="{{asset('/').$car->image3  }}" alt="JSOFT">
						</div>
					</div>
					<h2 class="mt-4 bg-info p-2 text-center"> Additional Info.</h2>
				</div>
			</div>
			
			
			<!-- Car List Content End -->
			<div class="col-md-4 mt-2">
				<div class="card">
					<div class="card-header bg-info">
						car Update Information
					</div>
					<div class="card-body ">
						<p><b>Reg Date:</b>{{ $car->created_at }}</p>
						<p><b>Last Update:</b>{{ $car->updated_at }}</p>
					</div>
				</div>
				<br><br>
				<div class="card">
					<div class="card-header bg-info">
						car Information
					</div>
					<div class="card-body ">
						<table class="table table-bordered">
							<tr>
								<th>Aircondition</th> <th><button class="btn btn-info btn-sm"><i class="fa fa-check"></i></button></th>
							</tr>
							<tr>
								@if($car->status ==1)
								<th>Auto Power Door Lock</th> <th><button class="btn btn-info btn-sm"><i class="fa fa-check"></i></button></th>
								@else
								<th>Auto Power Door Lock</th> <th><button class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button></th>
								@endif
							</tr>
							<tr>
								<th>Auto GearBox</th> <th><button class="btn btn-info btn-sm"><i class="fa fa-check"></button></th>
							</tr>
							<tr>
								<th>CD/DVD Player</th> <th><button class="btn btn-info btn-sm"><i class="fa fa-check"></i></button></th>
							</tr>
							<tr>
								<th>CNG/Petrol</th> <th><button class="btn btn-info btn-sm"><i class="fa fa-check"></i></button></th>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--== Car List Area End ==-->
@endsection