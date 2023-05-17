<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SchoolSubject;

class SchoolSubjectsController extends Controller
{
    public function ViewSubject(){
        $data['allData'] = SchoolSubject::all();
        return view('backend.setup.student_subject.view_subject', $data);
    }

    public function AddSubject(){
        return view('backend.setup.student_subject.add_subject');
    }

    public function StoreSubject(Request $request){
        $validated = $request->validate([
            'name' => 'required|unique:school_subjects,name',
        ],
        [
            'name.required' => 'Please Input Subject Name',
        ]
    );

        $data = new SchoolSubject();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Subject Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('subject.view')->with($notification);
    }

    public function SubjectEdit($id){
        $editData = SchoolSubject::find($id);
        return view('backend.setup.student_subject.edit_subject')->with('editData', $editData);
    }

    public function SubjectUpdate(Request $request, $id){
        $data = SchoolSubject::find($id);
        $validated = $request->validate([
            'name' => 'required|unique:school_subjects,name,'.$data->id,
        ],
        [
            'name.required' => 'Please Input Subject Name',
        ]
    );

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Subject Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('subject.view')->with($notification);
    }

    public function SubjectDelete($id){
        $data = SchoolSubject::find($id);
        $data->delete();

        $notification = array(
            'message' => 'Subject Deleted Successfully',
            'alert-type' => 'error'
        );

        return redirect()->route('subject.view')->with($notification);
    }


}
