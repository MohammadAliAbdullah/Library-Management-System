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
        <button class="btn btn-info" title="Clear Search" id="searchBtn" value="" type="button">
          <i class="fas fa-trash"></i>
        </button>
      </div>
    </div>
  </form>
<div id="addDepartmentFormContainer"> 
        <h4>Add Student</h4>
      
        {!! Form::open(['url' => 'admin/student/create', 'id'=>'createForm']) !!}
        {!! Form::hidden('department_id','', ['id' => 'department_id']) !!}

      <div class="form-group">
        <div class="form-row">
            <div class="col-md-6">
            {!! Form::label('studname', 'Student Name', ['class' => 'awesome']) !!}
            {!! Form::text('title','',['id'=>'studname','class'=>'form-control','placeholder'=>'Student Name']) !!}
        </div>
        <div class="col-md-6">
                   
            {!! Form::label('department', 'Department', ['class' => 'awesome']) !!}
            {{-- {!! Form::text('title',['id'=>'studentDepartment', ''=>'--- Select department ---']+$dep 'class'=>'form-control','placeholder'=>'Student Department Name']) !!} --}}
            {{-- {!! Form::select('department', $alldep, null,array('id'=>'Department','class'=>'form-control','placeholder'=>'Select')) !!} --}}
            {{-- {!! Form::select('department',[''=>'--- Select Country ---']+$dep,null,['id'=>'studentDepartment','class'=>'form-control']) !!} --}}

            {!! Form::select('department',$alldep,null,['class'=>'custom-select form-control required','id'=>'department','placeholder'=>'Select One',]) !!}
         </div>
         </div>
        </div>
        <div class="form-group">
            <div class="form-row">
                <div class="col-md-4">
                    {!! Form::label('studentreg', 'Student Reg', ['class' => 'awesome']) !!}
                    {!! Form::number('title','',['id'=>'reg','class'=>'form-control','placeholder'=>'Student Registration No']) !!}
                </div>
                <div class="col-md-4">
                    {!! Form::label('roll', 'Student Roll', ['class' => 'awesome']) !!}
                    {!! Form::number('title','',['id'=>'roll','class'=>'form-control','placeholder'=>'Student Roll No']) !!}
                </div>
                <div class="col-md-4">
                    {!! Form::label('phone', 'Student Phone ', ['class' => 'awesome']) !!}
                        {!! Form::number('title','',['id'=>'phone','class'=>'form-control','placeholder'=>'Student Phone No']) !!}
                </div>
            </div>
        </div>
                    
        <input type="button" id="addDepBtn" value="Create" class="btn btn-primary">
        <input type="button" id="formCloseBtn" value="Close" class="btn btn-warning">
{!! Form::close() !!}
</div>
<button class="btn btn-primary" id="NewDepartmentBtn"><i class="fa fa-plus-circle"></i> ADD NEW STUDENT</button>
<a id='print' title="Print" class="btn btn-dark pull-right" href="javascript:window.print()"><i class="fa fa-print"></i></a>
{{-- {{URL::route('author.index')}} folder --}}
{{-- <a id='pdf' class="btn btn-dark pull-right" href="{{URL::to('/admin/student/pdf')}}"><i class="fa fa-file-pdf"></i></a> --}}
<a id='pdf' title="Convert PDF" class="btn btn-dark pull-right" href="{{url('/admin/pdf')}}"><i class="fa fa-file-pdf"></i></a>
<a id='excel' title="Convert Excel" class="btn btn-dark pull-right" href="{{url('/admin/stpdf')}}"><i class="fa fa-file-excel"></i></a>
<a id='copy' title="Copy" class="btn btn-dark pull-right" href="{{url('/admin/stpdf')}}"><i class="fa fa-copy"></i></a>

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
                <th class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending">Department</th>
                <th class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Birthdate: activate to sort column ascending">Registration No</th>
                <th class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="HiredDate: activate to sort column ascending">Roll No </th>
                <th class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Department: activate to sort column ascending">Phone No</th>
                
                <th tabindex="0" aria-controls="example2" rowspan="1" colspan="2" aria-label="Action: activate to sort column ascending">Action</th>
              </tr>
            </thead>
             <tbody>

                    @foreach ($students as $student)
                    {{-- {{($loop->count)}} --}}
            <tr role="row" class="odd">
                {{-- <td><img src="../{{$employee->picture }}" width="50px" height="50px"/></td> --}}
                <td>{{($loop->index + 1)}}</td> 
                <td class="sorting_1">{{$student->id}}</td>
                <td class="hidden-xs">{{$student->name}}</td>
                <td class="hidden-xs">{{$student->Department->departmentName}}</td>
                <td class="hidden-xs">{{$student->registerNo}}</td>
                <td class="hidden-xs">{{$student->rollNo}}</td>
                <td class="hidden-xs">{{$student->phoneNo}}</td>
                <td>
                
                    <button type="submit" id="editBtn" rid={{$student->id}} class="btn btn-warning btn-margin">Update</button>
                    <button type="submit" id="deleteBtn" rid={{$student->id}} class="btn btn-danger btn-margin">Delete</button>
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
                  <div>Showing 1 to {{count($students)}} of {{count($students)}} entries</div>
                </div>
{{-- pagination --}}
                <div class="col-sm-4">
                  <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                    {{ $students->links() }}
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
            $('#addDepartmentFormContainer').hide(200);

            // When Click Add Room -btn Show form 
            $('#NewDepartmentBtn').click(function() {
                // clearform();
                $('#NewDepartmentBtn').hide(200);
                $('#print').hide(200);
                $('#pdf').hide(200);
                $('#excel').hide(200);
                $('#copy').hide(200);
                $('#addDepartmentFormContainer').show(100);
            });
            //Close Add Room
            $('#formCloseBtn').click(function(){
                $('#NewDepartmentBtn').show(200);
                $('#print').show(200);
                $('#pdf').show(200);
                $('#excel').show(200);
                $('#copy').show(200);
                $('#addDepartmentFormContainer').hide(200);
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
$("#addDepBtn").click(function(){
    if($(this).val() == 'Create'){
    //  $all = $('#department').val();
    // alert($all);
   // Exit;
$.ajax({
    type: "POST",
    url: url+'/admin/student',
    data: {
      name: $('#studname').val(), 
      department_id: $('#department').val(), 
      registerNo: $('#reg').val(), 
      rollNo: $('#roll').val(), 
      phoneNo: $('#phone').val() 
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
            $deletestudentid = $(this).attr('rid'); //delete ID No
            // alert($deletestudentid);
            // exit;
           // console.log($departmentid);
            $info_url = url + '/admin/student/'+$deletestudentid;
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



//--------------------------start search in student------------------------
        $("#searchBtn").click(function(){
            // alert('Search in student');
            $searchUrl = url + '/admin/search_stud'; 
             // alert(  $("#searchTxt").val());
            $.post($searchUrl,{
                searchText: $("#searchTxt").val()
            },function(d){
               // alert(d);
               // exit;
//console.log(d);
populateSearchData(d);
            });
    });
        function populateSearchData(d){
            $h = '';
            d.forEach(data => {
            $h += '<tr role="row" class="odd"><td class="sorting_1">'+data.id+'</td><td class="hidden-xs">'+data.name+'</td><td class="hidden-xs">'+data.department_id+'</td><td class="hidden-xs">'+data.registerNo+'</td><td class="hidden-xs">'+data.rollNo+'</td><td class="hidden-xs">'+data.phoneNo+'</td><button id="editBtn" rid="'+data.id+'" type="button" class="btn btn-warning btn-margin">Update</button><button id="deleteBtn" rid="'+data.id+'" type="button" class="btn btn-danger btn-margin">Delete</button></tr>';
            });
            $("#contentContainer").html($h);

        }
//--------------------------end search in student------------------------

$('#pdf').click(function () {
// alert('pdf called');
    
})





});

</script>
@endsection