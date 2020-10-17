@include('template.header')
  <body id="page-top">
 @include('template.navbar') 
 <!-- ---------------------- #wrapper -------------------- -->
    <div id="wrapper">
      <!-- -------------------- Sidebar------------------- -->
@include('template.sidebar')
    <!-- ----------------------/Sidebar -------------------->
    <!-- /.content-wrapper -->
      <div id="content-wrapper">
    <!-------------------- /.container-fluid-------------- -->
        <div class="container-fluid">
          <!-- Breadcrumbs-->
          @yield('content')
          <!-- Page Content -->
        </div>
        <!-- --------------- /.container-fluid--------- -->
        <!-- Sticky Footer -->
      </div>
      <!-- ------------------/.content-wrapper-------------- -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Your Website 2018</span>
          </div>
        </div>
      </footer>
    </div>
    <!-- -----------------------/#wrapper------------------ -->
    @yield('script')
    <!-- Scroll to Top Button-->
    @include('template.footer')
