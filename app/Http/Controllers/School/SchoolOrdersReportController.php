<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\order_items;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class SchoolOrdersReportController extends Controller
{
    

    
    //Weekly Orders Reports
public function ViewWeeklyOrdersReports(){

    $orders = order_items::with(['school'])->select('date','school_id')->groupBy('date','school_id')->where('status','Order Delivered')->where('school_id',Auth::id())->orderBy('created_at')->get();
      return view('school.reports.orders.view_weekly_reports',compact('orders'));
  }
  
    
  
  //Weekly Order Reports
  public function OrdersReportsByWeek(Request $request){
  
  
    $sdate = date('Y-m-d',strtotime($request->start_date));
    $edate = date('Y-m-d',strtotime($request->end_date));
    $orders = order_items::with(['school'])->select('date','school_id')->groupBy('date','school_id')->where('status','Order Delivered')->where('school_id',Auth::id())->whereBetween('date',[$sdate,$edate])->get();
   
    return view('school.reports.orders.view_weekly_reports',compact('orders'));
  
  } // End 
  
  
  
  
      //Monthly Orders Reports
      public function ViewMonthlyOrdersReports(){
  
        $orders = order_items::with(['school'])->select('month','school_id')->groupBy('month','school_id')->where('status','Order Delivered')->where('school_id',Auth::id())->orderBy('created_at')->get();
        return view('school.reports.orders.view_monthly_reports',compact('orders'));
      }
      
   
  public function OrdersReportsByMonth(Request $request){
  
      $month = Carbon::parse($request->month)->format('F Y');	 
      $orders = order_items::with(['school'])->select('month','school_id')->groupBy('month','school_id')->where('status','Order Delivered')->where('school_id',Auth::id())->where('month',$month)->get();
        
      return view('school.reports.orders.view_monthly_reports',compact('orders'));
  
  } // end mehtod 
  
  
  
      //Monthly Orders Reports
      public function ViewYearlyOrdersReports(){
  
        $orders = order_items::with(['school'])->select('month','school_id')->groupBy('month','school_id')->where('status','Order Delivered')->where('school_id',Auth::id())->orderBy('created_at')->get();
        return view('school.reports.orders.view_yearly_reports',compact('orders'));
      }
  
  
  
  public function OrdersReportsByYear(Request $request){
  
  
      $year= Carbon::parse($request->year)->format('Y');
      $orders = order_items::with(['school'])->select('month','school_id')->groupBy('month','school_id')->where('status','Order Delivered')->where('year',$year)->where('school_id',Auth::id())->orderBy('created_at', 'asc')->groupBy('month')->get();
  
  
      return view('school.reports.orders.view_yearly_reports',compact('orders'));
  
  
  } // end mehtod 





}
