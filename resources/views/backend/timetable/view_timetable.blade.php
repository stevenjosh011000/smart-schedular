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
				  <h3 class="box-title">Timetable List</h3>
                 
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5%">SL</th>
								<th>Class Name</th>
                                <th>Class Timetable</th>
                                <th>Exam Timetable</th>
							</tr>
						</thead>
						<tbody>
                            @foreach($allData as $key => $value)
							<tr>
								<td>{{$key+1}}</td>
								<td>{{$value->name}}</td>
                                <td><a href="{{route('add.class.timetable',$value->id)}}"class="btn btn-success" style="color:black;"><strong>Update</strong></a>
								
								@if(!empty($value->classtimetable))
								<a href="{{route('delete.class.timetable',$value->id)}}" id="delete" style="color:black;" class="btn btn-danger"><strong>Remove</strong></a>
								<a href="{{url('upload/classtimetable/'.$value->classtimetable)}}" class="btn btn-warning" style="color:black;" target="_blank"><strong>View</strong></a>
								@else
								<span class='btn btn-danger' style="color:black;pointer-events: none;" ><strong>No Record Please Update</strong></span>
								@endif
								
                                <td>
								<a href="{{route('add.exam.timetable',$value->id)}}"class="btn btn-success" style="color:black;"><strong>Update</strong></a>
								
								@if(!empty($value->examtimetable))
								<a href="{{route('delete.exam.timetable',$value->id)}}" id="delete" style="color:black;" class="btn btn-danger"><strong>Remove</strong></a>
								<a href="{{url('upload/examtimetable/'.$value->examtimetable)}}" class="btn btn-warning" style="color:black;" target="_blank"><strong>View</strong></a>
								@else
								<span class='btn btn-danger' style="color:black;pointer-events: none;" ><strong>No Record Please Update</strong></span>
								@endif
                                 
                                </td>
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