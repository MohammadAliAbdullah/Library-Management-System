<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Library Management</title>
        <link href="{{asset('assests/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:150,600" rel="stylesheet">
<style>
body {
  background:url({{asset('assests/images/library_home.jpg')}}) no-repeat;
  padding-top:100px;
  background-size:cover;
}
        /* Container holding the image and the text */
.container {
  position: relative;
  text-align: center;
  color: white;
}

/* Bottom left text */
.bottom-left {
  position: absolute;
  bottom: 8px;
  left: 16px;
}

/* Top left text */
.top-left {
  position: absolute;
  top: 8px;
  left: 16px;
}

/* Top right text */
.top-right {
  position: absolute;
  top: 8px;
  right: 16px;
}

/* Bottom right text */
.bottom-right {
  position: absolute;
  bottom: 8px;
  right: 16px;
}

/* Centered text */
.centered {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
</style>
    </head>
    <body>
<br>
<br>
<br>
<br>
    <div align="center" class="container">
   
    <!-- <img src="{{asset('assests/images/library_home.jpg')}}" width="100%" height="100%" alt=""> -->
<div class="centered">
<h1>Library Management System</h1>
<div class='row'>			
<div class="col-4">
<a href="{{url('login/admin')}}"><img src="{{asset('assests/images/img_avatar2.png')}}" width="150PX" height="150PX" class="img-thumbnail" alt=""> <br>  <strong align = "center">ADMIN LOGIN</strong></a>
</div>
<div class="col-4">
<a href="{{ route('login') }}"><img src="{{asset('assests/images/img_avatar2.png')}}" width="150PX" height="150PX" class="img-thumbnail" alt=""> <br> <strong align = "center">STUDENT LOGIN</strong> </a>
</div>
<div class="col-4">

<a href="{{ route('register') }}"><img src="{{asset('assests/images/img_avatar2.png')}}" width="150PX" height="150PX" class="img-thumbnail" alt=""> <br><strong align = "center">STUDENT REGISTER</strong></a>
</div>
</div>
</div>
</div>
</div>
</body>
</html>
