<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\StudentExamType;

class StudentExamTypeController extends Controller
{
    public function ViewStudentExamType(){
        $data['allData'] = StudentExamType::all();
        return view('backend.setup.student_exam_type.view_exam_type', $data);
    }

    public function StudentExamTypeAdd(){
        return view('backend.setup.student_exam_type.add_exam_type');
    }

    public function StoreStudentExamType(Request $request){
        $validateData = $request->validate([
            'name' => 'required|unique:student_exam_types,name'
        ]);

        $data = new StudentExamType();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Exam Type Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.examtype.view')->with($notification);
    }

    public function StudentExamTypeEdit($id){
        $editData = StudentExamType::find($id);
        return view('backend.setup.student_exam_type.edit_exam_type', compact('editData'));
    }

    public function StudentExamTypeUpdate(Request $request){
        $data = StudentExamType::find($request->id);
        $validateData = $request->validate([
            'name' => 'required|unique:student_exam_types,name,'.$data->id
        ]);

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Exam Type Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('student.examtype.view')->with($notification);
    }

    public function StudentExamTypeDelete($id){
        $student = StudentExamType::find($id);
        $student->delete();

        $notification = array(
            'message' => 'Student Exam Type Deleted Successfully',
            'alert-type' => 'error'
        );

        return redirect()->route('student.examtype.view')->with($notification);
    }
}
