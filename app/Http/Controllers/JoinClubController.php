<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ClubModel;
use Illuminate\Http\Request;
use App\Models\UserClubModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class JoinClubController extends Controller
{
    public function list(Request $request)
    {
        $user = Auth::user();
        
        $data['header_title'] = "My Club List";
        
        $getClub = ClubModel::all();
        $getRecord = UserClubModel::orderBy('id', 'DESC')->paginate(10);

        // Count the number of participants for each club
        $clubParticipants = [];
        foreach ($getClub as $club) {
            $count = UserClubModel::where('club_id', $club->id)->count();
            $clubParticipants[$club->id] = $count;
        }

        // Pass the participant count to the view
        return view('student.club.list', $data, compact('getRecord', 'getClub', 'clubParticipants'));
    }
 
    public function joinClub(Request $request, $id)
    {
        $user = Auth::user();
        $club = ClubModel::getSingle($id);
        $user_club = new UserClubModel;
        $user_club ->user_id = $user->id;
        $user_club ->memberName = $user->name;
        $user_club->club_id = $club->id;
        $user_club->created_by = Auth::user()->id;
        $user_club->save();
        
        // Update the existing User record to associate it with the new club
        $user->club_id = $club->id;
        $user->save();

        return redirect('student/club/list')->with('success', "Successfully join the club");
    }
    
}
