<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\purchaseItems;
use App\Models\purchaseStocks;
use App\Models\school_terms;
use Illuminate\Support\Facades\Auth;


class PurchasesReportController extends Controller
{
    

     
public function ViewPurchaseReports(){  
   
    $school_id = Auth::user()->id;
      $data['terms'] = school_terms::all();
      $data['purchasesitems'] = purchaseItems::where('school_id',$school_id)->latest()->get();
    
    return view('school.purchases.reports.school_purchases_reports',$data);
    
        
    
    } 
    
    
    
    
    
        
    public function PurchasesReportByTerm(Request $request){
    
      $school_id = Auth::user()->id;
    
      $term = $request->term_id;
      $year = $request->year;
    
      
      $purchases_check = purchaseStocks::where('term_id',$term)->where('year',$year)->where('school_id',$school_id)->first();
       
    
    
      if($purchases_check == true)
    {
    
    $purchases = purchaseStocks::with(['school','purchase'])->where('term_id',$term)->where('year',$year)->where('school_id',$school_id)->latest()->get();
       
    $total_price = purchaseStocks::where('term_id',$term)->where('year',$year)->where('school_id',$school_id)->sum('total_price');
  
    $school_details = purchaseStocks::with('school')->where('school_id',$school_id)->where('term_id',$term)->where('year',$year)->first();
    
    return view('school.purchases.reports.term_purchases_report.term_school_purchases_report',compact('purchases','year','school_details','total_price'));
    
    
    }
    
    else{
    
    
    return view('school.purchases.reports.term_purchases_report.no_purchases_data');
    
    
    }
        
    } 
    
    
     
    
  
    public function PurchasesReportByYears(Request $request){
    
      $school_id = Auth::user()->id;
      $year = $request->year;
    
          
      $purchases_check = purchaseStocks::where('year',$year)->where('school_id',$school_id)->first();
       
    
    
      if($purchases_check == true)
    {
    
    
      $purchases = purchaseStocks::with('school')->where('year',$year)->where('school_id',$school_id)->get();
  
      $total_price = purchaseStocks::where('year',$year)->where('school_id',$school_id)->sum('total_price');
     
      $school_details = purchaseStocks::with('school')->where('school_id',$school_id)->where('year',$year)->first();
    
    
    return view('school.purchases.reports.year_purchases_report.year_school_purchases_report',compact('purchases','total_price','school_details'));
    }
    
    else{
    
    
    return view('school.purchases.reports.year_purchases_report.no_purchases_data');
    
    
    
    }
        
    
    } 
    
    
      
  
    
  
  public function PurchaseItemTermlyReport(Request $request){
  
    $school_id = Auth::user()->id;
  
    $term = $request->term_id;
    $purchase_id = $request->purchase_id;
    $year = $request->year;
  
    
    $purchasestock_check = purchaseStocks::where('purchase_id',$purchase_id)->where('term_id',$term)->where('year',$year)->where('school_id',$school_id)->first();
     
  
  
    if($purchasestock_check == true)
  {
  
  $purchases = purchaseStocks::with(['school','purchase'])->where('purchase_id',$purchase_id)->where('term_id',$term)->where('year',$year)->where('school_id',$school_id)->latest()->get();
     
  $total_price = purchaseStocks::where('purchase_id',$purchase_id)->where('term_id',$term)->where('year',$year)->where('school_id',$school_id)->sum('total_price');
  
  $details = purchaseStocks::with(['school','purchase'])->where('purchase_id',$purchase_id)->where('school_id',$school_id)->where('term_id',$term)->where('year',$year)->first();
  
  return view('school.purchases.reports.term_purchases_report.term_purchase_item_report',compact('purchases','details','total_price'));
  
  
  }
  
  else{
  
  
  return view('school.purchases.reports.term_purchases_report.no_purchases_data');
  
  
  }
      
  } 
  
  
    
  public function PurchaseItemYearlyReport(Request $request){
  
    $school_id = Auth::user()->id;
    $purchase_id = $request->purchase_id;
    $year = $request->year;
  
        
    $purchasestock_check = purchaseStocks::where('purchase_id',$purchase_id)->where('year',$year)->where('school_id',$school_id)->first();
     
  
  
    if($purchasestock_check == true)
  {
  
  
    $purchases = purchaseStocks::with(['school','purchase'])->where('purchase_id',$purchase_id)->where('year',$year)->where('school_id',$school_id)->get();
  
    $total_price = purchaseStocks::where('purchase_id',$purchase_id)->where('year',$year)->where('school_id',$school_id)->sum('total_price');
  
    $details = purchaseStocks::with(['school','purchase'])->where('purchase_id',$purchase_id)->where('school_id',$school_id)->where('year',$year)->first();
  
  
  return view('school.purchases.reports.year_purchases_report.year_purchase_item_report',compact('purchases','total_price','details'));
  }
  
  else{
  
  
  return view('school.purchases.reports.year_purchases_report.no_purchases_data');
  
  
  
  }
      
  
  } 
  



}
