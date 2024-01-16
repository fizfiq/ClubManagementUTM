<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class ClubModel extends Model
{
    use HasFactory;

    protected $table = 'club';

    static public function getSingle($id)
    {
        return self::find($id);
    }
    static public function getRecord()
    {
        //$userId = Auth::id();
        $return = ClubModel::select('club.*', 'users.name as created_by_name')
                    ->join('users', 'users.id', 'club.created_by');
                    //->where('club.created_by','=',$userId);
                    if(!empty(Request::get('name')))
                    {
                        $return = $return->where('club.name', 'like', '%' .Request::get('name').'%');
                    }
                    if(!empty(Request::get('email')))
                    {
                        $return = $return->where('email','like','%' .Request::get('email'). '%');
                    }
                    if(!empty(Request::get('type')))
                    {
                        $return = $return->where('club.type', 'like', Request::get('type'));
                    }
                    if(!empty(Request::get('date')))
                    {
                        $return = $return->whereDate('club.created_at','=',Request::get('date'));
                    }

        $return = $return->where('club.is_delete', '=', 0)
                    ->orderBy('club.id', 'desc')
                    ->paginate(10);

        return $return;
    }
    static public function getClub()
    {
        $return = ClubModel::select('club.*')
                    ->join('users', 'users.id', 'club.created_by')
                    ->where('club.is_delete', '=', 0)
                    ->where('club.status', '=', 0)
                    ->orderBy('club.name', 'asc')
                    ->get();

        return $return;
    }
    public function students()
    {
        return $this->belongsToMany(User::class, 'user_clubs', 'club_id', 'user_id');
    }
    
}
