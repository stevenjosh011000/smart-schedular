<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Scheduler;
use Illuminate\Http\Request;

class SchedulerController extends Controller
{
    public function ViewScheduler($id){
        $data['allData'] =  Scheduler::where('student_id', $id)->get();
        $data['id'] = $id;
        return view('backend.scheduler.view_scheduler', $data);
    }

    public function AddScheduler($id){
        $data['id'] = $id;
        return view('backend.scheduler.add_scheduler', $data);
    }

    public function StoreScheduler(Request $request){
        $validatedData = $request->validate([
            'event_name' => 'required',
            'start_datetime' => 'required',
            'end_datetime' => 'required|after:start_datetime',
        ]);

        $data = new Scheduler();
        $data->student_id = $request->user_id;
        $data->event_name = $request->event_name;
        $data->start_datetime = date('Y-m-d H:i:s', strtotime($request->start_datetime));
        $data->end_datetime = date('Y-m-d H:i:s', strtotime($request->end_datetime));
        $data->priority = $request->priority;
        $data->save();

        $notification = array(
            'message' => 'Scheduler Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('view.scheduler', $request->user_id)->with($notification);
    }

    public function EditScheduler($id){
        $data['editData'] = Scheduler::find($id);
        return view('backend.scheduler.edit_scheduler', $data);
    }

    public function UpdateScheduler(Request $request){
        $validatedData = $request->validate([
            'event_name' => 'required',
            'start_datetime' => 'required',
            'end_datetime' => 'required|after:start_datetime',
        ]);

        $data = Scheduler::find($request->id);
        $data->event_name = $request->event_name;
        $data->start_datetime = date('Y-m-d H:i:s', strtotime($request->start_datetime));
        $data->end_datetime = date('Y-m-d H:i:s', strtotime($request->end_datetime));
        $data->priority = $request->priority;
        $data->save();

        $notification = array(
            'message' => 'Scheduler Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('view.scheduler', $data->student_id)->with($notification);
    }

    public function DeleteScheduler($id,$student_id){
        $data = Scheduler::find($id);
        $data->delete();

        $notification = array(
            'message' => 'Scheduler Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('view.scheduler', $student_id)->with($notification);
    }
}
