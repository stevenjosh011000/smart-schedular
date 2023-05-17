<?php

namespace App\Http\Controllers;

use App\Models\AssignStudent;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $data['user'] = auth()->user();
        $data['class'] = AssignStudent::with(['student_class'])->where('student_id', $data['user']->id)->first();

        return view('admin.index', $data);
    }
}
