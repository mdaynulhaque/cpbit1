@extends('admins.layouts.room-master')

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
             <h4 class="">New Room Display</h4>
           </div>
          
           <div class="col-md-6">
             <div align="right">
            <button type="button" name="create_record" id="create_record" class="btn btn-success btn-sm">Create Record</button>
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
                    <th >Room Image</th>
                    <th > Room Details</th>
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
 <div class="modal-dialog  modal-xl">
  <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Room Insert</h5>
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
                                <label>Room Name</label>
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Enter Room Number" required="required">
                                <span id="error_value"></span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Room Capacity</label>
                                <input type="number" class="form-control" name="capacity" placeholder="Enter Room Capacity"
                                    required="required" id="capacity">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Room Type</label>
                                <select class="form-control" name="residance" id="residance">
                                    <option value="Meeting" >Meeting</option>
                                    <option value="Residance">Residance</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
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

                        <div class="col-md-3">
                            <label>Room Projector</label>
                            <div class="input-group">
                                <div class="custom-control custom-radio d-inline-block ml-1">
                                    <input type="radio" id="projectorY" value="1" name="projector"
                                        class="custom-control-input" checked>
                                    <label class="custom-control-label" for="projectorY">Yes</label>
                                </div>
                                <div class="custom-control custom-radio d-inline-block ml-2">
                                    <input type="radio" id="projectorN" value="0" name="projector"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="projectorN">No</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="label-control" for="timesheetinput7">Room Remarks </label>
                            <textarea  class="form-control" placeholder="Enter Room Remarks" name="remarks" id="remarks"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label class="col-md-3 label-control">1st Image</label>
                                <div class="col-md-9">
                                    <input name="image" id="image" type="file" class="file"
                                        onchange="document.getElementById('preview1').src = window.URL.createObjectURL(this.files[0])"
                                         />
                                    <p class="text-danger">Resolution 1280*800 pixels</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label class="col-md-3 label-control">2nd Image</label>
                                <div class="col-md-9">
                                    <input name="image2" id="image2" type="file" class="file"
                                        onchange="document.getElementById('preview2').src = window.URL.createObjectURL(this.files[0])"
                                         />
                                    <p class="text-danger">Resolution 1280*800 pixels</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label class="col-md-3 label-control">3rd Image</label>

                                <div class="col-md-9">
                                    <input name="image3" id="image3" type="file" class="file"
                                        onchange="document.getElementById('preview3').src = window.URL.createObjectURL(this.files[0])"
                                         />
                                    <p class="text-danger">Resolution 1280*800 pixels</p>
                                </div>
                            </div>
                        </div>
                    </div>

                   <div class="row">
                        <div class="col-md-4 carImgPreview">
                            <img id="preview1" alt="Image Not Selected" class="rounded mx-auto d-block" width="200" height="100" />
                        </div>
                        <div class="col-md-4 carImgPreview">
                            <img id="preview2" alt="Image Not Selected" class="rounded mx-auto d-block" width="200" height="100" />
                        </div>
                        <div class="col-md-4 carImgPreview">
                            <img id="preview3" alt="Image Not Selected" class="rounded mx-auto d-block" width="200" height="100" />
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
        </form>
     </div>
    </div>
</div>

{{-- delete file from data base  --}}
<div id="confirmModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header bg-danger">
            <h4 class="modal-title text-left ">Permanently Delete</h4>
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
           <div class="modal-header bg-danger">
            <h4 class="modal-title text-left ">Block or Unblock Room</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
            <div class="modal-body">
                <h4 align="center" style="margin:0;">Are you sure?</h4>
            </div>
            <div class="modal-footer">
             <button type="button" name="ok_button1" id="ok_button1" class="btn btn-danger">OK</button>
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
    url: "{{ route('room.show') }}",
    },
      columns:[
      
      {
        data: 'image',
        name: 'image',
        
      
        },
        {
        data: 'name',
        name: 'name',
        render: function ( data, type, row ) {
                return '<b>Name: </b> &nbsp;'+row.name + '<br> <b> Room Capacity:</b> &nbsp;' + row.capacity +'<br><br><br> <b>Type</b> &nbsp;' +row.residance +'<br> <b>Remarks</b> &nbsp;' +row.remarks;
            }
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
   $('#preview2').attr("src","");
   $('#preview3').attr("src","");
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
    url:"{{ route('room.store') }}",
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
       $('#preview2').html('');
       $('#preview3').html('');
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
    url:"/admin_room/room/update",
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
       $('#preview2').html('');
       $('#preview3').html('');
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
    url:"/admin_room/edit/"+id,
   dataType:"json",
   success:function(data){

     $('#updateId').val(data.id);
    $('#name').val(data.name);
    $('#capacity').val(data.capacity);
    $('#residance').val(data.residance);
    $('#activeY').val(data.status);
    $('#activeN').val(data.status);
    $('#projectorY').val(data.projector);
    $('#projectorN').val(data.projector);
    $('#remarks').val(data.remarks);
    
     $('#preview1').attr("src", "{{ asset('/') }}"+ data.image_small);
    

      $('#preview2').attr("src", "{{ asset('/') }}"+ data.image2_small);
     

      $('#preview3').attr("src", "{{ asset('/') }}"+ data.image3_small);
    


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
   url:"/admin_room/delete/"+id,
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









// Block data start from  here

var id;

 $(document).on('click', '.status', function(){
  id = $(this).attr('id');
  $('#confirmModal1').modal('show');
 });

 $('#ok_button1').click(function(){
  $.ajax({
   url:"/admin_room/block/"+id,
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
