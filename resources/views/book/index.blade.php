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
<div id="addBookContainer">
        <h4>Add Book</h4>
        {!! Form::open(['url' => 'book/create','id'=>'createForm']) !!}
        {!! Form::hidden('bookid','', ['id' => 'bookid']) !!}

      <div class="form-group">
        <div class="form-row">
            <div class="col-md-6">
            {!! Form::label('book', 'Book Name', ['class' => 'awesome']) !!}
            {!! Form::text('title','',['id'=>'book','class'=>'form-control','placeholder'=>'Book Name']) !!}
        </div>
        <div class="col-md-6">
                   
            {!! Form::label('Department', 'Department', ['class' => 'awesome']) !!}
            {!! Form::select('department',$dep,null,['class'=>'custom-select form-control required','id'=>'department','placeholder'=>'Select One',]) !!}
         </div>
        </div>
        </div>
        <div class="form-group">
            <div class="form-row">
                <div class="col-md-6">
                    {!! Form::label('author', 'Author', ['class' => 'awesome']) !!}
                    {!! Form::select('author',$aut,null,['class'=>'custom-select form-control required','id'=>'author','placeholder'=>'Select One',]) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::label('price', 'Book Price', ['class' => 'awesome']) !!}
                    {!! Form::number('title','',['id'=>'price','class'=>'form-control','placeholder'=>'Book Price']) !!}
                </div>
            </div>
        </div>
                    
        <input type="button" id="addBookBtn" value="Create" class="btn btn-primary">
        <input type="button" id="formCloseBtn" value="Close" class="btn btn-warning">
{!! Form::close() !!}
</div>
<button class="btn btn-primary" id="NewBookBtn">ADD NEW BOOK</button>
<a id='print' class="btn btn-danger pull-right" href="javascript:window.print()"><i class="fa fa-print"></i></a>

{{-- -------------View student data start ----------- --}}
<div id="viewContainer">
<div class="row">
        <div class="col-sm-12">
          <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
<thead>
    <tr role="">
    
    <th class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Address: activate to sort column ascending">No</th>
    <th class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Address: activate to sort column ascending">Id</th>
    <th class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Address: activate to sort column ascending">Book Name</th>
    <th class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending">Department</th>
    <th class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Birthdate: activate to sort column ascending">Author</th>
    <th class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="HiredDate: activate to sort column ascending">Price No</th>
    <th class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Department: activate to sort column ascending">Add Date</th>
    
    <th tabindex="0" aria-controls="example2" rowspan="1" colspan="2" aria-label="Action: activate to sort column ascending">Action</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($books as $book)
<tr role="row" class="odd">
        {{-- <td><img src="../{{$employee->picture }}" width="50px" height="50px"/></td> --}}
        <td class="sorting_1">{{($loop->index)+1}}</td>
        {{-- <td class="sorting_1">{{($book->id}}</td> --}}
        <td class="sorting_1">{{$book->id}}</td>
        <td class="sorting_1">{{$book->StudentName}}</td>
        {{-- <td class="hidden-xs">{{$book->department->departmentName}}</td> --}}
        <td class="hidden-xs">{{$book->department_id}}</td>
        <td class="hidden-xs"> {{$book->Author->authorname}}</td>
        <td class="hidden-xs"> {{$book->price}}</td>
        <td class="hidden-xs"> {{$book->created_at}}</td>
                                 
    <td>

    <button type="submit" id="editBtn" rid={{$book->id}} class="btn btn-warning btn-margin">Update</button>
    <button type="submit" id="deleteBtn" rid={{$book->id}} class="btn btn-danger btn-margin">Delete</button>

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
                  {{-- <div>Showing 1 to {{count($book)}} of {{count($book)}} entries</div> --}}
                </div>
{{-- pagination --}}
                <div class="col-sm-4">
                  <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                    {{ $books->links() }}
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
            $('#addBookContainer').hide(200);

            // When Click Add Room -btn Show form 
            $('#NewBookBtn').click(function() {
                // clearform();
                $('#NewBookBtn').hide(200);
                $('#print').hide(200);
                $('#addBookContainer').show(100);
            });
            //Close Add Room
            $('#formCloseBtn').click(function(){
                $('#addBookContainer').hide(200);
                $('#NewBookBtn').show(200);
                $('#print').show(200);
            });
// ------------------------ Form Open/Close button end ------------------ 
  //header for csrf-token is must in laravel 
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

// ---------------------------create book data-----------------------
var url = "{{URL::to('/')}}"; 
$('#addBookBtn').click(function () { 
    // $bookId = $(this).val();
    //  $bookId = $('#book').val();
    // alert(url);
   $.ajax({
       type: "POST",
       url: url+'/admin/book',
       data: {
                bookname: $('#book').val(), 
                department_id: $('#department').val(), 
                author_id : $('#author').val(), 
                price: $('#price').val()
              
      }, 
      // dataType: "Json",
       success: function (d) {
        //    alert(d);
        //    exit;
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

// ------------------------Create Book end---------------------------------
// ------------------------Delete Book start-------------------------------
// $('#viewContainer').on('click','#deleteBtn' function () {
$("#viewContainer").on('click','#deleteBtn', function(){
        if(!confirm ('Are you sure')) return; 
        var deletebookIdpath = $(this).attr('rid');  
       // var bookId = $(this).attr('rid');  ->path
       // var bookId = $(this).val('rid');   -> Object   
       // alert (deletebookIdpath);
       $fullpath = url+'/admin/book/'+deletebookIdpath;
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
// ------------------------Delete Book end---------------------------------

});

</script>
@endsection