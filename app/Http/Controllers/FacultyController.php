<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\FacultyModel;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    public function list()
    {
        $data['getRecord'] = FacultyModel::getRecord();
        $data['header_title'] = "Faculty List";
        return view('admin.faculty.list', $data);
    }

    public function add()
    {
        $data['header_title'] = "Add New Faculty";
        return view('admin.faculty.add', $data);
    }

    public function insert(Request $request)
    {
        
        $save = new FacultyModel;
        $save->name = $request->name;
        $save->status = $request->status;
        $save->created_by = Auth::user()->id;
        $save->save();

        return redirect('admin/faculty/list')->with('success', "Faculty Successfully Created");
    }

    public function edit($id)
    {
        $data['getRecord'] = FacultyModel::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['header_title'] = "Edit Faculty";
            return view('admin.faculty.edit', $data);
        }
        else
        {
            abort(404);
        }
    }

    public function update($id, Request $request)
    {
        $save = FacultyModel::getSingle($id);
        $save->name = $request->name;
        $save->status = $request->status;
        $save->save();

        return redirect('admin/faculty/list')->with('success', "Faculty Successfully Updated");
    }

    public function delete($id)
    {
        $save = FacultyModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();

        return redirect()->back()->with('success', "Faculty Successfully Deleted");
    }
}
