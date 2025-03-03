<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\expense_categories;
use App\Models\expenses;
use App\Models\expense_payments_track;
use App\Models\school_terms;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ExpenseController extends Controller
{
    

     // Expense categories Section //

     public function ViewExpenseCategory()
     {
         $school_id = Auth::user()->id;
         $categories = expense_categories::where('school_id',$school_id)->latest()->get();
         return view('school.expenses.categories.view_categories',compact('categories'));
 
     }
 
 
     public function ExpenseCategoryStore(Request $request)
     {
         DB::transaction(function() use($request){
 
 
 
             $validatedData = $request->validate([
 
                 'name' => 'required',
         
                ]);
 
 
         $school_id = Auth::user()->id;
         $expense = new expense_categories();
         $expense->school_id = $school_id;
         $expense->name = $request->name;
         $expense->save();
 
         });
 
           
   return back()->with('success','New Expense Category Information Added Successfully');
           
     }
 
 
 
     public function EditExpenseCategory($id)
 
     {  
         
         $expensecate = expense_categories::findOrFail($id);
 
         return response()->json(array(
             'expensecate' => $expensecate,
         ));
 
     }
 
 
     public function ExpenseCategoryUpdate(Request $request)
     {
 
         $expense_id = $request->input('id');
         $expense = expense_categories::find($expense_id);
         $expense->name = $request->input('name');
         $expense->update();
     
     
         return back()->with('info','Expense Category Successfully Updated...');
 
    }
 
 
 
    //Expenses Section //
 
    
     
    public function ViewExpenses(){
     
     
     $school_id = Auth::user()->id;
 
     $data['terms'] = school_terms::all();
     $data['categories'] = expense_categories::where('school_id',$school_id)->latest()->get();
 
     $data['expensefees_term1'] = expenses::with(['school'])->where('school_id',$school_id)->where('term_id',1)->latest()->get();
     
     $data['expensefees_term2'] = expenses::with(['school'])->where('school_id',$school_id)->where('term_id',2)->latest()->get();
 
     $data['expensefees_term3'] = expenses::with(['school'])->where('school_id',$school_id)->where('term_id',3)->latest()->get();
 
     return view('school.expenses.view_expenses', $data);
 }
 
 
 
         
 public function ViewExpenseFeesFilter(){
 
 
     $school_id = Auth::user()->id;
      
     $data['expensefees_term1'] = expenses::with(['school'])->where('school_id',$school_id)->where('term_id',1)->latest()->get();
     
     $data['expensefees_term2'] = expenses::with(['school'])->where('school_id',$school_id)->where('term_id',2)->latest()->get();
 
     $data['expensefees_term3'] = expenses::with(['school'])->where('school_id',$school_id)->where('term_id',3)->latest()->get();
 
 
   return view('school.expenses.view_expensefees_filter',$data);
 } 
 
 
 
 
 public function ExpenseFeesStore(Request $request){
 
     $term_id = $request->term_id;
     $category_id = $request->category_id;
     $date = Carbon::today()->format('Y-m-d');
     $month = Carbon::now()->format('F Y');
     $year = Carbon::parse($request->year)->format('Y');
 
     $check = expenses::where('date',$date)->where('month', $month)->where('year', $year)->where('term_id',$term_id)->where('category_id',$category_id)->first();
 
     if($check == null){
 
         $school_id = Auth::user()->id;
 
     $expense = new expenses();
     $expense->school_id = $school_id;
     $expense->date = date('Y-m-d', strtotime($request->date));;
     $expense->month = $month;
     $expense->year = $request->year;
     $expense->term_id = $request->term_id;
     $expense->category_id = $request->category_id;
     $expense->amount = $request->amount;
     $expense->invoice_amount = $request->invoice_amount;
     $expense->invoice_no = $request->invoice_no;
     $expense->save();
 
 
     
 $expense_track = new expense_payments_track();
 $expense_track->expense_id = $expense->id;
 $expense_track->school_id = $school_id;
 $expense_track->term_id = $expense->term_id; 
 $expense_track->invoice_no = $expense->invoice_no;
 $expense_track->fees_topup_amount  = $expense->amount;
 $expense_track->previous_fees_amount  = $expense->amount;
 $expense_track->present_fees_amount  = $expense->amount;
 $expense_track->old_balance  = (float)$expense->invoice_amount-(float)$expense_track->previous_fees_amount;
 $expense_track->new_balance  = (float)$expense->invoice_amount-(float)$expense_track->present_fees_amount;
 $expense_track->payment_type = $request->payment_type;
 $expense_track->date = $expense->date;
 $expense_track->month = $expense->month;
 $expense_track->notes = $request->notes;
 $expense_track->year = $expense->year;
 $expense_track->save();
 
 
 
     return back()->with('success','Expense Information Added Successfully');
 
 }
 
 
 else{
   
     return back()->with('error','EXPENSE RECORD ALREADY EXISTS...');
   
   }
 
 
 
 }  // end method
 
 
 
 public function ExpenseFeesEdit($id){
   $school_id = Auth::user()->id;
 
     $expense = expenses::with(['school'])->where('school_id',$school_id)->where('id',$id)->first();
 
     if($expense == true){
 
       $data['terms'] = school_terms::all();
       $data['categories'] = expense_categories::where('school_id',$school_id)->latest()->get();
       $data['expense_track'] = expense_payments_track::where('expense_id',$id)->get();
       $data['edit_expense'] = expenses::with(['school','term'])->find($id);
      
   
 
       return view('school.expenses.edit_expense', $data);
         
 
     }
 
     else{
         abort(code:403);
     }
 
     
 }
 
 
 
 
 public function ExpenseFeesUpdate(Request $request, $id){
 
 
   DB::transaction(function() use($request,$id){
 
 
     $expense = expenses::find($id);
     $expense->date = date('Y-m-d', strtotime($request->date));
     $expense->term_id = $request->term_id;
     $expense->category_id = $request->category_id;
     $expense->amount = $request->amount;
     $expense->invoice_amount = $request->invoice_amount;
     $expense->invoice_no = $request->invoice_no;
     $expense->year = $request->year;
    
     $expense->save();
     
 
 
   expense_payments_track::where('expense_id',$id)->delete(); 
 $expense_track = new expense_payments_track();
 $expense_track->expense_id = $id;
 $expense_track->school_id = $expense->school_id;
 $expense_track->term_id = $expense->term_id; 
 $expense_track->invoice_no = $expense->invoice_no;
 $expense_track->fees_topup_amount  = $expense->amount;
 $expense_track->previous_fees_amount  = $expense->amount;
 $expense_track->present_fees_amount  = $expense->amount;
 $expense_track->old_balance  = (float)$expense->invoice_amount-(float)$expense_track->previous_fees_amount;
 $expense_track->new_balance  = (float)$expense->invoice_amount-(float)$expense_track->present_fees_amount;
 $expense_track->payment_type = $request->payment_type;
 $expense_track->date = $expense->date;
 $expense_track->month = $expense->month;
 $expense_track->notes = $request->notes;
 $expense_track->year = $expense->year;
 $expense_track->save();
 
 
 
 
 
   });
 
     return redirect()->route('view.expenses')->with('info','Expense Information Updated Successfully');
 
 
 } // end method 
 
 
 
 
  
 public function ViewExpenseFeesDetails($invoice_no){
 
    
     $school_id = Auth::user()->id;
     
     
     $expense = expenses::where('invoice_no',$invoice_no)->where('school_id',$school_id)->first();
     
     if($expense == true){
     
       $terms = school_terms::all();
     
     $expense_details = expenses::with('school')->where('invoice_no',$invoice_no)->where('school_id',$school_id)->get();
     
     $otherfees_details = expenses::with('school')->where('invoice_no',$invoice_no)->where('year',$expense->year)->where('school_id',$school_id)->latest()->get();
     
     $expense_payments = expense_payments_track::with('school')->where('invoice_no',$invoice_no)->where('school_id',$school_id)->latest()->get();
     
     
     return view('school.expenses.expense_details', compact('expense_details','otherfees_details','expense_payments'));
     
     
     }
     
     else{
     
     abort(code:403);
     
     }	
     
     
         }
       
     
 
 
           
   public function ViewExpenseReportPrint($id){
 
     $school_id = Auth::user()->id;
     
     $expense = expenses::where('id',$id)->where('school_id',$school_id)->first();
     
     if($expense == true){
     
     $details = expenses::with(['school'])->where('id',$id)->where('school_id',$school_id)->get();
         
     return view('school.expenses.expensefees_report', compact('details'));
     
     
       }
        
       else{
     
          abort(code:403);
         
         }	
     
     
       }
     
 
     
       
 
       
   public function SubmitExpenseFeesTopup(Request $request, $invoice_no)
   { 
 
     $school_id = Auth::user()->id;
   
 
 $expensefees_amount = expenses::where('invoice_no',$invoice_no)->first();	
 
 $due_bal = (float)$expensefees_amount->invoice_amount-(float)$expensefees_amount->amount;
 
 
 if($request->fees_topup_amount <= $due_bal)
 {
 
 $previous_amount = $expensefees_amount->amount;
 $invoice_amount = $expensefees_amount->invoice_amount;
 $present_fees = (float)$previous_amount+(float)$request->fees_topup_amount; 
 $expensefees_amount->amount = $present_fees;
 $expensefees_amount->save();
 
     
 $expense_track = new expense_payments_track();
 $expense_track->expense_id = $expensefees_amount->id;
 $expense_track->school_id = $school_id;
 $expense_track->term_id = $expensefees_amount->term_id; 
 $expense_track->invoice_no = $invoice_no;
 $expense_track->fees_topup_amount  = $request->fees_topup_amount;
 $expense_track->previous_fees_amount  = $previous_amount;
 $expense_track->present_fees_amount  = $present_fees;
 $expense_track->old_balance  = (float)$invoice_amount-(float)$previous_amount;
 $expense_track->new_balance  = (float)$invoice_amount-(float)$present_fees;
 
 $expense_track->payment_type = $request->payment_type;
 $expense_track->date = Carbon::today()->format('Y-m-d');
 $expense_track->month = Carbon::today()->format('F Y');
 $expense_track->notes = $request->notes;
 $expense_track->year = $expensefees_amount->year;
 $expense_track->save();
 
 
 
 
           return back()->with('success',' Expense fees Balance Payment Successful');
 
 }
 
 else{
 
 
         return back()->with('error',' Expense fees Balance Amount Entered Greater than Account Balance!');
 
 
 
 }
 
   } 
 
 
 
 
 
 
   public function ExpenseFeesTrackInvoice($invoice_no){
 
  
     $school_id = Auth::user()->id;
 
     $student = expenses::where('invoice_no',$invoice_no)->where('school_id',$school_id)->first();
     
     if($student == true){
     
       $data['expensefees'] = expenses::with(['term','category'])->where('invoice_no',$invoice_no)->first();
       $data['expensefees_track'] = expense_payments_track::where('invoice_no',$invoice_no)->get();
     
     return view('school.expenses.expense_payments_track_invoice', $data);
     
     
       }
        
       else{
     
          abort(code:403);
         
         }	
     
     
       }
     
 
 
 
       
 
 
 
 
   
   public function ExpenseTopupPaymentInvoice($id){
 
  
     $school_id = Auth::user()->id;
     
     
     $student = expense_payments_track::where('id',$id)->where('school_id',$school_id)->first();
     
     if($student == true){
 
 $payments_details = expense_payments_track::with(['expense'])->where('id',$id)->where('school_id',$school_id)->get();
 
     
     return view('school.expenses.expense_payment_invoice', compact('payments_details'));
     
     
       }
        
       else{
     
          abort(code:403);
         
         }	
     
     
       }
     
 
 
 
 
       
   public function ExpenseFeesTopupPaymentDelete($id)
   {
   
     $expense_track = expense_payments_track::find($id);
     $payment = $expense_track->fees_topup_amount;
     $invoice_no = $expense_track->invoice_no;
     $expense_id = $expense_track->expense_id;
     
     $expense_amount = expenses::where('invoice_no',$invoice_no)->where('id',$expense_id)->first();
     $old_amount = $expense_amount->amount;
     $new_amount = (float)$old_amount-(float)$payment;
 
     expenses::where('invoice_no',$invoice_no)->where('id',$expense_id)->update([
 
       'amount' => $new_amount,
 
     ]);
 
 
     expense_payments_track::find($id)->delete();
    
     return back()->with('info',' Expense fees Topup Payment Deleted Successfully');
 
   
   }
 



}
