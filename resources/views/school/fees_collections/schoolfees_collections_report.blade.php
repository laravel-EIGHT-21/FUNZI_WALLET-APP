
@extends('school.body.admin_master')
@section('content')
        


@section('title')

Schoolfees Collections Reports

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
              <span class="text-muted fw-light"><a href="{{route('dashboard')}}"> Home  </a>/View/</span> Schoolfees Collections Reports
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

        

            
<div class="col-xl-12 col-lg-7 col-md-7 order-0 order-md-1">

<ul class="nav nav-pills flex-column flex-md-row mb-3">

<li class="nav-item">
<button type="button" class="nav-link active py-2" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-termly" aria-controls="navs-pills-justified-termly" aria-selected="true"><i class="ti ti-user me-1"></i>Termly Reports </button>
</li>

<li class="nav-item">
<button type="button" class="nav-link py-2" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-yearly" aria-controls="navs-pills-justified-yearly" aria-selected="false"><i class="tf-icons ti ti-currency-dollar me-1"></i> Yearly Reports</button>
</li>

</ul>

<div class="tab-content">



<div class="tab-pane fade show active" id="navs-pills-justified-termly" role="tabpanel">

<div class="row">
                        <div class="col-12">

                        <h5 class="text">Schoolfees Collections By Term</h5>
    <div class="card mb-6">

<div class="card-body">

    <div class="row">
<div class="col-xl">
<div class="card mb-4">
<div class="card-header d-flex justify-content-between align-items-center">

</div>
<div class="card-body">
<form method="POST" action="{{ route('search-schoolfees-collection-by-term') }}" target="_blank">
@csrf
<div class="row">

<div class="col-md-6">
<div class="form-floating form-floating-outline">
<select id="term_id" name="term_id" required class="select2 form-select form-select-lg" data-allow-clear="true"">
            <option value="">Select Term</option>
            @foreach ($terms as $term)
            <option value="{{ $term->id }}">{{ $term->name }}</option>
            @endforeach

            </select>
            <label for="term_id">School Terms</label>
                </div>
</div>


<div class="col-md-6">
<div class="form-floating form-floating-outline">
<input class="form-control" type="text" name="year" id="html5-month-input" required />
<label for="html5-month-input">Year</label>
                </div>
</div>

</div>

<div class="col-md-3" style="padding-top: 10px;">

<button type="submit" class="btn btn-primary">Submit</button>


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






<div class="tab-pane fade" id="navs-pills-justified-yearly" role="tabpanel">

<div class="row">
                        <div class="col-12">

                        <h5 class="text">Schoolfees Collections By Year</h5>
    <div class="card mb-6">

<div class="card-body">

    <div class="row">
<div class="col-xl">
<div class="card mb-4">
<div class="card-header d-flex justify-content-between align-items-center">

</div>
<div class="card-body">
<form method="POST" action="{{ route('search-schoolfees-collection-by-year') }}" target="_blank">
@csrf
<div class="row">


<div class="col-md-6">
<div class="form-floating form-floating-outline">
<input class="form-control" type="text" name="year" id="html5-month-input" required />
<label for="html5-month-input">Year</label>
                </div>
</div>

</div>

<div class="col-md-3" style="padding-top: 10px;">

<button type="submit" class="btn btn-primary">Submit</button>


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





</div>

</div>


                        </div>
                        <!--/ Content -->





@endsection