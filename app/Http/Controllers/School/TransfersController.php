<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\students_pocketmoney;
use App\Models\school_fees_collections;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\schoolfees_sent;
use App\Models\pocketmoney_sent;
use App\Models\students_schoolfees_records;
use App\Products\Collection;
use App\Models\schoolsfees_amounts;


class TransfersController extends Controller
{
    


/*
    
  public function TransferPocketCashView(){
		
    return view('ussd.ussd');

  }
 

 
      
  public function TransferPocketCashGet(Request $request){
		
    $remittance = new Collection();

  $transactionId = rand(100,1000000);


  $amount = $request->amount;
  $partyId = $request->mobile;
  $student_acct = $request->acct_id;


  
  $singleStudent = User::where('student_code',$student_acct)->where('status',1)->where('user_type',2)->first();

  if ($singleStudent == true) {



$momoTransactionId = $remittance->requestToPay($transactionId, $partyId, $amount,$student_acct);

$response = $remittance->getTransactionStatus($momoTransactionId);

//  dd($response);

$token_obj = $response['status'];
$token_b = $response['payer']; 
$token_c = $token_b['partyId'];
$amount = $response['amount'];
$currency = $response['currency'];


// dd($amount);

$date = Carbon::today()->format('Y-m-d');
$time = Carbon::now()->toTimeString();

$month = Carbon::now()->format('F Y');


$year = Carbon::now()->format('Y');


       $fee_transfer = new school_fees_collections();
       $fee_transfer->student_acct_no = $student_acct;
       $fee_transfer->school_id = $singleStudent->student_school_code;
       $fee_transfer->amount = $amount;
       $fee_transfer->payment_type = "mobilemoney";
       $fee_transfer->currency = $currency;
       $fee_transfer->reference_id = $momoTransactionId;
       $fee_transfer->externalId = $transactionId;
       $fee_transfer->payee_number =$token_c;
       $fee_transfer->status = $token_obj;
       $fee_transfer->sent_time = $time;
       $fee_transfer->date = $date;
       $fee_transfer->month = $month;
       $fee_transfer->year = $year;
    			$fee_transfer->save();


  
       $student_record = students_schoolfees_records::where('student_acct_no',$fee_transfer->student_acct_no)->where('student_class',$singleStudent->student_class)->where('student_day_boarding',$singleStudent->student_day_boarding)->where('term_id',$singleStudent->term_id)->first();


       if($student_record == null)
       {

        
$schoolfees_term1_amount = schoolsfees_amounts::where('school_code',$fee_transfer->school_id)->where('student_class',$singleStudent->student_class)->where('student_day_boarding',$singleStudent->student_day_boarding)->where('term_id',1)->where('year',$year)->sum('fees_total_amount');

$schoolfees_term2_amount = schoolsfees_amounts::where('school_code',$fee_transfer->school_id)->where('student_class',$singleStudent->student_class)->where('student_day_boarding',$singleStudent->student_day_boarding)->where('term_id',2)->where('year',$year)->sum('fees_total_amount');

$schoolfees_term3_amount = schoolsfees_amounts::where('school_code',$fee_transfer->school_id)->where('student_class',$singleStudent->student_class)->where('student_day_boarding',$singleStudent->student_day_boarding)->where('term_id',3)->where('year',$year)->sum('fees_total_amount');


       $student_fees_records = new students_schoolfees_records();
       $student_fees_records->student_acct_no = $fee_transfer->student_acct_no;
       $student_fees_records->school_id =$fee_transfer->school_id;
       $student_fees_records->student_class = $singleStudent->student_class;
       $student_fees_records->student_day_boarding = $singleStudent->student_day_boarding;
       $student_fees_records->term_id = $singleStudent->term_id;
       $student_fees_records->amount =$fee_transfer->amount;

       if($singleStudent->term_id == 1)
       {
       
       $student_fees_records->total_amount = $schoolfees_term1_amount;

       }

       elseif($singleStudent->term_id == 2)
       {
       
       $student_fees_records->total_amount = $schoolfees_term2_amount;

       }

       elseif($singleStudent->term_id == 3)
       {
       
       $student_fees_records->total_amount = $schoolfees_term3_amount;

       }

       $student_fees_records->invoice_no = mt_rand(1000000000,9999999999);
       $student_fees_records->year =$fee_transfer->year;
    	  $student_fees_records->save();

       }


       else{

        
$sum_amount = school_fees_collections::with(['student'])->select('student_acct_no')->groupBY('student_acct_no')->where('student_acct_no',$student_acct)->where('year',$year)->sum('amount');


        students_schoolfees_records::where('student_acct_no',$fee_transfer->student_acct_no)->where('student_class',$singleStudent->student_class)->where('student_day_boarding',$singleStudent->student_day_boarding)->where('term_id',$singleStudent->term_id)->where('year',$year)->update([

          'amount' => $sum_amount,
  
        ]);

      


       }


      return back()->with('success','TRANSFER HAS BEEN SENT...');
      
    }
    else{ 
    
      return back()->with('error','NO MATCH FOR STUDENT ACCOUNT...');
  
        }


     



  }





*/




 

    public function ViewPocketTranfsers() 
    {
     
        $allData = students_pocketmoney::orderBy('created_at','desc')->latest()->get();

  return view('admin.students.pocketmoney_transfers',compact('allData'));

    }


    

    public function ViewFeesTranfsers()
    {
     
        $allData = school_fees_collections::orderBy('created_at','desc')->latest()->get();

  return view('admin.students.schoolfees_transfers',compact('allData'));

    }




    

    public function ViewSchoolPocketTranfsers()
    {
     

        $date = Carbon::today()->format('Y-m-d');
        $allData = students_pocketmoney::with(['school'])->select('school_id','transfer_date')->groupBy('school_id','transfer_date')->where('transfer_date',$date)->get();
                
  return view('admin.schools.pocketmoney_transfers',compact('allData'));

    }



        

public function ViewPocketMoneyTranfsersDetails($school_id){


  $date = Carbon::today()->format('Y-m-d');

  $school = User::where('user_type',1)->where('school_id_no',$school_id)->get();
  
 $student_deposits = students_pocketmoney::where('school_id',$school_id)->where('transfer_date',$date)->get();

 $student_account = User::where('user_type',2)->where('student_school_code',$school_id)->where('status',1)->get();


  $fees_details = students_pocketmoney::with(['school'])->select('school_id','transfer_date')->groupBy('school_id','transfer_date')->where('transfer_date',$date)->where('school_id',$school_id)->sum('amount');

  
  $sent_money = pocketmoney_sent::with(['school','sender'])->where('sent_date',$date)->where('school_id',$school_id)->latest()->get();

  
  
    return view('admin.schools.pocketmoney_transfer_details',compact('school','student_deposits','student_account','fees_details','date','sent_money'));
  
  }




  
public function ViewPocketMoneyTranfsersSend(Request $request, $school_id)
{


  $date = Carbon::today()->format('Y-m-d');

  $sent_date = pocketmoney_sent::where('sent_date',$date)->where('school_id',$school_id)->first();

  if($sent_date == null){


          
    $fees_details = students_pocketmoney::with(['school'])->select('school_id','transfer_date')->groupBy('school_id','transfer_date')->where('transfer_date',$date)->where('school_id',$school_id)->sum('amount');

    if($request->amount_sent <= $fees_details)
    {

        DB::transaction(function() use($request,$school_id){
        

  $senderid = Auth::user()->id; 
  $now = Carbon::now();
        
            $user = new pocketmoney_sent();  
            $user->transfer_invoice = mt_rand(10000000,99999999);
            $user->sender_id = $senderid;
            $user->school_id = $request->school_id;
            $user->amount_sent = $request->amount_sent;
            $user->transfer_date = $request->transfer_date;
            $user->sent_date = Carbon::today()->format('Y-m-d');
            $user->sent_time = $now->toTimeString();
            $user->save();


           
        });

      }

      else{

        return back()->with('error',' Transfer Amount Entered Not Equal to Or Greater than Total Daily Deposit Amount!');

      }


      return back()->with('warning',' SchoolFees Daily Total Amount Submitted Successfully!');

      }

      else{

        return back()->with('error',' SchoolFees Daily Total Amount Already Submitted For Today!');

      }
}




    

    public function ViewSchoolschoolfeesTranfsers()
    {
     
      $date = Carbon::today()->format('Y-m-d');
        $allData = school_fees_collections::with(['school'])->select('school_id','date')->groupBy('school_id','date')->where('date',$date)->orderBy('created_at','desc')->get();

        
         
  return view('admin.schools.schoolfees_transfers',compact('allData'));

    }




    

public function ViewSchoolFeesTranfsersDetails($school_id){


  $date = Carbon::today()->format('Y-m-d');

  $school = User::where('user_type',1)->where('school_id_no',$school_id)->get();
  
 $student_deposits = school_fees_collections::where('school_id',$school_id)->where('date',$date)->get();

 $student_account = User::where('user_type',2)->where('student_school_code',$school_id)->where('status',1)->get();


  $fees_details = school_fees_collections::with(['school'])->select('school_id','date')->groupBy('school_id','date')->where('date',$date)->where('school_id',$school_id)->sum('amount');
  

  
  $sent_money = schoolfees_sent::with(['school','sender'])->where('sent_date',$date)->where('school_id',$school_id)->latest()->get();



    return view('admin.schools.schoolfees_transfer_details',compact('school','student_deposits','student_account','fees_details','date','sent_money'));
  
  }




  
public function ViewSchoolFeesTranfsersSend(Request $request, $school_id)
{

  $date = Carbon::today()->format('Y-m-d');

  $sent_date = schoolfees_sent::where('sent_date',$date)->where('school_id',$school_id)->first();

  if($sent_date == null){


          
    $fees_details = school_fees_collections::with(['school'])->select('school_id','date')->groupBy('school_id','date')->where('date',$date)->where('school_id',$school_id)->sum('amount');

    if($request->amount_sent <= $fees_details)
    {

        DB::transaction(function() use($request,$school_id){
        

  $senderid = Auth::user()->id; 
  $now = Carbon::now();
        
            $user = new schoolfees_sent();  
            $user->transfer_invoice = mt_rand(10000000,99999999);
            $user->sender_id = $senderid;
            $user->school_id = $request->school_id;
            $user->amount_sent = $request->amount_sent;
            $user->transfer_date = $request->transfer_date;
            $user->sent_date = Carbon::today()->format('Y-m-d');
            $user->sent_time = $now->toTimeString();
            $user->save();


           
        });

      }

      else{

        return back()->with('error',' Transfer Amount Entered Not Equal to Or Greater than Total Daily Deposit Amount!');

      }


      return back()->with('warning',' SchoolFees Daily Total Amount Submitted Successfully!');

      }

      else{

        return back()->with('error',' SchoolFees Daily Total Amount Already Submitted For Today!');

      }

}








    //Recent Transactions Section 

    //PocketMoney Transactions

    public function ViewRecentSchoolPocketTranfsers(){

      $allData = pocketmoney_sent::with(['school','sender'])->select('transfer_invoice','school_id','transfer_date')->groupBy('transfer_invoice','school_id','transfer_date')->latest()->orderBy('created_at','desc')->get();

        
    return view('admin.schools.pocketmoney_sent_transfers',compact('allData'));
  


    }



    public function ViewRecentPocketMoneyTranfsersDetails($transfer_invoice)
    {

      
  $sent_pocketmoney = pocketmoney_sent::with(['school','sender'])->select('school_id','transfer_invoice','transfer_date')->groupBy('school_id','transfer_invoice','transfer_date')->where('transfer_invoice',$transfer_invoice)->get();


  $sent_pocketmoney_transfers = pocketmoney_sent::with(['school','sender'])->where('transfer_invoice',$transfer_invoice)->latest()->get();


      $school_details = pocketmoney_sent::with(['school','sender'])->where('transfer_invoice',$transfer_invoice)->first();

$school_id = $school_details->school_id;
$date = $school_details->transfer_date;


$sent_amount_details = pocketmoney_sent::with(['school','sender'])->select('school_id','transfer_invoice')->groupBy('school_id','transfer_invoice')->where('transfer_invoice',$transfer_invoice)->sum('amount_sent');

      
  $pocket_details = students_pocketmoney::with(['school'])->select('school_id','transfer_date')->groupBy('school_id','transfer_date')->where('transfer_date',$date)->where('school_id',$school_id)->sum('amount');

  

$transfer_bal = ((float)$pocket_details-(float)$sent_amount_details); 


      
    return view('admin.schools.pocketmoney_sent_transfer_details',compact('sent_pocketmoney','sent_pocketmoney_transfers','sent_amount_details','pocket_details','transfer_bal'));



    }

public function ViewRecentPocketMoneyTranfsersSend(Request $request, $transfer_invoice){


$school = pocketmoney_sent::with(['school'])->where('transfer_invoice',$transfer_invoice)->first();
$schoolid = $school->school_id;
$transferdate = $school->transfer_date;

$datetoday = Carbon::today()->format('Y-m-d');


  $school_details = pocketmoney_sent::with(['school'])->where('sent_date',$datetoday)->where('school_id',$schoolid)->where('transfer_invoice',$transfer_invoice)->first();

  
  if($school_details == null){


  
  $fees_details = students_pocketmoney::with(['school'])->select('school_id','transfer_date')->groupBy('school_id','transfer_date')->where('transfer_date',$transferdate)->where('school_id',$schoolid)->sum('amount');

  if($request->amount_sent < $fees_details)
  {


  DB::transaction(function() use($request,$transfer_invoice){

  
      $senderid = Auth::user()->id; 
      $now = Carbon::now();
            
                $user = new pocketmoney_sent();  
                $user->transfer_invoice = $transfer_invoice;
                $user->sender_id = $senderid;
                $user->school_id = $request->school_id;
                $user->amount_sent = $request->amount_sent;
                $user->transfer_date = $request->transfer_date;
                $user->sent_date = Carbon::today()->format('Y-m-d');
                $user->sent_time = $now->toTimeString();
                $user->save();
  
   
});


return back()->with('success','Daily PocketMoney Balance Amount Submitted Successfully!');
  }

  else{

    return back()->with('error',' PocketMoney Balance Entered Greater than Total Daily Deposit Amount!');

  }

  return back()->with('success',' Daily PocketMoney Balance Amount Submitted Successfully!');

      }

      else{

        return back()->with('error',' Daily PocketMoney Balance Amount Already Submitted!');

      }


}






//SchoolFees Transactions


public function ViewRecentSchoolFeesTranfsers(){

  $allData = schoolfees_sent::with(['school','sender'])->select('transfer_invoice','school_id','transfer_date')->groupBy('transfer_invoice','school_id','transfer_date')->latest()->orderBy('created_at','desc')->get();

    
return view('admin.schools.schoolfees_sent_transfers',compact('allData'));



}



public function ViewRecentSchoolFeesTranfsersDetails($transfer_invoice)
{

  $sent_schoolfees = schoolfees_sent::with(['school','sender'])->select('school_id','transfer_invoice','transfer_date')->groupBy('school_id','transfer_invoice','transfer_date')->where('transfer_invoice',$transfer_invoice)->get();


  $sent_schoolfees_tranfers = schoolfees_sent::with(['school','sender'])->where('transfer_invoice',$transfer_invoice)->latest()->get();


  $school_details = schoolfees_sent::with(['school','sender'])->where('transfer_invoice',$transfer_invoice)->first();

$school_id = $school_details->school_id;
$date = $school_details->transfer_date;


$sent_amount_details = schoolfees_sent::with(['school','sender'])->select('school_id','transfer_invoice')->groupBy('school_id','transfer_invoice')->where('transfer_invoice',$transfer_invoice)->sum('amount_sent');

  
$schoolfees_details = school_fees_collections::with(['school'])->select('school_id','date')->groupBy('school_id','date')->where('date',$date)->where('school_id',$school_id)->sum('amount');


$transfer_bal = ((float)$schoolfees_details-(float)$sent_amount_details); 


  
return view('admin.schools.schoolfees_sent_transfer_details',compact('sent_schoolfees','sent_schoolfees_tranfers','sent_amount_details','schoolfees_details','transfer_bal'));



}

public function ViewRecentSchoolFeesTranfsersSend(Request $request, $transfer_invoice){


$school = schoolfees_sent::with(['school'])->where('transfer_invoice',$transfer_invoice)->first();
$schoolid = $school->school_id;
$transferdate = $school->transfer_date;

$datetoday = Carbon::today()->format('Y-m-d');


$school_details = schoolfees_sent::with(['school'])->where('sent_date',$datetoday)->where('school_id',$schoolid)->where('transfer_invoice',$transfer_invoice)->first();


if($school_details == null){



$fees_details = school_fees_collections::with(['school'])->select('school_id','date')->groupBy('school_id','date')->where('date',$transferdate)->where('school_id',$schoolid)->sum('amount');

if($request->amount_sent < $fees_details)
{


DB::transaction(function() use($request,$transfer_invoice){


  $senderid = Auth::user()->id; 
  $now = Carbon::now();
        
            $user = new schoolfees_sent();  
            $user->transfer_invoice = $transfer_invoice;
            $user->sender_id = $senderid;
            $user->school_id = $request->school_id;
            $user->amount_sent = $request->amount_sent;
            $user->transfer_date = $request->transfer_date;
            $user->sent_date = Carbon::today()->format('Y-m-d');
            $user->sent_time = $now->toTimeString();
            $user->save();


});


return back()->with('success','Daily SchoolFees Balance Amount Submitted Successfully!');
}

else{

return back()->with('error',' SchoolFees Balance Entered Greater than Total Daily Deposit Amount!');

}

return back()->with('success',' Daily SchoolFees Balance Amount Submitted Successfully!');

  }

  else{

    return back()->with('error',' Daily SchoolFees Balance Amount Already Submitted!');

  }


}




//Transactions Transfers Reporting Section


//SchoolFees Transfers Reporting
public function ViewReportSchoolFeesTranfsersDetails($transfer_invoice)
{
  

  $sent_schoolfees = schoolfees_sent::with(['school','sender'])->select('school_id','transfer_invoice','transfer_date')->groupBy('school_id','transfer_invoice','transfer_date')->where('transfer_invoice',$transfer_invoice)->get();
  
  $sent_schoolfees_details = schoolfees_sent::with(['school','sender'])->where('transfer_invoice',$transfer_invoice)->latest()->get();

  
  $school_details = schoolfees_sent::with(['school','sender'])->where('transfer_invoice',$transfer_invoice)->first();

$school_id = $school_details->school_id;
$date = $school_details->transfer_date;


$sent_amount_details = schoolfees_sent::with(['school','sender'])->select('school_id','transfer_invoice')->groupBy('school_id','transfer_invoice')->where('transfer_invoice',$transfer_invoice)->sum('amount_sent');

  
$schoolfees_details = school_fees_collections::with(['school'])->select('school_id','date')->groupBy('school_id','date')->where('date',$date)->where('school_id',$school_id)->sum('amount');


$transfer_bal = ((float)$schoolfees_details-(float)$sent_amount_details); 


 
  return view('admin.schools.reports.schoolfees_sent_transfer_report',compact('sent_schoolfees','sent_schoolfees_details','sent_amount_details','schoolfees_details','transfer_bal'));




}




    




//PocketMoney Transfers Reporting
public function ViewReportPocketMoneyTranfsersDetails($transfer_invoice)
{

  

  $sent_pocketmoney = pocketmoney_sent::with(['school','sender'])->select('school_id','transfer_invoice','transfer_date')->groupBy('school_id','transfer_invoice','transfer_date')->where('transfer_invoice',$transfer_invoice)->get();
  
  $sent_pocketmoney_details = pocketmoney_sent::with(['school','sender'])->where('transfer_invoice',$transfer_invoice)->latest()->get();

  
  $school_details = pocketmoney_sent::with(['school','sender'])->where('transfer_invoice',$transfer_invoice)->first();

$school_id = $school_details->school_id;
$date = $school_details->transfer_date;


$sent_amount_details = pocketmoney_sent::with(['school','sender'])->select('school_id','transfer_invoice')->groupBy('school_id','transfer_invoice')->where('transfer_invoice',$transfer_invoice)->sum('amount_sent');

  
$pocketmoney_details = students_pocketmoney::with(['school'])->select('school_id','transfer_date')->groupBy('school_id','transfer_date')->where('transfer_date',$date)->where('school_id',$school_id)->sum('amount');


$transfer_bal = ((float)$pocketmoney_details-(float)$sent_amount_details); 



  return view('admin.schools.reports.pocketmoney_sent_transfer_report',compact('sent_pocketmoney','sent_pocketmoney_details','sent_amount_details','pocketmoney_details','transfer_bal'));





}








//Schools Section 


    

public function SchoolPocketTranfsers()
{
 

  $school_code = Auth::user()->school_id_no;

    $allData = students_pocketmoney::with(['school'])->where('school_id',$school_code)->latest()->get();

return view('school.students.transfers.pocketmoney_transfers',compact('allData'));

}




public function SchoolFeesTranfsers()
{
 
  $school_code = Auth::user()->school_id_no;

    $allData = school_fees_collections::with(['school'])->where('school_id',$school_code)->latest()->get();
    
return view('school.students.transfers.schoolfees_transfers',compact('allData'));

}




//SchoolFees Transfers Sent


public function ViewSchoolFeesTranfsersSent(){


  $school_code = Auth::user()->school_id_no;

  $allData = schoolfees_sent::with(['school'])->select('transfer_invoice','school_id','transfer_date')->groupBy('transfer_invoice','school_id','transfer_date')->where('school_id',$school_code)->latest()->get();

    
return view('school.students.transfers.schoolfees_sent_transfers',compact('allData'));


}





    //PocketMoney Transfers Sent

    public function ViewSchoolPocketTranfsersSent(){

      $school_code = Auth::user()->school_id_no;
      $allData = pocketmoney_sent::with(['school'])->select('transfer_invoice','school_id','transfer_date')->groupBy('transfer_invoice','school_id','transfer_date')->where('school_id',$school_code)->latest()->get();

    return view('school.students.transfers.pocketmoney_sent_transfers',compact('allData'));  


    }








//Transactions Transfers Reporting Section


//SchoolFees Transfers Reporting
public function ViewReportSchoolFeesTranfsersInfo($transfer_invoice)
{
  

  $sent_schoolfees = schoolfees_sent::with(['school','sender'])->select('school_id','transfer_invoice','transfer_date')->groupBy('school_id','transfer_invoice','transfer_date')->where('transfer_invoice',$transfer_invoice)->get();
  
  $sent_schoolfees_details = schoolfees_sent::with(['school','sender'])->where('transfer_invoice',$transfer_invoice)->latest()->get();

  
  $school_details = schoolfees_sent::with(['school','sender'])->where('transfer_invoice',$transfer_invoice)->first();

$school_id = $school_details->school_id;
$date = $school_details->transfer_date;


$sent_amount_details = schoolfees_sent::with(['school','sender'])->select('school_id','transfer_invoice')->groupBy('school_id','transfer_invoice')->where('transfer_invoice',$transfer_invoice)->sum('amount_sent');

  
$schoolfees_details = school_fees_collections::with(['school'])->select('school_id','date')->groupBy('school_id','date')->where('date',$date)->where('school_id',$school_id)->sum('amount');


$transfer_bal = ((float)$schoolfees_details-(float)$sent_amount_details); 



  return view('school.reports.schoolfees_sent_transfer_details',compact('sent_schoolfees','sent_schoolfees_details','sent_amount_details','schoolfees_details','transfer_bal'));




}





//SchoolFees Transfers Reporting
public function ViewReportSchoolFeesTranfsersPrint($transfer_invoice)
{
  

  $sent_schoolfees = schoolfees_sent::with(['school','sender'])->select('school_id','transfer_invoice','transfer_date')->groupBy('school_id','transfer_invoice','transfer_date')->where('transfer_invoice',$transfer_invoice)->get();
  
  $sent_schoolfees_details = schoolfees_sent::with(['school','sender'])->where('transfer_invoice',$transfer_invoice)->latest()->get();

  
  $school_details = schoolfees_sent::with(['school','sender'])->where('transfer_invoice',$transfer_invoice)->first();

$school_id = $school_details->school_id;
$date = $school_details->transfer_date;


$sent_amount_details = schoolfees_sent::with(['school','sender'])->select('school_id','transfer_invoice')->groupBy('school_id','transfer_invoice')->where('transfer_invoice',$transfer_invoice)->sum('amount_sent');

  
$schoolfees_details = school_fees_collections::with(['school'])->select('school_id','date')->groupBy('school_id','date')->where('date',$date)->where('school_id',$school_id)->sum('amount');


$transfer_bal = ((float)$schoolfees_details-(float)$sent_amount_details); 



  return view('school.reports.schoolfees_sent_transfer_report',compact('sent_schoolfees','sent_schoolfees_details','sent_amount_details','schoolfees_details','transfer_bal'));




}





    




//PocketMoney Transfers Reporting

public function ViewReportPocketMoneyTranfsersInfo($transfer_invoice)
{

  

  $sent_pocketmoney = pocketmoney_sent::with(['school','sender'])->select('school_id','transfer_invoice','transfer_date')->groupBy('school_id','transfer_invoice','transfer_date')->where('transfer_invoice',$transfer_invoice)->get();
  
  $sent_pocketmoney_details = pocketmoney_sent::with(['school','sender'])->where('transfer_invoice',$transfer_invoice)->latest()->get();

  
  $school_details = pocketmoney_sent::with(['school','sender'])->where('transfer_invoice',$transfer_invoice)->first();

$school_id = $school_details->school_id;
$date = $school_details->transfer_date;


$sent_amount_details = pocketmoney_sent::with(['school','sender'])->select('school_id','transfer_invoice')->groupBy('school_id','transfer_invoice')->where('transfer_invoice',$transfer_invoice)->sum('amount_sent');

  
$pocketmoney_details = students_pocketmoney::with(['school'])->select('school_id','transfer_date')->groupBy('school_id','transfer_date')->where('transfer_date',$date)->where('school_id',$school_id)->sum('amount');


$transfer_bal = ((float)$pocketmoney_details-(float)$sent_amount_details); 



  return view('school.reports.pocketmoney_sent_transfer_details',compact('sent_pocketmoney','sent_pocketmoney_details','sent_amount_details','pocketmoney_details','transfer_bal'));


}





public function ViewReportPocketMoneyTranfsersPrint($transfer_invoice)
{

  

  $sent_pocketmoney = pocketmoney_sent::with(['school','sender'])->select('school_id','transfer_invoice','transfer_date')->groupBy('school_id','transfer_invoice','transfer_date')->where('transfer_invoice',$transfer_invoice)->get();
  
  $sent_pocketmoney_details = pocketmoney_sent::with(['school','sender'])->where('transfer_invoice',$transfer_invoice)->latest()->get();

  
  $school_details = pocketmoney_sent::with(['school','sender'])->where('transfer_invoice',$transfer_invoice)->first();

$school_id = $school_details->school_id;
$date = $school_details->transfer_date;


$sent_amount_details = pocketmoney_sent::with(['school','sender'])->select('school_id','transfer_invoice')->groupBy('school_id','transfer_invoice')->where('transfer_invoice',$transfer_invoice)->sum('amount_sent');

  
$pocketmoney_details = students_pocketmoney::with(['school'])->select('school_id','transfer_date')->groupBy('school_id','transfer_date')->where('transfer_date',$date)->where('school_id',$school_id)->sum('amount');


$transfer_bal = ((float)$pocketmoney_details-(float)$sent_amount_details); 



  return view('school.reports.pocketmoney_sent_transfer_report',compact('sent_pocketmoney','sent_pocketmoney_details','sent_amount_details','pocketmoney_details','transfer_bal'));





}





}
