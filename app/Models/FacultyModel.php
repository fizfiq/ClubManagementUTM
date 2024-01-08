<?php

namespace App\Models;

use App\Models\FacultyModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Request;

class FacultyModel extends Model
{
    use HasFactory;

    protected $table = 'faculty';

    static public function getSingle($id)
    {
        return self::find($id);
    }
    static public function getRecord()
    {
        $return = FacultyModel::select('faculty.*', 'users.name as created_by_name')
                    ->join('users', 'users.id', 'faculty.created_by');
                    if(!empty(Request::get('name')))
                    {
                        $return = $return->where('faculty.name', 'like', '%' .Request::get('name').'%');
                    }
                    if(!empty(Request::get('date')))
                    {
                        $return = $return->whereDate('faculty.created_at','=',Request::get('date'));
                    }

        $return = $return->where('faculty.is_delete', '=', 0)
                    ->orderBy('faculty.id', 'desc')
                    ->paginate(10);

        return $return;
    }
    
    static public function getFaculty()
    {
        $return = FacultyModel::select('faculty.*')
                    ->join('users', 'users.id', 'faculty.created_by')
                    ->where('faculty.is_delete', '=', 0)
                    ->where('faculty.status', '=', 0)
                    ->orderBy('faculty.name', 'asc')
                    ->get();

        return $return;
    }

}
