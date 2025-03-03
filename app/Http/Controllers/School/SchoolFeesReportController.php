<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\students_schoolfees_records;
use App\Models\cash_bank_fees_payments;
use App\Models\school_fees_collections;
use App\Models\school_terms;
use App\Models\admissions;
use Illuminate\Support\Facades\Auth;

class SchoolFeesReportController extends Controller
{
    


    

  //Students Schoolfess Financial Statement Report Section
  
  
  public function StudentFeesFinancialStatement(){


    $school_code = Auth::user()->school_id_no;     

    $data['allData'] = students_schoolfees_records::with(['school','student'])->where('school_id',$school_code)->latest()->get();


  return view('school.fees_collections.students_financial_statement',$data);
}




  
public function GenerateFinancialStatement($id){


  $school_code = Auth::user()->school_id_no;
    
  $student = students_schoolfees_records::where('id',$id)->where('school_id',$school_code)->first();

    
  if($student == true){
    
    
    $details = students_schoolfees_records::with(['student'])->where('id',$id)->where('school_id',$school_code)->get();

    $otherfees_details = students_schoolfees_records::with(['student'])->where('student_acct_no',$student->student_acct_no)->where('student_class',$student->student_class)->where('student_day_boarding',$student->student_day_boarding)->where('year',$student->year)->where('school_id',$school_code)->latest()->get();

        
    
return view('school.fees_collections.student_get_financial_statement',compact('details','otherfees_details'));

    
      }
       
      else{
    
         abort(code:403);
        
        }	








 
}





public function GetStudentTermlyFinancialStatement(Request $request, $invoice_no){


  $school_code = Auth::user()->school_id_no;
  $term = $request->term_id;
	$year = $request->year; 

  $student = students_schoolfees_records::where('invoice_no',$invoice_no)->where('school_id',$school_code)->first();

  if($student == true){

  
  $total_schoolfees = students_schoolfees_records::with(['school','student'])->where('invoice_no',$invoice_no)->where('year',$year)->where('school_id',$school_code)->get();
  $offline_fees_track = cash_bank_fees_payments::where('invoice_no',$invoice_no)->get();
  //$mobile_fees_track = school_fees_collections::where('student_acct_no',$student->student_acct_no)->where('year',$student->year)->get();



  return view('school.fees_collections.student_termly_financial_statement_report', compact('total_schoolfees','offline_fees_track','year'));


  }

  else{

  abort(code:403);

  }	


}






public function GetStudentYearlyFinancialStatement(Request $request, $student_code){


  $school_code = Auth::user()->school_id_no;
	$year = $request->year; 

  $student = students_schoolfees_records::where('student_acct_no',$student_code)->where('school_id',$school_code)->first();

  if($student == true){

  
  $total_schoolfees = students_schoolfees_records::with(['school','student'])->where('student_acct_no',$student_code)->where('year',$year)->where('school_id',$school_code)->get();
  //$offline_fees_track = cash_bank_fees_payments::where('student_acct_no',$student_code)->where('year',$year)->where('school_id',$school_code)->get();
  //$mobile_fees_track = school_fees_collections::where('student_acct_no',$student->student_acct_no)->where('year',$student->year)->where('school_id',$school_code)->get();



  return view('school.fees_collections.student_yearly_financial_statement_report', compact('total_schoolfees','year'));


  }

  else{

  abort(code:403);

  }	


}


    
  public function SchoolfeesCollectionsReport(){  
   
    $data['terms'] = school_terms::all();

  return view('school.fees_collections.schoolfees_collections_report',$data);

      

  } 





      
  public function SchoolfeesTermlyReport(Request $request){
  
    $school_code = Auth::user()->school_id_no;

    $term = $request->term_id;
    $year = $request->year;

    
    $schoolfees_check = students_schoolfees_records::where('term_id',$term)->where('year',$year)->where('school_id',$school_code)->first();
     


    if($schoolfees_check == true)
{

  $schoolfees = students_schoolfees_records::with(['school','student'])->select('term_id','student_class','year')->groupBy('term_id','student_class','year')->where('term_id',$term)->where('year',$year)->where('school_id',$school_code)->latest()->get();
     
  $total_fees_amount = students_schoolfees_records::where('term_id',$term)->where('year',$year)->where('school_id',$school_code)->sum('total_amount');
  
  $total_fees_paid= students_schoolfees_records::where('term_id',$term)->where('year',$year)->where('school_id',$school_code)->sum('amount');
 
  $school_details = students_schoolfees_records::with(['school','student'])->where('school_id',$school_code)->where('term_id',$term)->where('year',$year)->first();

  return view('school.fees_collections.term_fees_report.term_schoolfees_collections_report',compact('schoolfees','year','school_details','total_fees_amount','total_fees_paid'));


}

else{

  
  return view('school.fees_collections.term_fees_report.no_fees_data');


}
      
  } 


    
  public function SchoolfeesYearlyReport(Request $request){
  
    $school_code = Auth::user()->school_id_no;
    $year = $request->year;

        
    $schoolfees_check = students_schoolfees_records::where('year',$year)->where('school_id',$school_code)->first();
     


    if($schoolfees_check == true)
{

  
    $schoolfees = students_schoolfees_records::with(['school','student'])->select('term_id','year')->groupBy('term_id','year')->where('year',$year)->where('school_id',$school_code)->latest()->get();

    $total_fees_amount = students_schoolfees_records::where('year',$year)->where('school_id',$school_code)->sum('total_amount');
    
    $total_fees_paid= students_schoolfees_records::where('year',$year)->where('school_id',$school_code)->sum('amount');
   
    $school_details = students_schoolfees_records::with(['school','student'])->where('school_id',$school_code)->where('year',$year)->first();
 

  return view('school.fees_collections.year_fees_report.year_schoolfees_collections_report',compact('schoolfees','total_fees_amount','total_fees_paid','school_details'));
}

else{


  return view('school.fees_collections.year_fees_report.no_fees_data');



}
      

  } 







  




  /// Admission Fees Collections Report

  
  public function ViewAdmissionFeesReport(){  
   
    $data['terms'] = school_terms::all();

  return view('school.fees_collections.admission_fees.admission_fees_report',$data);

      

  } 





      
  public function AdmissionFeesTermlyReport(Request $request){
  
    $school_code = Auth::user()->id;

    $term = $request->term_id;
    $year = $request->year;

            
    $admissionfees_check = admissions::where('term_id',$term)->where('year',$year)->where('school_id',$school_code)->first();
     

    if($admissionfees_check == true)
{

    $admissionfees = admissions::with(['school','student'])->select('term_id','student_class','year')->groupBy('term_id','student_class','year')->where('term_id',$term)->where('year',$year)->where('school_id',$school_code)->latest()->get();
     
    $total_fees= admissions::where('term_id',$term)->where('year',$year)->where('school_id',$school_code)->sum('admission_fees');
   
    $school_details = admissions::with(['school','student'])->where('school_id',$school_code)->where('term_id',$term)->where('year',$year)->first();
 
    return view('school.fees_collections.admission_fees.term_admissionfees_collections_report',compact('admissionfees','year','school_details','total_fees'));

}
else{


  
  return view('school.fees_collections.admission_fees.no_admissionfees_data');



}

      
  } 


    
  public function AdmissionFeesYearlyReport(Request $request){
  
    $school_code = Auth::user()->id;
    $year = $request->year;

           
    $admissionfees_check = admissions::where('year',$year)->where('school_id',$school_code)->first();
     

    if($admissionfees_check == true)
{
  
    $admissionfees = admissions::with(['school','student'])->select('term_id','year')->groupBy('term_id','year')->where('year',$year)->where('school_id',$school_code)->get();
    
    $total_fees= admissions::where('year',$year)->where('school_id',$school_code)->sum('admission_fees');
   
    $school_details = admissions::with(['school','student'])->where('school_id',$school_code)->where('year',$year)->first();
 

  return view('school.fees_collections.admission_fees.year_admissionfees_collections_report',compact('admissionfees','total_fees','school_details','year'));

  
}
else{


  
  return view('school.fees_collections.admission_fees.no_admissionfees_data');



}
      

  } 




}
