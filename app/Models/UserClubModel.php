<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserClubModel extends Model
{
    use HasFactory;

    protected $table = 'user_clubs';

    static public function getSingle($id)
    {
        return self::find($id);
    }
}
