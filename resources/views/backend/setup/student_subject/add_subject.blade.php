@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
	  <div class="container-full">
		<!-- Main content -->
		
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Add Subject</h4>
			 
			</div>
			<!-- /.box-header -->
			<div class="box-body">
            <form method="post" action="{{route('store.subject')}}">
                @csrf
               <div class="row">
                <div class="col-md-12">
                        <div class="form-group">
                            <h5>Subject Name <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="name" class="form-control"/>
                                @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
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