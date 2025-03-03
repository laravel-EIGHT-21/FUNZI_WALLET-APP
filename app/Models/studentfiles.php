<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class studentfiles extends Model
{
    use HasFactory;


    
    protected $guarded = [];

     
    public function student(){
        return $this->belongsTo(Students::class,'student_id','id');
    }


         
    public function folder(){
        return $this->belongsTo(academic_folders::class,'folder_id','id');
    }


    protected $casts = [
        'title' => 'encrypted',
        'description' => 'encrypted',
    ];




}
