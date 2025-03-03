<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class academic_folders extends Model
{
    use HasFactory;


    
    protected $guarded = [];
     
    public function student(){
        return $this->belongsTo(Students::class,'student_id','id');
    }



}
