<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class purchaseItems extends Model
{
    use HasFactory;

    protected $guarded = [];

        
    public function school(){
    	return $this->belongsTo(User::class,'school_id','id');
    }


            
    public function category(){
        return $this->belongsTo(purchase_categories::class,'category_id','id');
    }

}
