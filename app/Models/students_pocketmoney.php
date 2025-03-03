<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class students_pocketmoney extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function student(){
        return $this->belongsTo(User::class,'uuid','uuid');
    }


    public function school(){
        return $this->belongsTo(User::class,'school_id','school_id_no');
    }



}
