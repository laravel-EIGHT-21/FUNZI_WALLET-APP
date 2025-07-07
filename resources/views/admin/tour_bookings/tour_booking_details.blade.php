
@extends('admin.body.admin_master')
@section('content')


@section('title')

Tour Bookings Details | funziwallet

@endsection



<!-- Content --> 

<div class="container-xxl flex-grow-1 container-p-y">


<h4 class="py-3 mb-2">
<span class="text-muted fw-light">View /</span> Tour Bookings Details
</h4>



@if($booking->status == 'Bookings Pending')        
<a href="{{ route('pending-tour-bookings')}}" class="btn rounded-pill btn-primary" style="float:right;"><i class='tf-icons mdi mdi-arrow-left mdi-20px'></i>Back</a>


@elseif($booking->status == 'Bookings Confirmed')

<a href="{{ route('confirmed-tour-bookings')}}" class="btn rounded-pill btn-success" style="float:right;"><i class='tf-icons mdi mdi-arrow-left mdi-20px'></i>Back</a>



@elseif($booking->status == 'Bookings Cancelled')

<a href="{{ route('cancelled-tour-bookings')}}" class="btn rounded-pill btn-danger" style="float:right;"><i class='tf-icons mdi mdi-arrow-left mdi-20px'></i>Back</a>

@endif 



<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">

<div class="d-flex flex-column justify-content-center gap-2 gap-sm-0">
<h4 class="mb-1 mt-3 d-flex flex-wrap gap-2 align-items-end">
Booking No. #{{$booking->booking_number}} &nbsp;&nbsp; <b>|</b> &nbsp;&nbsp;
@if($booking->status == 'Bookings Pending')        
Booking Status : <span class="badge badge-pill badge-warning" style="background: #FFA500;">Booking Pending </span>


@elseif($booking->status == 'Bookings Confirmed')
Booking Status : <span class="badge badge-pill badge-warning" style="background: green;;">Confirmed</span>
@elseif($booking->status =='Bookings Cancelled')
Booking Status : <span class="badge badge-pill badge-warning" style="background: rgb(249, 20, 20);;">Cancelled</span>

@endif

</h4>

<p class="text-body"><b> Date : {{$booking->booking_date}}</b> &nbsp;&nbsp; <b>|</b> &nbsp;&nbsp; <b>Booking Time : {{$booking->time}}</b>


&nbsp;&nbsp; <b>|</b> &nbsp;&nbsp; <b>Payment Status : 


@if($booking->payment_status == 'Payment Made')        
<span class="badge badge-pill badge-warning" style="background: #34f105;">Full Payment Made </span>


@elseif($booking->payment_status == 'Partial Payment Made')        
<span class="badge badge-pill badge-warning" style="background: #f5f238;">Partial Payment Made </span>


@elseif($booking->payment_status == 'No Payment')
<span class="badge badge-pill badge-warning" style="background: #f80b0b;">No Payment Made </span>

@endif

</b>





</p>
</div>


</div>





<div class="col-xl-12 col-lg-7 col-md-7 order-0 order-md-1">

<ul class="nav nav-pills flex-column flex-md-row mb-4">


<li class="nav-item">
<button type="button" class="nav-link active py-2" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-overview" aria-controls="navs-pills-justified-overview" aria-selected="true">Overview </button>
</li>


<li class="nav-item">
<button type="button" class="nav-link py-2" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-order-payments" aria-controls="navs-pills-justified-order-payments" aria-selected="false">Payment Record</button>
</li>



<li class="nav-item">
<button type="button" class="nav-link py-2" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-all-balance-payments" aria-controls="navs-pills-justified-all-balance-payments" aria-selected="false">Enter Booking Payments</button>
</li>



</ul>



<div class="tab-content">

<div class="tab-pane fade show active" id="navs-pills-justified-overview" role="tabpanel">


<div class="row">

              <div class="col-12 col-lg-9">
                <div class="card mb-4">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title m-0">Tour Bookings details</h5>

                  </div>
                  <div class="table-responsive text-nowrap">
              <table class="table table-borderless">
                <thead class="border-bottom">
                        <tr>
 <th >Tour</th>
        <th >Stud Qty</th>
        <th>Adult Qty</th>
        <th>Stud Total</th>
        <th>AdultTotal</th>
                        </tr>
                      </thead>
                      @foreach($tour_booking as $value )
                      <tbody>
                        <tr>
                          <td>
                            <div class="d-flex">
                            <p class="mb-0">{{$value->tour->name}}</p>
                            </div>
                            </td>

                            <td>
                    
                            <div class="d-flex">
                    
                            <h6 class="mb-0">{{ $value->stud_qty}}</h6>
                    
                            </div>
                    
                    
                            </td>
                    
                    
                    
                            <td>
                    
                            <div class="d-flex">
                    
                            <h6 class="mb-0">{{ $value->adult_qty}}</h6>
                    
                            </div>
                    
                    
                            </td>
                    
                            
                            <td>
                    
                            <div class="d-flex">
                    
                            <h6 class="mb-0">{{ $value->stud_pricetotal}}</h6>
                    
                            </div>
                    
                            </td>
                    
                    
                    
                            <td>
                    
                            <div class="d-flex">
                    
                            <h6 class="mb-0">{{ $value->adult_pricetotal}}</h6>
                    
                            </div>
                    
                            </td>
    

    

                        </tr>
                      </tbody>
                      @endforeach
                    </table>
                    <div class="d-flex justify-content-end align-items-center m-3 mb-2 p-1">
                      <div class="order-calculations">

                        <div class="d-flex justify-content-between">
                          <h6 class="w-px-100 mb-0">Total Amount:</h6>
                          <h6 class="mb-0">UGX {{$booking->total_amount}}</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>



              </div>



<div class="col-12 col-lg-3">
<div class="card mb-4">
<div class="card-header">
<h6 class="card-title m-0">School details</h6>
</div>
<div class="card-body">
<div class="d-flex justify-content-start align-items-center mb-4">

<div class="d-flex flex-column">
<a href="app-user-view-account.html" class="text-body text-nowrap">
<h6 class="mb-0">{{$booking->name}}</h6>
</a>
</div>
</div>

<div class="d-flex justify-content-start align-items-center mb-4">
<span class="avatar rounded-circle bg-label-success me-2 d-flex align-items-center justify-content-center"><i class='mdi mdi-cart-outline mdi-20px'></i></span>
<h6 class="text-body text-nowrap mb-0">{{$booking->total_tours}} Tour(s)</h6>
</div>

<div class="d-flex justify-content-between">
<h6>Contact info</h6>

</div>
<p class=" mb-1">Email: {{$booking->email}}</p>
<p class=" mb-0">Tel One : {{$booking->school_tel1}}</p>
<p class=" mb-0">Tel Two : {{$booking->school_tel2}}</p>
</div>
</div>

<div class="card mb-4">

<div class="card-header d-flex justify-content-between">
<h6 class="card-title m-0">Shipping address</h6>

</div>
<div class="card-body">
<p class="mb-0">{{$booking->school_address}}</p>
</div>

</div>


<div class="card mb-4">

<div class="card-header d-flex justify-content-between">
  <h6 class="card-title m-0">Status Update</h6>

  </div>
  @can('school-tours-operate')
  @if($booking->status == 'Bookings Pending')
  <div class="card-body">
  <a href="{{ route('pending.confirm.bookings',$booking->id) }}" class="btn btn-block btn-warning" id="confirm2">Confirm Booking</a>


  @elseif($booking->status == 'Bookings Confirmed')
  <a href="#" class="btn btn-block btn-success"> Booking Confirmed</a>

  @elseif($booking->status == 'Bookings Cancelled')
  <a href="#" class="btn btn-block btn-danger"> Tour Cancelled</a>


@endif



</div>
@endcan

</div>



</div>



</div>



</div>  




<div class="tab-pane fade" id="navs-pills-justified-order-payments" role="tabpanel">
<div class="row">

<div class="card">
<div class="card-body">

<div class="table-responsive">
<table class="table border table-striped table-bordered text-nowrap">
<thead>
<!-- start row -->
<tr>

<th>Booking No</th>
<th>Paid (UGX)</th>
<th>Total (UGX)</th>
<th>Balance (UGX)</th>


</tr>
<!-- end row -->
</thead>
@foreach($tour_payments as $key => $value )
<tbody>
<tr>

<td>{{ $value['booking']['booking_number']}}</td>

<td>


<span class="badge rounded-pill text-success bg-dark-success p-2 text-uppercase px-3"><b><i class='align-middle me-1'></i>UGX {{ $value->amount }}</b></span>


</td>



<td>


<span class="badge rounded-pill text-primary bg-dark-info p-2 text-uppercase px-3"><b><i class='align-middle me-1'></i>UGX {{ $value->total_amount }}</b></span>


</td>


@php 

$bal = (float)$value->total_amount-(float)$value->amount;

@endphp


<td>


<span class="badge rounded-pill text-danger bg-dark-danger p-2 text-uppercase px-3"><b><i class='align-middle me-1'></i>UGX  {{ $bal }}</b></span>


</td>

</tr>






</tbody>
@endforeach
</table>
</div>
</div>
</div>


</div>


</div>




<div class="tab-pane fade" id="navs-pills-justified-all-balance-payments" role="tabpanel">


<ul class="nav nav-pills flex-column flex-md-row mb-3">



<li class="nav-item">
<button type="button" class="nav-link active py-2" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-offline-orders-payments" aria-controls="navs-pills-justified-offline-orders-payments" aria-selected="true">Track Order Payments </button>
</li>

<li class="nav-item">
<button type="button" class="nav-link py-2" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-offline-topup-payment" aria-controls="navs-pills-justified-offline-topup-payment" aria-selected="false">Submit Payments </button>
</li>








</ul>


<div class="tab-content">


<div class="tab-pane fade show active" id="navs-pills-justified-offline-orders-payments" role="tabpanel">

<div class="row">


<div class="card">
<div class="card-body">

                      
<div class="row"> 

<div class="col-md-3" style="padding-top: 10px;">

<a href="{{ route('tour.booking.payments.track.invoice',$bookings['0']['id']) }}" target="_blank" class="btn rounded-pill btn-info">
<span class="d-flex align-items-center justify-content-center text-nowrap"><i class="mdi mdi-printer-outline scaleX-n1-rtl me-1"></i>Print Invoice</span>
</a>

</div>

</div> 

<br/>


<div class="table-responsive">
<table class="table border table-striped table-bordered text-nowrap">
<thead>
<!-- start row -->
<tr>

<th>Booking No.</th> 
<th> Topup Pay</th>
<th>Balance</th>
<th> Payment type</th>
<th> Date</th>
<th>Action</th>

</tr>
<!-- end row -->
</thead>
@foreach($offline_payments_track as $key => $value )
<tbody>
<tr>

<td> {{ $value['booking']['booking_number']}}</td>	
<td> {{ $value->payment_amount }}</td>	
<td> {{ $value->tour_amount_balance }}</td>	
<td> {{ $value->payment_type}}</td>	
<td> {{ $value->date }}</td>	

<td>

<a href="{{route('tour.booking.payment.invoice',$value->id)}}" title="Get Invoice" target="_blank" class="btn btn-sm btn-info"><i class='mdi mdi-file-document-outline'></i></a>


<a href="{{route('delete.tour.booking.payment',$value->id)}}" id="delete" title="Delete" class="btn btn-sm btn-danger"><i class='mdi mdi-delete-outline'></i></a>

</td>	

</tr>






</tbody>
@endforeach
</table>
</div>
</div>
</div>


</div>

</div>



<div class="tab-pane fade" id="navs-pills-justified-offline-topup-payment" role="tabpanel">


<div class="row text-nowrap">
<div class="card mb-4">
<h5 class="card-header">Submit Tour Booking Payment </h5>

<form action="{{ route('tour.booking.topup.payment',$bookings['0']['id']) }}" method="POST" >
@csrf

<input type="hidden" name="booking_id" value="{{ $bookings['0']['id'] }}" />

<div class="row">

<div class="col mb-4 mt-2">
<div class="form-floating form-floating-outline">
<input class="form-control" type="text" name="amount" readonly value="{{$bookings['0']['total_amount']}}"  id="html5-text-input" />
<label for="html5-text-input">Total Amount</label>
</div>

</div>
</div>


<div class="row">

<div class="col mb-4 mt-2">
<div class="form-floating form-floating-outline">
<input class="form-control" type="text" name="amount" readonly value="{{$tour_payment_total}}"  id="html5-text-input" />
<label for="html5-text-input">Amount Paid</label>
</div>

</div>
</div>

@php

$balance = (float)$bookings['0']['total_amount'] - (float)$tour_payment_total;

@endphp


<div class="row">

<div class="col mb-4 mt-2">
<div class="form-floating form-floating-outline">
<input class="form-control" type="text" name="amount" readonly value="{{$balance}}"  id="html5-text-input" />
<label for="html5-text-input">Fees Balance </label>
</div>

</div>
</div>


@if($tour_payment_total < $bookings['0']['total_amount'])


<div class="row">

<div class="col mb-4 mt-2">
<div class="form-floating form-floating-outline">
<input class="form-control" type="text" maxlength="8" minlength="4" name="payment_amount" id="cash" required />
<label for="cash">Enter Order Payment</label>
</div>

</div>
</div>



<div class="row">

<div class="col mb-4 mt-2">
<div class="form-floating form-floating-outline">
<select id="payment_type" name="payment_type" class="select2 form-select" data-allow-clear="true">
<option value="">Select Type</option>
<option value="Cash">Cash</option>
<option value="Mobile Money">Mobile Money</option>
</select>
<label for="payment_type">Payment Type</label>
</div>

</div>
</div>



<div class="row">

<div class="col mb-4 mt-2">
<div class="form-floating form-floating-outline">
<input class="form-control" type="text" name="payment_note" id="note" required />
<label for="note">Enter Payment Note</label>
</div>

</div>
</div>

<div class="row">
<div>
<button type="submit" class="btn btn-primary mb-2 me-2">Submit Booking Payment</button>
</div>
</div>


@else

@endif


</form>
</div>



</div>













</div>

</div>








</div>








</div>








</div>
<!--/ Content -->



@endsection
