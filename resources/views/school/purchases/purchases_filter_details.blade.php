  
@extends('school.body.admin_master')
@section('content')
        

@section('title')
@php

$school = Auth::user()->name;    
 
@endphp

{{ $school}}`s  Purchases Information  By Term | funziwallet

@endsection




@php


$school_id = Auth::user()->id;

$years = date('Y');

$term_one = DB::table('purchase_stocks')->where('school_id',$school_id)->where('term_id',1)->where('year',$years)->sum('total_price');

$term_two = DB::table('purchase_stocks')->where('school_id',$school_id)->where('term_id',2)->where('year',$years)->sum('total_price');

$term_three = DB::table('purchase_stocks')->where('school_id',$school_id)->where('term_id',3)->where('year',$years)->sum('total_price');



@endphp



        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">

        <h4 class="py-3 mb-4">
              <span class="text-muted fw-light"><a href="{{route('dashboard')}}">Home</a> /View /</span> All School Purchases Information Filter By Term
            </h4>

            
            
<br/>


          
<h5 class="py-3 mb-2"> All School Purchases for Year {{$years}}</h5>
<div class="row gy-4">

  <!-- Cards Purchases Transactions -->
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
            <small>Total Amount For Term 1</small>
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
            <small>Total Amount For Term 2</small>
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
            <small>Total Amount For Term 3</small>
          </div>
        </div>
      </div>
    </div>
  </div>
 
  <!--/ Cards Purchases Transactions -->


</div>


<br/> 

            

            <div class="row"> 

<div class="mb-4">

<a href="{{ route('view.all.purchases')}}" class="btn rounded-pill btn-info" style="float:right;"><i class='mdi mdi-currency-usd mdi-24px'></i>All Purchases Details </a>

</div>

</div>


            
<div class="col-xl-12 col-lg-7 col-md-7 order-0 order-md-1">

<ul class="nav nav-pills flex-column flex-md-row mb-3">

<li class="nav-item">
<button type="button" class="nav-link active py-2" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-term1" aria-controls="navs-pills-justified-term1" aria-selected="true"><i class="ti ti-user me-1"></i>Term 1 Purchases </button>
</li>

<li class="nav-item">
<button type="button" class="nav-link py-2" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-term2" aria-controls="navs-pills-justified-term2" aria-selected="false"><i class="tf-icons ti ti-currency-dollar me-1"></i> Term 2 Purchases</button>
</li>


<li class="nav-item">
<button type="button" class="nav-link py-2" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-term3" aria-controls="navs-pills-justified-term3" aria-selected="false"><i class="tf-icons ti ti-currency-dollar me-1"></i> Term 3 Purchases</button>
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
                                            class="table border table-striped table-bordered text-nowrap">
                                            <thead>
                                                <!-- start row -->
                                                <tr>
                                      <th>Item</th>
                                      <th>Date</th>
                                      <th>Year</th>
                                      <th>Term</th>
                                      <th>InvoiceNo</th>
                                      <th>Qty</th>
                                      <th>Unit Px.</th>
                                      <th>Total Px.</th>

                                                </tr>
                                                <!-- end row -->
                                            </thead>

                                            <tbody>
@foreach($purchases_term1 as $key => $term1 )
<tr>


<td>{{ $term1['purchase']['name']}}</td>

<td>{{ $term1->date}}</td>


<td>{{ $term1->year}}</td>

<td>{{ $term1['term']['name']}}</td>


<td>{{ $term1->invoice_no}}</td>


<td>{{ $term1->item_qty}}</td>

<td>

<span class="badge rounded-pill text-success bg-dark-info p-2 text-uppercase px-3">
  <b><i class='align-middle me-1'></i> 
  
  UGX {{ $term1->unit_price }}



</b></span>


</td>

<td>

<span class="badge rounded-pill text-primary bg-dark-info p-2 text-uppercase px-3">
  <b><i class='align-middle me-1'></i>UGX {{$term1->total_price}} </b></span>


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


</div>    <!--/Term 1 Puchases -->






<!--Term 2 Purchases Collections -->

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

                                                <th>Item</th>
                                      <th>Date</th>
                                      <th>Year</th>
                                      <th>Term</th>
                                      <th>InvoiceNo</th>
                                      <th>Qty</th>
                                      <th>Unit Px.</th>
                                      <th>Total Px.</th>

                                                </tr>
                                                <!-- end row -->
                                            </thead>

                                            <tbody>
@foreach($purchases_term2 as $key => $term2 )
<tr>


<td>{{ $term2['purchase']['name']}}</td>

<td>{{ $term2->date}}</td>


<td>{{ $term1->year}}</td>

<td>{{ $term1['term']['name']}}</td>


<td>{{ $term2->invoice_no}}</td>


<td>{{ $term2->item_qty}}</td>

<td>

<span class="badge rounded-pill text-success bg-dark-info p-2 text-uppercase px-3">
  <b><i class='align-middle me-1'></i> 
  
 UGX {{ $term2->unit_price }}



</b></span>


</td>


<td>

<span class="badge rounded-pill text-primary bg-dark-info p-2 text-uppercase px-3">
  <b><i class='align-middle me-1'></i>UGX {{$term2->total_price}} </b></span>


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


</div>    <!--/Term 2 Puchases -->





<!--Term 3 Purchases Collections -->

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
                                                <th>Item</th>
                                      <th>Date</th>
                                      <th>Year</th>
                                      <th>Term</th>
                                      <th>InvoiceNo</th>
                                      <th>Qty</th>
                                      <th>Unit Px.</th>
                                      <th>Total Px.</th>

                                                </tr>
                                                <!-- end row -->
                                            </thead>

                                            <tbody>
@foreach($purchases_term3 as $key => $term3 )
<tr>


<td>{{ $term3['purchase']['name']}}</td>

<td>{{ $term3->date}}</td>


<td>{{ $term1->year}}</td>

<td>{{ $term1['term']['name']}}</td>

<td>{{ $term3->invoice_no}}</td>

<td>{{ $term3->item_qty}}</td>


<td>

<span class="badge rounded-pill text-success bg-dark-info p-2 text-uppercase px-3">
  <b><i class='align-middle me-1'></i> 
  
  UGX {{ $term3->unit_price }}



</b></span>


</td>


<td>

<span class="badge rounded-pill text-primary bg-dark-info p-2 text-uppercase px-3">
  <b><i class='align-middle me-1'></i>UGX {{$term3->total_price}} </b></span>


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


</div>    <!--/Term 3 Puchases -->





</div>

</div>



            
            
                      </div>
                      <!--/ Content -->



@endsection