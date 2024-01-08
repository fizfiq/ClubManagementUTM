<?php

namespace App\Models;

use Request;
use App\Models\DeptModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DeptModel extends Model
{
    use HasFactory;

    protected $table = 'department';

    static public function getSingle($id)
    {
        return self::find($id);
    }
    static public function getRecord()
    {
        
        $return = DeptModel::select('department.*', 'users.name as created_by_name')
                    ->join('users', 'users.id', 'department.created_by');
                    
                    if(!empty(Request::get('username')))
                    {
                        $return = $return->where('department.username', 'like', '%' .Request::get('username').'%');
                    }
                    if(!empty(Request::get('email')))
                    {
                        $return = $return->where('email','like','%' .Request::get('email'). '%');
                    }
                    if(!empty(Request::get('dept_name')))
                    {
                        $return = $return->where('department.dept_name', 'like', '%' .Request::get('dept_name').'%');
                    }
                    if(!empty(Request::get('date')))
                    {
                        $return = $return->whereDate('department.created_at','=',Request::get('date'));
                    }

        $return = $return->where('department.is_delete', '=', 0)
                    ->orderBy('department.id', 'desc')
                    ->paginate(10);

        return $return;
    }
    
    static public function getDept()
    {
        $return = DeptModel::select('department.*')
                    ->join('users', 'users.id', 'department.created_by')
                    ->where('department.is_delete', '=', 0)
                    ->where('department.status', '=', 0)
                    ->orderBy('department.dept_name', 'asc')
                    ->get();

        return $return;
    }
}
