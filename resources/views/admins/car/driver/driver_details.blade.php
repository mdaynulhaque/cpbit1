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
             <h4 class="">ALL DRIVER INFORMATION  </h4>
           </div>
          
           <div class="col-md-6">
             <div align="right">
            <button type="button" name="create_record" id="create_record" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>Add Driver</button>
           </div>
           </div>
         </div>

        </div>
          <div class="card-body card-dashboard table-responsive">
            <div class="table-responsive">
              <div class="card-content ">
          
           <br />
        
              <table class="table table-bordered table-striped" id="user_table">
                <thead>
                  <tr>
                    <th >Driver Image</th>
                    <th > Car Information</th>
                    <th > Leave Status</th>
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
 <div class="modal-dialog  modal-lg">
  <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Driver Insert</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body p-3">
         <span id="form_result"></span>
         <form  id="sample_form" class="form-horizontal" method="post" enctype="multipart/form-data">
          @csrf

          <input type="hidden" name="updateId" id="updateId">
         
                 <div class="row">
                     <div class="col-md-6">
                            <div class="form-group">
                                <label>Driver Name</label>
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Enter Driver Name" required="required">
                                <span id="error_value"></span>
                            </div>
                        </div>
                         <div class="col-md-6">
                            <div class="form-group">
                                <label>Mobile Number</label>
                                <input type="text" class="form-control" name="contact" placeholder="Enter Driver Mobile Number"
                                    required="required" id="contact">
                            </div>
                        </div>

                   </div>


                       
                     <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>License</label>
                                <input type="text" class="form-control" name="license" placeholder="Enter Driver License Number"
                                    required="required" id="license">
                            </div>
                        </div>
                         <div class="col-md-6">
                            <div class="form-group">
                                <label>NID Number</label>
                                <input type="text" class="form-control" name="nid" placeholder="Enter Driver License Number"
                                    required="required" id="nid">
                            </div>
                        </div>
                    </div>


                    <div class="row">
                      <div class="col-md-6">
                            <label>Active</label>
                            <div class="input-group">
                                <div class="custom-control custom-radio d-inline-block ml-1">
                                    <input type="radio" id="activeY" value="1" name="status"
                                        class="custom-control-input" checked>
                                    <label class="custom-control-label" for="activeY">Yes</label>
                                </div>
                                <div class="custom-control custom-radio d-inline-block ml-2">
                                    <input type="radio" id="activeN" value="0" name="status"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="activeN">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-md-3 label-control">Driver Image</label>
                                <div class="col-md-9">
                                    <input name="image" id="image" type="file" class="file"
                                        onchange="document.getElementById('preview1').src = window.URL.createObjectURL(this.files[0])"
                                         />
                                    <p class="text-danger">Resolution 300*250 pixels</p>
                                </div>
                            </div>
                        </div>
        
                    </div>
                     <div class="row">
                        <div class="col-md-4 carImgPreview m-auto">
                            <img id="preview1" alt="Image Not Selected" class="rounded mx-auto d-block" width="100" height="100" />
                        </div>
                    </div>

                   
         
        </div>
        <div class="modal-fotter">
         <div class="row">
           <div class="col-md-10">
              <div class="form-group" align="center">
              <input type="hidden" name="action" id="action" />
              <input type="hidden" name="hidden_id" id="hidden_id" />
              <input type="submit" name="action_button" id="action_button" class="btn btn-primary btn-block ml-3 " value="Add" />
             </div>
           </div>
           <div class="col-md-2">
             <input type="reset" name="cancel" value="cancel" class="btn btn-warning ">
           </div>
         </div>
        </div>
        
     </div>
     </form>
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



{{-- Block rooom form here  --}}
   
<div id="confirmModal1" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body bg-danger">
                <h4 align="center" style="margin:0;">Are you sure?</h4>
            </div>
            <div class="modal-footer">
             <button type="button" name="ok_button1" id="ok_button1" class="btn btn-danger">OK</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>




{{-- Last Date fixed  car status form here  --}}
   
<div id="confirmModal3" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
         <div class="modal-header bg-info ">
           <h4 class="text-center">Car Deadline</h4> <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>
         <span id="form_result1"></span>
         <form id="cleardeadline" method="post">
          @csrf

          <input type="hidden" name="updateId1" id="updateId1">
            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                  <label>Car Name</label>
                  <input type="" name="" class="form-control" id="car_name" readonly=""> 
                </div>
          
                <div class="col-md-6">
                  <label>Car Number</label>
                  <input type="" name="" class="form-control" id="car_number" readonly=""> 
                </div>
              </div>

              <div class="form-group">
                <label>Car Deadline Date</label>
                <input type="date" class="form-control" name="last_use" id="last_use" >
              </div>
            </div>
            <div class="modal-footer">
             <button type="submit" name="ok_button3" id="ok_button3" class="btn btn-info btn-block">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
          </form></div>
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
    url: "{{ route('driver.index') }}",
    },
      columns:[
      
      {
        data: 'image',
        name: 'image',
        
      
        },
        {
        data: 'car_info',
        name: 'car_info',
        },
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
  $('#sample_form')[0].reset();
   $('#preview1').attr("src","");
   $('#form_result').attr("id","");
   $('.modal-title').text("Add New Record");
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
    url:"{{ route('driver.store') }}",
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
       $('#preview1').html('');
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
    url:"/admin_car_driver/update",
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
      $('#preview1').html('');
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
    url:"/admin_car_driver/edit/"+id,
   dataType:"json",
   success:function(data){

     $('#updateId').val(data.id);

    $('#name').val(data.name);
    $('#contact').val(data.contact);
    $('#nid').val(data.nid);
    $('#license').val(data.license);
    $('#activeY').val(data.status);
    $('#activeN').val(data.status);
   
    
   $('#preview1').attr("src", "{{ asset('/') }}"+ data.image_small);



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
   url:"/admin_car_driver/delete/"+id,
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









// Block Driver data start from  here

var id;

 $(document).on('click', '.status', function(){
  id = $(this).attr('id');
  $('#confirmModal1').modal('show');
 });

 $('#ok_button1').click(function(){
  $.ajax({
   url:"/admin_car_driver/block/"+id,
   beforeSend:function(){
    $('#ok_button1').text('Blocking...');
   },
   success:function(data)
   {
    setTimeout(function(){
     $('#confirmModal1').modal('hide');
     $('#user_table').DataTable().ajax.reload();
    }, 1000);
   }
  })
 });
// Block end here 









});

</script>

 @endsection
