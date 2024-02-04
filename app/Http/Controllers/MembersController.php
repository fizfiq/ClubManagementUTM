<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserClubModel;
use Illuminate\Support\Facades\Auth;

class MembersController extends Controller
{
    public function memberList(Request $request)
    {
        $user = Auth::user();
        $data['getRecord'] = UserClubModel::getRecord();
        $data['header_title'] = "Members List";
        return view('club.member.list', $data);

        
    }
    public function edit($id)
    {
        $data['getRecord'] = UserClubModel::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['header_title'] = "Edit Member";
            return view('club.member.edit', $data);
        }
        else
        {
            abort(404);
        }
    }
    public function update($id, Request $request)
    {
        $user = Auth::user();
        $save = UserClubModel::getSingle($id);
        //$save->name = $request->name;
        $save->position = $request->position;
        $save->save();

        $user->position = $request->position;
        $user->save();


        return redirect('club/member/list')->with('success', "Memberm Position Successfully Updated");
    }
}
