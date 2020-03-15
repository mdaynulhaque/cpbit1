@extends('admins.layouts.room-master')

@section('page-css')
<link rel="stylesheet" type="text/css" href="{{ asset('/assets/admin/app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
@endsection

@section('content')
<!-- File export table -->
<section id="file-export">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Report All</h4>
          
        </div>
        <div class="card-content ">
          <div class="card-body card-dashboard table-responsive">
            <table class="table table-striped table-bordered file-export">
              <thead>
                <tr>
                  <th>Room Name</th>
                  <th>Booking</th>
                  <th>Purpose</th>
                  <th>Hours</th>
                  <th>User Name</th>
                  <th>Department</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                @foreach($reports as $report)
                	<tr>
                		<th>{{ $report->room->name }}</th>
                		<th>{{ $report->start }}</th>
                		<th>{{ $report->purpose }}</th>
                		<th>{{ $report->hours }}</th>
                		<th>Momin</th>
                		<th>IT</th>
                		<th>Ok</th>
                	</tr>

                @endforeach
              </tbody>
              <tfoot>
                <tr>
                 <th>Room Name</th>
                  <th>Booking</th>
                  <th>Purpose</th>
                  <th>Hours</th>
                  <th>User Name</th>
                  <th>Department</th>
                  <th>Status</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


@endsection

@section('page-js')

 <script src="{{ asset('assets/admin/app-assets/vendors/js/datatable/datatables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/app-assets/vendors/js/datatable/dataTables.buttons.min.js') }}" type="text/javascript"></script>

    <script src="{{ asset('assets/admin/app-assets/vendors/js/datatable/buttons.flash.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/app-assets/vendors/js/datatable/jszip.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/app-assets/vendors/js/datatable/pdfmake.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/app-assets/vendors/js/datatable/vfs_fonts.js') }}" type="text/javascript"></script>

    <script src="{{ asset('assets/admin/app-assets/vendors/js/datatable/buttons.html5.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/app-assets/vendors/js/datatable/buttons.print.min.js') }}" type="text/javascript"></script>

  <script src="{{ asset('assets/admin/app-assets/js/data-tables/datatable-advanced.js') }}" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->

@endsection
