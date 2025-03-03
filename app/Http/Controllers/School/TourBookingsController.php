<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tours_cart;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\tours_packs;
use App\Models\school_bookings;
use App\Models\tour_payments;
use App\MtnMomo\MtnConfig;
use App\MtnMomo\MtnCollection;

class TourBookingsController extends Controller
{
    

    
    public function SubmitTourBookings(Request $request){


				

        $school_id = Auth::user()->id;
        $tourCartCout = tours_cart::where('school_id',$school_id)->count(); 
        $tourCartSubtotal_Stud = tours_cart::where('school_id',$school_id)->sum('stud_pricetotal');
        $tourCartSubtotal_Adult = tours_cart::where('school_id',$school_id)->sum('adult_pricetotal');
        $subtotal =(float)$tourCartSubtotal_Stud + (float)$tourCartSubtotal_Adult;

		$externalId = rand(100,10000000);
		$partyId = $request->mobile_number;

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
		
		$transactionId = $collection->requestToPay($params);
		
		$transaction = $collection->getTransaction($transactionId);


 
 //dd($transaction);


		/*
		$momo_pay = new Collection();
		$transactionId = rand(100,10000000);
		$partyId = $request->mobile_number;



		$momoTransactionId = $momo_pay->requestToPay($transactionId, $partyId, $subtotal);

		$response = $momo_pay->getTransactionStatus($momoTransactionId);

		*/


		

		
     $booking_id = school_bookings::insertGetId([ 
		'school_id' => $school_id,
		 'name' => $request->name,
     	'email' => $request->email,
     	'school_tel1' => $request->school_tel1,
     	'school_tel2' => $request->school_tel2, 
		'school_address' => $request->school_address,     	 
     	'total_amount' => $subtotal,
		'total_tours' => $tourCartCout,
		'booking_number' => mt_rand(10000000,99999999),
		 'time' => Carbon::now()->toTimeString(),
     	'booking_date' => Carbon::today()->format('Y-m-d'),
     	'booking_month' => Carbon::today()->format('F Y'),
     	'booking_year' => Carbon::today()->format('Y'),
     	'status' => 'Bookings Pending',
		'created_at' => Carbon::now(),

     ]);


	 
$token_obj = $transaction->status;
$amount = $transaction->amount;
$currency = $transaction->currency;


	 
$tour_payment = new tour_payments();
$tour_payment->booking_id = $booking_id;
$tour_payment->school_id = $school_id;
$tour_payment->amount = $amount;
$tour_payment->currency = $currency;
$tour_payment->reference_id = $transactionId;
$tour_payment->externalId = $externalId;
$tour_payment->payer_number =  $partyId;
$tour_payment->status =  $token_obj;
$tour_payment->sent_time = Carbon::now()->toTimeString();;
$tour_payment->payment_date = Carbon::today()->format('Y-m-d');;
$tour_payment->month = Carbon::now()->format('F Y');
$tour_payment->year = Carbon::now()->format('Y');
$tour_payment->save();


	 $carts = tours_cart::where('school_id',$school_id)->orderBy('id','ASC')->get();
     foreach ($carts as $cartitem) {
        tours_packs::insert([
     		'booking_id' => $booking_id, 
			'school_id' => Auth::id(), 
            'tour_package_id' => $cartitem->tour_package_id,
			'tour_operator_id' => $cartitem->tour->operator->id,
     		'stud_qty' => $cartitem->stud_qty,
     		'stud_price' => $cartitem->stud_price,
			'stud_pricetotal' => $cartitem->stud_pricetotal,
            'adult_qty' => $cartitem->adult_qty,
            'adult_price' => $cartitem->adult_price,
           'adult_pricetotal' => $cartitem->adult_pricetotal,
			'date' => Carbon::today()->format('Y-m-d'),
			'month' => Carbon::today()->format('F Y'),
			'year' => Carbon::today()->format('Y'),
			'status' => 'Bookings Pending',
     		'created_at' => Carbon::now(),

     	]);
     } 




     tours_cart::where('school_id',$school_id)->delete();

        return redirect()->route('view.tour.bookings')->with('success','Tour Bookings Submitted Successfully');
 



    } // end method 





    public function ViewTourBookings(){

    	$bookings = school_bookings::where('school_id',Auth::id())->latest()->get();
    	return view('school.tours.bookings.view_tour_bookings',compact('bookings'));

    } 


	    
    public function TourBookingDetails($booking_id){

        $school_id = Auth::user()->id;
		$booking = school_bookings::with('school')->where('id',$booking_id)->where('school_id',$school_id)->first();
    	$tour_booking = tours_packs::with('tour')->where('booking_id',$booking_id)->orderBy('id','ASC')->get();

    	return view('school.tours.bookings.tour_booking_details',compact('booking','tour_booking'));

    } 




	
    public function CancelTourBookings($booking_id)
    {

		
        school_bookings::findOrFail($booking_id)->update([
			'status' => 'Bookings Cancelled',
		]);

        tours_packs::where('booking_id', $booking_id)->update([
            'status' => 'Bookings Cancelled',
        ]);

		return redirect()->back()->with('error',' Tour Bookings Cancelled !');
       
    } // end method 





	
public function TourBookingReportInvoice($booking_id){


    $booking = school_bookings::with('school')->where('id',$booking_id)->where('school_id',Auth::id())->first();
    $tours = tours_packs::with(['tour'])->where('booking_id',$booking_id)->orderBy('id','DESC')->get();


    return view('school.tours.bookings.tour_booking_invoice_details',compact('booking','tours'));

} 








public function SchoolTourBookingsPayments(){

    
    $payments = tour_payments::with(['school','booking'])->where('school_id',Auth::id())->latest()->get();

    return view('school.tours.bookings.tour_booking_payments', compact('payments'));
    
}







}
