<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\expenses;
use App\Models\students_schoolfees_records;
use App\Models\admissions;
use App\Models\school_terms;
use Illuminate\Support\Facades\Auth;


class IncomeStatementController extends Controller
{
    

       
  public function ViewIncomeStatementReports(){  
   
    $data['terms'] = school_terms::all();

  return view('school.income_statement.income_statement_report',$data);


  } 




  
  public function IncomeStatementReportByTerm(Request $request){
  
    $school_code = Auth::user()->school_id_no;
    
  $school_id = Auth::user()->id;

    $term = $request->term_id;
    $year = $request->year;

    
    $schoolfees_check = students_schoolfees_records::where('term_id',$term)->where('year',$year)->where('school_id',$school_code)->first();
     


    if($schoolfees_check == true)
{



$schoolfees = students_schoolfees_records::select('term_id','student_class','year')->groupBy('term_id','student_class','year')->where('term_id',$term)->where('year',$year)->where('school_id',$school_code)->latest()->get();

$expensefees = expenses::select('category_id','term_id','year')->groupBy('category_id','term_id','year')->where('term_id',$term)->where('year',$year)->where('school_id',$school_id)->latest()->get();

$total_fees_paid= students_schoolfees_records::where('term_id',$term)->where('year',$year)->where('school_id',$school_code)->sum('amount');

$total_expense_paid = expenses::where('term_id',$term)->where('year',$year)->where('school_id',$school_id)->sum('amount');

$school_details = students_schoolfees_records::with(['school','student'])->where('school_id',$school_code)->where('term_id',$term)->where('year',$year)->first();


return view('school.income_statement.term_report.term_income_statement_report',compact('school_details','total_fees_paid','total_expense_paid','schoolfees','expensefees'));


}

else{

  
  return view('school.income_statement.term_report.no_data');


}
      
  } 


    
  public function IncomeStatementReportByYears(Request $request){
  
    $school_code = Auth::user()->school_id_no;
    $school_id = Auth::user()->id;
    $year = $request->year;

        
    $schoolfees_check = students_schoolfees_records::where('year',$year)->where('school_id',$school_code)->first();
     


    if($schoolfees_check == true)
{



$schoolfees = students_schoolfees_records::select('term_id','year')->groupBy('term_id','year')->where('year',$year)->where('school_id',$school_code)->get();

$expensefees = expenses::select('category_id','year')->groupBy('category_id','year')->where('year',$year)->where('school_id',$school_id)->latest()->get();

$total_fees_paid= students_schoolfees_records::where('year',$year)->where('school_id',$school_code)->sum('amount');

$total_expense_paid= expenses::where('year',$year)->where('school_id',$school_id)->sum('amount');

$school_details = students_schoolfees_records::with(['school','student'])->where('school_id',$school_code)->where('year',$year)->first();
 

  return view('school.income_statement.year_report.year_income_statement_report',compact('total_fees_paid','school_details','total_expense_paid','schoolfees','expensefees'));
}

else{


  return view('school.income_statement.year_report.no_data');



}
      

  } 




}
