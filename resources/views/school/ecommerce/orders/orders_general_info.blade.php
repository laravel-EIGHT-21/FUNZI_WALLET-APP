                  @extends('school.body.admin_master')
                  @section('content')


                  @section('title')

                  All Orders General Information

                  @endsection

                  @php 

                  $months = date('F Y');

                  $years = date('Y');


                  $school_id = Auth::user()->id;

                  $month_payments = DB::table('schoolorders_payments_records')->where('month',$months)->where('school_id',$school_id)->sum('amount');

                  $year_payments = DB::table('schoolorders_payments_records')->where('year',$years)->where('school_id',$school_id)->sum('amount');




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

                  <th scope="col">Order No.</th>
                  <th scope="col">Order Items</th>
                  <th scope="col">Paid(UGX)</th>
                  <th scope="col">Total(UGX)</th>
                  <th scope="col">Balance(UGX)</th>
                  <th scope="col">Date</th>
                  <th scope="col">Order Status</th>


                  </tr>
                  </thead>
                  <tbody>
                  @foreach($payment_records as $key => $value )
                  <tr>

                  <td> {{ $value['order']['order_number']}}</td>

                  <td> {{ $value['order']['total_order_items']}}</td>

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


                  <span class="badge rounded-pill text-danger bg-dark-danger p-2 text-uppercase px-3"><b><i class='align-middle me-1'></i>UGX {{ $bal }}</b></span>


                  </td>



                  <td> {{ $value['order']['order_date']}}</td>




                  <td>

                  @if($value['order']['status'] == 'Order Pending')        
                  <span class="badge badge-pill badge-warning" style="background: maroon;">Order Pending </span>

                  @elseif($value['order']['status'] == 'Order Confirmed')
                  <span class="badge badge-pill badge-warning" style="background: #0000FF;">Order Confirmed </span>


                  @elseif($value['order']['status'] == 'Out for Delivery')
                  <span class="badge badge-pill badge-warning" style="background: rgb(245, 110, 209);">Out for Delivery </span>


                  @elseif($value['order']['status'] == 'Order Delivered')
                  <span class="badge badge-pill badge-warning" style="background: #008000;">Order  Delivered </span>


                  @elseif($value['order']['status'] == 'Order Cancelled')
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