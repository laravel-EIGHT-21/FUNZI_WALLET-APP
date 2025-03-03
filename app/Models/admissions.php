<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admissions extends Model
{
    use HasFactory;

    protected $guarded = [];

    
    public function school(){
    	return $this->belongsTo(User::class,'school_id','id');
    }


        
    public function student(){
        return $this->belongsTo(Students::class,'student_id','id');
    }

    
    public function term(){
        return $this->belongsTo(school_terms::class,'term_id','id');
    }

}
