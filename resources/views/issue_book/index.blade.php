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
<div id="addIssueContainer">
        <h4>Add Book Issue</h4>
        {!! Form::open(['url' => 'issueBook/create','id'=>'createForm']) !!}
        {!! Form::hidden('issuebookid','', ['id' => 'issuebookid']) !!}

      <div class="form-group">
        <div class="form-row">
            <div class="col-md-6">
            {!! Form::label('student', 'Student Name', ['class' => 'awesome']) !!}
            {!! Form::text('title','',['id'=>'student','class'=>'form-control','placeholder'=>'Student Name']) !!}
        </div>
        <div class="col-md-6">
                {!! Form::label('studentreg', 'Student Reg', ['class' => 'awesome']) !!}
                {!! Form::number('title','',['id'=>'studentreg','class'=>'form-control','placeholder'=>'Registration No']) !!}
                   

         </div>
         </div>
         <div class="form-group">
         <div class="form-row">
         <div class="col-md-6">
                {!! Form::label('department', 'Department', ['class' => 'awesome']) !!}
                {!! Form::select('title',$dep,null,['id'=>'department','class'=>'form-control','placeholder'=>'Select One']) !!}
                {{-- {!! Form::select('department',$dep,null,['class'=>'custom-select form-control required','id'=>'department','placeholder'=>'Select One',]) !!} --}}
                </div>
                <div class="col-md-6">
                        {!! Form::label('book', 'Book Name', ['class' => 'awesome']) !!}
                        {!! Form::select('title',$book,null,['id'=>'book','class'=>'form-control','placeholder'=>'Select One']) !!}
                    </div>
         </div>
         </div>
        </div>
        <div class="form-group">
            <div class="form-row">
                
                <div class="col-md-6">
                        {!! Form::label('author', 'Author Name ', ['class' => 'awesome']) !!}
                        {!! Form::select('title',$aut,null,['id'=>'author','class'=>'form-control','placeholder'=>'Select One']) !!}
                
                </div>
                <div class="col-md-6">
                    {!! Form::label('phone', 'Student Phone ', ['class' => 'awesome']) !!}
                    {!! Form::number('title','',['id'=>'phone','class'=>'form-control','placeholder'=>'Phone No']) !!}
                   
                </div>
            </div>
            {!! Form::label('return', 'Return Date', ['class' => 'awesome']) !!}
            {!! Form::date('title','',['id'=>'return','class'=>'form-control','placeholder'=>'Return Date']) !!}
        </div> 
                    
        <input type="button" id="addBtn" value="Create" class="btn btn-primary">
        <input type="button" id="formCloseBtn" value="Close" class="btn btn-warning">
{!! Form::close() !!}
</div>
<button class="btn btn-primary" id="NewStudentBtn">ADD NEW BOOK ISSUE</button>
<a id='print' class="btn btn-danger pull-right" href="javascript:window.print()"><i class="fa fa-print"></i></a>

{{-- -------------View student data start ----------- --}}
<div id="viewContainer">
<div class="row">
        <div class="col-sm-12">
          <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
    <tr role="">
    <th class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Address: activate to sort column ascending">No</th>
    <th class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Address: activate to sort column ascending">Name</th>
    <th class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending">Register No</th>
    <th class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Birthdate: activate to sort column ascending"> Department</th>
    <th class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="HiredDate: activate to sort column ascending">Book Name </th>
    <th class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Department: activate to sort column ascending">Author Name</th>
    <th class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Department: activate to sort column ascending">Phone</th>
    <th class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Department: activate to sort column ascending">Issue Date</th>
    <th class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Department: activate to sort column ascending">Return Date</th>
    
    <th tabindex="0" aria-controls="example2" rowspan="1" colspan="2" aria-label="Action: activate to sort column ascending">Action</th>
    </tr>
              </thead>
             <tbody>
                    @foreach ($issues as $issue)
            <tr role="row" class="odd">
                {{-- <td><img src="../{{$employee->picture }}" width="50px" height="50px"/></td> --}}
                <td>{{$issue->id}}</td>
                <td>{{$issue->studentName}}</td>
                <td>{{$issue->registerNo}}</td>
                <td>{{$issue->department_id}}</td>
                <td>{{$issue->author_id}}</td>
                <td>{{$issue->book_id}}</td>
                <td>{{$issue->phoneNo}}</td>
                {{-- <td>{{strtotime($issue->created_at)}}</td>==1555372800 --}}
                <td>{{$issue->created_at}}</td>
                <td>{{$issue->returnBook}}</td>
                <td>

        <button type="submit" id="editBtn" rid={{$issue->id}} class="btn btn-warning btn-margin">Update</button>
        <button type="submit" id="deleteBtn" rid={{$issue->id}} class="btn btn-danger btn-margin">Delete</button>
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
                  <div>Showing 1 to {{count($issues)}} of {{count($issues)}} entries</div>
                </div>
{{-- pagination --}}
                <div class="col-sm-4">
                  <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                    {{ $issues->links() }}
                  </div>
                </div>
              </div>
{{-- ---- showing & pagination start ---- --}}            




{{-- -------------View student data end ------------- --}}

@endsection

@section('script')
<script>
var url = "{{URL::to('/')}}"; // pubilc till
$(document).ready(function () {
   // ----------------- Form Open/Close button start ----------------- 

            // Add Room form defult Hide
            $('#addIssueContainer').hide(200);

            // When Click Add Room -btn Show form 
            $('#NewStudentBtn').click(function() {
                // clearform();
                $('#NewStudentBtn').hide(200);
                $('#print').hide(200);
                $('#addIssueContainer').show(100);
            });
            //Close Add Room
            $('#formCloseBtn').click(function(){
                $('#addIssueContainer').hide(200);
                $('#NewStudentBtn').show(200);
                $('#print').show(200);
            });
// ------------------------ Form Open/Close button end ------------------ 
  //header for csrf-token is must in laravel 
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
// ----------create issue book start-------------------
     $("#addIssueContainer").on('click','#addBtn', function () {
// $('#addBtn').click(function () { 
    // alert('create ready!!');
    // $createpath = url+'/admin/issuebook';
 //alert(url);
// alert($('#author').val());

$.ajax({
    type: "POST",
    url: url+'/admin/issueBook',
    data:{
        name : $('#student').val(),
        registration: $('#studentreg').val(),
        department: $('#department').val(),
        book: $('#book').val(),
        author: $('#author').val(),
        phone: $('#phone').val(),
        return: $('#return').val()
    },
   // dataType: "json",
    success: function (d) {
        // alert(d);
        // exit;
        if(d.success){
            alert(d.message);
            location.reload();
        }
        
    },
    error:function(d){
                    console.log(d);
                }
    
});



});
// ------------------Delete Issue Book start-------------------
// $('#viewContainer').on('click','#deleteBtn' function () {
    $("#viewContainer").on('click','#deleteBtn', function(){
        if(!confirm ('Are you sure')) return; 
        var deleteIssueIdpath = $(this).attr('rid');  
       // var bookId = $(this).attr('rid');  ->path
       // var bookId = $(this).val('rid');   -> Object   
       // alert (deletebookIdpath);
       $fullpath = url+'/admin/issueBook/'+deleteIssueIdpath;
      // alert($fullpath);
      $.ajax({
          type: "DELETE",
          url: $fullpath,
          data: "data",
          dataType: "json",
          success: function(d){
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
// -----------------Delete Issue Book end-----------------
});

</script>
@endsection