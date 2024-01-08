<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use App\Models\User;
use App\Models\ClubModel;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    public function list()
    {
        $data['getRecord'] = ClubModel::getRecord();
        $data['header_title'] = "Club List";
        return view('admin.club.list', $data);
    }

    public function add()
    {
        $data['header_title'] = "Add New Club";
        return view('admin.club.add', $data);
    }

    public function insert(Request $request)
    {
        
        $save = new ClubModel;
        $save->name = trim($request->name);
        $save->email = trim($request->email);
        $save->type = trim($request->type);
        $save->status = trim($request->status);
        $save->created_by = Auth::user()->id;
        $save->save();

        $club = new User;
        $club->name = trim($request->name);
        $club->email = trim($request->email);
        $club->password = Hash::make($request->password);
        $club->user_type = 4;
        $club->save();

        return redirect('admin/club/list')->with('success', "Club successfully Created");
    }

    public function edit($id)
    {
        $data['getRecord'] = ClubModel::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['header_title'] = "Edit Club";
            return view('admin.club.edit', $data);
        }
        else
        {
            abort(404);
        }
    }

    public function update($id,Request $request)
    {
        $save = ClubModel::getSingle($id);
        $save->name = trim($request->name);
        $save->email = trim($request->email);
        $save->type = trim($request->type);
        $save->status = trim($request->status);
        $save->save();

        $club = User::where('email', $save->email)->first();
        $club->name = trim($request->name);
        $club->email = trim($request->email);
        if(!empty($request->password))
        {
            $club->password = Hash::make($request->password);
        }
        $club->save();

        return redirect('admin/club/list')->with('success', "Club successfully Updated");
    }

    public function delete($id)
    {
        $save = ClubModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();

        return redirect()->back()->with('success', "Club Successfully Deleted");
    }
}
