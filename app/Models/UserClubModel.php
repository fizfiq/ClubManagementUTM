<?php

namespace App\Models;

use Request;
use App\Models\UserClubModel;
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
        $return = self::select('user_clubs.*', 'club.name as club_name', 'users.name as created_by_name')
                    ->join('club', 'club.id', '=', 'user_clubs.club_id')
                    ->join('users', 'users.id', '=', 'user_clubs.user_id')
                    ->where('user_clubs.is_delete', '=', 0);

                    if(!empty(Request::get('memberName')))
                    {
                        $return = $return->where('users.memberName', 'like', '%' .Request::get('memberName').'%');
                    }
                    if(!empty(Request::get('club_name')))
                    {
                        $return = $return->where('club.name', 'like', '%' .Request::get('club_name').'%');
                    }
                    if(!empty(Request::get('date')))
                    {
                        $return = $return->whereDate('user_clubs.created_at','=',Request::get('date'));
                    }
        $return = $return->orderBy('user_clubs.id', 'desc')
                    ->paginate(5);

        return $return;
    }
}
