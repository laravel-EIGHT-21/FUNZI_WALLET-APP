

@extends('tours_travels.body.admin_master')
@section('content')

@section('title')

Tour Bookings Payments Transactions

@endsection

@php 

$months = date('F Y');

$years = date('Y');

$today_payments = App\Models\tour_payments::whereDate('created_at',Carbon\Carbon::today())->sum('amount');

$month_payments = DB::table('tour_payments')->where('month',$months)->sum('amount');

$year_payments = DB::table('tour_payments')->where('year',$years)->sum('amount');




@endphp 

        
        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">
            
            

            <h4 class="py-3 mb-4">
              <span class="text-muted fw-light"><a href="{{route('tour.operator.dashboard')}}">Home</a> /View /</span>All Tour Bookings Payments
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
                        <th>Tour Booking No. </th>
                        <th>School </th>
                        <th> Date</th>
                        <th>Payments (UGX)</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($payments as $key => $value )
                        <tr>

                        <td> {{ $value['booking']['booking_number']}}</td>
                        <td> {{ $value['school']['name']}}</td>
                        <td> {{ $value->payment_date}}</td>
                        <td> {{ $value->amount}}</td>


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