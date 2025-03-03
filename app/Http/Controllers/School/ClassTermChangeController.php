<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\school_terms;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ClassTermChangeController extends Controller
{
    

    
  public function StudentsClassPromotion(Request $request){
  
     
   
    $school_code = Auth::user()->school_id_no;
  
    $data['students'] = User::where('user_type',2)->where('student_school_code',$school_code)->where('status', 1)->get();

  return view('school.students.class_promote.students_class_promote',$data);

      

  } 




	

  public function StudentsClassWise(Request $request){



    $student_class = $request->student_class;
     
    $school_code = Auth::user()->school_id_no;
  
    $data['students'] = User::where('user_type',2)->where('student_school_code',$school_code)->where('student_class',$student_class)->where('status', 1)->get();

    
  return view('school.students.class_promote.students_class_promote',$data);

      

  } 






// Students Promotion //



  public function ClassPromotion(Request $request){ 


    $student_class = $request->student_class;
     
    $school_code = Auth::user()->school_id_no;

  
    $students = User::where('user_type',2)->where('student_school_code',$school_code)->where('student_class',$student_class)->where('status', 1)->first();


   if($students == true){

DB::transaction(function() use($request){

  
  $checkdata = $request->checkmanage;  


  $student_class = $request->student_class;
  $promote_class = $request->promote_class;   

  $school_code = Auth::user()->school_id_no;

  if ($checkdata != null) {
  
    for ($i=0; $i <count($checkdata) ; $i++) {  
      User::where('user_type',2)->where('student_school_code',$school_code)->where('student_class',$student_class)->where('status', 1)->where('id',$request->id[$checkdata[$i]])->update([

        'student_class'=> $promote_class,

      ]);



    } // end for loop 
  }// end if conditon


});
 

if ( empty($checkdata)) {

  return redirect()->route('students.class.promote')->with('success', 'Students` Class Promotion was Successfully...');

}
else{
  
  return redirect()->back()->with('success', 'Students` Class Promotion was UnSuccessfully...');

}


   }


   else{

    return back()->with('error',' ACTION FORBIDDEN!');

}


  


  }// end method












  
  
  public function StudentsTermChange(Request $request){
  
     
   
    $school_code = Auth::user()->school_id_no;
  
    $data['terms'] = school_terms::all();
    $data['students'] = User::where('user_type',2)->where('student_school_code',$school_code)->where('status', 1)->get();

  return view('school.students.term_change.students_term_change',$data);

      

  } 




	

  public function StudentsTermClassWise(Request $request){



    $student_class = $request->student_class;
     
    $school_code = Auth::user()->school_id_no;
    $data['terms'] = school_terms::all();
    $data['students'] = User::where('user_type',2)->where('student_school_code',$school_code)->where('student_class',$student_class)->where('status', 1)->get();

    
  return view('school.students.term_change.students_term_change',$data);

      

  } 






// Students Term Change //



  public function TermChange(Request $request){ 


    $student_class = $request->student_class;     
    $term_id = $request->term_id;
    $school_code = Auth::user()->school_id_no;

  
    $students = User::where('user_type',2)->where('student_school_code',$school_code)->where('student_class',$student_class)->where('term_id',$term_id)->where('status', 1)->first();


   if($students == true){

DB::transaction(function() use($request){

  
  $checkdata = $request->checkmanage;  


  $student_class = $request->student_class;
  $term_id = $request->term_id;

    $new_term_id = $request->new_term_id;  

  $school_code = Auth::user()->school_id_no;

  if ($checkdata != null) {
  
    for ($i=0; $i <count($checkdata) ; $i++) {  
      User::where('user_type',2)->where('student_school_code',$school_code)->where('student_class',$student_class)->where('term_id',$term_id)->where('status', 1)->where('id',$request->id[$checkdata[$i]])->update([

        'term_id'=> $new_term_id,

      ]);



    } // end for loop 
  }// end if conditon


});
 

if ( empty($checkdata)) {

  return redirect()->route('students.term.change')->with('success', 'Students` Term Changed Successfully...');

}
else{
  
  return redirect()->back()->with('success', 'Students` Term Change was UnSuccessfully...');

}


   }


   else{

    return back()->with('error',' ACTION FORBIDDEN!');

}


  


  }// end method




}
