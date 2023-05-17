<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AssignSubjectController;
use App\Http\Controllers\MarksController;
use App\Http\Controllers\Backend\SchedulerController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\Setup\StudentClassController; 
use App\Http\Controllers\Backend\Student\StudentRegController;
use App\Http\Controllers\Backend\TimetableController;
use App\Http\Controllers\SchoolSubjectsController;
use App\Http\Controllers\StudentExamTypeController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
})->name('login-page');


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::post('/recover', [UserController::class, 'UserRecovery'])->name('users.recover');

Route::get('/forgot-password', function () { return view('auth.forgot-password');})->name('view.forgot-password');

Route::get('/admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');

//User Management all Routes

Route::middleware(['auth', 'admin'])->group(function () {
    
    Route::prefix('users')->group(function(){

        // User Routes

        Route::get('/view', [UserController::class, 'UserView'])->name('user.view');

        Route::get('/add', [UserController::class, 'UserAdd'])->name('user.add');

        Route::post('/store', [UserController::class, 'UserStore'])->name('users.store');

        Route::get('/edit/{id}', [UserController::class, 'UserEdit'])->name('user.edit');

        Route::post('/update/{id}', [UserController::class, 'UserUpdate'])->name('user.update');

        Route::get('/delete/{id}', [UserController::class, 'UserDelete'])->name('user.delete');
    });
    
    Route::prefix('setups')->group(function(){

        // Student Class Routes

        Route::get('/student/class/view', [StudentClassController::class, 'ViewStudent'])->name('student.class.view');

        Route::get('/student/class/add', [StudentClassController::class, 'StudentClassAdd'])->name('student.class.add');

        Route::post('/student/class/store', [StudentClassController::class, 'StoreStudentClass'])->name('store.student.class');

        Route::get('/student/class/edit/{id}', [StudentClassController::class, 'StudentClassEdit'])->name('student.class.edit');

        Route::post('/student/class/update/{id}', [StudentClassController::class, 'StudentClassUpdate'])->name('student.class.update');

        Route::get('/student/class/delete/{id}', [StudentClassController::class, 'StudentClassDelete'])->name('student.class.delete');

        // Student Exam Type Routes

        Route::get('/student/examtype/view', [StudentExamTypeController::class, 'ViewStudentExamType'])->name('student.examtype.view');

        Route::get('/student/examtype/add', [StudentExamTypeController::class, 'StudentExamTypeAdd'])->name('student.examtype.add');

        Route::post('/student/examtype/store', [StudentExamTypeController::class, 'StoreStudentExamType'])->name('store.student.examtype');

        Route::get('/student/examtype/edit/{id}', [StudentExamTypeController::class, 'StudentExamTypeEdit'])->name('student.examtype.edit');

        Route::post('/student/examtype/update', [StudentExamTypeController::class, 'StudentExamTypeUpdate'])->name('student.examtype.update');

        Route::get('/student/examtype/delete/{id}', [StudentExamTypeController::class, 'StudentExamTypeDelete'])->name('student.examtype.delete');


        // School Subjects Routes
        Route::get('/subject/view', [SchoolSubjectsController::class, 'ViewSubject'])->name('subject.view');

        Route::get('/subject/add', [SchoolSubjectsController::class, 'AddSubject'])->name('subject.add');

        Route::post('/subject/store', [SchoolSubjectsController::class, 'StoreSubject'])->name('store.subject');

        Route::get('/subject/edit/{id}', [SchoolSubjectsController::class, 'SubjectEdit'])->name('subject.edit');

        Route::post('/subject/update/{id}', [SchoolSubjectsController::class, 'SubjectUpdate'])->name('subject.update');

        Route::get('/subject/delete/{id}', [SchoolSubjectsController::class, 'SubjectDelete'])->name('subject.delete');

        // School Assign Subjects Routes

        Route::get('/assign_subject/view', [AssignSubjectController::class, 'ViewAssignSubject'])->name('assign_subject.view');

        Route::get('/assign_subject/add', [AssignSubjectController::class, 'AddAssignSubject'])->name('assign_subject.add');

        Route::post('/assign_subject/store', [AssignSubjectController::class, 'StoreAssignSubject'])->name('store.assign_subject');

        Route::get('/assign_subject/edit/{id}', [AssignSubjectController::class, 'AssignSubjectEdit'])->name('assign_subject.edit');

        Route::post('/assign_subject/update/{class_id}', [AssignSubjectController::class, 'AssignSubjectUpdate'])->name('assign_subject.update');

        Route::get('/assign_subject/details/{class_id}', [AssignSubjectController::class, 'AssignSubjectDetails'])->name('assign_subject.details');
    });

    Route::prefix('students')->group(function(){

        // Student Registration Routes

        Route::get('/registration/view', [StudentRegController::class, 'StudentRegView'])->name('student.registration.view');
        
        Route::get('/registration/add', [StudentRegController::class, 'StudentRegAdd'])->name('student.registration.add');

        Route::post('/registration/store', [StudentRegController::class, 'StudentRegStore'])->name('store.student.registration');

        Route::get('/registration/search', [StudentRegController::class, 'StudentSearch'])->name('student.class.search');

        Route::get('/registration/edit/{id}', [StudentRegController::class, 'StudentRegEdit'])->name('student.reg.edit');

        Route::post('/registration/update/{id}', [StudentRegController::class, 'StudentRegUpdate'])->name('student.reg.update');

        Route::get('/registration/delete/{id}', [StudentRegController::class, 'StudentRegDelete'])->name('student.reg.delete');
    });

  
        // Marks Entry Routes

        Route::get('marks/entry/add', [MarksController::class, 'MarksAdd'])->name('marks.entry.add');
        
        Route::post('marks/entry/store', [MarksController::class, 'MarksStore'])->name('marks.entry.store'); 
        
        Route::get('marks/entry/edit', [MarksController::class, 'MarksEdit'])->name('marks.entry.edit'); 
        
        Route::get('marks/getstudents/edit', [MarksController::class, 'MarksEditGetStudents'])->name('student.edit.getstudents');
        
        Route::post('marks/entry/update', [MarksController::class, 'MarksUpdate'])->name('marks.entry.update');  
  
   

    Route::get('student/marks/getstudents', [MarksController::class, 'GetStudents'])->name('student.marks.getstudents');

    Route::get('marks/getsubject', [MarksController::class, 'GetSubject'])->name('marks.getsubject');

});


Route::prefix('timetable')->group(function(){

    // Timetable Routes

    Route::get('/view', [TimetableController::class, 'ViewTimetable'])->name('view.all.timetable');

    Route::get('/class/update/{id}', [TimetableController::class, 'UpdateClassTimetable'])->name('add.class.timetable');

    Route::post('/class/store/{id}', [TimetableController::class, 'StoreClassTimetable'])->name('store.class.timetable');
    
    Route::get('/exam/edit/{id}', [TimetableController::class, 'UpdateExamTimetable'])->name('add.exam.timetable');

    Route::post('/exam/store/{id}', [TimetableController::class, 'StoreExamTimetable'])->name('store.exam.timetable');

    Route::get('/class/delete/{id}', [TimetableController::class, 'DeleteClassTimetable'])->name('delete.class.timetable');

    Route::get('/exam/delete/{id}', [TimetableController::class, 'DeleteExamTimetable'])->name('delete.exam.timetable');
});

Route::prefix('student')->group(function(){

    // Student Realtime Notification Timetable Routes

    Route::get('/view/{id}', [TimetableController::class, 'ViewStudTimetable'])->name('view.student.timetable');

    Route::get('/scheduler/view/{id}', [SchedulerController::class, 'ViewScheduler'])->name('view.scheduler');

    Route::get('/scheduler/add/{id}', [SchedulerController::class, 'AddScheduler'])->name('add.scheduler');

    Route::post('/scheduler/store', [SchedulerController::class, 'StoreScheduler'])->name('store.scheduler');

    Route::get('/scheduler/edit/{id}', [SchedulerController::class, 'EditScheduler'])->name('edit.scheduler');

    Route::post('/scheduler/update', [SchedulerController::class, 'UpdateScheduler'])->name('update.scheduler');

    Route::get('/scheduler/delete/{id}/{student_id}', [SchedulerController::class, 'DeleteScheduler'])->name('delete.scheduler');

});
