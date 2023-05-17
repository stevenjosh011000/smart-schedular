<?php

namespace App\Http\Controllers;

use App\Models\AssignSubject;
use App\Models\SchoolSubject;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class AssignSubjectController extends Controller
{
    public function ViewAssignSubject(){
        $data['allData'] = AssignSubject::select('class_id')->groupBy('class_id')->get();
        return view('backend.setup.assign_subject.view_assign_subject', $data);
    }

    public function AddAssignSubject(){
        $data['subjects'] = SchoolSubject::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.assign_subject.add_assign_subject', $data);
    }

    public function StoreAssignSubject(Request $request){
        $subjectCount = count($request->subject_id);

        if($subjectCount != NULL){


            for($i=0; $i<$subjectCount; $i++){
                if($request->full_mark[$i] < $request->pass_mark[$i]){
                    $notification = array(
                        'message' => 'Sorry! Full Mark can not be less than Pass Mark',
                        'alert-type' => 'error'
                    );
                    return redirect()->route('assign_subject.add')->with($notification);
                }
                
                foreach($request->subject_id as $key =>$value){
                    if($request->subject_id[$i] == $value && $key != $i){
                        $notification = array(
                            'message' => 'Sorry! You can not select same subject more than once',
                            'alert-type' => 'error'
                        );
                        return redirect()->route('assign_subject.add')->with($notification);
                    }
                }

                $assign_subject = new AssignSubject();
                $assign_subject->class_id = $request->class_id;
                $assign_subject->subject_id = $request->subject_id[$i];
                $assign_subject->full_mark = $request->full_mark[$i];
                $assign_subject->pass_mark = $request->pass_mark[$i];
                $assign_subject->save();
            }
        }

        $notification = array(
            'message' => 'Subject Assigned Successfully',
            'alert-type' => 'success'
        );
        

        return redirect()->route('assign_subject.view')->with($notification);
    }

    public function AssignSubjectEdit($class_id){
        $data['editData'] = AssignSubject::where('class_id', $class_id)->orderBy('subject_id','asc')->get();
        $data['subjects'] = SchoolSubject::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.assign_subject.edit_assign_subject', $data);
    }

    public function AssignSubjectUpdate(Request $request,$class_id){
        if($request->subject_id == NULL){
            $notification = array(
                'message' => 'Sorry! You do not select any subject',
                'alert-type' => 'error'
            );
            return redirect()->route('assign_subject.edit',$class_id)->with($notification);
        }else{

            $subjectCount = count($request->subject_id);

            for($i=0; $i<$subjectCount; $i++){
                if($request->full_mark[$i] < $request->pass_mark[$i]){
                    $notification = array(
                        'message' => 'Sorry! Full Mark can not be less than Pass Mark',
                        'alert-type' => 'error'
                    );
                    return redirect()->route('assign_subject.edit',$class_id)->with($notification);
                }
                
                foreach($request->subject_id as $key =>$value){
                    if($request->subject_id[$i] == $value && $key != $i){
                        $notification = array(
                            'message' => 'Sorry! You can not select same subject more than once',
                            'alert-type' => 'error'
                        );
                        return redirect()->route('assign_subject.edit',$class_id)->with($notification);
                    }
                }
            }
            AssignSubject::where('class_id', $class_id)->delete();
            for($i=0; $i<$subjectCount; $i++){
                $assign_subject = new AssignSubject();
                $assign_subject->class_id = $request->class_id;
                $assign_subject->subject_id = $request->subject_id[$i];
                $assign_subject->full_mark = $request->full_mark[$i];
                $assign_subject->pass_mark = $request->pass_mark[$i];
                $assign_subject->save();
            }


            $notification = array(
                'message' => 'Data Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('assign_subject.view')->with($notification);
        }
    }

    public function AssignSubjectDetails($class_id){
        $data['details'] = AssignSubject::where('class_id', $class_id)->orderBy('subject_id','asc')->get();
        return view('backend.setup.assign_subject.details_assign_subject', $data);
    }


}
