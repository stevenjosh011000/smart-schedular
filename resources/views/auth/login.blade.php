<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../images/favicon.ico">

    <title>Smart Scheduler - Log in </title>
  
	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{asset('backend/css/vendors_css.css')}}">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="{{asset('backend/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('backend/css/skin_color.css')}}">	

</head>
<body class="hold-transition theme-primary bg-gradient-primary">
	
	<div class="container h-p100">
		<div class="row align-items-center justify-content-md-center h-p100">	
			
			<div class="col-12">
				<div class="row justify-content-center no-gutters">
					<div class="col-lg-4 col-md-5 col-12">
						<div class="content-top-agile p-10">
							<h2 class="text-white" style="margin-bottom: 50px;">SMART SCHEDULER</h2>						
						</div>
						<div class="p-30 rounded30 box-shadowed b-2 b-dashed">
            <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-transparent text-white"><i class="ti-user"></i></span>
                    </div>
                    <input type="email" name="email" id="email "class="form-control pl-15 bg-transparent text-white plc-white" placeholder="Email">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text  bg-transparent text-white"><i class="ti-lock"></i></span>
                    </div>
                    <input type="password" name="password" id="password" class="form-control pl-15 bg-transparent text-white plc-white" placeholder="Password">
                </div>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                </div>
            @endif
                <div class="row">
                <div class="col-6">
                    <div class="checkbox text-white">
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-6">
                    <div class="fog-pwd text-right">
                    <a href="{{ route('view.forgot-password') }}" class="text-white hover-info"><i class="ion ion-locked"></i> Forgot pwd?</a><br>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-info btn-rounded mt-10">SIGN IN</button>
                </div>
                <!-- /.col -->
                </div>
        </form>														

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Vendor JS -->
	<script src="{{asset('backend/js/vendors.min.js')}}"></script>
    <script src="{{asset('../assets/icons/feather-icons/feather.min.js')"></script>	
    
    
</body>
</html>
