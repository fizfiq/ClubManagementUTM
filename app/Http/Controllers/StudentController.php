<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use Str;
use App\Models\User;
use App\Models\FacultyModel;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::getStudent();
        $data['header_title'] = "Student List";
        return view('admin.student.list', $data);
    }

    public function add()
    {
        $data['getFaculty'] = FacultyModel::getFaculty();
        $data['header_title'] = "Add New Student";
        return view('admin.student.add', $data);
    }

    public function insert(Request $request)
    {
        
       // dd($request->all());
        $student = new User;
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->student_id = trim($request->student_id);
        $student->address = trim($request->address);
        $student->phone_num = trim($request->phone_num);
        $student->course = trim($request->course);
        $student->faculty = trim($request->faculty);
        $student->profile_pic = trim($request->profile_pic);
        $student->gender = trim($request->gender);

        if( !empty($request->date_of_birth))
        {
            $student->date_of_birth = trim($request->date_of_birth);
        }

        if(!empty($request->file('profile_pic')))
        {
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/', $filename);

            $student->profile_pic = $filename;            
        }
        
        $student->status = trim($request->status);
        $student->email = trim($request->email);
        $student->password = Hash::make($request->password);
        $student->user_type = 3;
        $student->save();

        return redirect('admin/student/list')->with('success', "Student successfully Created");
    }
    public function delete($id)
    {
        $save = User::getSingle($id);
        $save->is_delete = 1;
        $save->save();

        return redirect()->back()->with('success', "Faculty Successfully Deleted");
    }
   
}
