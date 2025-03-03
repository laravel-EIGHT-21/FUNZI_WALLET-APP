
@extends('admin.body.admin_master')
@section('content')



@section('title')

All School Orders Payments Records

@endsection

@php 

$months = date('F Y');

$years = date('Y');

$month_payments = DB::table('schoolorders_payments_records')->where('month',$months)->sum('amount');

$year_payments = DB::table('schoolorders_payments_records')->where('year',$years)->sum('amount');




@endphp 

        
        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">
            
            

            <h4 class="py-3 mb-4">
              <span class="text-muted fw-light"><a href="{{route('admin.dashboard')}}">Home</a> /View /</span>All School Orders Payments Records
            </h4>
            

            
            
            
<div class="card mb-4">

      <div class="row gy-4 gy-sm-1">
            
            
<!-- Cards Payments Records Transactions -->

  <div class="col-lg-6 col-sm-6">
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
  <div class="col-lg-6 col-sm-6">
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
                        <th>Order No. </th>
                        <th>School </th>
                        <th>Amount Paid</th>
                        <th>Order Total</th>
                        <th>Balance</th>
                        <th>Month</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($payment_records as $key => $value )
                        <tr>

                        <td> {{ $value['order']['order_number']}}</td>
                        <td> {{ $value['school']['name']}}</td>
                        <td>
  
  
                            <span class="badge rounded-pill text-success bg-dark-success p-2 text-uppercase px-3"><b><i class='align-middle me-1'></i>ugx {{ $value->amount }}</b></span>
                            
                            
                            </td>
                            
                            
                            
                            <td>
                            
                            
                            <span class="badge rounded-pill text-primary bg-dark-info p-2 text-uppercase px-3"><b><i class='align-middle me-1'></i>ugx {{ $value->total_amount }}</b></span>
                            
                            
                            </td>
                            
                            
                            @php 
                            
                            $bal = (float)$value->total_amount-(float)$value->amount;
                            
                            @endphp
                            
                            
                            <td>
                            
                            
                            <span class="badge rounded-pill text-danger bg-dark-danger p-2 text-uppercase px-3"><b><i class='align-middle me-1'></i>ugx {{ $bal }}</b></span>
                            
                            
                            </td>

                            <td> {{ $value->month}}</td>
                            


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