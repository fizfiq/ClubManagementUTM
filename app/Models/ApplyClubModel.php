<?php

namespace App\Models;

use Request;
use App\Models\User;
use App\Models\ApplyClubModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

class ApplyClubModel extends Model
{
    use HasFactory;

    protected $table = 'apply_club';

    static public function getSingle($id)
    {
        return self::find($id);
    }
    
    static public function getRecord()
    {
        $userId = Auth::id();
        $return = ApplyClubModel::select('apply_club.*', 'users.name as created_by_name')
                    ->join('users', 'users.id','=', 'apply_club.created_by')
                    ->where('apply_club.created_by','=',$userId);
                    if(!empty(Request::get('name')))
                    {
                        $return = $return->where('apply_club.name', 'like', '%' .Request::get('name').'%');
                    }
                    if(!empty(Request::get('type')))
                    {
                        $return = $return->where('apply_club.type', 'like', Request::get('type'));
                    }
                    if(!empty(Request::get('date')))
                    {
                        $return = $return->whereDate('apply_club.created_at','=',Request::get('date'));
                    }

        $return = $return->where('apply_club.is_delete', '=', 0)
                    ->where('apply_club.status', '=', 0)
                    ->orderBy('apply_club.id', 'desc')
                    ->paginate(10);

        return $return;
    }
    static public function getApply()
    {
        $return = ApplyClubModel::select('apply_club.*', 'users.name as created_by_name')
                    ->join('users', 'users.id','=', 'apply_club.created_by');
                    
                    if(!empty(Request::get('name')))
                    {
                        $return = $return->where('apply_club.name', 'like', '%' .Request::get('name').'%');
                    }
                    if(!empty(Request::get('type')))
                    {
                        $return = $return->where('apply_club.type', 'like', Request::get('type'));
                    }
                    if(!empty(Request::get('date')))
                    {
                        $return = $return->whereDate('apply_club.created_at','=',Request::get('date'));
                    }

        $return = $return->where('apply_club.is_delete', '=', 0)
                    ->where('apply_club.status', '=', 0)
                    ->orderBy('apply_club.id', 'desc')
                    ->paginate(10);

        return $return;
    }
    //how to make user access their only record by doing the created_by as the id
}
