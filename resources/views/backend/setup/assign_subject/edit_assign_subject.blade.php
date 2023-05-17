@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="content-wrapper">
	  <div class="container-full">
		<!-- Main content -->
		
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Add Assign Subject</h4>
			 
			</div>
			<!-- /.box-header -->
			<div class="box-body">
            <form method="POST" action="{{route('assign_subject.update',$editData[0]->class_id)}}">
                @csrf
                <div class="add_item">
               <div class="row">
                <div class="col-md-9">
                         <div class="form-group">
                                <h5>Class Name <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="class_id" id="select" required class="form-control">
										<option value="" selected="" disabled="">Select Class</option>
                                        @foreach($classes as $class)
										@if($editData['0']->class_id == $class->id)
                                            <option value="{{$class->id}}" selected>{{$class->name}}</option>
                                        @else
                                        <option value="{{$class->id}}">{{$class->name}}</option>
                                        @endif
										@endforeach
                                        
									</select>
							    </div>
                        </div>
                </div>
               </div>

               @foreach($editData as $edit)
               <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
               <div class="row">
                    <div class="col-md-3">
                            <div class="form-group">
                                    <h5>Subject <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="subject_id[]" id="select" required class="form-control">
                                            <option value="" selected="" disabled="">Select Subject</option>
                                            @foreach($subjects as $subject)
                                            @if($edit->subject_id == $subject->id)
                                                <option value="{{$subject->id}}" selected>{{$subject->name}}</option>
                                            @else
                                            <option value="{{$subject->id}}">{{$subject->name}}</option>
                                            @endif
                                            @endforeach
                                            
                                        </select>
                                    </div>
                            </div>
                    </div>
                    <div class="col-md-3">
                            <div class="form-group">
                                    <h5>Full Mark <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="number" name="full_mark[]" value="{{$edit->full_mark}}" class="form-control" max="100" required>
                                    </div>
                            </div>
                    </div>
                    <div class="col-md-3">
                            <div class="form-group">
                                    <h5>Pass Mark <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="number" name="pass_mark[]" value="{{$edit->pass_mark}}" class="form-control" max="100" required>
                                    </div>
                            </div>
                    </div>

                    <div class="col-md-3" >
                        <span class="btn btn-success addeventmore" style="margin-top: 25px"><i class="fa fa-plus-circle"></i></span>
                        <span class="btn btn-danger removeeventmore" style="margin-top: 25px"><i class="fa fa-minus-circle"></i></span>
                    </div>
               </div>
               </div>
                @endforeach

               </div>
              
                

                <input type="submit" value="Submit" class="btn btn-rounded btn-info mb-5"/>
		
               </form>		
               <div style="visibility:hidden;">
                   <div class="whole_extra_item_add" id="whole_extra_item_add">
                     <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                        <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                    <h5>Subject <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="subject_id[]" id="select" required class="form-control">
                                            <option value="" selected="" disabled="">Select Subject</option>
                                            @foreach($subjects as $subject)
                                            <option value="{{$subject->id}}">{{$subject->name}}</option>
                                        
                                            @endforeach
                                            
                                        </select>
                                    </div>
                            </div>
                    </div>
                    <div class="col-md-3">
                            <div class="form-group">
                                    <h5>Full Mark <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="number" name="full_mark[]" class="form-control" max="100"  required>
                                    </div>
                            </div>
                    </div>
                    <div class="col-md-3">
                            <div class="form-group">
                                    <h5>Pass Mark <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="number" name="pass_mark[]" class="form-control" max="100" required>
                                    </div>
                            </div>
                    </div>

                            <div class="col-md-3" >
                                <span class="btn btn-success addeventmore" style="margin-top: 25px"><i class="fa fa-plus-circle"></i></span>
                                <span class="btn btn-danger removeeventmore" style="margin-top: 25px"><i class="fa fa-minus-circle"></i></span>
                            </div>
                        </div>
                     </div>
                   </div>
                </div>	

			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>
		<!-- /.content -->
	  
	  </div>
  </div>
  <script type="text/javascript">
    $(document).ready(function(){
        var counter = 0;
        $(document).on("click",".addeventmore",function(){
            var whole_extra_item_add = $('#whole_extra_item_add').html();
            $(this).closest(".add_item").append(whole_extra_item_add);
            counter++;
        });
        $(document).on("click",".removeeventmore",function(event){
            $(this).closest(".delete_whole_extra_item_add").remove();
            counter -= 1
        });
    });
  </script>
  
  <!-- /.content-wrapper -->
@endsection