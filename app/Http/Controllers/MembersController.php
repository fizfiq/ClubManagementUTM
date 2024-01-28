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
}
