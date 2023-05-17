@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
	  <div class="container-full">
		<!-- Main content -->
		
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Add User</h4>
			 
			</div>
			<!-- /.box-header -->
			<div class="box-body">
            <form method="post" action="{{route('users.store')}}">
                @csrf
               <div class="row">
                <div class="col-md-6">
                            <!-- <div class="form-group">
								<h5>User Role <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="usertype" id="select" required class="form-control">
										<option value="" selected="" disabled="">Select Role</option>
										<option value="Admin">Admin</option>
										<option value="Student">Student</option>
									</select>
								</div>
							</div> -->
							<div class="form-group">
								<h5>Admin Name <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="name" class="form-control" required /> 
                                </div>
								@error('name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
							</div>
                </div>
                <div class="col-md-6">
							<div class="form-group">
								<h5>Admin Email<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="email" name="email" class="form-control" required />
							    </div>
								@error('email')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
								
                            </div>
                </div>

               </div>
               <input type="submit" value="Submit" class="btn btn-rounded btn-info mb-5"/>
		
               </form>			

			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>
		<!-- /.content -->
	  
	  </div>
  </div>
  <!-- /.content-wrapper -->
@endsection