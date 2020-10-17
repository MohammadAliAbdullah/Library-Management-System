<ul class="sidebar navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="{{url('admin/dashboard')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span>
      </a>
    </li>
  
    <li class="nav-item">
      <a class="nav-link" href="{{url('admin/student')}}" role="button" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-user-graduate"></i>
        <span>Student</span>
      </a>
      
    </li>
    <li class="nav-item ">
      <a class="nav-link" href="{{url('admin/department')}}" role="button" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-building"></i>
        <span>Department</span>
      </a>
     
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link" href="{{url('admin/author')}}" role="button"  aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-feather-alt"></i>
        <span>Author</span>
      </a>
    </li>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link" href="{{url('admin/book')}}" role="button"  aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-book-open"></i>
      <span>Book</span>
    </a>
  </li>
</li>
<li class="nav-item dropdown">
  <a class="nav-link" href="{{url('admin/issueBook')}}" role="button"  aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-book-reader"></i>
    <span>Issue Book</span>
  </a>
</li>
<li class="nav-item dropdown">
  <a class="nav-link" href="{{url('admin/library')}}" role="button"  aria-haspopup="true" aria-expanded="false">
  <i class="fas fa-warehouse"></i>
    <span>All Library</span>
  </a>
</li>
<li class="nav-item dropdown">
    <a class="nav-link" href="{{url('admin/events')}}" role="button"  aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-calendar"></i>
      <span>Calendar</span>
    </a>
  </li>

    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-fw fa-folder"></i>
        <span>Pages</span>
      </a>
      <div class="dropdown-menu" aria-labelledby="pagesDropdown">
        <h6 class="dropdown-header">Login Screens:</h6>
        <a class="dropdown-item" href="login.html">Login</a>
        <a class="dropdown-item" href="register.html">Register</a>
        <a class="dropdown-item" href="forgot-password.html">Forgot Password</a>
        <div class="dropdown-divider"></div>
        <h6 class="dropdown-header">Other Pages:</h6>
        <a class="dropdown-item" href="404.html">404 Page</a>
        <a class="dropdown-item active" href="blank.html">Blank Page</a>
      </div>
    </li>
  </ul>