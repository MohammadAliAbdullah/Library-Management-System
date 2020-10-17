@extends('layouts.master')

@section('content')
{{-- <div class="float-right">
    <input type="search" id="searchTxt" class="form-control-sm">
    <input type="button" value="Search" id="searchBtn" class="btn btn-secondary">
</div> --}}
<form class="float-right">
    <div class="input-group">
      <input type="search" id="searchTxt" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
      <div class="input-group-append">
        <button class="btn btn-primary" id="searchBtn" value="Search" type="button">
          <i class="fas fa-search"></i>
        </button>
        <button class="btn btn-info" id="searchBtn" value="" type="button">
          <i class="fas fa-trash"></i>
        </button>
      </div>
    </div>
  </form>
<div id="addlibraryForm"> 
        <h4>Add Library</h4>
      
        {!! Form::open(['url' => 'admin/library/create', 'id'=>'createForm']) !!}
        {!! Form::hidden('library_id','', ['id' => 'library_id']) !!}

      <div class="form-group">
        <div class="form-row">
            <div class="col-md-6">
            {!! Form::label('name','Library Name', ['class' => 'awesome']) !!}
            {!! Form::text('title','',['id'=>'name','class'=>'form-control','placeholder'=>'Library Name']) !!}
        </div>
        <div class="col-md-6">
                   
            {!! Form::label('description', 'Description', ['class' => 'awesome']) !!}
            {{-- {!! Form::text('title',['id'=>'studentDepartment', ''=>'--- Select department ---']+$dep 'class'=>'form-control','placeholder'=>'Student Department Name']) !!} --}}
            {{-- {!! Form::select('department', $alldep, null,array('id'=>'Department','class'=>'form-control','placeholder'=>'Select')) !!} --}}
            {{-- {!! Form::select('department',[''=>'--- Select Country ---']+$dep,null,['id'=>'studentDepartment','class'=>'form-control']) !!} --}}

            {!! Form::text('description','',['class'=>'form-control','id'=>'description','placeholder'=>'Description',]) !!}
         </div>
         </div>
        </div>
        <div class="form-group">
            <div class="form-row">
                <div class="col-md-6">
                    {!! Form::label('establish', 'Establish', ['class' => 'awesome']) !!}
                    {!! Form::number('title','',['id'=>'establish','class'=>'form-control','placeholder'=>'Establish']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::label('website', 'Website Link', ['class' => 'awesome']) !!}
                    {!! Form::text('title','',['id'=>'website','class'=>'form-control','placeholder'=>'www.....com']) !!}
                </div>
                
            </div>
        </div>
                    
        <input type="button" id="addLibBtn" value="Create" class="btn btn-primary">
        <input type="button" id="formCloseBtn" value="Close" class="btn btn-warning">
{!! Form::close() !!}
</div>
<button class="btn btn-primary" id="AllLibrary">ADD LIBRARY</button>
<a id='print' class="btn btn-danger pull-right" href="javascript:window.print()"><i class="fa fa-print"></i></a>

{{-- -------------View student data start ----------- --}}
<div id="contentContainer">

<div class="row">
        <div class="col-sm-12">
                
          <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
              <tr role="">
    <th class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Address: activate to sort column ascending">No</th>
    <th class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Address: activate to sort column ascending">id</th>
    <th class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Address: activate to sort column ascending">Name</th>
    <th class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending">Description</th>
    <th class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Birthdate: activate to sort column ascending">Establish</th>
    <th class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Birthdate: activate to sort column ascending">Website Link</th>
    <th tabindex="0" aria-controls="example2" rowspan="1" colspan="2" aria-label="Action: activate to sort column ascending">Action</th>
    </tr>
            </thead>
             <tbody>

                    @foreach ($libries as $library)
                    {{-- {{($loop->count)}} --}}
            <tr role="row" class="odd">
                {{-- <td><img src="../{{$employee->picture }}" width="50px" height="50px"/></td> --}}
                <td>{{($loop->index + 1)}}</td> 
                <td class="sorting_1">{{$library->id}}</td>
                <td class="hidden-xs">{{$library->name}}</td>
                <td class="hidden-xs">{{$library->description}}</td>           <td class="hidden-xs">{{$library->establish}}</td>
                <td><a href="">http://{{$library->website}}</a></td>
            
                <td>
                
                    <button type="submit" id="editBtn" rid={{$library->id}} class="btn btn-warning btn-margin">Update</button>
                    <button type="submit" id="deleteBtn" rid={{$library->id}} class="btn btn-danger btn-margin">Delete</button>
                </td>
                                  
            </tr>
                @endforeach
             </tbody>
          </table>
        </div>
    </div>
</div>
{{-- ---- showing & pagination start ---- --}}
        <div class="row">
                <div class="col-sm-8">
                  <div>Showing 1 to {{count($libries)}} of {{count($libries)}} entries</div>
                </div>
{{-- pagination --}}
                <div class="col-sm-4">
                  <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                    {{ $libries->links() }}
                  </div>
                </div>
              </div>
{{-- ---- showing & pagination start ---- --}}            




{{-- -------------View student data end ------------- --}}

@endsection

@section('script')
<script>
$(document).ready(function () {
   // ----------------- Form Open/Close button start ----------------- 

            // Add Room form defult Hide
            $('#addlibraryForm').hide(200);

            // When Click Add Room -btn Show form 
            $('#AllLibrary').click(function() {
                // clearform();
                $('#AllLibrary').hide(200);
                $('#print').hide(200);
                $('#addlibraryForm').show(100);
            });
            //Close Add Room
            $('#formCloseBtn').click(function(){
                $('#AllLibrary').show(200);
                $('#print').show(200);
                $('#addlibraryForm').hide(200);
            });
// ------------------------ Form Open/Close button end ----------------
  //header for csrf-token is must in laravel 
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

//------------------------- insert data start--------------------------
var url = "{{URL::to('/')}}"; // Url path pubilc till 
$("#addLibBtn").click(function(){
    if($(this).val() == 'Create'){
    //  $all = $('#department').val();
    // alert($all);
   // Exit;
$.ajax({
    type: "POST",
    url: url+'/admin/library',
    data: {
      name: $('#name').val(), 
      description: $('#description').val(), 
      establish: $('#establish').val(), 
      website: $('#website').val()
    
      }, 
    // dataType: "JSON",
    success: function (d) { 
       // alert(5);
       // exit;
      if(d.success) {
                        alert(d.message);
                        location.reload();
                        }
    },
    error:function(d){
                    console.log(d);
                }
});

}
});

// ------------------------insert data end ------------------------
// ------------------------edit data start ------------------------
// $("#contentContainer").on('click','#editBtn', function(){
//             $departmentid = $(this).attr('rid');
//             $info_url = url + '/admin/student/'+$departmentid+'/edit';
//             $.get($info_url,{	
// 			}, 
// 			function(d){
//                // alert(4);
//                  populateForm(d);
//                 // alert(4);
//                 // $("#addDepartmentFormContainer").show(300);
//             });
//         });    
// ------------------------edit data end -----------------------------
// ------------------------update data start --------------------------
// $("#addDepBtn").click(function(){
//     if($(this).val() == 'Update'){
//         $.ajax({
//             // alert(5);
//             // exit;
//                 url:url+'/admin/department/'+$("#department_id").val(),
//                 method: "PUT",
//                 type: "PUT",
//                 data: {
//                      name: $('#studname').val(), 
//                      department: $('#department').val(), 
//                      registerNo: $('#reg').val(), 
//                      rollNo: $('#roll').val(), 
//                      phoneNo: $('#phone').val() 
//                 },
//                 success: function(d){
//                     // alert(5);
//                     // exit;
//                     if(d.success) {
//                         alert(d.message);
//                         location.reload();
//                         }
//                 },
//                 error:function(d){
//                     console.log(d);
//                 }
//             });  
//         }
//         });
  
// ------------------------update data end --------------------------


// --------------------Delete department start ------------------
$("#contentContainer").on('click','#deleteBtn', function(){
            //alert()
            if(!confirm('Are you sure?')) return;
            $deleteLibraryid = $(this).attr('rid'); //delete ID No
            // alert($deletestudentid);
            // exit;
           // console.log($departmentid);
            $info_url = url + '/admin/library/'+$deleteLibraryid;
            // alert($info_url); // full delete ID path
            // exit;
            $.ajax({
                url:$info_url,
                method: "DELETE",
               // type: "DELETE",
                data:{                    
                },
                success: function(d){
                    // alert(success);
                    // exit;
                    if(d.success) {
                        alert(d.message);
                        location.reload();
                        }                   
                },
                error:function(d){
                    console.log(d);
                }
            });
        }); 
// ------------------------Delete department end------------------------
        // var studentid = $(this).data("rid");
        // confirm("Are You sure want to delete !");     
        // $.ajax({
        //     type: "DELETE",
        //     url: "{{ url('admin/student/') }}"+'/'+studentid,
        //     success: function (data) {
        //         table.draw();
        //     },
        //     error: function (data) {
        //         console.log('Error:', data);
        //     }
        // });        
// ------------------------Delete department end------------------------

        function populateForm(data){
            $("#department_id").val(data.id);
            $("#studname").val(data.name);
            $("#department").val(data.department);
            $("#reg").val(data.registerNo);
            $("#roll").val(data.rollNo);
            $("#phone").val(data.phoneNo);
            $("#addDepBtn").val('Update');
            $("#addDepartmentFormContainer").show(300);
            $("#NewDepartmentBtn").hide(100);

}
        function clearform(){
            $('#createForm')[0].reset();
            $("#addBtn").val('Create');
        }


});

</script>
@endsection