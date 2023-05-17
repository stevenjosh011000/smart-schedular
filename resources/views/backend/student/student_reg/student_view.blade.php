@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
	  <div class="container-full">
		<!-- Main content -->
		<section class="content">
		  <div class="row">
			
          <div class="col-12">
                <div class="box box-slided-up">
                        <div class="box-header with-border">
                        <h4 class="box-title">Student <strong>Filter</strong></h4>
                        <ul class="box-controls pull-right">
                            <li><a class="box-btn-slide" href="#"></a></li>
                        </ul>
                        </div>

                        <div class="box-body">
                        
                        <div class="box-body">
                        <form method="GET" action="{{route('student.class.search')}}">
                            <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                        <h5>Class <span class="text-danger"></span></h5>
                                        <div class="controls">
                                            <select name="class_id" id="select" required class="form-control">
                                                <option value="" selected="" disabled="">Select Class</option>
                                                <option value="0" selected>ALL</option>
                                                @foreach($classes as $class)
                                                
                                                @if($class->id == $class_id)
                                                <option value="{{$class->id}}" selected>{{$class->name}}</option>
                                                @else
                                                <option value="{{$class->id}}">{{$class->name}}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <input type="submit" name="search" value="Search" class="btn btn-rounded btn-primary mt-4">
                            </div>
                            </div>
                        </form>
                        </div>
                        </div>
                </div>
            
          </div>

			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Student List</h3>
                  <a href="{{route('student.registration.add')}}" style="float:right;" class="btn btn-rounded btn-success mb-5">Add Student</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5%">SL</th>
								<th>Student Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Parent Email</th>
                                <th>Phone No.</th>
								<th>Class</th>
								<th>Tingkatan</th>
                                <th>Group</th>
                                <th>Code</th>
								<th width="25%">Action</th>
							</tr>
						</thead>
						<tbody>
                            @foreach($allData as $key => $value)
							<tr>
								<td>{{$key+1}}</td>
                                <td>{{$value['student']['id_no']}}</td>
                                <td>{{$value['student']['name']}}</td>
                                <td>{{$value['student']['email']}}</td>
                                <td>{{$value['student']['parentEmail']}}</td>
                                <td>{{$value['student']['phoneNo']}}</td>
								<td>{{$value['student_class']['name']}}</td>
								<td>
                                    @switch($value->tingkatan)
                                        @case('1')
                                         Tingkatan 1
                                         @break
                                        @case('2')
                                            Tingkatan 2
                                            @break
                                        @case('3')
                                            Tingkatan 3
                                            @break
                                        @case('4')
                                            Tingkatan 4
                                            @break
                                        @case('5')
                                            Tingkatan 5
                                            @break
                                        @case('0')
                                            Peralihan
                                            @break
                                            @default
                                        @endswitch  
                                </td>
								<td>@switch($value->group)
                                        @case('1')
                                         Group 1 
                                         @break
                                        @case('2')
                                         Group 2
                                            @break
                                            @default
                                        @endswitch </td>
                                <td> <span class='badge badge-warning' style='color:black;'><strong>{{$value['student']['code']}}</strong></span></td>
                                <td>
                                    <a href="{{route('student.reg.edit',$value->student_id)}}" class="btn btn-info">Edit</a> 
                                    <a href="{{route('student.reg.delete',$value->student_id)}}" id="delete" class="btn btn-danger">Delete</a>
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