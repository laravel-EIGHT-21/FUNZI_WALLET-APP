<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Students;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class SchoolsController extends Controller
{
    


  public function ViewSchools(){


      $data['allData'] = User::latest()->get();
      
    return view('admin.schools.view_schools',$data);
  }
  
  


  
  public function store(Request $request)
  {

          $request->validate([
              'name' =>['required'],
              'email' =>['required'],
              'school_tel1' =>['required'],
              'school_tel2' =>['required'],
              'address' =>['required'],
              'password' => ['required'],
             
         ]);
  
          $email = $request->email;		
          $check = User::where('email',$email)->first();
  
          if($check == null){
  
  
          DB::transaction(function() use($request){
  
  
          $school = User::orderBy('id','DESC')->first();

          if ($school == null) {
          $firstReg = 0;
          $schoolId = $firstReg+1;
          if ($schoolId < 10) {
            $id_no = '0'.$schoolId;
          }elseif ($schoolId < 100) {
            $id_no = '00'.$schoolId;
          }elseif ($schoolId < 1000) {
            $id_no = '000'.$schoolId;
          }
      
    
  
        }else{
       $school = User::orderBy('id','DESC')->first()->id;
         $schoolId = $school+1;
         if ($schoolId < 10) {
            $id_no = '0'.$schoolId;
          }elseif ($schoolId < 100) {
            $id_no = '00'.$schoolId;
          }elseif ($schoolId < 1000) {
            $id_no = '000'.$schoolId;
          }
  
  
        } // end else 
  
        $final_id_no = $id_no;
  
          
              $schooluser = new User(); 
              $schooluser->name = $request->name;
              $schooluser->email = $request->email;
              $schooluser->password = Hash::make($request->password);
              $schooluser->school_tel1 = $request->school_tel1;
              $schooluser->school_tel2 = $request->school_tel2;
              $schooluser->address = $request->address;
              $schooluser->school_type = $request->school_type;
              $schooluser->school_id_no  = $final_id_no;
              $schooluser->created_at = Carbon::now(); 
              $schooluser->save();
  
          
             
          });
  
  
          return back()->with('success','New School Information Added Successfully');

        }
      
          else{
      
            
                  return back()->with('error','USER EMAIL ALREADY EXIST!!!');
            
            }	
         
     

  
}




public function EditSchools($id){
$editSchool = User::findOrFail($id);


  return view('admin.schools.edit_school',compact('editSchool'));

}



public function update(Request $request, $id)
{

      $request->validate([
          'name' =>['required'],
          'school_tel1' =>['required'],
          'school_tel2' =>['required'],
          'address' =>['required'],
     ]);

  

      DB::transaction(function() use($request,$id){

          
      
          $user = User::where('id',$id)->first();  
          $user->name = $request->name;
          $user->school_tel1 = $request->school_tel1;
          $user->school_tel2 = $request->school_tel2;
          $user->address = $request->address;
          $user->school_type = $request->school_type;
          $user->save();


         
      });


    return back()->with('warning',' School Information Updated Successfully!');

}





  
public function inactiveSchools($id)
{  

User::findOrFail($id)->update(['status' => 0]);

return back()->with('error',' School Has Been Deactivated...');

} 




public function activeSchools($id)
{
  
User::findOrFail($id)->update(['status' => 1]);

return back()->with('info',' School Has Been Activated...');


}








  




public function ViewSchoolStudents(){

$data['allData'] = Students::where('status',1)->get();

return view('admin.students.view_students',$data);
}







}
