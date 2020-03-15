@extends('admins.layouts.car-master')

@section('page-css')

  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
 

@endsection




 @section('content')
<!-- File export table -->
<section id="file-export">
  <div class="row">
    <div class="col-12">
      <div class="card">
         <form id="frm-example" method="get">
        <div class="card-header">
         <div class="row">
           <div class="col-md-6">
             <h4 class="">ALL DESTINATION INFORMATION  </h4>
           </div>
          
           <div class="col-md-6">
             <div align="right">
            <button type="button" name="create_record" id="create_record" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>Add Destination</button>
           </div>
           </div>
         </div>

        </div>
          <div class="card-body card-dashboard table-responsive">
            <div class="table-responsive">
              <div class="card-content ">
          
           <br />
        
              <table class="table table-bordered table-striped text-center" id="user_table">
                <thead>
                  <tr>
                    <th > Destination Name</th>
                    <th >Action</th>
                  </tr>
                </thead>
               
              </table>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- File export table -->








{{-- Modal start here --}}
<div id="formModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog ">
  <div class="modal-content">
     <form  id="sample_form" class="form-horizontal" method="post" enctype="multipart/form-data">
          @csrf
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Destination Insert</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <div class="modal-body p-3">
         <span id="form_result"></span>
        

          <input type="hidden" name="updateId" id="updateId">
         
                 <div class="row">
                     <div class="col-md-12">
                            <div class="form-group">
                                <label>Destination Name</label>
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Enter Driver Name" required="required">
                                <span id="error_value"></span>
                            </div>
                    </div>
                   </div>
         
        </div>
        <div class="modal-fotter p-2">
         <div class="row">
           <div class="col">
              <div class="form-group">
              <input type="hidden" name="action" id="action" />
              <input type="hidden" name="hidden_id" id="hidden_id" />
              <input type="submit" name="action_button" id="action_button" class="btn btn-primary btn-block  " value="Add" />
             </div>
           </div>
         </div>
        </div>
         </form>
     </div>
    
    </div>
</div>


{{-- delete file from data base  --}}
<div id="confirmModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header bg-danger">
            <h4 class="text-left ">Permanently Delete</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
            <div class="modal-body">
                <h4 align="center" style="margin:0;">Are you sure you want to remove this data?</h4>
            </div>
            <div class="modal-footer">
             <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>






@endsection




@section('page-js')
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>


 <script src="{{ asset('/datatables_js/s.js') }}" ></script>
 <script src="{{ asset('assets/admin/app-assets/js/components-modal.min.js') }}" ></script>


<script>

$(document).ready(function(){

  // Show data in page
   var table= $('#user_table').DataTable({
    processing: true,
    "language": {
            processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '},
    serverSide: true,
     stateSave: true,
    ajax:{
    url: "{{ route('destination.index') }}",
    },
      columns:[
      
        {
        data: 'name',
        name: 'name',
        },
        
       
        {
        data: 'action',
        name: 'action',
        orderable: false
        }
        ],
       
  });


// insert button id here
$('#create_record').click(function(){
  $('.modal-title').text("Add New Destination");
     $('#action_button').val("Add");
     $('#action').val("Add");
     $('#formModal').modal('show');
 });
// end  button id here



// insert data into database by ajax id

 $('#sample_form').on('submit', function(event){
  event.preventDefault();
  if($('#action').val() == 'Add')
  {
   $.ajax({
    url:"{{ route('destination.store') }}",
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
      for(var count = 0; count < data.errors.length; count++)
      {
       html += '<p>' + data.errors[count] + '</p>';
      }
      html += '</div>';
     }
     if(data.success)
     {
      html = '<div class="alert alert-success">' + data.success + '</div>';
      $('#sample_form')[0].reset();
      $('#formModal').modal('hide');
      $('#user_table').DataTable().ajax.reload();
     }
     $('#form_result').html(html);
    }
   })
  }

//insert data end here  



// edit data update start from here
  if($('#action').val() == "Edit")
     
  {
     
   $.ajax({
    url:"/admin_car_destination/update",
    method:"POST",
    data:new FormData(this),
    contentType: false,
    cache: false,
    processData: false,
    dataType:"json",
    success:function(data)
    {
     var html = '';
     if(data.errors)
     {
      html = '<div class="alert alert-danger">';
      for(var count = 0; count < data.errors.length; count++)
      {
       html += '<p>' + data.errors[count] + '</p>';
      }
      html += '</div>';
     }
     if(data.success)
     {
      html = '<div class="alert alert-success">' + data.success + '</div>';

      $('#sample_form')[0].reset();
      $('#formModal').modal('hide');
      $('#user_table').DataTable().ajax.reload();
     }
     $('#form_result').html(html);
    }
   });
  }
 });

 // end update  data from here












//start edit modal from here
$(document).on('click', '.edit', function(){
 id = $(this).attr('id');
  $('#form_result').html('');
  $.ajax({
    url:"/admin_car_destination/edit/"+id,
   dataType:"json",
   success:function(data){

     $('#updateId').val(data.id);

    $('#name').val(data.name);


     $('#hidden_id').val(data.id);
     $('.modal-title').text("Edit New Record");
     $('#action_button').val("Edit");
     $('#action').val("Edit");
     $('#formModal').modal('show');
   }
  })
 });

// End edit data in modal 







// delete data start from  here

var id;

 $(document).on('click', '.delete', function(){
  id = $(this).attr('id');
  $('#confirmModal').modal('show');
 });

 $('#ok_button').click(function(){
  $.ajax({
   url:"/admin_car_destination/delete/"+id,
   beforeSend:function(){
    $('#ok_button').text('Deleting...');
   },
   success:function(data)
   {
    setTimeout(function(){
     $('#confirmModal').modal('hide');
     $('#user_table').DataTable().ajax.reload();
    }, 1000);
   }
  })
 });

// delete end here 








});

</script>

 @endsection
