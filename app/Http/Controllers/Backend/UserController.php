<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\MailNotify;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function UserView()
    {
        $allData = User::where('usertype', 'Admin')->get();
        return view('backend.user.view_user', compact('allData'));
    }

    public function UserRecovery(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        $data = [
            'subject' => 'Student Login Information',
            'email' => "Student Email : ".$request->email."",
            'password' => "Password : ".$user->code."",
            'thankyou' => 'Thank You',
        ];

        try{
        Mail::to($user->email)->send(new MailNotify($data));
        Mail::to($user->parentEmail)->send(new MailNotify($data));
        }catch(Exception $th){
            dd($th);
        }

        $notification = array(
            'message' => 'Recovery email sent Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('view.forgot-password')->with($notification);
    }

    public function UserAdd()
    {
        return view('backend.user.add_user');
    }

    public function UserStore(Request $request){
        $validatedData = $request->validate([
            'email' => 'required|unique:users',
            'name' => 'required',
        ]);

        $user = new User();
        $code = rand(1000,9999);
        $user->usertype = 'Admin';
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($code);
        $user->code = $code;
        $user->save();

        $data = [
            'subject' => 'Login Information',
            'email' => "Email : ".$request->email."",
            'password' => "Password : ".$code."",
            'thankyou' => 'Thank You',
        ];

        try{
        Mail::to(request('email'))->send(new MailNotify($data));
        }catch(Exception $th){
            dd($th);
        }

        $notification = array(
            'message' => 'User Inserted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('user.view')->with($notification);
    }

    public function UserEdit($id){
        $editData = User::find($id);
        return view('backend.user.edit_user', compact('editData'));
    }
     
    public function UserUpdate(Request $request, $id){
        $validatedData = $request->validate([
            'email' => 'required|unique:users,email,'. $id,
            'name' => 'required',
        ]);

        $user = User::find($id);
        $data = [
            'subject' => 'Login Information',
            'email' => "Email : ".$request->email."",
            'password' => "Password : ".$user->code."",
            'thankyou' => 'Thank You',
        ];

        try{
        Mail::to(request('email'))->send(new MailNotify($data));
        }catch(Exception $th){
            dd($th);
        }

        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        $notification = array(
            'message' => 'User Updated Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('user.view')->with($notification);
    }

    public function UserDelete($id){
        $user = User::find($id);
        $user->delete();

        $notification = array(
            'message' => 'User Deleted Successfully',
            'alert-type' => 'error',
        );

        return redirect()->route('user.view')->with($notification);
    }
}
