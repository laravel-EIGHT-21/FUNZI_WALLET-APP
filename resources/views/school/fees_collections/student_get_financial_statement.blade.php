
@extends('school.body.admin_master')
@section('content')

@section('title')
Fees Collections Details
@endsection

                           

        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">
            
            
        <h3 class="py-3 mb-2">
              <span class="text-muted fw-light"> View /</span> {{$details['0']['student']['name']}}`s  Schoolfees  Financial Statement Generate
            </h3>


<div class="row"> 

<div class="mb-4">

<a href="{{ route('get.financial.statements')}}" class="btn rounded-pill btn-info" style="float:right;"><i class='tf-icons mdi mdi-arrow-left mdi-20px'></i>Back</a>

</div>

</div>


<div class="row">

<div class="col-xl-3 col-lg-5 col-md-5 order-1 order-md-0">
                <!-- User Card -->
                <div class="card mb-4">
                  <div class="card-body">


                    <h5 class="pb-3 border-bottom mb-3">Student`s Details</h5>
                    <div class="info-container">
                      <ul class="list-unstyled mb-4">

                    <li class="mb-3">
                    <span class="fw-medium text-heading me-2">Term : </span>
                    <span><b>{{$details['0']['term']['name']}}</b></span>
                    </li>


                        <li class="mb-3">
                          <span class="fw-medium text-heading me-2">Year:</span>
                          <span>{{$details['0']['year']}}</span>
                        </li>


                        <li class="mb-3">
                          <span class="fw-medium text-heading me-2">Class:</span>
                          <span>{{$details['0']['student_class']}}</span>
                        </li>


                        <li class="mb-3">
                          <span class="fw-medium text-heading me-2">Section:</span>
                          <span>{{$details['0']['student_day_boarding']}}</span>
                        </li>


                        <li class="mb-3">
                          <span class="fw-medium text-heading me-2">Student WalletID:</span>
                          <span>{{$details['0']['student_acct_no']}}</span>
                        </li>


                      

                      </ul>

                    </div>
                  </div>
                </div>
                <!-- /User Card -->

              </div>
              <!--/ User Sidebar -->
            

<div class="col-xl-9 col-lg-7 col-md-7 order-0 order-md-1">
 
            

<ul class="nav nav-pills flex-column flex-md-row mb-3">


<li class="nav-item">
<button type="button" class="nav-link active py-2" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-overview" aria-controls="navs-pills-justified-overview" aria-selected="true">Overview </button>
</li>


<li class="nav-item">
<button type="button" class="nav-link py-2" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-current-year-payments" aria-controls="navs-pills-justified-current-year-payments" aria-selected="false"> Other Terms</button>
</li>



<li class="nav-item">
<button type="button" class="nav-link py-2" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-financial-statements" aria-controls="navs-pills-justified-financial-statements" aria-selected="false">Financial Statements</button>
</li>



</ul>


<div class="tab-content">




<div class="tab-pane fade show active" id="navs-pills-justified-overview" role="tabpanel">

<div class="row text-nowrap">


<div class="col-md-6 mb-4">
<div class="card h-100">
<div class="card-body">
<div class="card-icon mb-3">
<div class="avatar">
<div class="avatar-initial rounded bg-label-success">
<i class='mdi mdi-currency-usd'></i>
</div>
</div>
</div>
@php 

$amount_paid = $details['0']['amount'];

@endphp
<div class="card-info">
<h6 class="card-title mb-3">Total Amount Paid For {{$details['0']['term']['name']}}</h6>
<div class="d-flex align-items-baseline mb-1 gap-1">
<h5 class="text-primary mb-0">ugx {{$amount_paid}}</h5>
</div>
</div>

</div>
</div>
</div>


<div class="col-md-6 mb-4">
<div class="card h-100">
<div class="card-body">
<div class="card-icon mb-3">
<div class="avatar">
<div class="avatar-initial rounded bg-label-warning">
<i class='mdi mdi-currency-usd'></i>
</div>
</div>
</div>
<div class="card-info">
<h6 class="card-title mb-3">Total Amount {{$details['0']['term']['name']}}</h6>
<div class="d-flex align-items-baseline mb-1 gap-1">
<h5 class="text-primary mb-0">ugx {{$details['0']['total_amount']}}</h5>
</div>
</div>

</div>
</div>
</div>



<div class="col-md-12 mb-4">
<div class="card h-100">
<div class="card-body">
<div class="card-icon mb-3">
<div class="avatar">
<div class="avatar-initial rounded bg-label-danger">
<i class='mdi mdi-currency-usd'></i>
</div>
</div>
</div>
<div class="card-info">
<h5 class="card-title mb-3">SchoolFees Balance For {{$details['0']['term']['name']}}</h5>
<div class="d-flex align-items-baseline mb-1 gap-1">

@php 

$balance = (float)$details['0']['total_amount']-(float)$amount_paid;

@endphp

<h5 class="text-primary mb-0">ugx {{$balance}}</h5>
</div>
</div>

</div>
</div>
</div>



</div>


</div>






<div class="tab-pane fade" id="navs-pills-justified-current-year-payments" role="tabpanel">
    <div class="row">

    <div class="card">
                                <div class="card-body">
     
                            <div class="table-responsive">
                            <table id="zero_config"
                            class="table border table-striped table-bordered text-nowrap">
                            <thead>
                            <!-- start row -->
                            <tr>

                              <th>Term</th>
                              <th>Year</th>
                              <th>Paid</th>
                              <th>Total</th>
                              <th>Balance</th>
                              <th>Actions</th>

                            </tr>
                            <!-- end row -->
                            </thead>
                            @foreach($otherfees_details as $key => $value )
                            <tbody>
                                <tr>

                                <td>{{ $value['term']['name']}}</td>
                                <td>{{ $value->year}}</td>

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



<td>


<div class="action-btn">
<a href="{{route('generate.student.financial.statement',$value->id)}}"  class="btn btn-sm btn-success"  title="Get Financial Statement">
<span class="mdi mdi-notebook-outline me-1"></span>
</a>
</div>



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





    
    
    <div class="tab-pane fade" id="navs-pills-justified-financial-statements" role="tabpanel">

    <div class="col-xl-9 col-lg-7 col-md-7 order-0 order-md-1">

<ul class="nav nav-pills flex-column flex-md-row mb-3">


<li class="nav-item">
<button type="button" class="nav-link active py-2" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-termly-statement" aria-controls="navs-pills-justified-termly-statement" aria-selected="true">Termly Statement</button>
</li>

<li class="nav-item">
<button type="button" class="nav-link py-2" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-yearly-statement" aria-controls="navs-pills-justified-yearly-statement" aria-selected="false">Yearly Statement</button>
</li>



</ul>


<div class="tab-content">


<div class="tab-pane fade show active" id="navs-pills-justified-termly-statement" role="tabpanel">

<div class="row text-nowrap">
    <div class="card mb-4">
                  <h5 class="card-header">Schoolfees Financial Statement For {{$details['0']['term']['name']}}</h5>

                  <form action="{{ route('get.student.termly.schoolfees.financial.statement',$details['0']['invoice_no']) }}" method="POST" target="_blank" >
                  @csrf


                  <input type="hidden" name="id" value="{{ $details['0']['invoice_no'] }}" />

                  

<div class="row">

<div class="col mb-4 mt-2">
<div class="form-floating form-floating-outline">
<input type="text" id="nameWithTitle" class="form-control" name="term_id"  required value="{{$details['0']['term']['name']}}" >
<label for="nameWithTitle">Term</label>
</div>

</div>
</div>



<div class="row">

<div class="col mb-4 mt-2">
<div class="form-floating form-floating-outline">
<input type="text" id="nameWithTitle" class="form-control" name="year"  required value="{{$details['0']['year']}}" >
<label for="nameWithTitle">Year</label>
</div>

</div>
</div>





  <div class="row">
  <div>
  <button type="submit" class="btn btn-primary mb-2 me-2">Generate Financial Statement</button>
  </div>
  </div>



  </form>
  </div>
  </div>

</div>




<div class="tab-pane fade" id="navs-pills-justified-yearly-statement" role="tabpanel">

<div class="row text-nowrap">
    <div class="card mb-4">
                  <h5 class="card-header">Schoolfees Financial Statement For {{$details['0']['year']}}</h5>

                  <form action="{{ route('get.student.yearly.schoolfees.financial.statement',$details['0']['student_acct_no']) }}" method="POST" target="_blank" >
                  @csrf

     
                  <input type="hidden" name="id" value="{{ $details['0']['student_acct_no'] }}" />



<div class="row">

<div class="col mb-4 mt-2">
<div class="form-floating form-floating-outline">
<input type="text" id="nameWithTitle" class="form-control" name="year"  required value="{{$details['0']['year']}}" >
<label for="nameWithTitle">Year</label>
</div>

</div>
</div>





  <div class="row">
  <div>
  <button type="submit" class="btn btn-primary mb-2 me-2">Generate Financial Statement</button>
  </div>
  </div>



  </form>
  </div>
  </div>


</div>

</div>


    </div>








</div>


            

            

              </div>

</div>







        
            
        </div>
                      <!--/ Content -->
                                  

@endsection 