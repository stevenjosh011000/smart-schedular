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
							<div class="ribbon ribbon-danger">Group 1</div>
							<p class="mb-0">All students in Group 1 must be present during the odd weeks. For example: Week 1 and Week 3 must come to school.</p>
						</div> <!-- end box-body-->
					</div>
				</div>
				<div class="col-xl-6 col-6">
					<div class="box">
						<div class="box-body ribbon-box">
							<div class="ribbon ribbon-danger">Group 2</div>
							<p class="mb-0">All students in Group 2 must be present during the even weeks. For example: Week 2 and Week 4 must come to school.</p>
						</div> <!-- end box-body-->
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-3 col-3">
					<div class="box">
						<div class="box-body ribbon-box">
									<div class="ribbon ribbon-primary" style="color:white;"><strong>Profile</strong></div>
									<table style="margin-top:50px;margin-bottom:50px;">
										<tr>
											<td><p class="mb-0"><b>Name:</b> </p></td>
											<td>{{$user['name']}}</td>
										</tr>
										<tr>
											<td><p class="mb-0"><b>Email:</b> </p></td>
											<td>{{$user['email']}}</td>
										</tr>
										@if($user->usertype == "Student")
										<tr>
											<td><p class="mb-0"><b>Parent Email:</b> </p></td>
											<td>{{$user->parentEmail}}</td>
										</tr>
										<tr>
											<td><p class="mb-0"><b>Class:</b> </p></td>
											<td>{{$class['student_class']['name']}}</td>
										</tr>
										<tr>
											<td><p class="mb-0">
												<b>Group:</b> 
												
												</p></td>
											<td>@if($user->group == "1")
												Group 1 (Odd Weeks)
												@else
												Group 2 (Even Weeks)
												@endif</td>
										</tr>

										@endif

										<tr>
											<td><p class="mb-0"><b>User Type:</b> </p></td>
											<td>{{$user->usertype}}</td>
										</tr>
									</table>
						</div> <!-- end box-body-->
					</div>
				</div>
			</div>
		</section>
		<!-- /.content -->
	  </div>
  </div>

  

  @endsection