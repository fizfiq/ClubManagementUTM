<?php

namespace App\Models;

use Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserClubModel extends Model
{
    use HasFactory;

    protected $table = 'user_clubs';

    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getRecord()
    {
        $user = Auth::user(); // get the currently authenticated user
        $return = self::select('user_clubs.*', 'user_clubs.memberName as name')
                    ->join('club', 'club.id', '=', 'user_clubs.club_id')
                    ->join('users', 'users.id', '=', 'user_clubs.created_by')
                    ->where('user_clubs.is_delete', '=', 0);
                     

                    if(!empty(Request::get('name')))
                    {
                        $return = $return->where('user_clubs.memberName', 'like', '%' .Request::get('name').'%');
                    }
                    
                    if(!empty(Request::get('date')))
                    {
                        $return = $return->whereDate('user_clubs.created_at','=',Request::get('date'));
                    }
        $return = $return->where('user_clubs.is_delete', '=', 0)
                    ->orderBy('user_clubs.id', 'desc')
                    ->paginate(5);

        return $return;
    }
}
