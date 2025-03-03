<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\products;
use App\Models\orders;
use App\Models\order_items;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\MtnMomo\MtnConfig;
use App\MtnMomo\MtnCollection;
use App\Models\school_orders_payments;
use App\Models\order_carts;
use App\Models\schoolorders_payments_records;
use App\Models\order_payments_tracking;

class OrderController extends Controller
{
    


    public function SubmitOrders(Request $request){

		
		
        $school_id = Auth::user()->id;
        $CartCout = order_carts::where('school_id',$school_id)->count(); 
        $subtotal = order_carts::where('school_id',$school_id)->sum('pricetotal');


		$externalId = rand(100,10000000);
		$partyId = $request->phone_number;
	
		$config = new MtnConfig([ 
			// mandatory credentials
			'baseUrl'               => 'https://sandbox.momodeveloper.mtn.com', 
			'currency'              => 'EUR', 
			'targetEnvironment'     => 'sandbox', 
		
			// collection credentials
			"collectionApiSecret"   => 'efe623cfbc9144718fda6974f22d37a8', 
			"collectionPrimaryKey"  => '3b871685daf94e0f8a38e8d6f9bc084a', 
			"collectionUserId"      => '75256da3-6a40-4f34-a6d6-8e27f62fc4aa',
		]);
		
		
		$collection = new MtnCollection($config); 
		
		$params = [
			"mobileNumber"      => $partyId, 
			"amount"            =>  $subtotal, 
			"externalId"        => $externalId,
			"payerMessage"      => 'some note',
			"payeeNote"         => '1212'
		];
		
		$order_transactionId = $collection->requestToPay($params);
		
		$order_transaction = $collection->getTransaction($order_transactionId);
	
 
 ////dd($order_transaction);

		
 		
     $order_id = orders::insertGetId([ 
     	'school_id' => Auth::id(), 
		 'name' => $request->name,
     	'email' => $request->email,
     	'school_tel1' => $request->school_tel1, 
     	'school_tel2' => $request->school_tel2, 
		'school_address' => $request->school_address,     	 
     	'amount' => $subtotal,
		'total_order_items' => $CartCout,
     	'order_number' => mt_rand(10000000,99999999),
		 'order_time' => Carbon::now()->toTimeString(),
     	'order_date' => Carbon::today()->format('Y-m-d'),
     	'order_month' => Carbon::today()->format('F Y'),
     	'order_year' => Carbon::today()->format('Y'),
     	'status' => 'Order Pending',
		'payment_status' => 'Non Credit',
		'created_at' => Carbon::now(),

     ]);


	 
$token_status = $order_transaction->status;
$amount = $order_transaction->amount;
$currency = $order_transaction->currency;


	 
$order_payment = new school_orders_payments();
$order_payment->order_id = $order_id;
$order_payment->school_id =$school_id;
$order_payment->amount = $amount;
$order_payment->currency = $currency;
$order_payment->reference_id = $order_transactionId;
$order_payment->externalId = $externalId;
$order_payment->payer_number =  $partyId;
$order_payment->status =  $token_status;
$order_payment->sent_time = Carbon::now()->toTimeString();;
$order_payment->payment_date = Carbon::today()->format('Y-m-d');;
$order_payment->month = Carbon::now()->format('F Y');
$order_payment->year = Carbon::now()->format('Y');
$order_payment->save();



$schoolorders_pay_records = new schoolorders_payments_records();
$schoolorders_pay_records->order_id = $order_payment->order_id;
$schoolorders_pay_records->school_id = $order_payment->school_id;
$schoolorders_pay_records->amount = $order_payment->amount;
$schoolorders_pay_records->total_amount = $subtotal;
$schoolorders_pay_records->month =Carbon::now()->format('F Y');
$schoolorders_pay_records->year =Carbon::now()->format('Y');
$schoolorders_pay_records->save();


$carts = order_carts::where('school_id',$school_id)->orderBy('id','ASC')->get();
     foreach ($carts as $cartitem) {
        order_items::insert([
     		'order_id' => $order_id, 
     		'product_id' => $cartitem->product_id,
			'school_id' => Auth::id(), 
     		'qty' => $cartitem->qty,
     		'price' => $cartitem->price,
			'pricetotal' => $cartitem->pricetotal,
			'date' => Carbon::today()->format('Y-m-d'),
			'month' => Carbon::today()->format('F Y'),
			'year' => Carbon::today()->format('Y'),
			'status' => 'Order Pending',
     		'created_at' => Carbon::now(),

     	]);
     } 



     
 order_carts::where('school_id',$school_id)->delete();

        return redirect()->route('view.school.orders')->with('success','Your Order Has Been Submitted Successfully');
 

    } // end method 








	
    public function SubmitCreditOrders(Request $request){

		
		
        $school_id = Auth::user()->id;
        $CartCout = order_carts::where('school_id',$school_id)->count(); 
        $subtotal = order_carts::where('school_id',$school_id)->sum('pricetotal');
		
 		
     $order_id = orders::insertGetId([ 
     	'school_id' => Auth::id(), 
		 'name' => $request->name,
     	'email' => $request->email,
     	'school_tel1' => $request->school_tel1, 
     	'school_tel2' => $request->school_tel2, 
		'school_address' => $request->school_address,     	 
     	'amount' => $subtotal,
		'total_order_items' => $CartCout,
     	'order_number' => mt_rand(10000000,99999999),
		 'order_time' => Carbon::now()->toTimeString(),
     	'order_date' => Carbon::today()->format('Y-m-d'),
     	'order_month' => Carbon::today()->format('F Y'),
     	'order_year' => Carbon::today()->format('Y'),
     	'status' => 'Order Pending',
		 'payment_status' => 'On Credit',
		'created_at' => Carbon::now(),

     ]);

	 
$schoolorders_pay_records = new schoolorders_payments_records();
$schoolorders_pay_records->order_id = $order_id;
$schoolorders_pay_records->school_id = Auth::id();
$schoolorders_pay_records->amount = 0;
$schoolorders_pay_records->total_amount = $subtotal;
$schoolorders_pay_records->month =Carbon::now()->format('F Y');
$schoolorders_pay_records->year =Carbon::now()->format('Y');
$schoolorders_pay_records->save();

$carts = order_carts::where('school_id',$school_id)->orderBy('id','ASC')->get();
     foreach ($carts as $cartitem) {
        order_items::insert([
     		'order_id' => $order_id, 
     		'product_id' => $cartitem->product_id,
			'school_id' => Auth::id(), 
     		'qty' => $cartitem->qty,
     		'price' => $cartitem->price,
			'pricetotal' => $cartitem->pricetotal,
			'date' => Carbon::today()->format('Y-m-d'),
			'month' => Carbon::today()->format('F Y'),
			'year' => Carbon::today()->format('Y'),
			'status' => 'Order Pending',
     		'created_at' => Carbon::now(),

     	]);
     } 



     
 order_carts::where('school_id',$school_id)->delete();

        return redirect()->route('view.school.orders')->with('success','Your Order Has Been Submitted Successfully');
 

    } // end method 






    
    public function MyOrders(){

    	$orders = orders::where('school_id',Auth::id())->latest()->get();
    	return view('school.ecommerce.orders.view_orders',compact('orders'));

    } 


	    
    public function OrderDetails($order_id){


$auth_check = orders::with('school')->where('id',$order_id)->where('school_id',Auth::id())->first();

if($auth_check == true){


		$order = orders::with('school')->where('id',$order_id)->where('school_id',Auth::id())->first();
		
    	$orderItems = order_items::with(['product'])->where('order_id',$order_id)->orderBy('id','DESC')->get();

		
        $order_payments = schoolorders_payments_records::with(['order'])->where('order_id',$order_id)->where('school_id',Auth::id())->get();

        $order_payment_total = schoolorders_payments_records::with(['order'])->where('order_id',$order_id)->where('school_id',Auth::id())->sum('amount');

        
        $offline_payments_track = order_payments_tracking::with(['order'])->where('order_id',$order_id)->where('school_id',Auth::id())->get();

    	return view('school.ecommerce.orders.order_details',compact('order','orderItems','order_payments','order_payment_total','offline_payments_track'));


}

else{
	abort(code:403);
}


    } 


 

	
    public function CancelOrder($order_id)
    {


		orders::findOrFail($order_id)->update([
			'status' => 'Order Cancelled',
		]);

        order_items::where('order_id', $order_id)->update([
            'status' => 'Order Cancelled',
        ]);

		return redirect()->back()->with('error',' Order Has Been Cancelled Successfully..');
       
    } // end method 





	
public function ViewOrderReportInvoice($order_id){


    $order = orders::with('school')->where('id',$order_id)->first();
    $orderItems = order_items::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();

    return view('school.reports.orders.order_invoice_details',compact('order','orderItems'));

} 








//Schools` Orders

public function OrdersPayments(){

    
    $payments = school_orders_payments::with(['school','order'])->where('school_id',Auth::id())->latest()->get();

    return view('school.ecommerce.orders.order_payments', compact('payments'));
    
}







public function OfflineOrderPaymentTrackInvoice($order_id){
    
    
    $payment_track = schoolorders_payments_records::where('order_id',$order_id)->where('school_id',Auth::id())->first();
    
    if($payment_track == true){
    
      $data['payments_record'] = schoolorders_payments_records::with(['school','order'])->where('order_id',$order_id)->where('school_id',Auth::id())->first();
      $data['payment_records_track'] = order_payments_tracking::where('order_id',$order_id)->where('school_id',Auth::id())->get();
    
    return view('school.ecommerce.orders.offline_order_track_invoice', $data);
    
    
      }
       
      else{
    
         abort(code:403);
        
        }	
    
    
      }
    



}
