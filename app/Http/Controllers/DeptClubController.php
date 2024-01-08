<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\ClubModel;
use App\Models\DeptModel;
use Illuminate\Http\Request;
use App\Models\DeptClubModel;

class DeptClubController extends Controller
{
    public function list(Request $request)
    {
        $data['getRecord'] = DeptClubModel::getRecord();
        $data['header_title'] = "Assign Club List";
        return view('admin.assign_club.list', $data);
    }

    public function add(Request $request)
    {
        $data['getDept'] = DeptModel::getDept();
        $data['getClub'] = ClubModel::getClub();
        $data['header_title'] = "Add Assign Club";
        return view('admin.assign_club.add', $data);
    }

    public function insert(Request $request)
    {
        if(!empty($request->club_id))   
        {
            foreach ($request->club_id as $club_id)
            {
                $getAlreadyFirst = DeptClubModel::getAlreadyFirst($request->dept_id, $club_id);
                if(!empty($getAlreadyFirst))
                {
                    $getAlreadyFirst->status = $request->status;
                    $getAlreadyFirst->save();
                }
                else
                {
                    $save = new DeptClubModel;
                    $save->dept_id = $request->dept_id;
                    $save->club_id = $club_id;
                    $save->status = $request->status;
                    $save->created_by = Auth::user()->id;
                    $save->save();
                }

            }

            return redirect('admin/assign_club/list')->with('success', "Club Successfully Assign to Department");
        }
        else
        {
            return redirect()->back()->with('error', "Due to some error please try again");
        }
    }
    
    public function edit($id)
    {
        $getRecord = DeptClubModel::getSingle($id);
        if(!empty($getRecord))
        {
            $data['getRecord'] = $getRecord;
            $data['getAssignClubID'] =  DeptClubModel::getAssignClubID($getRecord->dept_id);
            $data['getDept'] = DeptModel::getDept();
            $data['getClub'] = ClubModel::getClub();
            $data['header_title'] = "Edit Assign Club";
            return view('admin.assign_club.edit', $data); 
        }
        else
        {
            abort(404);
        }
    }

    public function update(Request $request)
    {
        DeptClubModel::deleteClub($request->dept_id);

        if(!empty($request->club_id))   
        {
            foreach ($request->club_id as $club_id)
            {
                $getAlreadyFirst = DeptClubModel::getAlreadyFirst($request->dept_id, $club_id);
                if(!empty($getAlreadyFirst))
                {
                    $getAlreadyFirst->status = $request->status;
                    $getAlreadyFirst->save();
                }
                else
                {
                    $save = new DeptClubModel;
                    $save->dept_id = $request->dept_id;
                    $save->club_id = $club_id;
                    $save->status = $request->status;
                    $save->created_by = Auth::user()->id;
                    $save->save();
                }

            }
            
        }
        return redirect('admin/assign_club/list')->with('success', "Club Successfully Assign to Department");
    }

    public function edit_single($id)
    {
        $getRecord = DeptClubModel::getSingle($id);
        if(!empty($getRecord))
        {
            $data['getRecord'] = $getRecord;
            $data['getDept'] = DeptModel::getDept();
            $data['getClub'] = ClubModel::getClub();
            $data['header_title'] = "Edit Assign Club";
            return view('admin.assign_club.edit_single', $data); 
        }
        else
        {
            abort(404);
        }
    }

    public function update_single(Request $request, $id)
    {
        
        $getAlreadyFirst = DeptClubModel::getAlreadyFirst($request->dept_id, $request->club_id);
        if(!empty($getAlreadyFirst))
        {
            $getAlreadyFirst->status = $request->status;
            $getAlreadyFirst->save();

            return redirect('admin/assign_club/list')->with('success', "Status Successfully Updated");
        }
        else
        {
            $save = DeptClubModel::getSingle($id);
            $save->dept_id = $request->dept_id;
            $save->club_id = $request->club_id;
            $save->status = $request->status;
            $save->save();
        
            return redirect('admin/assign_club/list')->with('success', "Club Successfully Assign to Department");
        }
        
    }

    public function delete($id)
    {
        $save = DeptClubModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();

        return redirect()->back()->with('success', "Record successfully deleted");
    }
}
