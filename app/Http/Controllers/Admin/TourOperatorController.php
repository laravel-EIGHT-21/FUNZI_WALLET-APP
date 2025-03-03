<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TourOperator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TourOperatorController extends Controller
{
    




    
  public function ViewTourOperator(){


    $data['allData'] = TourOperator::latest()->get();
    
  return view('admin.tour_operator.view_tour_operator',$data);
}





public function storeTourOperator(Request $request)
{

        $request->validate([
            'name' =>['required'],
            'email' =>['required'],
            'telephone' =>['required'],
            'telephone2' =>['required'],
            'address' =>['required'],
            'password' => ['required'],
           
       ]);

        $email = $request->email;		
        $check = TourOperator::where('email',$email)->first();

        if($check == null){


        DB::transaction(function() use($request){



        
            $tour_operator = new TourOperator(); 
            $tour_operator->name = $request->name;
            $tour_operator->email = $request->email;
            $tour_operator->password = Hash::make($request->password);
            $tour_operator->telephone = $request->telephone;
            $tour_operator->telephone2 = $request->telephone2;
            $tour_operator->address = $request->address;
            $tour_operator->created_at = Carbon::now(); 
            $tour_operator->save();

        
           
        });


        return back()->with('success','New Tour Operator Information Added Successfully');

      }
    
        else{
    
          
                return back()->with('error','USER EMAIL ALREADY EXIST!!!');
          
          }	
       
   


}




public function EditTourOperator($id){

    $user = TourOperator::findOrFail($id);

    return response()->json(array(
        'user' => $user,
    ));

}

public function update(Request $request)
{

    $request->validate([
        'name' =>['required'],
        'email' =>['required'],
        'telephone' =>['required'],
          'telephone2' =>['required'],
        'address' =>['required'],
       
   ]);

   $id = $request->input('id');

    DB::transaction(function() use($request,$id){

        
    
        $tour_operator = TourOperator::where('id',$id)->first();  
        $tour_operator->name = $request->name;
        $tour_operator->email = $request->email;
        $tour_operator->telephone = $request->telephone;
        $tour_operator->telephone2 = $request->telephone2;
        $tour_operator->address = $request->address;
        $tour_operator->save();


       
    });


  return back()->with('warning',' Tour Operator Information Updated Successfully!');

}






public function inactiveTourOperator($id)
{ 

TourOperator::findOrFail($id)->update(['status' => 0]);

return back()->with('error',' Tour Operator Has Been Deactivated...');

} 




public function activeTourOperator($id)
{



TourOperator::findOrFail($id)->update(['status' => 1]);

return back()->with('info',' Tour Operator Has Been Activated...');


}





}
