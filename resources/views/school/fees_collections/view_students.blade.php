
@extends('school.body.admin_master')
@section('content')
        



@section('title')

Fees Collections | funziwallet
@endsection



@php 


$school_code = Auth::user()->school_id_no;


$years = date('Y');



$term_one_fees = DB::table('students_schoolfees_records')->where('school_id',$school_code)->where('term_id',1)->where('year',$years)->sum('amount');

$term_two_fees = DB::table('students_schoolfees_records')->where('school_id',$school_code)->where('term_id',2)->where('year',$years)->sum('amount');

$term_three_fees = DB::table('students_schoolfees_records')->where('school_id',$school_code)->where('term_id',3)->where('year',$years)->sum('amount');



@endphp



        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">

        <h4 class="py-3 mb-4">
              <span class="text-muted fw-light"><a href="{{route('dashboard')}}">Home</a> /View /</span> Students Schoolfees Collections Information 
            </h4>

            
            
<br/>


          
<h5 class="py-3 mb-2"> All Schoolfees Collections for Year {{$years}}</h5>
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
              <h4 class="mb-0">UGX {{ ($term_one_fees) }}</h4>
              
            </div>
            <small>Total Schoolfees For Term 1</small>
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
              <h4 class="mb-0">UGX {{ ($term_two_fees) }}</h4>

            </div>
            <small>Total Schoolfees For Term 2</small>
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
              <h4 class="mb-0">UGX {{ ($term_three_fees) }}</h4>

            </div>
            <small>Total Schoolfees For Term 3</small>
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

<a href="{{ route('view.schoolfees.collections.filter')}}" class="btn rounded-pill btn-danger" style="float:right;"><i class='mdi mdi-currency-usd mdi-24px'></i>Schoolfees Filter </a>

</div>

</div>

            <br/>

            

            
<div class="col-xl-12 col-lg-7 col-md-7 order-0 order-md-1">

<ul class="nav nav-pills flex-column flex-md-row mb-3">

<li class="nav-item">
<button type="button" class="nav-link active py-2" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-term1" aria-controls="navs-pills-justified-term1" aria-selected="true"><i class="ti ti-user me-1"></i>Term 1 SchoolFees </button>
</li>

<li class="nav-item">
<button type="button" class="nav-link py-2" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-term2" aria-controls="navs-pills-justified-term2" aria-selected="false"><i class="tf-icons ti ti-currency-dollar me-1"></i> Term 2 SchoolFees</button>
</li>


<li class="nav-item">
<button type="button" class="nav-link py-2" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-term3" aria-controls="navs-pills-justified-term3" aria-selected="false"><i class="tf-icons ti ti-currency-dollar me-1"></i> Term 3 SchoolFees</button>
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
                                        <table id="zero_config"
                                            class="table border table-striped table-bordered text-nowrap">
                                            <thead>
                                                <!-- start row -->
                                                <tr>
                                                <th>Details</th>
                                      <th>Students</th>
                                      <th>Class</th>
                                      <th>Section</th>
                                      <th>Year</th>
                                      <th>Paid</th>
                                      <th>Total</th>
                                      <th>Balance</th>

                                                </tr>
                                                <!-- end row -->
                                            </thead>

                                            <tbody>
@foreach($schoolfees_term1 as $key => $term1 )
<tr>


<td>

                  
<div class="action-btn">
  <a href="{{route('student.fees.collections.details',$term1->invoice_no)}}" target="_blank"  class="btn btn-sm btn-success"  title="Fees Collections Details">
  <span class="mdi mdi-notebook-outline "></span>
  </a>

  <a href="{{route('student.fees.update',$term1->id)}}" class="btn btn-sm btn-info"  title="Update Fees Amount">
  <span class="mdi mdi-square-edit-outline me-1"></span>
  </a>

</div>

</td>

<td>{{ $term1['student']['name']}}</td>

<td>{{ $term1->student_class}}</td>

<td>{{ $term1->student_day_boarding}}</td>
<td>{{ $term1->year}}</td>

<td>

<span class="badge rounded-pill text-success bg-dark-info p-2 text-uppercase px-3">
  <b><i class='align-middle me-1'></i> 
  
  UGX {{ $term1->amount }}



</b></span>


</td>

<td>

<span class="badge rounded-pill text-primary bg-dark-info p-2 text-uppercase px-3">
  <b><i class='align-middle me-1'></i>UGX {{$term1->total_amount}} </b></span>


</td>
@php 

$bal1 = (float)$term1->total_amount-(float)$term1->amount;

@endphp

<td>

<span class="badge rounded-pill text-danger bg-dark-info p-2 text-uppercase px-3">
  <b><i class='align-middle me-1'></i> 
  UGX {{ $bal1 }}


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
                                        <table id="one_config"
                                            class="table border table-striped table-bordered text-nowrap">
                                            <thead>
                                                <!-- start row -->
                                                <tr>
                                                <th>Details</th>
                                      <th>Students</th>
                                      <th>Class</th>
                                      <th>Section</th>
                                      <th>Year</th>
                                      <th>Paid</th>
                                      <th>Total</th>
                                      <th>Balance</th>
                                                </tr>
                                                <!-- end row -->
                                            </thead>

                                            <tbody>
@foreach($schoolfees_term2 as $key => $term2 )
<tr>


<td>

                  
<div class="action-btn">
  <a href="{{route('student.fees.collections.details',$term2->invoice_no)}}" target="_blank"  class="btn btn-sm btn-success"  title="Fees Collections Details">
  <span class="mdi mdi-notebook-outline me-1"></span>
  </a>


  <a href="{{route('student.fees.update',$term2->id)}}" class="btn btn-sm btn-info"  title="Update Fees Amount">
  <span class="mdi mdi-square-edit-outline me-1"></span>
  </a>

</div>

</td>


<td>{{ $term2['student']['name']}}</td>

<td>{{ $term2->student_class}}</td>

<td>{{ $term2->student_day_boarding}}</td>
<td>{{ $term2->year}}</td>

<td>

<span class="badge rounded-pill text-success bg-dark-info p-2 text-uppercase px-3">
  <b><i class='align-middle me-1'></i> 
  
 UGX {{ $term2->amount }}



</b></span>


</td>


<td>

<span class="badge rounded-pill text-primary bg-dark-info p-2 text-uppercase px-3">
  <b><i class='align-middle me-1'></i>UGX {{$term2->total_amount}} </b></span>


</td>
@php 

$bal2 = (float)$term2->total_amount-(float)$term2->amount;

@endphp

<td>

<span class="badge rounded-pill text-danger bg-dark-info p-2 text-uppercase px-3">
  <b><i class='align-middle me-1'></i> 
 UGX {{ $bal2 }}


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
                                        <table id="two_config"
                                            class="table border table-striped table-bordered text-nowrap">
                                            <thead>
                                                <!-- start row -->
                                                <tr>
                                                <th>Details</th>
                                       <th>Students</th>
                                      <th>Class</th>
                                      <th>Section</th>
                                      <th>Year</th>
                                      <th>Paid</th>
                                      <th>Total</th>
                                      <th>Balance</th>
                                                </tr>
                                                <!-- end row -->
                                            </thead>

                                            <tbody>
@foreach($schoolfees_term3 as $key => $term3 )
<tr>


<td>

                  
<div class="action-btn">
  <a href="{{route('student.fees.collections.details',$term3->invoice_no)}}" target="_blank"  class="btn btn-sm btn-success"  title="Fees Collections Details">
  <span class="mdi mdi-notebook-outline me-1"></span>
  </a>


  <a href="{{route('student.fees.update',$term3->id)}}" class="btn btn-sm btn-info"  title="Update Fees Amount">
  <span class="mdi mdi-square-edit-outline me-1"></span>
  </a>

</div>

</td>


<td>{{ $term3['student']['name']}}</td>

<td>{{ $term3->student_class}}</td>

<td>{{ $term3->student_day_boarding}}</td>
<td>{{ $term3->year}}</td>


<td>

<span class="badge rounded-pill text-success bg-dark-info p-2 text-uppercase px-3">
  <b><i class='align-middle me-1'></i> 
  
  UGX {{ $term3->amount }}



</b></span>


</td>


<td>

<span class="badge rounded-pill text-primary bg-dark-info p-2 text-uppercase px-3">
  <b><i class='align-middle me-1'></i>UGX {{$term3->total_amount}} </b></span>


</td>
@php 

$bal3 = (float)$term3->total_amount-(float)$term3->amount;

@endphp

<td>

<span class="badge rounded-pill text-danger bg-dark-info p-2 text-uppercase px-3">
  <b><i class='align-middle me-1'></i> 
  UGX {{ $bal3 }}


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