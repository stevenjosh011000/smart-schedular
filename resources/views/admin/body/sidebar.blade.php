<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">	
		
        <div class="user-profile">
			<div class="ulogo">
				 <a href="{{route('dashboard')}}">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">					 	
						  <img src="{{asset('backend/images/SLogo.png')}}" width="50" alt="">
						  <h3><b>Smart</b> Scheduler</h3>
					 </div>
				</a>
			</div>
        </div>
      
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">  
		  
		  <li>
          <a href="{{route('dashboard')}}">
            <i class=" ti-pie-chart"></i>
			<span>Dashboard</span>
          </a>
        </li>  
        @if(Auth::user()->usertype=='Admin')
        <li class="treeview">
          <a href="#">
            <i class=" ti-briefcase"></i>
            <span>Admin Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('user.view')}}"><i class="ti-more"></i>View Admin</a></li>
            <li><a href="{{route('user.add')}}"><i class="ti-more"></i>Add Admin</a></li>
          </ul>
        </li> 

        <li class="treeview">
          <a href="#">
            <i class="ti-user"></i> <span>Student Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('student.registration.view')}}"><i class="ti-more"></i>Student Registration</a></li>
            <li><a href="{{route('student.class.view')}}"><i class="ti-more"></i>Student Class</a></li>
            <li><a href="{{route('student.examtype.view')}}"><i class="ti-more"></i>Student Exam Session</a></li>
            <li><a href="{{route('subject.view')}}"><i class="ti-more"></i>View Subjects</a></li>
            <li><a href="{{route('assign_subject.view')}}"><i class="ti-more"></i>Assign Subject</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
          <i class="ti-time"></i> <span>Timetable Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('view.all.timetable')}}"><i class="ti-more"></i>View Timetable</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
          <i class="ti-time"></i> <span>Marks</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('marks.entry.add')}}"><i class="ti-more"></i>Marks Entry</a></li>
            <li><a href="{{route('marks.entry.edit')}}"><i class="ti-more"></i>Marks Edit</a></li>
          </ul>
        </li>
        @endif
        @if(Auth::user()->usertype=='Student')
        <li class="header nav-small-cap">Student</li>
		  
        <li class="treeview">
          <a href="#">
          <i class="ti-calendar"></i> <span>Scheduler event</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('view.scheduler',Auth::user()->id)}}"><i class="ti-more"></i>View Event</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="ti-time"></i> <span>View Timetable</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('view.student.timetable',Auth::user()->id)}}"><i class="ti-more"></i>View Timetable</a></li>
          </ul>
        </li>
        @endif

      </ul>
    </section>
	
  </aside>