@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
	  <div class="container-full">
		<!-- Main content -->
		
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Edit Event</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
            <form method="post" action="{{route('update.scheduler')}}">
                @csrf
              
                <div class="col-md-12">
                        <div class="form-group">
                            <h5>Event Name <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="event_name" value="{{$editData->event_name}}" class="form-control"/>
                                <input type="hidden" name="id" value="{{$editData->id}}"/>
                                @error('event_name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                </div>
                <div class="form-group">
                <div class="row">
                  <div class="col-md-10">
                  <div class="col-md-8">
                    <h5>Start Date Time <span class="text-danger">*</span></h5>
                    </div>
                    <div class="col-md-12">
                    <input type="datetime-local" class="form-control" value="{{$editData->start_datetime}}"  name="start_datetime">
                    </div>
                  </div>
                  <div class="col-md-2">
                  </div>
                  
                </div>
               </div>

                <div class="form-group">
                <div class="row">
                  <div class="col-md-10">
                    <div class="col-md-8">
                    <h5>End Date Time <span class="text-danger">*</span></h5>
                    </div>
                    <div class="col-md-12">
                    <input type="datetime-local" class="form-control" value="{{$editData->end_datetime}}"  name="end_datetime">
                    </div>
                  </div>
                  <div class="col-md-2">
                  </div>
                  
                </div>
               </div>

               <div class="form-group">
                <div class="row">
                  <div class="col-md-10">
                  <div class="col-md-8">
                    </div>
                    <div class="col-md-12">
                    <h5>Priority <span class="text-danger">*</span></h5>
                    <div class="controls">
                      <select name="priority" id="select" required class="form-control">
                        <option value="" selected="" disabled="">Select Priority</option>
                        <option value="Priority 1" {{($editData->priority == "Priority 1")?"selected":""}}>Priority 1</option>
                        <option value="Priority 2" {{($editData->priority == "Priority 2")?"selected":""}}>Priority 2</option>
                        <option value="Priority 3" {{($editData->priority == "Priority 3")?"selected":""}}>Priority 3</option>
                        <option value="Priority 4" {{($editData->priority == "Priority 4")?"selected":""}}>Priority 4</option>
                        <option value="Priority 5"{{($editData->priority == "Priority 5")?"selected":""}}>Priority 5</option>
                      </select>
                    </div>
                    </div>
                  </div>
                  <div class="col-md-2">
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
  @push('scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    config = {
        enableTime: true,
        dateFormat: 'Y-m-d H:i',
    }
    flatpickr("input[type=datetime-localStart]", config);
    flatpickr("input[type=datetime-localEnd]", config);
</script>
@endpush
  <!-- /.content-wrapper -->
@endsection