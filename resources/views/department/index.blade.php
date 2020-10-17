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
          <button class="btn btn-info" id="clrSearchBtn" value="Clear" type="button">
            <i class="fas fa-trash"></i>
          </button>
        </div>
      </div>
    </form>
<div id="addDepartmentFormContainer"> 
        <h4>Add Department</h4>
      
        {!! Form::open(['url' => 'admin/department/create', 'id'=>'createForm']) !!}
        {!! Form::hidden('department_id','', ['id' => 'department_id']) !!}

      <div class="form-group">
        <div class="form-row">
            <div class="col-md-10">
            {!! Form::label('department', 'Department Name', ['class' => 'awesome']) !!}
            {!! Form::text('title','',['id'=>'department','class'=>'form-control','placeholder'=>'Department Name']) !!}
        </div>
         </div>
        </div>           
        <input type="button" id="addDepBtn" value="Create" class="btn btn-primary">
        <input type="button" id="formCloseBtn" value="Close" class="btn btn-warning">
{!! Form::close() !!}
</div>
<button class="btn btn-primary" id="NewDepartmentBtn">ADD NEW DEPARTMENT</button>
<a id='print' class="btn btn-danger pull-right" href="javascript:window.print()"><i class="fa fa-print"></i></a>


{{-- -------------View student data start ----------- --}}
<div id="contentContainer">
<div class="row">
        <div class="col-sm-12">
          <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
              <tr role="">
               
          
                <th width="10%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="HiredDate: activate to sort column ascending">No  </th>

                <th width="10%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="HiredDate: activate to sort column ascending">Id  </th>

                <th width="60%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Department: activate to sort column ascending">Department Name</th>
                
                <th width="20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="2" aria-label="Action: activate to sort column ascending">Action</th>
              </tr>
              </thead>
             <tbody id ="tbody">
                    @foreach ($departments as $department)
            <tr role="row" class="odd">
                                  {{-- <td><img src="../{{$employee->picture }}" width="50px" height="50px"/></td> --}}
            <td>{{($loop->index + 1)}}</td>            
                <td class="sorting_1">{{$department->id}}</td>
                <td class="hidden-xs">{{$department->departmentName}}</td>
                <td>
                
                  <button type="submit" id="editBtn" rid={{$department->id}} class="btn btn-warning btn-margin">Update</button>
                   <button type="submit" id="deleteBtn" rid={{$department->id}} class="btn btn-danger btn-margin">Delete</button>
          
                </td>
                                  
            </tr>
                @endforeach
             </tbody>
          </table>
        </div>
        </div>
		
{{-- ---- showing & pagination start ---- --}}	
          <div class="row">
                <div class="col-sm-8">
                  <div>Showing 1 to {{count($departments)}} of {{count($departments)}} entries</div>
                </div>
  {{-- pagination --}}
                <div class="col-sm-4">
                  <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate"> 
                    {{ $departments->links() }}
                  </div>
                </div>
          </div>
    </div>
    
{{-- ---- showing & pagination start  ---- --}}

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
                $('#addDepartmentFormContainer').show(100);
            });
            //Close Add Room
            $('#formCloseBtn').click(function(){
                $('#NewDepartmentBtn').show(200);
                $('#print').show(200);
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
    // alert($("#department").val());
$.ajax({
    type: "POST",
    url: url+'/admin/department',
    data: {
      departmentName: $('#department').val() 
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
$("#contentContainer").on('click','#editBtn', function(){
            $departmentid = $(this).attr('rid');
            //  alert($departmentid);
            //  exit;
            // console.log($dep);
            // var url = "{{URL::to('/')}}"; // Url path pubilc till 
            $info_url = url + '/admin/department/'+$departmentid+'/edit';
            // alert($info_url);
            //  exit;
            $.get($info_url,{
			// alert(4);	
            // exit;
			},
            // alert(4);	 
            // exit;
			function(d){
               // alert(4);
                 populateForm(d);
                // alert(4);
                // $("#addDepartmentFormContainer").show(300);
            });
        });    
// ------------------------edit data end --------------------------
// ------------------------update data start --------------------------
$("#addDepBtn").click(function(){
    if($(this).val() == 'Update'){
        $.ajax({
            // alert(5);
            // exit;
                url:url+'/admin/department/'+$("#department_id").val(),
                method: "PUT",
                type: "PUT",
                data: {
                     departmentName: $('#department').val() 
                },
                success: function(d){
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
  
// ------------------------update data end --------------------------


// --------------------Delete department start ------------------
$("#contentContainer").on('click','#deleteBtn', function(){
            //alert()
            if(!confirm('Sure?')) return;
            $departmentid = $(this).attr('rid'); //delete ID No
            // alert($departmentid);
            // exit;
           // console.log($departmentid);
            $info_url = url + '/admin/department/'+$departmentid;
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

        function populateForm(data){
            $("#department_id").val(data.id);
            $("#department").val(data.departmentName);
            $("#addDepBtn").val('Update');
            $("#addDepartmentFormContainer").show(300);
            $("#NewDepartmentBtn").hide(100);

}
        function clearform(){
            $('#createForm')[0].reset();
            $("#addBtn").val('Create');
        }
//--------------------------start search in department------------------------
        $("#searchBtn").click(function(){
            // alert('Search in department');
            $searchUrl = url + '/admin/search'; 
             // alert(  $("#searchTxt").val());
            $.post($searchUrl,{
               searchText: $("#searchTxt").val()
            },function(d){
         //   console.log(d);
 populateSearchData(d);
            });
    });
        function populateSearchData(d){
            $h = '';
            d.forEach(data => {
            // $h += '<tr role="row" class="odd"><td class="hidden-xs">'+data.departmentName+'</td><button id="editBtn" rid="'+data.id+'" type="button" class="btn btn-warning btn-margin">Update</button><button id="deleteBtn" rid="'+data.id+'" type="button" class="btn btn-danger btn-margin">Delete</button></tr>';
          //  <td>'+.($loop->index + 1)+'</td>
            $h +=  '<tr role="row" class="odd"><td>1</td><td class="sorting_1">'+data.id+'</td><td class="hidden-xs">'+data.departmentName+'</td><td><button type="submit" id="editBtn" rid='+data.id+' class="btn btn-warning btn-margin">Update</button><button type="submit" id="deleteBtn" rid='+data.id+' class="btn btn-danger btn-margin">Delete</button></td></tr>';

            });         

         $("#tbody").html($h);


        }
        $("#clrSearchBtn").click(function(){
location.reload();
        });
//--------------------------end search in department------------------------

       









});

</script>
@endsection