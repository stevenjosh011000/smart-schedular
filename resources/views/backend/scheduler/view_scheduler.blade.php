@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
	  <div class="container-full">
		<!-- Main content -->
		<section class="content">
		  <div class="row">
			

			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Scheduler List</h3>
                  <a href="{{route('add.scheduler',$id)}}" style="float:right;" class="btn btn-rounded btn-success mb-5">Add Event</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5%">SL</th>
								<th>Event Name</th>
                                <th>Start Date Time</th>
								<th>End Date Time</th>
								<th>Priority</th>
								<th width="25%">Action</th>
							</tr>
						</thead>
						<tbody>
                            @foreach($allData as $key => $value)
							<tr>
								<td>{{$key+1}}</td>
								<td>{{$value->event_name}}</td>
                                <td>{{$value->start_datetime}}</td>
								<td>{{$value->end_datetime}}</td>
								<td>{{$value->priority}}</td>
								<td><a href="{{route('edit.scheduler',$value->id)}}" class="btn btn-info">Edit</a>
								<a href="{{route('delete.scheduler',['id' => $value->id, 'student_id' => $value->student_id])}}" id="delete" class="btn btn-danger">Delete</a></td>
							</tr>
                            @endforeach
					
						</tbody>
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>        
			</div>
			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  </div>
  <!-- /.content-wrapper -->
@endsection