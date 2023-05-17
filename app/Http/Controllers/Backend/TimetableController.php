<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class TimetableController extends Controller
{
    public function ViewTimetable(){
        $data['allData'] =  StudentClass::all();
        return view('backend.timetable.view_timetable', $data);
    }

    public function UpdateClassTimetable($id){
        $data['editData'] = StudentClass::find($id);
        return view('backend.timetable.add_class_timetable',$data);
    }

    public function StoreClassTimetable(Request $request, $id){
        $validatedData = $request->validate([
            'image' => 'required|mimes:jpeg,bmp,jpg,png',
        ]);

        if($request->file('image')){
            $file = $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/classtimetable'), $filename);
            $class = StudentClass::find($id);
            $class['classtimetable'] = $filename;
            $class->save();
        }

        $notification = array(
            'message' => 'Class timetable Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('view.all.timetable')->with($notification);
    }

    public function UpdateExamTimetable($id){
        $data['editData'] = StudentClass::find($id);
        return view('backend.timetable.add_exam_timetable',$data);
    }

    public function StoreExamTimetable(Request $request, $id){
        $validatedData = $request->validate([
            'image' => 'required|mimes:jpeg,bmp,jpg,png',
        ]);

        if($request->file('image')){
            $file = $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/examtimetable'), $filename);
            $class = StudentClass::find($id);
            $class['examtimetable'] = $filename;
            $class->save();
        }

        $notification = array(
            'message' => 'Exam timetable Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('view.all.timetable')->with($notification);
    }

    public function DeleteClassTimetable($id){
        $class = StudentClass::find($id);
        $file = public_path('upload/classtimetable/'.$class->classtimetable);
        if(file_exists($file)){
            @unlink($file);
        }
        $class['classtimetable'] = '';
        $class->save();

        $notification = array(
            'message' => 'Class timetable Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('view.all.timetable')->with($notification);
    }

    public function DeleteExamTimetable($id){
        $class = StudentClass::find($id);
        $file = public_path('upload/examtimetable/'.$class->examtimetable);
        if(file_exists($file)){
            @unlink($file);
        }
        $class['examtimetable'] = '';
        $class->save();

        $notification = array(
            'message' => 'Exam timetable Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('view.all.timetable')->with($notification);
    }

    //Student

    public function ViewStudTimetable($id){
        $data['allData'] = AssignStudent::with(['student'],['student_class'])->where('student_id', $id)->first();
        return view('backend.student.student_reg.view_timetable', $data);
    }
}
