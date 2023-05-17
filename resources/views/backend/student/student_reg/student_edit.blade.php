@extends('admin.admin_master')
@section('admin')
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->

<div class="content-wrapper">
	  <div class="container-full">
		<!-- Main content -->
		
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Edit Student</h4>
			 
			</div>
			<!-- /.box-header -->
			<div class="box-body">
            <form method="post" action="{{route('student.reg.update',$editData->student_id)}}">
                @csrf

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <h5>Student Name <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="name" value="{{$editData['student']['name']}}" class="form-control"/>
                                @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <h5>Email <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="email" value="{{$editData['student']['email']}}" class="form-control"/>
                                @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <h5>Parent Email <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="parentEmail" value="{{$editData['student']['parentEmail']}}" class="form-control"/>
                                @error('parentEmail')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <h5>Phone No. <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="phoneNo" value="{{$editData['student']['phoneNo']}}" class="form-control"/>
                                @error('phoneNo')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
								<h5>Gender <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="gender" id="select" required class="form-control">
										<option value="" selected="" disabled="">Select Gender</option>
                                        @if($editData['student']['gender'] == "Male")
                                            <option value="Male" selected>Male</option>
                                            <option value="Female">Female</option>
                                        @else
                                            <option value="Male">Male</option>
                                            <option value="Female" selected>Female</option>
                                        @endif
									</select>
								</div>
						</div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                                <h5>Class <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="class_id" id="select" required class="form-control">
										<option value="" selected="" disabled="">Select Class</option>
                                        @foreach($classes as $class)
										@if($editData['student_class']['name'] == $class->name)
                                            <option value="{{$class->id}}" selected>{{$class->name}}</option>
                                        @else
                                        <option value="{{$class->id}}">{{$class->name}}</option>
                                        @endif
										@endforeach
                                        
									</select>
							    </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                                <h5>Tingkatan <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="tingkatan" id="select" required class="form-control">
										<option value="" selected="" disabled="">Select Tingkatan</option>
                                        <option value="0" {{$editData->tingkatan == "0" ? "selected" : ""}}>Peralihan</option>
										<option value="1" {{$editData->tingkatan == "1" ? "selected" : ""}}>Tingkatan 1</option>
                                        <option value="2" {{$editData->tingkatan == "2" ? "selected" : ""}}>Tingkatan 2</option>
                                        <option value="3" {{$editData->tingkatan == "3" ? "selected" : ""}}>Tingkatan 3</option>
                                        <option value="4" {{$editData->tingkatan == "4" ? "selected" : ""}}>Tingkatan 4</option>
                                        <option value="5" {{$editData->tingkatan == "5" ? "selected" : ""}}>Tingkatan 5</option>
									</select>
							    </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                                <h5>Group <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="group" id="select" required class="form-control">
										<option value="" selected="" disabled="">Select Group</option>
                                        <option value="1" {{$editData->group == "1" ? "selected" : ""}}>Group 1(Odd Week)</option>
										<option value="2" {{$editData->group == "2" ? "selected" : ""}}>Group 2(Even Week)</option>
									</select>
							    </div>
                        </div>
                        <!-- <div class="form-group">
                            <h5>Exam Timetable</h5>
                            <div class="controls">
                                <input type="file" name="image" class="form-control" id="image" />
                                @error('image')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="controls">
                                <img id="showImage" src="{{url('upload/no_image.jpg')}}" style="width: 100px; height: 100px; border: 1px solid #000000;">
                            </div>
                        </div> -->
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


    <!-- <script type="text/javascript">
        $(document).ready(function(){
            $('#image').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script> -->


@endsection