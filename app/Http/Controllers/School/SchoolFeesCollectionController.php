<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\DB;
use App\Models\school_fees_collections;
use Carbon\Carbon;
use App\Models\schoolsfees_amounts;
use App\Models\students_schoolfees_records;
use App\Models\cash_bank_fees_payments;
use App\Models\school_terms;
use App\Models\admissions;


class SchoolFeesCollectionController extends Controller
{




    
    
    public function ViewFeesCollections(){


        $school_code = Auth::user()->school_id_no;
        
        $data['schoolfees_term1'] = students_schoolfees_records::with(['school','student'])->where('school_id',$school_code)->where('term_id',1)->latest()->get();
    
        $data['schoolfees_term2'] = students_schoolfees_records::with(['school','student'])->where('school_id',$school_code)->where('term_id',2)->latest()->get();
    
        $data['schoolfees_term3'] = students_schoolfees_records::with(['school','student'])->where('school_id',$school_code)->where('term_id',3)->latest()->get();
    

        return view('school.fees_collections.view_students',$data);
        
    }
  


 
    public function ViewStudentFeesCollectionDetails($invoice_no){

   
$school_code = Auth::user()->school_id_no;


$student = students_schoolfees_records::where('invoice_no',$invoice_no)->where('school_id',$school_code)->first();

if($student == true){

  $terms = school_terms::all();

$fees_details = students_schoolfees_records::with(['student'])->where('invoice_no',$invoice_no)->where('school_id',$school_code)->get();


$otherfees_details = students_schoolfees_records::with(['student'])->where('student_acct_no',$student->student_acct_no)->where('student_class',$student->student_class)->where('student_day_boarding',$student->student_day_boarding)->where('year',$student->year)->where('school_id',$school_code)->latest()->get();

$offline_pay = cash_bank_fees_payments::with(['school','student'])->where('student_acct_no',$student->student_acct_no)->where('invoice_no',$invoice_no)->where('school_id',$school_code)->latest()->get();


return view('school.fees_collections.fees_collection_details', compact('fees_details','otherfees_details','offline_pay','terms'));


}

else{

abort(code:403);

}	





    }
  


  
        
  public function ViewSchoolFeesCollections(){


    $school_code = Auth::user()->school_id_no;     

    $data['schoolfees_term1'] = students_schoolfees_records::with(['school','student'])->where('school_id',$school_code)->where('term_id',1)->latest()->get();
    
    $data['schoolfees_term2'] = students_schoolfees_records::with(['school','student'])->where('school_id',$school_code)->where('term_id',2)->latest()->get();

    $data['schoolfees_term3'] = students_schoolfees_records::with(['school','student'])->where('school_id',$school_code)->where('term_id',3)->latest()->get();


  return view('school.fees_collections.view_schoolfees_collections_filter',$data);
}


  






  
  public function ViewStudentFeesCollectionReportPrint($id){

 
    $school_code = Auth::user()->school_id_no;
    
    
    $student = students_schoolfees_records::where('id',$id)->where('school_id',$school_code)->first();
    
    if($student == true){
    
    
    $details = students_schoolfees_records::with(['student'])->where('id',$id)->where('school_id',$school_code)->get();
    
    
    return view('school.fees_collections.fees_collections_report', compact('details'));
    
    
      }
       
      else{
    
         abort(code:403);
        
        }	
    
    
      }
    





      public function GetBalanceAmount(Request $request){

        $term_id = $request->term_id;
        $year = $request->year; 
        $student_class = $request->student_class;
        $student_day_boarding = $request->student_day_boarding; 
      
        $bal = students_schoolfees_records::where('term_id',$term_id)->where('year',$year)->where('student_class',$student_class)->where('student_day_boarding',$student_day_boarding)->first();
      
        $bal_amount = (float)$bal->total_amount-(float)$bal->amount;
       
        return response()->json($bal_amount);
      
      } // End Mehtod 
      
      

  
    
  public function MakeOfflineSchoolFeesPayments(){


    $school_code = Auth::user()->school_id_no;

      $data['students'] = User::where('user_type',2)->where('student_school_code',$school_code)->where('status', 1)->get();


    return view('school.fees_collections.offline_pay.make_offline_pay',$data);
}




public function MakeStudentOfflinePayment($id){


  $school_code = Auth::user()->school_id_no;

  $student = User::where('student_school_code',$school_code)->where('id',$id)->first();

  if($student == true){

  $data['makePay'] = User::where('student_school_code',$school_code)->findOrFail($id);
  

    return view('school.fees_collections.offline_pay.view_make_offline_pay',$data);

    }

    else{
      abort(code:403);  
    }


}




public function SubmitStudentOfflineSchoolfeesPayment(Request $request, $student_code)
{ 


  $school_code = Auth::user()->school_id_no;
  $year= $request->year;

  $student_pay = User::where('student_code',$student_code)->where('student_school_code',$school_code)->where('status',1)->where('user_type',2)->first();

  
$schoolfees_term1_amount = schoolsfees_amounts::where('school_id',Auth::id())->where('student_class',$student_pay->student_class)->where('student_day_boarding',$student_pay->student_day_boarding)->where('term_id',1)->where('year',$year)->sum('fees_total_amount');

$schoolfees_term2_amount = schoolsfees_amounts::where('school_id',Auth::id())->where('student_class',$student_pay->student_class)->where('student_day_boarding',$student_pay->student_day_boarding)->where('term_id',2)->where('year',$year)->sum('fees_total_amount');

$schoolfees_term3_amount = schoolsfees_amounts::where('school_id',Auth::id())->where('student_class',$student_pay->student_class)->where('student_day_boarding',$student_pay->student_day_boarding)->where('term_id',3)->where('year',$year)->sum('fees_total_amount');
 

$student_fees = students_schoolfees_records::where('student_acct_no',$student_pay->student_code)->where('student_class',$student_pay->student_class)->where('student_day_boarding',$student_pay->student_day_boarding)->where('term_id',$student_pay->term_id)->where('year',$year)->first();	


if($student_fees == null){

  $student_fees_records = new students_schoolfees_records();
  $student_fees_records->student_acct_no = $student_pay->student_code;
  $student_fees_records->school_id =$student_pay->student_school_code;
  $student_fees_records->term_id = $student_pay->term_id;
  $student_fees_records->student_class = $student_pay->student_class;
  $student_fees_records->student_day_boarding = $student_pay->student_day_boarding;
  $student_fees_records->amount =$request->amount;


  if($student_pay->term_id == 1)
  {
  
  $student_fees_records->total_amount = $schoolfees_term1_amount;

  }

  elseif($student_pay->term_id == 2)
  {
  
  $student_fees_records->total_amount = $schoolfees_term2_amount;

  }

  elseif($student_pay->term_id == 3)
  {
  
  $student_fees_records->total_amount = $schoolfees_term3_amount;

  }

  $student_fees_records->invoice_no = mt_rand(1000000000,9999999999);
  $student_fees_records->year =$year;
   $student_fees_records->save();


   
$feesData = new cash_bank_fees_payments();
$feesData->payment_id = $student_fees_records->id;
$feesData->student_acct_no = $student_code;
$feesData->school_id = $school_code;
$feesData->term_id = $student_fees_records->term_id; 
$feesData->student_class = $student_fees_records->student_class;
$feesData->student_day_boarding = $student_fees_records->student_day_boarding;
$feesData->invoice_no = $student_fees_records->invoice_no;
$feesData->fees_topup_amount  = $student_fees_records->amount;
$feesData->previous_fees_amount  = $student_fees_records->amount;
$feesData->present_fees_amount  = $student_fees_records->amount;
$feesData->old_balance  = (float)$student_fees_records->total_amount-(float)$feesData->previous_fees_amount;
$feesData->new_balance  = (float)$student_fees_records->total_amount-(float)$feesData->present_fees_amount;
$feesData->payment_type = $request->payment_type;
$feesData->date = Carbon::today()->format('Y-m-d');
$feesData->month = Carbon::today()->format('F Y');
$feesData->notes = $request->notes;
$feesData->year = $year;
$feesData->save();



        return back()->with('success',' Offline Schoolfees Payment Successful');

}

else{
  
  return back()->with('error','STUDENT FEES RECORD ALREADY EXISTS...');


}

} 





public function StudentFeesEdit($id){

  $data['terms'] = school_terms::all();
$data['editFees'] = students_schoolfees_records::with(['student','term'])->find($id);
$data['cash_fees'] = cash_bank_fees_payments::where('payment_id',$id)->get();
  
  return view('school.fees_collections.offline_pay.edit_offline_pay_fees',$data);

}




public function StudentFeesUpdateStore(Request $request,$id){


DB::transaction(function() use($request,$id){

  $year = $request->year;

      $fees_update = students_schoolfees_records::where('id',$id)->first(); 
      
      
$schoolfees_term1_amount = schoolsfees_amounts::where('school_id',Auth::id())->where('student_class',$fees_update->student_class)->where('student_day_boarding',$fees_update->student_day_boarding)->where('term_id',1)->where('year',$year)->sum('fees_total_amount');

$schoolfees_term2_amount = schoolsfees_amounts::where('school_id',Auth::id())->where('student_class',$fees_update->student_class)->where('student_day_boarding',$fees_update->student_day_boarding)->where('term_id',2)->where('year',$year)->sum('fees_total_amount');

$schoolfees_term3_amount = schoolsfees_amounts::where('school_id',Auth::id())->where('student_class',$fees_update->student_class)->where('student_day_boarding',$fees_update->student_day_boarding)->where('term_id',3)->where('year',$year)->sum('fees_total_amount');
 

      $fees_update->amount = $request->amount;
      $fees_update->term_id = $request->term_id; 
      $fees_update->year = $year; 

      if($fees_update->term_id == 1)
      {
      
      $fees_update->total_amount = $schoolfees_term1_amount;
    
      }
    
      elseif($fees_update->term_id == 2)
      {
      
      $fees_update->total_amount = $schoolfees_term2_amount;
    
      }
    
      elseif($fees_update->term_id == 3)
      {
      
      $fees_update->total_amount = $schoolfees_term3_amount;
    
      }
       
      $fees_update->save();



      cash_bank_fees_payments::where('payment_id',$id)->delete(); 
      $fees_amount_record = new cash_bank_fees_payments();
$fees_amount_record->payment_id = $fees_update->id;
$fees_amount_record->student_acct_no = $fees_update->student_acct_no;
$fees_amount_record->school_id = $fees_update->school_id;
$fees_amount_record->term_id = $fees_update->term_id; 
$fees_amount_record->student_class = $fees_update->student_class;
$fees_amount_record->student_day_boarding = $fees_update->student_day_boarding;
$fees_amount_record->invoice_no = $fees_update->invoice_no;
$fees_amount_record->fees_topup_amount  = $fees_update->amount;
$fees_amount_record->previous_fees_amount  = $fees_update->amount;
$fees_amount_record->present_fees_amount  = $fees_update->amount;
$fees_amount_record->old_balance  = (float)$fees_update->total_amount-(float)$fees_amount_record->previous_fees_amount;
$fees_amount_record->new_balance  = (float)$fees_update->total_amount-(float)$fees_amount_record->present_fees_amount;
$fees_amount_record->payment_type = $request->payment_type;
$fees_amount_record->date = Carbon::today()->format('Y-m-d');
$fees_amount_record->month = Carbon::today()->format('F Y');
$fees_amount_record->notes = $request->notes;
$fees_amount_record->year = $year;
$fees_amount_record->save();





    });


    
    return back()->with('info',' Schoolfees Payment Update was Successful');






}







  
  public function SubmitStudentOfflinePayments(Request $request, $invoice_no)
  { 

    $school_code = Auth::user()->school_id_no;
  

$student_fees_amount = students_schoolfees_records::where('invoice_no',$invoice_no)->first();	

$due_bal = (float)$student_fees_amount->total_amount-(float)$student_fees_amount->amount;


if($request->fees_topup_amount <= $due_bal)
{

$previous_amount = $student_fees_amount->amount;
$total_amount = $student_fees_amount->total_amount;
$present_fees = (float)$previous_amount+(float)$request->fees_topup_amount; 
$student_fees_amount->amount = $present_fees;
$student_fees_amount->save();

    
$feesData = new cash_bank_fees_payments();
$feesData->payment_id = $student_fees_amount->id;
$feesData->student_acct_no = $student_fees_amount->student_acct_no;
$feesData->school_id = $school_code;
$feesData->term_id = $student_fees_amount->term_id; 
$feesData->student_class = $student_fees_amount->student_class;
$feesData->student_day_boarding = $student_fees_amount->student_day_boarding;
$feesData->invoice_no = $invoice_no;
$feesData->fees_topup_amount  = $request->fees_topup_amount;

$feesData->previous_fees_amount  = $previous_amount;
$feesData->present_fees_amount  = $present_fees;
$feesData->old_balance  = (float)$total_amount-(float)$previous_amount;
$feesData->new_balance  = (float)$total_amount-(float)$present_fees;

$feesData->payment_type = $request->payment_type;
$feesData->date = Carbon::today()->format('Y-m-d');
$feesData->month = Carbon::today()->format('F Y');
$feesData->notes = $request->notes;
$feesData->year = $student_fees_amount->year;
$feesData->save();




          return back()->with('success',' Fees Balance Payment Successful');

}

else{


		return back()->with('error',' Fees Balance Amount Entered Greater than Account Balance!');



}

  } 









  //Mobile Balance Payments
  
  public function MobileFeesBalancePayment(Request $request, $invoice_no)
  { 

    $term_id = $request->term_id;
		$year = $request->year;
		$student_class = $request->student_class;
		$student_day_boarding = $request->student_day_boarding;
    $balance_amount = $request->balance_amount;
  
    
 $check = students_schoolfees_records::where('invoice_no',$invoice_no)->where('term_id',$term_id)->where('year',$year)->where('student_class',$student_class)->where('student_day_boarding',$student_day_boarding)->first();
    
if($check == false)
{


$term_amount = students_schoolfees_records::where('invoice_no',$invoice_no)->first();	

$current_term_amount = $term_amount->amount;


if($balance_amount <= $current_term_amount)
{


  
 $previous_term = students_schoolfees_records::where('term_id',$term_id)->where('year',$year)->where('student_class',$student_class)->where('student_day_boarding',$student_day_boarding)->first();
    

  $new_term_amount = (float)$current_term_amount-(float)$balance_amount;

  
  $previous_term_amount = (float)$previous_term->amount+(float)$balance_amount;



  
  students_schoolfees_records::where('invoice_no',$invoice_no)->update(
      
    ['amount' => $new_term_amount]);


    
  students_schoolfees_records::where('term_id',$term_id)->where('year',$year)->where('student_class',$student_class)->where('student_day_boarding',$student_day_boarding)->update(
    
    ['amount' => $previous_term_amount]);

    



          return back()->with('success',' Mobile Fees Balance Payment Successful');

}

else{


		return back()->with('error',' Fees Balance Amount Greater than Amount Paid For This Term!');



}



  }


else{


  
  return back()->with('error',' The Values Entered Belong to Current Term, Please Choose Different Term...');




}




  } 

















  public function StudentOfflineTrackInvoice($invoice_no){

 
    $school_code = Auth::user()->school_id_no;

    
    
    $student = students_schoolfees_records::where('invoice_no',$invoice_no)->where('school_id',$school_code)->first();
    
    if($student == true){
    
      $data['student_fees'] = students_schoolfees_records::with(['student','term'])->where('invoice_no',$invoice_no)->first();
      $data['offline_fees_track'] = cash_bank_fees_payments::where('invoice_no',$invoice_no)->get();
    
    return view('school.fees_collections.offline_fees_track_invoice', $data);
    
    
      }
       
      else{
    
         abort(code:403);
        
        }	
    
    
      }
    



      

  public function StudentMobileTrackInvoice($student_code){

 
    $school_code = Auth::user()->school_id_no;

    
    
    $student = students_schoolfees_records::where('student_acct_no',$student_code)->where('school_id',$school_code)->first();
    
    if($student == true){
    
      $data['student_fees'] = students_schoolfees_records::with(['student','term'])->where('invoice_no',$student->invoice_no)->first();
      $data['mobile_fees_track'] = school_fees_collections::where('student_acct_no',$student_code)->where('year',$student->year)->get();
    
    return view('school.fees_collections.mobile_fees_track_invoice', $data);
    
    
      }
       
      else{
    
         abort(code:403);
        
        }	
    
    
      }




  
  public function StudentOfflinePaymentInvoice($id){

 
    $school_code = Auth::user()->school_id_no;
    
    
    $student = cash_bank_fees_payments::where('id',$id)->where('school_id',$school_code)->first();
    
    if($student == true){

$offline_details = cash_bank_fees_payments::with(['student'])->where('id',$id)->where('school_id',$school_code)->get();

    
    return view('school.fees_collections.offline_payment_invoice', compact('offline_details'));
    
    
      }
       
      else{
    
         abort(code:403);
        
        }	
    
    
      }
    



  		
  public function StudentOfflinePaymentDelete($id)
  {
  
    $cash_fees = cash_bank_fees_payments::find($id);
    $payment = $cash_fees->fees_topup_amount;
    $payment_id = $cash_fees->payment_id;
    $invoice_no = $cash_fees->invoice_no;
    
    
    $paid_amount = students_schoolfees_records::where('id',$payment_id)->where('invoice_no',$invoice_no)->first();
    $old_amount = $paid_amount->amount;
    $new_amount = (float)$old_amount-(float)$payment;

    students_schoolfees_records::where('id',$payment_id)->where('invoice_no',$invoice_no)->update([

      'amount' => $new_amount,

    ]);


    cash_bank_fees_payments::find($id)->delete();
   
    return back()->with('success',' Fees Balance Payment Deleted Successfully');

  
  }









///Students Admissions Fees

    
public function ViewAdmissionFeesCollections(){

  $school_id = Auth::user()->id;

  $data['terms'] = school_terms::all();

  $data['admissions_term1'] = admissions::with(['school','student'])->where('school_id',$school_id)->where('term_id',1)->latest()->get();

  $data['admissions_term2'] = admissions::with(['school','student'])->where('school_id',$school_id)->where('term_id',2)->latest()->get();

  $data['admissions_term3'] = admissions::with(['school','student'])->where('school_id',$school_id)->where('term_id',3)->latest()->get();



  return view('school.fees_collections.admission_fees.view_admission_fees',$data);
}






public function AdmissionFeeEdit($id){

  $school_id = Auth::user()->id;
  $school = admissions::where('school_id',$school_id)->where('id',$id)->first();

  if($school == true){

$data['editFees'] = admissions::with(['student','school'])->where('school_id',$school_id)->findOrFail($id);
$data['terms'] = school_terms::all();

return view('school.fees_collections.admission_fees.edit_admission_fee',$data);

}

else{
  abort(code:403);
}


}



    
public function AdmissionFeeUpdate(Request $request, $id){


  DB::transaction(function() use($request,$id){

   $admission_fees = admissions::where('id',$id)->first();
   $admission_fees->term_id = $request->term_id;
   $admission_fees->student_class = $request->student_class;
   $admission_fees->student_day_boarding = $request->student_day_boarding;
   $admission_fees->admission_fees = $request->admission_fees;
   $admission_fees->save();



  });
   

  return redirect()->route('view.admission.fees')->with('info',' Student`s Admission Fee Updated Successfully');


}// END METHOD






    
}
