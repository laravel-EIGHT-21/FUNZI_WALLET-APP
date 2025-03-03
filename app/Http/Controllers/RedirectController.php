<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectController extends Controller
{
    

    
    public function index(){
 
        $type = Auth::user()->user_type;
 
        if($type == 0) 
        {

            return view('admin.body.index');
        }


if($type == 1)
{


    return view('school.body.index');


}


        if($type == 2)
        {
            return view('students.body.index'); 
            
        }


        
        if($type == 3)
        {
            return view('tours_travels.body.index'); 
            
        }
        
        
        else{
            return redirect()->route('login');
        }

    }





}
