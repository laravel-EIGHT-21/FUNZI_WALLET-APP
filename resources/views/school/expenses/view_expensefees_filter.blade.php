
@extends('school.body.admin_master')
@section('content')
        

@section('title')

@php

$school = Auth::user()->name;    
 
@endphp

{{ $school}}`s  Expenses Fees Filter | funziwallet

@endsection



@php


$school_id = Auth::user()->id;

$years = date('Y');

$term_one = DB::table('expenses')->where('school_id',$school_id)->where('term_id',1)->where('year',$years)->sum('amount');

$term_two = DB::table('expenses')->where('school_id',$school_id)->where('term_id',2)->where('year',$years)->sum('amount');

$term_three = DB::table('expenses')->where('school_id',$school_id)->where('term_id',3)->where('year',$years)->sum('amount');



@endphp




        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">

        <h4 class="py-3 mb-4">
              <span class="text-muted fw-light"><a href="{{route('dashboard')}}">Home</a> /View /</span> General Term Expenses Payments
            </h4>

                 
<br/>


          
<h5 class="py-3 mb-2"> All Expenses Fees Payments for Year {{$years}}</h5>
<div class="row gy-4">

  <!-- Cards SchoolFees Transactions -->
  <div class="col-lg-4 col-sm-6">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-center flex-wrap gap-2">
          <div class="avatar me-3">
            <div class="avatar-initial bg-label-danger rounded">
              <i class="mdi mdi-currency-usd mdi-24px">
              </i>
            </div>
          </div>
          <div class="card-info">
            <div class="d-flex align-items-center">
              <h4 class="mb-0">UGX {{ ($term_one) }}</h4>
              
            </div>
            <small>Total Expenses Fees For Term 1</small>
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
              <h4 class="mb-0">UGX {{ ($term_two) }}</h4>

            </div>
            <small>Total Expenses Fees For Term 2</small>
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
              <h4 class="mb-0">UGX {{ ($term_three) }}</h4>

            </div>
            <small>Total Expenses Fees For Term 3</small>
          </div>
        </div>
      </div>
    </div>
  </div>
 
  <!--/ Cards SchoolFees Transactions -->


</div>


<br/> <br/>


            
            <div class="row"> 

<div class="mb-4">

<a href="{{ route('view.expenses')}}" class="btn rounded-pill btn-warning" style="float:right;"><i class='mdi mdi-currency-usd mdi-24px'></i>Expenses Payments</a>

</div>

</div>


            <br/>

            

            
<div class="col-xl-12 col-lg-7 col-md-7 order-0 order-md-1">

<ul class="nav nav-pills flex-column flex-md-row mb-3">

<li class="nav-item">
<button type="button" class="nav-link active py-2" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-term1" aria-controls="navs-pills-justified-term1" aria-selected="true"><i class="ti ti-user me-1"></i>Term 1 Expenses </button>
</li>

<li class="nav-item">
<button type="button" class="nav-link py-2" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-term2" aria-controls="navs-pills-justified-term2" aria-selected="false"><i class="tf-icons ti ti-currency-dollar me-1"></i> Term 2 Expenses</button>
</li>


<li class="nav-item">
<button type="button" class="nav-link py-2" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-term3" aria-controls="navs-pills-justified-term3" aria-selected="false"><i class="tf-icons ti ti-currency-dollar me-1"></i> Term 3 Expenses</button>
</li>

</ul>

<div class="tab-content">




<div class="tab-pane fade show active" id="navs-pills-justified-term1" role="tabpanel">

<div class="row">
                        <div class="col-12">
                            <!-- ---------------------
                                    start Zero Configuration
                          
                                ---------------- -->
                            <div class="card">
                                <div class="card-body">
     
                                    <div class="table-responsive">
                                        <table id="file_export"
                                            class="table border table-striped table-bordered display text-nowrap" style="width:100%">
                                            <thead>
                                                <!-- start row -->
                                                <tr>
                                        <th>Expense</th>
                                      <th>Date</th>
                                      <th>Year</th>
                                      <th>Term</th>
                                      <th>Paid</th>
                                      <th>Total</th>
                                      <th>Balance</th>

                                                </tr>
                                                <!-- end row -->
                                            </thead>

                                            <tbody>
@foreach($expensefees_term1 as $key => $term1 )
<tr>

<td>{{ $term1['category']['name']}}</td>

<td>{{ $term1->date}}</td>

<td>{{ $term1->year}}</td>

<td>{{ $term1['term']['name']}}</td>


<td>

<span class="badge rounded-pill text-success bg-dark-info p-2 text-uppercase px-3">
  <b><i class='align-middle me-1'></i> 
  
  {{ $term1->amount }}



</b></span>


</td>

<td>

<span class="badge rounded-pill text-primary bg-dark-info p-2 text-uppercase px-3">
  <b><i class='align-middle me-1'></i> {{$term1->invoice_amount}} </b></span>


</td>
@php 

$bal1 = (float)$term1->invoice_amount-(float)$term1->amount;

@endphp

<td>

<span class="badge rounded-pill text-danger bg-dark-info p-2 text-uppercase px-3">
  <b><i class='align-middle me-1'></i> 
  {{ $bal1 }}


</b></span>


</td>



</tr>
@endforeach
</tbody>


                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- ---------------------
                                    end Zero Configuration
                                ---------------- -->


                        </div>
                    </div>


</div>    <!--/Term 1 SchoolFees Collections -->






<!--Term 2 SchoolFees Collections -->

<div class="tab-pane fade " id="navs-pills-justified-term2" role="tabpanel">


<div class="row">
                        <div class="col-12">
                            <!-- ---------------------
                                    start Zero Configuration
                          
                                ---------------- -->
                            <div class="card">
                                <div class="card-body">
     
                                    <div class="table-responsive">
                                        <table id="file_export2"
                                            class="table border table-striped table-bordered text-nowrap">
                                            <thead>
                                                <!-- start row -->
                                                <tr>
                                       <th>Expense</th>
                                      <th>Date</th>
                                      <th>Year</th>
                                      <th>Term</th>
                                      <th>Paid</th>
                                      <th>Total</th>
                                      <th>Balance</th>

                                                </tr>
                                                <!-- end row -->
                                            </thead>

                                            <tbody>
  @foreach($expensefees_term2 as $key => $term2 )
<tr>

<td>{{ $term2['category']['name']}}</td>

<td>{{ $term2->date}}</td>

<td>{{ $term2->year}}</td>

<td>{{ $term2['term']['name']}}</td>


<td>

<span class="badge rounded-pill text-success bg-dark-info p-2 text-uppercase px-3">
  <b><i class='align-middle me-1'></i> 
  
  {{ $term2->amount }}



</b></span>


</td>

<td>

<span class="badge rounded-pill text-primary bg-dark-info p-2 text-uppercase px-3">
  <b><i class='align-middle me-1'></i> {{$term2->invoice_amount}} </b></span>


</td>
@php 

$bal2 = (float)$term2->invoice_amount-(float)$term2->amount;

@endphp

<td>

<span class="badge rounded-pill text-danger bg-dark-info p-2 text-uppercase px-3">
  <b><i class='align-middle me-1'></i> 
  {{ $bal2 }}


</b></span>


</td>



</tr>
@endforeach
</tbody>



                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- ---------------------
                                    end Zero Configuration
                                ---------------- -->


                        </div>
                    </div>


</div>    <!--/Term 2 SchoolFees Collections -->





<!--Term 3 SchoolFees Collections -->

<div class="tab-pane fade" id="navs-pills-justified-term3" role="tabpanel">


<div class="row">
                        <div class="col-12">
                            <!-- ---------------------
                                    start Zero Configuration
                          
                                ---------------- -->
                            <div class="card">
                                <div class="card-body">
     
                                    <div class="table-responsive">
                                        <table id="file_export3"
                                            class="table border table-striped table-bordered text-nowrap">
                                            <thead>
                                                <!-- start row -->
                                                <tr>
                                        <th>Expense</th>
                                      <th>Date</th>
                                      <th>Year</th>
                                      <th>Term</th>
                                      <th>Paid</th>
                                      <th>Total</th>
                                      <th>Balance</th>
                                                </tr>
                                                <!-- end row -->
                                            </thead>

                                            <tbody>
                                            @foreach($expensefees_term3 as $key => $term3 )
<tr>

<td>{{ $term3['category']['name']}}</td>

<td>{{ $term3->date}}</td>

<td>{{ $term3->year}}</td>

<td>{{ $term3['term']['name']}}</td>


<td>

<span class="badge rounded-pill text-success bg-dark-info p-2 text-uppercase px-3">
  <b><i class='align-middle me-1'></i> 
  
  {{ $term3->amount }}



</b></span>


</td>

<td>

<span class="badge rounded-pill text-primary bg-dark-info p-2 text-uppercase px-3">
  <b><i class='align-middle me-1'></i> {{$term3->invoice_amount}} </b></span>


</td>
@php 

$bal3 = (float)$term3->invoice_amount-(float)$term3->amount;

@endphp

<td>

<span class="badge rounded-pill text-danger bg-dark-info p-2 text-uppercase px-3">
  <b><i class='align-middle me-1'></i> 
  {{ $bal3 }}


</b></span>


</td>




</tr>
@endforeach
</tbody>


                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- ---------------------
                                    end Zero Configuration
                                ---------------- -->


                        </div>
                    </div>


</div>    <!--/Term 3 SchoolFees Collections -->





</div>

</div>

 



            
                      </div>
                      <!--/ Content -->



@endsection