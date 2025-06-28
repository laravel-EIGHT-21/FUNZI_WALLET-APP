<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\orders;
use App\Models\order_items;
use Carbon\Carbon;

class OrderReportsController extends Controller
{
    



    
    //General Orders Reports Admin Section
    
    //Weekly Orders Reports
public function ViewWeeklyOrdersReports(){

    $orders = order_items::select('date')->groupBy('date')->where('status','Order Delivered')->orderBy('created_at')->get();
      return view('admin.reports.orders.view_weekly_reports',compact('orders'));
  }
  
    
  
  //Weekly Order Reports
  public function OrdersReportsByWeek(Request $request){
  
  
    $sdate = date('Y-m-d',strtotime($request->start_date));
    $edate = date('Y-m-d',strtotime($request->end_date));
    $orders = order_items::select('date')->groupBy('date')->where('status','Order Delivered')->whereBetween('date',[$sdate,$edate])->get();
   
    return view('admin.reports.orders.view_weekly_reports',compact('orders'));
  
  } // End 
  
  
  
  
      //Monthly Orders Reports
      public function ViewMonthlyOrdersReports(){
  
        $orders = order_items::select('month')->groupBy('month')->where('status','Order Delivered')->orderBy('created_at')->get();
        return view('admin.reports.orders.view_monthly_reports',compact('orders'));
      }
      
  
  public function OrdersReportsByMonth(Request $request){
  
      $month = Carbon::parse($request->month)->format('F Y');	 
      $orders = order_items::select('month')->groupBy('month')->where('month',$month)->where('status','Order Delivered')->get();
        
      return view('admin.reports.orders.view_monthly_reports',compact('orders'));
  
  } // end mehtod 
  
  
  
      //Yearly Orders Reports
      public function ViewYearlyOrdersReports(){
  
        $orders = order_items::select('month')->groupBy('month')->where('status','Order Delivered')->orderBy('created_at')->get();
        return view('admin.reports.orders.view_yearly_reports',compact('orders'));
      }
  
  
  
  public function OrdersReportsByYear(Request $request){
  
  
      $year= $request->year;
      $orders = order_items::select('month')->groupBy('month')->where('year',$year)->where('status','Order Delivered')->orderBy('created_at', 'asc')->groupBy('month')->get();
  
  
      return view('admin.reports.orders.view_yearly_reports',compact('orders'));
  
  
  } // end mehtod 
  
  
  
  
  public function ViewOrderReportDetails($order_id){
  
  
      $order = orders::with('school')->where('id',$order_id)->first();
      $orderItems = order_items::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
  
      return view('admin.reports.orders.order_invoice_details',compact('order','orderItems'));
  
  } 
  




}
