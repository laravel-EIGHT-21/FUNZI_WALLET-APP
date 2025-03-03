<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class school_fees_collections extends Model
{
    use HasFactory;



    protected $guarded = [];
 
         
    public function student(){
        return $this->belongsTo(User::class,'student_acct_no','student_code');
    }


         
    public function school(){
        return $this->belongsTo(User::class,'school_id','school_id_no');
    }



}
