<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\orders;
use App\Models\order_items;
use Carbon\Carbon;
use App\Models\school_orders_payments;
use App\Models\schoolorders_payments_records;
use App\Models\order_payments_tracking;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
     


    
    public function SchoolOrders(){

        $orders = orders::where('status','Order Pending')->orderBy('id','DESC')->get();
    	return view('admin.orders.pending_orders',compact('orders'));

    } 


        
    public function ConfirmedOrders(){

        $orders = orders::where('status','Order Confirmed')->orderBy('id','DESC')->get();
    	return view('admin.orders.confirmed_orders',compact('orders'));

    } 



        
    public function ShippedOrders(){

        $orders = orders::where('status','Out for Delivery')->orderBy('id','DESC')->get();
    	return view('admin.orders.shipped_orders',compact('orders'));

    } 



        
    public function DeliveredOrders(){

        $orders = orders::where('status','Order Delivered')->orderBy('id','DESC')->get();
    	return view('admin.orders.delivered_orders',compact('orders'));

    } 

 
	    
    public function SchoolOrderDetails($order_id){


		$order = orders::with('school')->where('id',$order_id)->first();
    	$orderItems = order_items::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();

		$orders = orders::with('school')->where('id',$order_id)->get();        
        $momo_pays = school_orders_payments::with(['order'])->where('order_id',$order_id)->get();


        $order_payments = schoolorders_payments_records::with(['order'])->where('order_id',$order_id)->get();

        $order_payment_total = schoolorders_payments_records::with(['order'])->where('order_id',$order_id)->sum('amount');

        
        $offline_payments_track = order_payments_tracking::with(['order'])->where('order_id',$order_id)->get();

    	return view('admin.orders.order_details',compact('order','orderItems','orders','momo_pays','order_payments','order_payment_total','offline_payments_track'));

    } 
 



    //Order Status Update Section 

    
    public function PendingToConfirm($order_id){
   
        orders::findOrFail($order_id)->update([
			'confirmed_date' => Carbon::now()->format('d F Y'),
			'status' => 'Order Confirmed',
		]);

        order_items::where('order_id', $order_id)->update([
            'status' => 'Order Confirmed',
        ]);
  
        return redirect()->route('confirmed-orders')->with('info',' Order Has Been Confirmed..');
  
  
      } // end method



      public function ConfirmToShipped($order_id){
   
        orders::findOrFail($order_id)->update([
			'shipped_date' => Carbon::now()->format('d F Y'),
			'status' => 'Out for Delivery',
		]);


        order_items::where('order_id', $order_id)->update([
            'status' => 'Out for Delivery',
        ]);
  
        return redirect()->route('shipped-orders')->with('info',' Order Out for Delivery..');
  
  
      } // end method
  


      
  
      public function ShippedToDelivered($order_id){
     	
			orders::findOrFail($order_id)->update([
				'delivered_date' => Carbon::now()->format('d F Y'),
				'status' => 'Order Delivered',
		]);

        order_items::where('order_id', $order_id)->update([
            'status' => 'Order Delivered',
        ]);

          return redirect()->route('delivered-orders')->with('info',' Order Has Been Delivery Successfully..');
  
  
      } // end method


      

//All School Orders MoMo Payments
public function SchoolOrdersPayments(){

    
    $payments = school_orders_payments::with(['school','order'])->latest()->get();

    return view('admin.orders.order_payments', compact('payments'));
    
}




      

//All School Orders MoMo Payments
public function AllOrdersPaymentsRecords(){

    
    $payment_records = schoolorders_payments_records::with(['school','order'])->latest()->get();

    return view('admin.orders.order_payments_records', compact('payment_records'));
    
}



  
public function SchoolOrdersPayment(Request $request, $order_id)
{ 



    $order_amount = orders::where('id',$order_id)->first();

$schoolorder_records = schoolorders_payments_records::where('order_id',$order_id)->first();	

$due_bal = (float)$schoolorder_records->total_amount-(float)$schoolorder_records->amount;


if($request->payment_amount <= $due_bal)
{

$previous_amount = $schoolorder_records->amount;
$total_amount = $schoolorder_records->total_amount;
$present_amount = (float)$previous_amount+(float)$request->payment_amount; 
$schoolorder_records->amount = $present_amount;
$schoolorder_records->save();

   
$order_Pay = new order_payments_tracking();
$order_Pay->order_id = $order_id;
$order_Pay->school_id = $schoolorder_records->school_id;
$order_Pay->payment_amount  = $request->payment_amount;
$order_Pay->order_amount_balance  = (float)$total_amount-(float)$schoolorder_records->amount;
$order_Pay->payment_type = $request->payment_type;
$order_Pay->date = Carbon::today()->format('Y-m-d');
$order_Pay->month = Carbon::today()->format('F Y');
$order_Pay->year = Carbon::today()->format('Y');
$order_Pay->save();




if($order_Pay->payment_amount == $order_amount->amount)
{


orders::where('id',$order_id)->update([
	
  'payment_status' => 'Full Payment Made',

]);

}

elseif($order_Pay->payment_amount < $order_amount->amount)
{

  
orders::where('id',$order_id)->update([
	
  'payment_status' => 'Partial Payment Made',

]);


}


        return back()->with('success',' Balance Topup Payment Successful');

}

else{


      return back()->with('error',' Balance Amount Entered Greater than Account Balance!');



}

} 
  
  
  


  public function OfflineOrdersTrackInvoice($order_id){
    
    
    $payment_track = schoolorders_payments_records::where('order_id',$order_id)->first();
    
    if($payment_track == true){
    
      $data['payments_record'] = schoolorders_payments_records::with(['school','order'])->where('order_id',$order_id)->first();
      $data['payment_records_track'] = order_payments_tracking::where('order_id',$order_id)->get();
    
    return view('admin.orders.offline_order_track_invoice', $data);
    
    
      }
       
      else{
    
         abort(code:403);
        
        }	
    
    
      }
    



    
  public function OfflineOrderPaymentInvoice($id){

    $payment_track = order_payments_tracking::where('id',$id)->first();
    
    if($payment_track == true){

$offline_details = order_payments_tracking::with(['school'])->where('id',$id)->get();

    
    return view('admin.orders.offline_order_payment_invoice', compact('offline_details'));
    
    
      }
       
      else{
    
         abort(code:403);
        
        }	
    
    
      }
    



  		
public function OfflineOrderPaymentDelete($id)
{

  $order_payment = order_payments_tracking::find($id);
  $payment = $order_payment->payment_amount;
  $order_id = $order_payment->order_id;

  
  
  $paid_amount = schoolorders_payments_records::where('order_id',$order_id)->first();
  $old_amount = $paid_amount->amount;
  $new_amount = (float)$old_amount-(float)$payment;

  schoolorders_payments_records::where('order_id',$order_id)->update([

    'amount' => $new_amount,

  ]);


  order_payments_tracking::find($id)->delete();
 
  return back()->with('error',' Balance Payment Deleted Successfully');


}





}
