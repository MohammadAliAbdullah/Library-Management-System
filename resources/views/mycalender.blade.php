<!doctype html>

{{-- https://hdtuto.com/article/laravel-full-calendar-tutorial-example-from-scratch --}}
<html lang="en">
       
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>

</head>

<body>

<div class="container">
        
    <div class="panel panel-primary" width="50%">

        <div class="panel-heading">

             
            <button class="btn btn-dark"><a href="{{url('admin/issueBook')}}" > Back </a></button><strong><center> MY Calender</center></strong>   
        </div>

        <div class="panel-body" >

            {!! $calendar->calendar() !!}

            {!! $calendar->script() !!}

        </div>

    </div>

</div>

</body>

</html>