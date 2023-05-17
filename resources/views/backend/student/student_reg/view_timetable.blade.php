@extends('admin.admin_master')
@section('admin')


  <div class="content-wrapper">
	  <div class="container-full">

		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-xl-6 col-6">
					<div class="box">
						<div class="box-body ribbon-box">
									<div class="ribbon ribbon-primary" style="color:black;"><strong>Class Timetable</strong></div>
									<p class="mb-0">
									@if(!empty($allData['student_class']['classtimetable']))
									<a href="{{url('upload/classtimetable/'.$allData['student_class']['classtimetable'])}}" class="btn btn-primary" style="color:black;" target="_blank">View</a>
									@else
									<span class='btn btn-primary' style="color:black;pointer-events: none;" >No Record</span>
									@endif
									</p>
						</div> <!-- end box-body-->
					</div>
				</div>
				<div class="col-xl-6 col-6">
					<div class="box">
						<div class="box-body ribbon-box">
							<div class="ribbon ribbon-danger" style="color:black;"><strong>Exam Timetable</strong></div>
							<p class="mb-0">
							@if(!empty($allData['student_class']['examtimetable']))
							<a href="{{url('upload/examtimetable/'.$allData['student_class']['examtimetable'])}}" class="btn btn-danger" style="color:black;" target="_blank">View</a>
							@else
							<span class='btn btn-danger' style="color:black;pointer-events: none;" >No Record</span>
							@endif
							</p>
						</div> <!-- end box-body-->
					</div>
				</div>
				
			
			
				
				
			</div>
		</section>
		<!-- /.content -->
	  </div>
  </div>
@endsection