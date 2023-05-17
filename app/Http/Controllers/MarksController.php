<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use Illuminate\Http\Request;

use App\Models\StudentClass;
use App\Models\StudentExamType;
use App\Models\StudentMarks;
use App\Models\AssignSubject;
use App\Models\User;

class MarksController extends Controller
{

    public function MarksAdd(){
    	$data['classes'] = StudentClass::all();
    	$data['exam_types'] = StudentExamType::all();

    	return view('backend.marks.marks_add',$data);

    }


    public function MarksStore(Request $request){
  
    	$studentcount = $request->student_id;
        
    	if ($studentcount != NULL) {
            for ($i=0; $i <count($request->student_id) ; $i++) { 
                if($request->marks[$i] != NULL){
                    $checkStudent = StudentMarks::where('class_id',$request->class_id)->where('assign_subject_id',$request->assign_subject_id)->where('exam_type_id',$request->exam_type_id)->where('student_id',$request->student_id[$i])->first();
                    $student = User::where('id',$request->student_id[$i])->first();
                    if($checkStudent){
                        $notification = array(
                            'message' => $student->name.' marks already inserted for this exam session and subject only can edit the marks.',
                            'alert-type' => 'error'
                            );
                        return redirect()->back()->with($notification);
                    }
                }
                
               
            } 

    		for ($i=0; $i <count($request->student_id) ; $i++) { 
                if($request->marks[$i] != NULL){
                    $data = New StudentMarks();
                    $data->class_id = $request->class_id;
                    $data->assign_subject_id = $request->assign_subject_id;
                    $data->exam_type_id = $request->exam_type_id;
                    $data->student_id = $request->student_id[$i];
                    $data->id_no = $request->id_no[$i];
                    $data->marks = $request->marks[$i];
                    $data->save();
                }
    		} 
            $notification = array(
                'message' => 'Student Marks Inserted Successfully',
                'alert-type' => 'success'
                );
    	}else{
            $notification = array(
                'message' => 'Something went wrong!',
                'alert-type' => 'error'
                );
        }

			

    	return redirect()->back()->with($notification);

    }



    public function MarksEdit(){
    	$data['classes'] = StudentClass::all();
    	$data['exam_types'] = StudentExamType::all();

    	return view('backend.marks.marks_edit',$data);
    }


    public function MarksEditGetStudents(Request $request){
    	$class_id = $request->class_id;
    	$assign_subject_id = $request->assign_subject_id;
    	$exam_type_id = $request->exam_type_id;

    	$getStudent = StudentMarks::with(['student'])->where('class_id',$class_id)->where('assign_subject_id',$assign_subject_id)->where('exam_type_id',$exam_type_id)->get();

    	return response()->json($getStudent);

    }


    public function MarksUpdate(Request $request){

	StudentMarks::where('class_id',$request->class_id)->where('assign_subject_id',$request->assign_subject_id)->where('exam_type_id',$request->exam_type_id)->delete();

        $studentcount = $request->student_id;
    	if ($studentcount) {
    		for ($i=0; $i <count($request->student_id) ; $i++) { 
    		$data = New StudentMarks();
    		$data->class_id = $request->class_id;
    		$data->assign_subject_id = $request->assign_subject_id;
    		$data->exam_type_id = $request->exam_type_id;
    		$data->student_id = $request->student_id[$i];
    		$data->id_no = $request->id_no[$i];
    		$data->marks = $request->marks[$i];
    		$data->save();

    		}
    	}

			$notification = array(
    		'message' => 'Student Marks Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->back()->with($notification);


    }

    public function GetSubject(Request $request){
    	$class_id = $request->class_id;
    	$allData = AssignSubject::with(['school_subject'])->where('class_id',$class_id)->get();
    	return response()->json($allData);

    }


    public function GetStudents(Request $request){
    	$class_id = $request->class_id;
    	$allData = AssignStudent::with(['student'])->where('class_id',$class_id)->get();
    	return response()->json($allData);
    }







}
 