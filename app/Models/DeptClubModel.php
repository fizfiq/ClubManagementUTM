<?php

namespace App\Models;

use App\Models\DeptClubModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Request;

class DeptClubModel extends Model
{
    use HasFactory;

    protected $table = 'dept_club';

    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getRecord()
    {
        $return = self::select('dept_club.*', 'department.dept_name as dept_name', 'club.name as club_name', 'users.name as created_by_name')
                    ->join('club', 'club.id', '=', 'dept_club.club_id')
                    ->join('department', 'department.id', '=', 'dept_club.dept_id')
                    ->join('users', 'users.id', '=', 'dept_club.created_by')
                    ->where('dept_club.is_delete', '=', 0);

                    if(!empty(Request::get('dept_name')))
                    {
                        $return = $return->where('department.dept_name', 'like', '%' .Request::get('dept_name').'%');
                    }
                    if(!empty(Request::get('club_name')))
                    {
                        $return = $return->where('club.name', 'like', '%' .Request::get('club_name').'%');
                    }
                    if(!empty(Request::get('date')))
                    {
                        $return = $return->whereDate('dept_club.created_at','=',Request::get('date'));
                    }
        $return = $return->orderBy('dept_club.id', 'desc')
                    ->paginate(5);

        return $return;
    }
    static public function getAlreadyFirst($dept_id, $club_id)
    {
        return self::where('dept_id', '=', $dept_id)->where('club_id', '=', $club_id)->first();
    }

    static public function getAssignClubID($dept_id)
    {
        return self::where('dept_id', '=', $dept_id)->where('is_delete', '=', 0)->get();
    }

    static public function deleteClub($dept_id)
    {
        return self::where('dept_id', '=', $dept_id)->delete();
    }

}
