<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\expense_categories;
use App\Models\expenses;
use App\Models\school_terms;
use Illuminate\Support\Facades\Auth;

class ExpenseReportController extends Controller
{
    

    
//Expenses General Termly and Yearly Reports



public function SchoolExpensesReport(){  
   
    $school_id = Auth::user()->id;
    $data['terms'] = school_terms::all();
    $data['categories'] = expense_categories::where('school_id',$school_id)->get();
  
  return view('school.expenses.reports.school_expense_reports',$data);
  
      
  
  } 
  
  
  
  
  
      
  public function SchoolTermlyExpenseReport(Request $request){
  
    $school_id = Auth::user()->id;
  
    $term = $request->term_id;
    $year = $request->year;
  
    
    $expensefees_check = expenses::where('term_id',$term)->where('year',$year)->where('school_id',$school_id)->first();
     
  
  
    if($expensefees_check == true)
  {
  
  $expensefees = expenses::with(['school','category'])->where('term_id',$term)->where('year',$year)->where('school_id',$school_id)->latest()->get();
     
  $total_expense_amount = expenses::where('term_id',$term)->where('year',$year)->where('school_id',$school_id)->sum('invoice_amount');
  
  $total_expense_paid= expenses::where('term_id',$term)->where('year',$year)->where('school_id',$school_id)->sum('amount');
  
  $school_details = expenses::with('school')->where('school_id',$school_id)->where('term_id',$term)->where('year',$year)->first();
  
  return view('school.expenses.reports.term_expenses_report.term_school_expense_report',compact('expensefees','school_details','total_expense_amount','total_expense_paid'));
  
  
  }
  
  else{
  
  
  return view('school.expenses.reports.term_expenses_report.no_fees_data');
  
  
  }
      
  } 
  
  
    
  public function SchoolYearlyExpenseReport(Request $request){
  
    $school_id = Auth::user()->id;
    $year = $request->year;
  
        
    $expensefees_check = expenses::where('year',$year)->where('school_id',$school_id)->first();
     
  
  
    if($expensefees_check == true)
  {
  
   
    $expensefees = expenses::with('school')->select('term_id','category_id','year')->groupBy('term_id','category_id','year')->where('year',$year)->where('school_id',$school_id)->get();
  
    $total_expense_amount = expenses::where('year',$year)->where('school_id',$school_id)->sum('invoice_amount');
    
    $total_expense_paid= expenses::where('year',$year)->where('school_id',$school_id)->sum('amount');
   
    $school_details = expenses::with('school')->where('school_id',$school_id)->where('year',$year)->first();
  
  
  return view('school.expenses.reports.year_expense_report.year_school_expense_report',compact('expensefees','total_expense_amount','total_expense_paid','school_details'));
  }
  
  else{
  
  
  return view('school.expenses.reports.year_expense_report.no_fees_data');
  
  
  
  }
      
  
  } 
  
  
  
  
  
  public function ExpenseCategoryTermlyReport(Request $request){
  
    $school_id = Auth::user()->id;
  
    $term = $request->term_id;
    $category_id = $request->category_id;
    $year = $request->year;
  
    
    $expensefees_check = expenses::where('category_id',$category_id)->where('term_id',$term)->where('year',$year)->where('school_id',$school_id)->first();
     
  
  
    if($expensefees_check == true)
  {
  
  $expensefees = expenses::with(['school','category'])->where('category_id',$category_id)->where('term_id',$term)->where('year',$year)->where('school_id',$school_id)->latest()->get();
     
  $total_fees_amount = expenses::where('category_id',$category_id)->where('term_id',$term)->where('year',$year)->where('school_id',$school_id)->sum('invoice_amount');
  
  $total_fees_paid= expenses::where('category_id',$category_id)->where('term_id',$term)->where('year',$year)->where('school_id',$school_id)->sum('amount');
  
  $details = expenses::with(['school','category'])->where('category_id',$category_id)->where('school_id',$school_id)->where('term_id',$term)->where('year',$year)->first();
  
  return view('school.expenses.reports.term_expenses_report.term_expense_cate_report',compact('expensefees','details','total_fees_amount','total_fees_paid'));
  
  
  }
  
  else{
  
  
  return view('school.expenses.reports.term_expenses_report.no_fees_data');
  
  
  }
      
  } 
  
  
    
  public function ExpenseCategoryYearlyReport(Request $request){
  
    $school_id = Auth::user()->id;
    $category_id = $request->category_id;
    $year = $request->year;
  
        
    $expensefees_check = expenses::where('category_id',$category_id)->where('year',$year)->where('school_id',$school_id)->first();
     
  
  
    if($expensefees_check == true)
  {
  
  
    $expensefees = expenses::with(['school','category'])->where('category_id',$category_id)->where('year',$year)->where('school_id',$school_id)->orderBy('term_id','asc')->get();
  
    $total_fees_amount = expenses::where('category_id',$category_id)->where('year',$year)->where('school_id',$school_id)->sum('invoice_amount');
    
    $total_fees_paid= expenses::where('category_id',$category_id)->where('year',$year)->where('school_id',$school_id)->sum('amount');
   
    $details = expenses::with(['school','category'])->where('category_id',$category_id)->where('school_id',$school_id)->where('year',$year)->first();
  
  
  return view('school.expenses.reports.year_expense_report.year_expense_cate_report',compact('expensefees','total_fees_amount','total_fees_paid','details'));
  }
  
  else{ 
  
  
  return view('school.expenses.reports.year_expense_report.no_fees_data');
  
  
  
  }
      
  
  } 
  



}
