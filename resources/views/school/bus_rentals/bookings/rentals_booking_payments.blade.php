@extends('school.body.admin_master')
@section('content')
        



@section('title')

Bus Rental Bookings Payments 

@endsection

@php 

$months = date('F Y');

$years = date('Y');


$school_id = Auth::user()->id;

$today_payments = App\Models\rental_bookings_payments::whereDate('created_at',Carbon\Carbon::today())->where('school_id',$school_id)->sum('amount');

$month_payments = DB::table('rental_bookings_payments')->where('school_id',$school_id)->where('month',$months)->sum('amount');

$year_payments = DB::table('rental_bookings_payments')->where('school_id',$school_id)->where('year',$years)->sum('amount');




@endphp 

        
        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">
            
            

            <h4 class="py-3 mb-4">
              <span class="text-muted fw-light"><a href="{{route('dashboard')}}">Home</a> /View /</span>Bus Rental Bookings Payments
            </h4>
            

            
            
            
<div class="card mb-4">

      <div class="row gy-4 gy-sm-1">
            
            
<!-- Cards SchoolFees Transactions -->
<div class="col-lg-4 col-sm-6">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-center flex-wrap gap-2">
          <div class="avatar me-3">
            <div class="avatar-initial bg-label-primary rounded">
              <i class="mdi mdi-currency-usd mdi-24px">
              </i>
            </div>
          </div>
          <div class="card-info">
            <div class="d-flex align-items-center">
              <h4 class="mb-0">UGX {{ ($today_payments) }}</h4>

            </div>
            <small>Todays Total</small>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-sm-6">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-center flex-wrap gap-2">
          <div class="avatar me-3">
            <div class="avatar-initial bg-label-success rounded">
              <i class="mdi mdi-currency-usd mdi-24px">
              </i>
            </div>
          </div>
          <div class="card-info">
            <div class="d-flex align-items-center">
              <h4 class="mb-0">UGX {{ ($month_payments) }}</h4>

            </div>
            <small>Current Monthly Total</small>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-sm-6">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-center flex-wrap gap-2">
          <div class="avatar me-3">
            <div class="avatar-initial bg-label-info rounded">
              <i class="mdi mdi-currency-usd mdi-24px">
              </i>
            </div>
          </div>
          <div class="card-info">
            <div class="d-flex align-items-center">
              <h4 class="mb-0">UGX {{ ($year_payments) }}</h4>

            </div>
            <small>Yearly Total</small>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--/ Cards SchoolFees Transactions -->
            </div>
            </div>
            


            <div class="row">
                        <div class="col-12">

            <!-- SchoolFees Table -->
<!-- ---------------------
                                    start Zero Configuration
                          
                                ---------------- -->
                        <div class="card">
                        <div class="card-body">

                        <div class="table-responsive">
                        <table id="file_export"
                        class="table border table-striped table-bordered display text-nowrap">
                        <thead>
                        <!-- start row -->
                        <tr>
                       <th> Booking No. </th>
    <th>Total Rentals
    <th> Date</th>
    <th> Booking Status</th>
    <th>Payments (UGX)</th>

    </tr>
    </thead>
    <tbody>
    @foreach($payments as $key => $value )
    <tr>

    <td> {{ $value['booking']['booking_no']}}</td>
    <td> {{ $value['booking']['total_rentals']}}</td>
    <td> {{ $value->payment_date}} </td>


    @php
      $status = $value->booking->status;
    @endphp
    <td>
        @if($status == 'Bookings Pending')        
        <span class="badge badge-pill badge-warning" style="background: maroon;">Bookings Pending </span>

        @elseif($status == 'Bookings Confirmed')
        <span class="badge badge-pill badge-warning" style="background: #21f32f;">Bookings Confirmed </span>


        @elseif($status == 'Bookings Cancelled')
        <span class="badge badge-pill badge-" style="background: red;">Bookings Cancelled </span>



        @endif   

    </td>

    <td>

    <span class="badge rounded-pill text-primary bg-dark-primary p-2 text-uppercase px-3"><b><i class='align-middle me-1'></i>UGX {{ $value->amount }}</b></span>

    </td>


                        </tr>
                        @endforeach
                        </tbody>

                        </table>
                        </div>


                        </div>
                        </div>

                        </div>
                        </div>
                        <!-- ---------------------
                        end Zero Configuration
                        ---------------- -->



                        </div>
                        <!--/ Content -->


                                  

@endsection 