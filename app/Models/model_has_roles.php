<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class model_has_roles extends Model
{
    use HasFactory;

    public $timestamps = false;

             
    public function userroles(){
        return $this->belongsTo(User::class,'model_id','id');
    }


                 
    public function roles(){
        return $this->belongsTo(roles::class,'role_id','id');
    }


}
