<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\admissions;
use App\Models\school_terms;
use App\Models\Students;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SchoolStudentController extends Controller
{
    


    
    public function ViewStudents(){

        $school_code = Auth::user()->id;

        $data['terms'] = school_terms::all();

        $data['allData'] = Students::where('school_id',$school_code)->where('status', 1)->get();

        return view('school.students.view_students',$data);
    }
  
  


    
    public function ViewOldStudents(){


 
         $data['allData'] = Students::where('status', 0)->get();


       return view('school.students.view_old_student',$data);
   }
 
 
        
        
    
    public function AddOldStudents($id){

        $data['editData'] = Students::findOrFail($id);
        $data['terms'] = school_terms::all();

        return view('school.students.add_old_student',$data);
      }
  
  
  
  
  
      
    public function StoreStudents(Request $request){
  

        $request->validate([
            'name' =>['required'],
            'email' =>['required'],
            'password' => ['required'],
           
       ]);

      $email = $request->email;
      
$check = Students::where('email', $email)->first();

if($check == null){

  
  
        DB::transaction(function() use($request){
            $id = Auth::user()->id;
            $type = Auth::user()->user_type;

           
           $school = User::where('id',$id)->find($id);
         
      
         //// $student_acct = mt_rand(1000000000,9999999999);
   
          $user = new Students();
          $user->email = $request->email;
          $user->name = $request->name;
          $user->school_id = $id;
          $user->telephone = $request->telephone;
          $user->telephone2 = $request->telephone2;
          $user->student_NIN = $request->student_NIN;
          $user->gender = $request->gender;
          $user->password = Hash::make($request->password);
          $user->save();

/*
          $admit_student = new admissions();
          $admit_student->school_id = $id;
          $admit_student->student_id = $user->id;
          $admit_student->admission_fees = $request->admission_fees;
          $admit_student->date = Carbon::today()->format('Y-m-d');
          $admit_student->month = Carbon::today()->format('F Y');
          $admit_student->year = Carbon::today()->format('Y');
          $admit_student->save();
          */
 
  
        });


        return back()->with('success','New Student Information Added Successfully');

     


    }

else{

return back()->with('error',' USER EMAIL ALREADY EXISTS!');

}
  
  
  
  
      } // End Method 
  
    
    
    
    
    
        
      public function StoreOldStudents(Request $request, $id){
  
  
        $check = Students::where('id',$id)->where('status',0)->first();


        if($check == true){

  
        DB::transaction(function() use($request,$id){

         $school_id = Auth::user()->id;  

         $user = Students::where('id',$id)->first();  
          $user->school_id  = $school_id;
          $user->email = $request->email;
          $user->name = $request->name;
          $user->status = 1;
          $user->save();

/*
          $admit_student = new admissions();
          $admit_student->school_id = $school_id;
          $admit_student->student_id = $id;
          $admit_student->term_id = $user->term_id;
          $admit_student->student_class = $user->student_class;
          $admit_student->student_day_boarding = $user->student_day_boarding;
          $admit_student->admission_fees = $request->admission_fees;
          $admit_student->date = Carbon::today()->format('Y-m-d');
          $admit_student->month = Carbon::today()->format('F Y');
          $admit_student->year = Carbon::today()->format('Y');
          $admit_student->save();
  */
  
        });
  
  
        return redirect()->route('view.students')->with('success','Student Has Been Registered Successfully');

        
      }
      
      
      else{

          return back()->with('error',' STUDENT`S  ACCOUNT STILL ACTIVE IN ANOTHER SCHOOL...');
      
      }
       
    
    
    
        } // End Method 
    
    
  
  
  
  
      
    
    public function EditStudents($id){

      $school_id = Auth::user()->id;

      $student = Students::where('school_id',$school_id)->where('id',$id)->first();

      if($student == true){

      $data['editData'] = Students::where('school_id',$school_id)->findOrFail($id);
      //$data['terms'] = school_terms::all();
      //$data['admission_fees'] = admissions::where('student_id',$id)->get();

        return view('school.students.edit_student',$data);

        }

        else{
          abort(code:403);  
        }
 
      }
  
  
  
      
    public function StudentDetails($id){

      $school_id = Auth::user()->id;

      $student = Students::where('school_id',$school_id)->findOrFail($id);
      ///$terms = school_terms::all();

      return response()->json(array(
      'student' => $student,
      //'terms' => $terms,
      ));


  
      }
  
  
  
      
  
    
    public function UpdateStudents(Request $request, $id){
    
        $request->validate([
            'name' =>['required'],
       ]);

        DB::transaction(function() use($request,$id){
         
        $user = Students::where('id',$id)->first();   
        $user->name = $request->name;
        $user->email = $request->email;
        $user->telephone = $request->telephone;
        $user->telephone2 = $request->telephone2;
        $user->student_NIN = $request->student_NIN;
        $user->gender = $request->gender;
         $user->save();
  
  
  
        });
         
  
        return redirect()->route('view.students')->with('info',' Student Information Updated Successfully');

  
    }// END METHOD
  
  
  
    
    
    
  public function inactiveStudents($id)
  { 
  
    DB::transaction(function() use($id){
        
      $user = Students::where('id',$id)->first();  
      $user->status = 0;
      $user->save();
  
  
      
  });
  

       

  return back()->with('error',' Student Has Been Deactivated...');



  
  }
  



  

  public function activeStudents($id)
  {


    DB::transaction(function() use($id){
        
      $user = User::where('id',$id)->first();  
      $user->status = 1;
      $user->save();
  
     
  });


  return back()->with('success',' Student Has Been Activated...');

  
  }
  



}
