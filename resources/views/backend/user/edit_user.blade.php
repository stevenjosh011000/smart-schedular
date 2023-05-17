@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
	  <div class="container-full">
		<!-- Main content -->
		
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Update User</h4>
			 
			</div>
			<!-- /.box-header -->
			<div class="box-body">
            <form method="post" action="{{route('user.update',$editData->id)}}">
                @csrf
               <div class="row">
                <div class="col-md-6">
							<div class="form-group">
								<h5>User Name <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="name" value="{{$editData->name}}" class="form-control" required /> 
                                </div>
								@error('name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
							</div>
                </div>
                <div class="col-md-6">
							<div class="form-group">
								<h5>User Email<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="email" name="email" value="{{$editData->email}}" class="form-control" required />
							    </div>
								@error('email')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                </div>

               </div>

               <input type="submit" value="Update" class="btn btn-rounded btn-info mb-5"/>
		
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