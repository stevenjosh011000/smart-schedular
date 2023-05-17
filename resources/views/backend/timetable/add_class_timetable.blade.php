@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
	  <div class="container-full">
		<!-- Main content -->
		
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Add Student Class Timetable</h4>
			 
			</div>
			<!-- /.box-header -->
			<div class="box-body">
            <form action="{{route('store.class.timetable',$editData->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-md-6">
                                <input type="file" name="image" class="form-control">
                            </div>
							@error('image')
                                    <span class="text-danger">{{$message}}</span>
							@enderror


                            <div class="col-md-6">
                                <button type="submit" class="btn btn-success">Upload a File</button>
                            </div>

                        </div>
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