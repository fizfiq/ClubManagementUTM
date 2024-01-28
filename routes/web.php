<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\DeptController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\MembersController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DeptClubController;
use App\Http\Controllers\JoinClubController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClubVerifyController;
use App\Http\Controllers\ClubApplicationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'AuthLogin']);
Route::get('logout', [AuthController::class, 'logout']);
Route::get('forgot-password', [AuthController::class, 'forgotPassword']);
Route::post('forgot-password', [AuthController::class, 'PostForgotPassword']);
Route::get('reset/{token}', [AuthController::class, 'reset']);
Route::post('reset/{token}', [AuthController::class, 'PostReset']);



Route::group(['middleware' => 'admin'], function (){

    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('admin/admin/list', [AdminController::class, 'list']);
    Route::get('admin/admin/add', [AdminController::class, 'add']);
    Route::post('admin/admin/add', [AdminController::class, 'insert']);
    Route::get('admin/admin/edit/{id}', [AdminController::class, 'edit']);
    Route::post('admin/admin/edit/{id}', [AdminController::class, 'update']);
    Route::get('admin/admin/delete/{id}', [AdminController::class, 'delete']);

    //URL Student
    Route::get('admin/student/list', [StudentController::class, 'list']);
    Route::get('admin/student/add', [StudentController::class, 'add']);
    Route::post('admin/student/add', [StudentController::class, 'insert']);
    Route::get('admin/student/delete/{id}', [StudentController::class, 'delete']);

    //URL faculty
    Route::get('admin/faculty/list', [FacultyController::class, 'list']);
    Route::get('admin/faculty/add', [FacultyController::class, 'add']);
    Route::post('admin/faculty/add', [FacultyController::class, 'insert']);
    Route::get('admin/faculty/edit/{id}', [FacultyController::class, 'edit']);
    Route::post('admin/faculty/edit/{id}', [FacultyController::class, 'update']);
    Route::get('admin/faculty/delete/{id}', [FacultyController::class, 'delete']);

    //URL dept
    Route::get('admin/dept/list', [DeptController::class, 'list']);
    Route::get('admin/dept/add', [DeptController::class, 'add']);
    Route::post('admin/dept/add', [DeptController::class, 'insert']);
    Route::get('admin/dept/edit/{id}', [DeptController::class, 'edit']);
    Route::post('admin/dept/edit/{id}', [DeptController::class, 'update']);
    Route::get('admin/dept/delete/{id}', [DeptController::class, 'delete']);

    //URL club
    Route::get('admin/club/list', [ClubController::class, 'list']);
    Route::get('admin/club/add', [ClubController::class, 'add']);
    Route::post('admin/club/add', [ClubController::class, 'insert']);
    Route::get('admin/club/edit/{id}', [ClubController::class, 'edit']);
    Route::post('admin/club/edit/{id}', [ClubController::class, 'update']);
    Route::get('admin/club/delete/{id}', [ClubController::class, 'delete']);

    //URL assign_club
    Route::get('admin/assign_club/list', [DeptClubController::class, 'list']);
    Route::get('admin/assign_club/add', [DeptClubController::class, 'add']);
    Route::post('admin/assign_club/add', [DeptClubController::class, 'insert']);
    Route::get('admin/assign_club/edit/{id}', [DeptClubController::class, 'edit']);
    Route::post('admin/assign_club/edit/{id}', [DeptClubController::class, 'update']);
    Route::get('admin/assign_club/delete/{id}', [DeptClubController::class, 'delete']);
    Route::get('admin/assign_club/edit_single/{id}', [DeptClubController::class, 'edit_single']);
    Route::post('admin/assign_club/edit_single/{id}', [DeptClubController::class, 'update_single']);

    
    //URL manage Club
    Route::get('admin/manage_club/list', [ManageClubController::class, 'list']);
    
    Route::get('admin/change_password', [UserController::class, 'change_password']);
    Route::post('admin/change_password', [UserController::class, 'update_change_password']);
        
});

Route::group(['middleware' => 'hep'], function (){
    
    Route::get('hep/dashboard', [DashboardController::class, 'dashboard']);
    //url Verification club
    Route::get('hep/verify/list', [ClubVerifyController::class, 'list']);
    Route::get('hep/verify/edit/{id}', [ClubVerifyController::class, 'edit']);
    Route::post('hep/verify/edit/{id}', [ClubVerifyController::class, 'update']);
    Route::get('hep/verify/delete/{id}', [ClubVerifyController::class, 'delete']);
   
    Route::get('hep/change_password', [UserController::class, 'change_password']);
    Route::post('hep/change_password', [UserController::class, 'update_change_password']);

});

Route::group(['middleware' => 'student'], function (){
    
    Route::get('student/dashboard', [DashboardController::class, 'dashboard']);
    //url application club
    Route::get('student/apply/list', [ClubApplicationController::class, 'list']);
    Route::get('student/apply/application', [ClubApplicationController::class, 'application']);
    Route::post('student/apply/application', [ClubApplicationController::class, 'store']);
    Route::get('student/apply/edit/{id}', [ClubApplicationController::class, 'edit']);
    Route::post('student/apply/edit/{id}', [ClubApplicationController::class, 'update']);
    Route::get('student/apply/delete/{id}', [ClubApplicationController::class, 'delete']);

    //url club 
    Route::get('student/club/list', [JoinClubController::class, 'list']);
    Route::post('student/club/join/{id}', [JoinClubController::class, 'joinClub']);
    Route::get('student/club/edit/{id}', [JoinClubController::class, 'edit']);
    Route::post('student/club/edit/{id}', [JoinClubController::class, 'update']);
    Route::get('student/club/detail/{id}', [JoinClubController::class, 'detail']);

    Route::get('student/change_password', [UserController::class, 'change_password']);
    Route::post('student/change_password', [UserController::class, 'update_change_password']);

});

Route::group(['middleware' => 'club'], function (){
    
    Route::get('club/dashboard', [DashboardController::class, 'dashboard']);
    //club member
    Route::get('club/member/list', [MembersController::class, 'memberList']);
    
    Route::get('club/change_password', [UserController::class, 'change_password']);
    Route::post('club/change_password', [UserController::class, 'update_change_password']);

});