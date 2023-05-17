


<header class="main-header">
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top pl-30">
      <!-- Sidebar toggle button-->
	  <div>
		  <ul class="nav">
			<li class="btn-group nav-item">
				<a href="#" class="waves-effect waves-light nav-link rounded svg-bt-icon" data-toggle="push-menu" role="button">
					<i class="nav-link-icon mdi mdi-menu"></i>
			    </a>
			</li>
			<li class="btn-group nav-item">
				<a href="#" data-provide="fullscreen" class="waves-effect waves-light nav-link rounded svg-bt-icon" title="Full Screen">
					<i class="nav-link-icon mdi mdi-crop-free"></i>
			    </a>
			</li>			

		  </ul>
	  </div>
	  
      <div class="navbar-custom-menu r-side">
		
        <ul class="nav navbar-nav">
		  <!-- full Screen -->
	     		
		  <li><div style="padding-top:20px; position: relative;">You are logged in as :  {{Auth::user()->name}}</div></li>
	      <!-- User Account-->
          <li >	
			{{-- <a href="#" class="waves-effect waves-light dropdown-toggle" data-toggle="dropdown" title="User">
			<i class="ti-settings"></i>
			</a>
			<ul class="dropdown-menu animated flipInX">
			  <li class="user-body">
				 <!-- <a class="dropdown-item" href="#"><i class="ti-user text-muted mr-2"></i> Profile</a>
				 <a class="dropdown-item" href="#"><i class="ti-wallet text-muted mr-2"></i> My Wallet</a>
				 <a class="dropdown-item" href="#"><i class="ti-settings text-muted mr-2"></i> Settings</a> -->
				 <!-- <div class="dropdown-divider"></div> -->
				 
			  </li>
			</ul> --}}
			<a class="dropdown-item" style="font-size: 15px;margin-right:50px;" href="{{route('admin.logout')}}"><i class="ti-lock text-muted mr-2"></i> Logout</a>
          </li>	
			
        </ul>
      </div>
    </nav>
  </header>