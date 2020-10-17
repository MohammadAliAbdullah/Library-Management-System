<!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="utf-8">
	<!-- CSRF Token for ajax -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Library Management System-Student, department , author, book, bookissue, user manage">
    <meta name="author" content="Mohammad Ali Abdullah/IDB-BISEW">

    <title>Library management</title>

    <!-- Bootstrap core CSS-->
    <link href="{{asset('assests/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="{{asset('assests/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="{{asset('assests/vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <!-- Custom styles for this template-->
 
    <link href="{{asset('assests/css/sb-admin.css')}}" rel="stylesheet">
    <script src="{{asset('assests/js/jquery-3.3.1.min.js')}}"></script>





    

    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}



  </head>