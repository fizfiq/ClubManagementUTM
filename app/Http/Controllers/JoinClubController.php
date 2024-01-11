<?php

namespace App\Http\Controllers;

use App\Models\ClubModel;
use Illuminate\Http\Request;

class JoinClubController extends Controller
{
    public function list()
    {
        $data['getRecord'] = ClubModel::getRecord();
        $data['header_title'] = "Club List";
        return view('student.club.list', $data);
    }
    
}
