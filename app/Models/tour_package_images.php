<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tour_package_images extends Model
{
    use HasFactory;


    protected $guarded = [];

        
    public function tourpackage(){
    	return $this->belongsTo(tour_packages::class,'tour_package_id','id');
    }

}
