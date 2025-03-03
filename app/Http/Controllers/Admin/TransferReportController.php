<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\students_pocketmoney;
use App\Models\school_fees_collections;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class TransferReportController extends Controller
{
    

    
    //General PocketMoney Transactions Reports Admin Section
    
    //Weekly Transactions Reports
public function ViewWeeklyPocketMoneyDepositsReports(){

    $transfers = students_pocketmoney::select('school_id','date')->groupBy('school_id','date')->orderBy('created_at','desc')->get();
  
  
  $pocketmoneyData = students_pocketmoney::selectRaw('SUM(amount) as amount,month')->groupBy('month')->orderBy('created_at')->get();
  
  // create month & pocketmoney_deposits variable to divide the data 
  $month = [];
  $pocketmoney_deposits = [];
  
  foreach ($pocketmoneyData as $value) {
      $month[] = $value['month']; 
      $pocketmoney_deposits[] = $value['amount'];
  }
  
  
  
      return view('admin.reports.pocketmoney_reports.view_weekly_reports',compact('transfers','pocketmoneyData','month','pocketmoney_deposits'));
  }
  
    
  
  //PocketMoney Transactions Reports
  public function PocketmoneyReportByWeek(Request $request){
  
  
    $sdate = date('Y-m-d',strtotime($request->start_date));
    $edate = date('Y-m-d',strtotime($request->end_date));
  
    $transfers = students_pocketmoney::select('school_id','date')->groupBy('school_id','date')->whereBetween('date',[$sdate,$edate])->orderBy('created_at')->get();
   
    
    $pocketmoneyData = students_pocketmoney::selectRaw('SUM(amount) as amount,month')->whereBetween('date',[$sdate,$edate])->groupBy('month')->orderBy('created_at')->get();
      
    
  // create month & pocketmoney_deposits variable to divide the data 
  $month = [];
  $pocketmoney_deposits = [];
      
    foreach($pocketmoneyData->toArray() as $row)
    {
    
      $month[] = $row['month'];
    $pocketmoney_deposits[] = $row['amount'];
    
    }
    
  
  
  
    return view('admin.reports.pocketmoney_reports.view_weekly_reports',compact('transfers','sdate','edate','pocketmoneyData','month','pocketmoney_deposits'));
  
  } // End 
  
  
  
  
      
      //Monthly Transactions Reports
      public function ViewMonthlyPocketMoneyDepositsReports(){
  
        $transfers = students_pocketmoney::select('school_id','month')->groupBy('school_id','month')->orderBy('created_at','desc')->get();
        
  
        $pocketmoneyData = students_pocketmoney::selectRaw('SUM(amount) as amount,month')->groupBy('month')->orderBy('created_at')->get();
  
        // create month & pocketmoney_deposits variable to divide the data 
        $month = [];
        $pocketmoney_deposits = [];
        
        foreach ($pocketmoneyData as $value) {
            $month[] = $value['month']; 
            $pocketmoney_deposits[] = $value['amount'];
        }
        
        
  
        return view('admin.reports.pocketmoney_reports.view_monthly_reports',compact('transfers','pocketmoneyData','month','pocketmoney_deposits'));
  
      }
  
  
  
  public function PocketmoneyReportByMonth(Request $request){
  
    $mon = Carbon::parse($request->month)->format('F Y');	 
    
    $transfers= students_pocketmoney::select('school_id','month')->groupBy('school_id','month')->where('month',$mon)->orderBy('created_at','desc')->get();
  
    $pocketmoneyData = students_pocketmoney::selectRaw('SUM(amount) as amount,month')->where('month',$mon)->groupBy('month')->orderBy('created_at')->get();
  
  // create month & pocketmoney_deposits variable to divide the data 
  $month = [];
  $pocketmoney_deposits = [];
  
    foreach($pocketmoneyData->toArray() as $row)
    {
    
      $month[] = $row['month'];
    $pocketmoney_deposits[] = $row['amount'];
    
    }
      
      return view('admin.reports.pocketmoney_reports.view_monthly_reports',compact('transfers','pocketmoneyData','month','pocketmoney_deposits'));
  
  } // end mehtod 
  
  
  
  
      
      //Monthly Transactions Reports
      public function ViewYearlyPocketMoneyDepositsReports(){
  
        $transfers = students_pocketmoney::select('school_id','month')->groupBy('school_id','month')->orderBy('created_at','desc')->latest()->get();
        
        $pocketmoneyData = students_pocketmoney::selectRaw('SUM(amount) as amount,month')->groupBy('month')->orderBy('created_at')->get();
  
        // create month & pocketmoney_deposits variable to divide the data 
        $month = [];
        $pocketmoney_deposits = [];
        
        foreach ($pocketmoneyData as $value) {
            $month[] = $value['month']; 
            $pocketmoney_deposits[] = $value['amount'];
        }  
    
  
        return view('admin.reports.pocketmoney_reports.view_yearly_reports',compact('transfers','pocketmoneyData','month','pocketmoney_deposits'));
      }
  
  
  
  
  public function PocketmoneyReportByYear(Request $request){
  
    $years= Carbon::parse($request->year)->format('Y');
    $transfers= students_pocketmoney::select('school_id','month')->groupBy('school_id','month')->where('transfer_year',$years)->orderBy('created_at')->get();
  
    
    $pocketmoneyData = students_pocketmoney::selectRaw('SUM(amount) as amount,month')->where('transfer_year',$years)->groupBy('month')->orderBy('created_at')->get();
  
  // create month & pocketmoney_deposits variable to divide the data 
  $month = [];
  $pocketmoney_deposits = [];
  
    foreach($pocketmoneyData->toArray() as $row)
    {
    
      $month[] = $row['month'];
    $pocketmoney_deposits[] = $row['amount'];
    
    } 
  
  
      return view('admin.reports.pocketmoney_reports.view_yearly_reports',compact('allData','year','pocketmoneyData','month','pocketmoney_deposits'));
  
  
  } // end mehtod 
  
  
  
  
  
  
  //SchoolFees Transactions Reports
  
  
  //Weekly Transactions Reports
   
  public function ViewWeeklySchoolFeesDepositsReports(){
    $transfers = school_fees_collections::select('school_id','date')->groupBy('school_id','date')->orderBy('created_at','desc')->latest()->get();
  
  $schoolfeesData = school_fees_collections::selectRaw('SUM(amount) as amount,month')->groupBy('month')->orderBy('created_at')->get();
  
  // create month & schoolfees_total variable to divide the data 
  $month = [];
  $schoolfees_deposits_total = [];
  
  foreach ($schoolfeesData as $value) {
      $month[] = $value['month']; 
      $schoolfees_deposits_total[] = $value['amount'];
  }
  
  
  
      return view('admin.reports.schoolfees_reports.view_weekly_reports',compact('transfers','schoolfeesData','month','schoolfees_deposits_total'));
  }
  
  
  
  
  
  public function SchoolfeesReportByWeek(Request $request){
  
    $sdate = date('Y-m-d',strtotime($request->start_date));
    $edate = date('Y-m-d',strtotime($request->end_date));
      
      $transfers = school_fees_collections::select('school_id','date')->groupBy('school_id','date')->whereBetween('date',[$sdate,$edate])->orderBy('created_at','desc')->get();
       
      
      $schoolfeesData = school_fees_collections::selectRaw('SUM(amount) as amount,month')->whereBetween('date',[$sdate,$edate])->groupBy('month')->orderBy('created_at')->get();
    
      
  // create month & schoolfees_total variable to divide the data 
  $month = [];
  $schoolfees_deposits_total = [];
  
      
  foreach($schoolfeesData->toArray() as $row)
  {
  
    $month[] = $row['month'];
  $schoolfees_deposits_total[] = $row['amount'];
  
  }
  
  
     return view('admin.reports.schoolfees_reports.view_weekly_reports',compact('transfers','sdate','edate','schoolfeesData','month','schoolfees_deposits_total'));
    
    } // End 
  
  
    
  
  
    //Monthly SchoolFees Transaction Reports
  
  public function ViewMonthlySchoolFeesDepositsReports(){
    $transfers = school_fees_collections::select('school_id','month')->groupBy('school_id','month')->orderBy('created_at','desc')->latest()->get();
  
  
    $schoolfeesData = school_fees_collections::selectRaw('SUM(amount) as amount,month')->groupBy('month')->orderBy('created_at')->get();
  
    // create month & schoolfees_total variable to divide the data 
    $month = [];
    $schoolfees_deposits_total = [];
    
    foreach ($schoolfeesData as $value) {
        $month[] = $value['month']; 
        $schoolfees_deposits_total[] = $value['amount'];
    }
    
  
  
  
      return view('admin.reports.schoolfees_reports.view_monthly_reports',compact('transfers','schoolfeesData','month','schoolfees_deposits_total'));
  }
  
  
    
    public function SchoolfeesReportByMonth(Request $request){
    
        $mon = Carbon::parse($request->month)->format('F Y');	 
    
        $transfers= school_fees_collections::select('school_id','month')->groupBy('school_id','month')->where('month',$mon)->orderBy('created_at','desc')->get();
        
      $schoolfeesData = school_fees_collections::selectRaw('SUM(amount) as amount,month')->where('month',$mon)->groupBy('month')->orderBy('created_at')->get();
           
  // create month & schoolfees_total variable to divide the data 
  $month = [];
  $schoolfees_deposits_total = [];
  
      
      foreach($schoolfeesData->toArray() as $row)
      {
      
        $month[] = $row['month'];
      $schoolfees_deposits_total[] = $row['amount'];
      
      }
  
  
        return view('admin.reports.schoolfees_reports.view_monthly_reports',compact('transfers','month','schoolfeesData','schoolfees_deposits_total'));
    
    } // end mehtod 
    
  
    
  
  
    
  
    //Yearly SchoolFees Transaction Reports
  
  
  public function ViewYearlySchoolFeesDepositsReports(){
    $transfers = school_fees_collections::select('school_id','month')->groupBy('school_id','month')->orderBy('created_at','desc')->latest()->get();
  
    $schoolfeesData = school_fees_collections::selectRaw('SUM(amount) as amount,month')->groupBy('month')->orderBy('created_at')->get();
  
    // create month & schoolfees_total variable to divide the data 
    $month = [];
    $schoolfees_deposits_total = [];
    
    foreach ($schoolfeesData as $value) {
        $month[] = $value['month']; 
        $schoolfees_deposits_total[] = $value['amount'];
    }
    
  
  
      return view('admin.reports.schoolfees_reports.view_yearly_reports',compact('transfers','schoolfeesData','month','schoolfees_deposits_total'));
  }
  
  
    
    public function SchoolfeesReportByYear(Request $request){
  
      $years= Carbon::parse($request->year)->format('Y');
      $transfers= school_fees_collections::select('school_id','month')->groupBy('school_id','month')->where('year',$years)->orderBy('created_at','desc')->get();
  
  
      $schoolfeesData = school_fees_collections::selectRaw('SUM(amount) as amount,month')->where('year',$years)->groupBy('month')->orderBy('created_at')->get();
      
      $month = [];
      $schoolfees_deposits_total = [];
      
      foreach($schoolfeesData->toArray() as $row)
      {
      
        $month[] = $row['month'];
      $schoolfees_deposits_total[] = $row['amount'];
      
      }
  
        return view('admin.reports.schoolfees_reports.view_yearly_reports',compact('transfers','month','schoolfees_deposits_total','schoolfeesData'));
    
    } // end mehtod 
    
  
  
  
  
  
  
  
  
  
  
  
  
    //For Schools Admins Only
  
  
      //General Transactions Reports Schools Section
      
  
  
  
  //School Weekly PocketMoney Transactions Reports
  public function ViewWeeklyPocketMoneyTransfersReports(){
  
    $school_code = Auth::user()->school_id_no;
    $transfers = students_pocketmoney::select('school_id','date')->groupBy('school_id','date')->where('school_id',$school_code)->orderBy('created_at','desc')->get();
  
  $pocketmoneyData = students_pocketmoney::selectRaw('SUM(amount) as amount,month')->groupBy('month')->where('school_id',$school_code)->orderBy('created_at')->get();
  
  
  // create month & pocketmoney_deposits variable to divide the data 
  $month = [];
  $pocketmoney_deposits = [];
  
  foreach ($pocketmoneyData as $value) {
      $month[] = $value['month']; 
      $pocketmoney_deposits[] = $value['amount'];
  }  
  
  
  
      return view('school.reports.pocketmoney.view_weekly_reports',compact('transfers','pocketmoneyData','month','pocketmoney_deposits'));
  }
  
  
  
  
  public function PocketmoneyTransferReportByWeek(Request $request){
  
    $school_code = Auth::user()->school_id_no;
      $sdate = date('Y-m-d',strtotime($request->start_date));
      $edate = date('Y-m-d',strtotime($request->end_date));
    $transfers = students_pocketmoney::select('school_id','date')->groupBy('school_id','date')->whereBetween('date',[$sdate,$edate])->where('school_id',$school_code)->orderBy('created_at','desc')->get();
      
    $pocketmoneyData = students_pocketmoney::selectRaw('SUM(amount) as amount,month')->whereBetween('date',[$sdate,$edate])->groupBy('month')->where('school_id',$school_code)->orderBy('created_at')->get();
       
    // create month & pocketmoney_deposits variable to divide the data 
    $month = [];
    $pocketmoney_deposits = [];
      
    foreach($pocketmoneyData->toArray() as $row)
    {
    
      $month[] = $row['month'];
    $pocketmoney_deposits[] = $row['amount'];
    
    }
  
    return view('school.reports.pocketmoney.view_weekly_reports',compact('transfers','sdate','edate','pocketmoneyData','month','pocketmoney_deposits'));
  
  } // End 
  
  
  
  
  
  //School Monthly PocketMoney Transactions Reports
  public function ViewMonthlyPocketMoneyTransfersReports(){
  
    $school_code = Auth::user()->school_id_no;
    $transfers = students_pocketmoney::select('school_id','month')->groupBy('school_id','month')->where('school_id',$school_code)->orderBy('created_at','desc')->get();
  
  
    $pocketmoneyData = students_pocketmoney::selectRaw('SUM(amount) as amount,month')->groupBy('month')->where('school_id',$school_code)->orderBy('created_at')->get();
  
    // create month & pocketmoney_deposits variable to divide the data 
    $month = [];
    $pocketmoney_deposits = [];
    
    foreach ($pocketmoneyData as $value) {
        $month[] = $value['month']; 
        $pocketmoney_deposits[] = $value['amount'];
    }  
    
  
  
      return view('school.reports.pocketmoney.view_monthly_reports',compact('transfers','pocketmoneyData','month','pocketmoney_deposits'));
  }
  
  
  
  
  public function PocketmoneyTransferReportByMonth(Request $request){
  
    $school_code = Auth::user()->school_id_no;
  
      $mon = Carbon::parse($request->month)->format('F Y');	 
      $transfers = students_pocketmoney::select('school_id','month')->groupBy('school_id','month')->where('month',$mon)->where('school_id',$school_code)->orderBy('created_at','desc')->get();
  
      
    $pocketmoneyData = students_pocketmoney::selectRaw('SUM(amount) as amount,month')->groupBy('month')->where('month',$mon)->where('school_id',$school_code)->orderBy('created_at')->get();
    
    
    // create month & pocketmoney_deposits variable to divide the data 
    $month = [];
    $pocketmoney_deposits = [];
    
  foreach($pocketmoneyData->toArray() as $row)
  {
  
  $month[] = $row['month'];
  $pocketmoney_deposits[] = $row['amount'];
  
  }    
  
      
      return view('school.reports.pocketmoney.view_monthly_reports',compact('transfers','pocketmoneyData','month','pocketmoney_deposits'));
  
  } // end mehtod 
  
  
  
  
  
  //School Yearly PocketMoney Transactions Reports
  
  public function ViewYearlyPocketMoneyTransfersReports(){
  
    $school_code = Auth::user()->school_id_no;
    $transfers = students_pocketmoney::select('school_id','month')->groupBy('school_id','month')->where('school_id',$school_code)->orderBy('created_at', 'desc')->get();
  
    $pocketmoneyData = students_pocketmoney::selectRaw('SUM(amount) as amount,month')->groupBy('month')->where('school_id',$school_code)->orderBy('created_at')->get();
  
    // create month & pocketmoney_deposits variable to divide the data 
    $month = [];
    $pocketmoney_deposits = [];
    
    foreach ($pocketmoneyData as $value) {
        $month[] = $value['month']; 
        $pocketmoney_deposits[] = $value['amount'];
    }  
    
  
      return view('school.reports.pocketmoney.view_yearly_reports',compact('transfers','pocketmoneyData','month','pocketmoney_deposits'));
  }
  
  
  
  public function PocketmoneyTransferReportByYear(Request $request){
  
  
    $school_code = Auth::user()->school_id_no;
      $year= Carbon::parse($request->year)->format('Y');
      $transfers = students_pocketmoney::select('school_id','month')->groupBy('school_id','month')->where('transfer_year',$year)->where('school_id',$school_code)->orderBy('created_at', 'desc')->groupBy('month')->get();
  
  
    $pocketmoneyData = students_pocketmoney::selectRaw('SUM(amount) as amount,month')->where('transfer_year',$year)->groupBy('month')->where('school_id',$school_code)->orderBy('created_at')->get();
      
    
    // create month & pocketmoney_deposits variable to divide the data 
    $month = [];
    $pocketmoney_deposits = [];
      
    foreach($pocketmoneyData->toArray() as $row)
    {
    
      $month[] = $row['month'];
    $pocketmoney_deposits[] = $row['amount'];
    
    }
  
  
  
      return view('school.reports.pocketmoney.view_yearly_reports',compact('transfers','pocketmoneyData','month','pocketmoney_deposits'));
  
  
  } // end mehtod 
  
  
  
  
  
  
  
  
  
  //Schools` MobileMoney SchoolFees Transactions Reports
  
  
  
  //School Weekly MobileMoney SchoolFees Transactions Reports
  public function ViewWeeklySchoolFeesTransfersReports(){
   
    $school_code = Auth::user()->school_id_no;
    $transfers = school_fees_collections::select('school_id','date')->groupBy('school_id','date')->where('school_id',$school_code)->orderBy('created_at','desc')->get();
  
  
  $schoolfeesData = school_fees_collections::selectRaw('SUM(amount) as amount,month')->groupBy('month')->where('school_id',$school_code)->orderBy('created_at')->get();
  
  // create month & schoolfees_total variable to divide the data 
  $month = [];
  $schoolfees_deposits_total = [];
  
  foreach ($schoolfeesData as $value) {
      $month[] = $value['month']; 
      $schoolfees_deposits_total[] = $value['amount'];
  }
  
  
  
  
      return view('school.reports.schoolfees.view_weekly_reports',compact('transfers','schoolfeesData','month','schoolfees_deposits_total'));
  }
  
  
  public function SchoolfeesTransferReportByWeek(Request $request){
  
    $school_code = Auth::user()->school_id_no;
    $sdate = date('Y-m-d',strtotime($request->start_date));
    $edate = date('Y-m-d',strtotime($request->end_date));
      $transfers = school_fees_collections::select('school_id','date')->groupBy('school_id','date')->whereBetween('date',[$sdate,$edate])->where('school_id',$school_code)->orderBy('created_at','desc')->get();
     
      
      $schoolfeesData = school_fees_collections::selectRaw('SUM(amount) as amount,month')->whereBetween('date',[$sdate,$edate])->groupBy('month')->where('school_id',$school_code)->orderBy('created_at')->get();
      
        
    // create month & schoolfees_total variable to divide the data 
    $month = [];
    $schoolfees_deposits_total = [];
      
  foreach($schoolfeesData->toArray() as $row)
  {
  
    $month[] = $row['month'];
  $schoolfees_deposits_total[] = $row['amount'];
  
  }
  
  
      return view('school.reports.schoolfees.view_weekly_reports',compact('transfers','sdate','edate','schoolfeesData','month','schoolfees_deposits_total'));
    
    } // End 
  
    
    
    
  
  //School Monthly MobileMoney SchoolFees Transactions Reports
  public function ViewMonthlySchoolFeesTransfersReports(){
  
    $school_code = Auth::user()->school_id_no;
    $transfers = school_fees_collections::select('school_id','month')->groupBy('school_id','month')->where('school_id',$school_code)->orderBy('created_at','desc')->get();
  
  
  
    $schoolfeesData = school_fees_collections::selectRaw('SUM(amount) as amount,month')->groupBy('month')->where('school_id',$school_code)->orderBy('created_at')->get();
  
    // create month & schoolfees_total variable to divide the data 
    $month = [];
    $schoolfees_deposits_total = [];
    
    foreach ($schoolfeesData as $value) {
        $month[] = $value['month']; 
        $schoolfees_deposits_total[] = $value['amount'];
    }
    
  
  
      return view('school.reports.schoolfees.view_monthly_reports',compact('transfers','schoolfeesData','month','schoolfees_deposits_total'));
  }
  
  
  
    public function SchoolfeesTransferReportByMonth(Request $request){
    
  
  $school_code = Auth::user()->school_id_no;
  $mon = Carbon::parse($request->month)->format('F Y');	 
  $transfers = school_fees_collections::select('school_id','month')->groupBy('school_id','month')->where('month',$mon)->where('school_id',$school_code)->orderBy('created_at','desc')->get();
  
   
  $schoolfeesData = school_fees_collections::selectRaw('SUM(amount) as amount,month')->where('month',$mon)->groupBy('month')->where('school_id',$school_code)->orderBy('created_at')->get();
  
        
    // create month & schoolfees_total variable to divide the data 
    $month = [];
    $schoolfees_deposits_total = [];
        
  foreach($schoolfeesData->toArray() as $row)
  {
  
    $month[] = $row['month'];
  $schoolfees_deposits_total[] = $row['amount'];
  
  }
  
  
  
  
        return view('school.reports.schoolfees.view_monthly_reports',compact('transfers','schoolfeesData','month','schoolfees_deposits_total'));
    
    } // end mehtod 
    
    
    
  
    
  
  //School Yearly MoneyMobile SchoolFees Transactions Reports
  
  public function ViewYearlySchoolFeesTransfersReports(){
  
    $school_code = Auth::user()->school_id_no;
    $transfers = school_fees_collections::select('school_id','month')->groupBy('school_id','month')->where('school_id',$school_code)->orderBy('created_at', 'desc')->get();
  
  
  
    $schoolfeesData = school_fees_collections::selectRaw('SUM(amount) as amount,month')->groupBy('month')->where('school_id',$school_code)->orderBy('created_at')->get();
  
    // create month & schoolfees_total variable to divide the data 
    $month = [];
    $schoolfees_deposits_total = [];
    
    foreach ($schoolfeesData as $value) {
        $month[] = $value['month']; 
        $schoolfees_deposits_total[] = $value['amount'];
    }
    
  
      return view('school.reports.schoolfees.view_yearly_reports',compact('transfers','schoolfeesData','month','schoolfees_deposits_total'));
  }
  
    
    public function SchoolfeesTransferReportByYear(Request $request){
    
      $school_code = Auth::user()->school_id_no;
        $year= Carbon::parse($request->year)->format('Y');
        $transfers = school_fees_collections::select('school_id','month')->groupBy('school_id','month')->where('year',$year)->where('school_id',$school_code)->orderBy('created_at', 'desc')->groupBy('month')->get();
    
  
        $schoolfeesData = school_fees_collections::selectRaw('SUM(amount) as amount,month')->where('year',$year)->groupBy('month')->where('school_id',$school_code)->orderBy('created_at')->get();
      
        
    // create month & schoolfees_total variable to divide the data 
    $month = [];
    $schoolfees_deposits_total = [];
      
        foreach($schoolfeesData->toArray() as $row)
        {
        
          $month[] = $row['month'];
        $schoolfees_deposits_total[] = $row['amount'];
        
        }
        
  
        return view('school.reports.schoolfees.view_yearly_reports',compact('transfers','schoolfeesData','month','schoolfees_deposits_total'));
    
    
    } // end mehtod 
  



}
