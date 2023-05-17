
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('backend/images/SLogo.png')}}">

    <title>Smart Scheduler - Recover Password</title>
  
	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{ asset('backend/css/vendors_css.css')}}">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="{{ asset('backend/css/style.css')}}">
	<link rel="stylesheet" href="{{ asset('backend/css/skin_color.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"/>
</head>

<body class="hold-transition theme-primary bg-gradient-primary">
	
	<div class="container h-p100">
		<div class="row align-items-center justify-content-md-center h-p100">
			
			<div class="col-12">
                
				<div class="row justify-content-center no-gutters">
                    
					<div class="col-lg-4 col-md-5 col-12">
						<div class="content-top-agile p-10">
                           
                                <h3 class="mb-0 text-white">Recover Password</h3>
													
						</div>
                        
						<div class="p-30 rounded30 box-shadowed b-2 b-dashed">
                        
							<form action="{{route('users.recover')}}" method="post">
                                @csrf
								<div class="form-group">
                                 <div class="row">
                                    <div class="col-12 text-right">
                                    <a href="{{ route('login-page') }}" class="text-white hover-info"><i class="ti-angle-double-left"></i> Back</a>             
                                    </div>
									<!-- /.col -->
								     </div>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text bg-transparent text-white"><i class="ti-email"></i></span>
										</div>
										<input type="email" name="email" class="form-control pl-15 bg-transparent text-white plc-white" placeholder="Your Email" required>
									</div>
								</div>
								  <div class="row">
									<div class="col-12 text-center">
									  <button type="submit" class="btn btn-info btn-rounded margin-top-10">Reset</button>
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
    <script src="{{asset('../assets/icons/feather-icons/feather.min.js')}}"></script>	

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    @if(Session::has('message'))
        <script>
        var type = "{{ Session::get('alert-type', 'info') }}"
        switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
        
        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
        
        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;
        
        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
        }
        </script>
    @endif
</body>
</html>

