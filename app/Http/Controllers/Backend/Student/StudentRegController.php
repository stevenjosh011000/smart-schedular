<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use App\Mail\MailNotify;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Models\StudentClass;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class StudentRegController extends Controller
{
    public function StudentRegView(){
        $data['classes'] = StudentClass::all();
        $data['class_id'] = "0";
        $data['allData'] = AssignStudent::all();
        return view('backend.student.student_reg.student_view', $data);
    }

    public function StudentRegAdd(){
        $data['classes'] = StudentClass::all();
        return view('backend.student.student_reg.student_add', $data);
    }

    public function StudentRegEdit($id){
        $data['editData'] = AssignStudent::with(['student','student_class'])->where('student_id',$id)->first();
        $data['classes'] = StudentClass::all();
        return view('backend.student.student_reg.student_edit', $data);
    }

    

    public function StudentSearch(Request $request){
        $data['classes'] = StudentClass::all();
        
        $data['class_id'] = $request->class_id;
       
        if($request->class_id != '0'){
           $data['allData'] = AssignStudent::where('class_id',$request->class_id)->get();
        }else{
           $data['allData'] = AssignStudent::all();
        }
       
        return view('backend.student.student_reg.student_view', $data);
    }

    public function StudentRegUpdate(Request $request, $id){
        
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i|unique:users,email,'. $id,
            'parentEmail' => 'required|regex:/(.+)@(.+)\.(.+)/i',
            'phoneNo' => 'required|digits_between:8,12'
        ]);

        DB::transaction(function() use($request,$id){
           
            $user = User::where('id',$id)->first();
           
            $user->name = $request->name;
            $user->usertype = 'Student';
            $user->parentEmail = $request->parentEmail;
            $user->email = $request->email;
            $user->phoneNo = $request->phoneNo;
            $user->gender = $request->gender;
            $user->save();

            $assign_student = AssignStudent::where('student_id',$id)->first();
            $assign_student->student_id = $user->id;
            $assign_student->class_id = $request->class_id;
            $assign_student->group = $request->group;
            $assign_student->tingkatan = $request->tingkatan;
            $assign_student->save();

            


        });

        $data = [
            'subject' => 'Student Login Information Updated',
            'email' => "Student Email : ".$request->email."",
            'password' => "Password : ".$request->code."",
            'thankyou' => 'Thank You',
        ];

        try{
        Mail::to(request('email'))->send(new MailNotify($data));
        Mail::to(request('parentEmail'))->send(new MailNotify($data));
        }catch(Exception $th){
            dd($th);
        }

        $notification = array(
            'message' => 'Student Registration Updated Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('student.registration.view')->with($notification);

    }

    public function StudentRegDelete($id){
        $user = User::where('id',$id)->first();
        $user->delete();

        $assign_student = AssignStudent::where('student_id',$id)->first();
        $assign_student->delete();

        $notification = array(
            'message' => 'Student Registration Deleted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('student.registration.view')->with($notification);
    }

    public function StudentRegStore(Request $request){



        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i|unique:users,email',
            'parentEmail' => 'required|regex:/(.+)@(.+)\.(.+)/i|different:email',
            'phoneNo' => 'required|digits_between:8,12'
        ]);



        DB::transaction(function()use($request){
            $student = User::where('usertype','Student')->orderBy('id','DESC')->first();
            if($student == null){
                $firstReg = 0 ;
                $studentId = $firstReg+1;
                if($studentId < 10){
                    $id_no = '000'.$studentId;
                }elseif($studentId < 100){
                    $id_no = '00'.$studentId;
                }elseif($studentId < 1000){
                    $id_no = '0'.$studentId;
                }
            }
            else{
                $student = User::where('usertype','Student')->orderBy('id','DESC')->first()->id;
                $studentId = $student+1;
                if($studentId < 10){
                    $id_no = '000'.$studentId;
                }elseif($studentId < 100){
                    $id_no = '00'.$studentId;
                }elseif($studentId < 1000){
                    $id_no = '0'.$studentId;
                }
            }
            $final_id_no = date('Y').$id_no;
            $user = new User();
            $code = rand(100000,999999);
            $user->id_no = $final_id_no;
            $user->name = $request->name;
            $user->password = bcrypt($code);
            $user->code = $code;
            $user->usertype = 'Student';
            $user->code = $code;
            $user->parentEmail = $request->parentEmail;
            $user->email = $request->email;
            $user->phoneNo = $request->phoneNo;
            $user->gender = $request->gender;
            $user->save();

            $assign_student = new AssignStudent();
            $assign_student->student_id = $user->id;
            $assign_student->class_id = $request->class_id;
            $assign_student->group = $request->group;
            $assign_student->tingkatan = $request->tingkatan;
            $assign_student->save();

            $data = [
                'subject' => 'Student Login Information',
                'email' => "Student Email : ".$request->email."",
                'password' => "Password : ".$code."",
                'thankyou' => 'Thank You',
            ];

            try{
            Mail::to(request('email'))->send(new MailNotify($data));
            Mail::to(request('parentEmail'))->send(new MailNotify($data));
            }catch(Exception $th){
                dd($th);
            }

        });
        
        

        $notification = array(
            'message' => 'Student Registration Inserted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('student.registration.view')->with($notification);
    }
    
}
