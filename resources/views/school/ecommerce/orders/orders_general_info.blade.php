@extends('school.body.admin_master')
@section('content')
        

@section('title')
 
All Orders General Information

@endsection

@php 

$months = date('F Y');

$years = date('Y');


$school_id = Auth::user()->id;

$month_orders_amounts = DB::table('orders')->where('order_month',$months)->where('status','Order Delivered')->where('school_id',$school_id)->sum('amount');

$year_orders_amounts = DB::table('orders')->where('order_year',$years)->where('status','Order Delivered')->where('school_id',$school_id)->sum('amount');





@endphp 

                
        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">
            
            

            <h4 class="py-3 mb-4">
              <span class="text-muted fw-light"><a href="{{route('dashboard')}}">Home</a> /View /</span>All School Orders General Information
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
              <h4 class="mb-0">UGX {{ ($month_orders_amounts) }}</h4>

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
              <h4 class="mb-0">UGX {{ ($year_orders_amounts) }}</h4>

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
                                  
                            <th scope="col">Order No.</th>
                            <th scope="col">Order Items</th>
                            <th scope="col">Price(UGX)</th>
                            <th scope="col"> Pay Status</th>
                            <th scope="col">Order Date</th>
                            <th scope="col">Order Status</th>


                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $key => $value )
                        <tr>

                        <td> {{ $value->order_number}}</td>

                        <td> {{ $value->total_order_items}}</td>

                    <td>

                    <span class="badge rounded-pill text-success bg-dark-success p-2 text-uppercase px-3"><b><i class='align-middle me-1'></i>UGX {{ $value->amount }}</b></span>

                    </td>



                    <td> 

                    <span class="badge rounded-pill text-warning bg-dark-warning p-2 text-uppercase px-3"><b><i class='align-middle me-1'></i> {{ $value->payment_status}}</b></span>


                    </td>



                            <td> {{ $value->order_date}}</td>
                            

                            

                            <td>
                                
                            @if($value->status == 'Order Pending')        
                    <span class="badge badge-pill badge-warning" style="background: maroon;">Order Pending </span>

                    @elseif($value->status == 'Order Confirmed')
                    <span class="badge badge-pill badge-warning" style="background: #0000FF;">Order Confirmed </span>


                    @elseif($value->status == 'Out for Delivery')
                    <span class="badge badge-pill badge-warning" style="background: rgb(245, 110, 209);">Out for Delivery </span>


                    @elseif($value->status == 'Order Delivered')
                    <span class="badge badge-pill badge-warning" style="background: #008000;">Order  Delivered </span>

                  
                    @elseif($value->status == 'Order Cancelled')
                    <span class="badge badge-pill badge-" style="background: red;">Order Cancelled </span>

                   

                  @endif    
                            
                            
                            
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