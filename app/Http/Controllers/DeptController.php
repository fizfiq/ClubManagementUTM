<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use App\Models\User;
use App\Models\DeptModel;
use Illuminate\Http\Request;

class DeptController extends Controller
{
    public function list()
    {
        $data['getRecord'] = DeptModel::getRecord();
        $data['header_title'] = "Department List";
        return view('admin.dept.list', $data);
    }

    public function add()
    {
        $data['header_title'] = "Add New Faculty";
        return view('admin.dept.add', $data);
    }

    public function insert(Request $request)
    {
        
        $save = new DeptModel;
        $save->username = trim($request->username);
        $save->dept_name = $request->dept_name;
        $save->status = $request->status;
        $save->created_by = Auth::user()->id;
        $save->email = trim($request->email);
        $save->password = Hash::make($request->password);
        $save->save();

        $dept = new User;
        $dept->name = trim($request->username);
        $dept->dept_name = $request->dept_name;
        $dept->email = trim($request->email);
        $dept->password = Hash::make($request->password);
        $dept->user_type = 2;
        $dept->save();

        return redirect('admin/dept/list')->with('success', "Department Successfully Created");
    }

    public function edit($id)
    {
        $data['getRecord'] = DeptModel::getSingle($id);
        if(!empty($data['getRecord']))
        {
            
            $data['header_title'] = "Edit Department";
            return view('admin.dept.edit', $data);
           
        }
        else
        {
            abort(404);
        }
    }

    public function update($id,Request $request)
    {
        $save = DeptModel::getSingle($id);
        $save->dept_name = $request->dept_name;
        $save->status = $request->status;
        $save->username = trim($request->username);
        $save->email = trim($request->email);
        if(!empty($request->password))
        {
            $save->password = Hash::make($request->password);
        }
        $save->save();

        $dept = User::where('email', $save->email)->first();
        $dept->name = trim($request->username);
        $dept->dept_name = trim($request->dept_name);
        $dept->email = trim($request->email);
        if(!empty($request->password))
        {
            $dept->password = Hash::make($request->password);
        }
        $dept->save();

       
        return redirect('admin/dept/list')->with('success', "Department Successfully Updated");
    }

    public function delete($id)
    {
        $save = DeptModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();

        $dept = User::where('email', $save->email)->first();
        $dept->is_delete = 1;
        $dept->save();

        return redirect()->back()->with('success', "Department Successfully Deleted");
    }
}
