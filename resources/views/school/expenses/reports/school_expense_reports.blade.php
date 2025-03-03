
@extends('school.body.admin_master')
@section('content')
        


@section('title')

School Expenses Reports

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
              <span class="text-muted fw-light"><a href="{{route('dashboard')}}"> Home  </a>/View/</span>General School Expenses Reports
            </h4>


<br/>

          
<h5 class="py-3 mb-2"> All Termly Expenses Fees Payments for Year {{$years}}</h5>
<div class="row gy-4">

  <!-- Cards School Expenses -->
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
 
  <!--/ Cards School Expenses -->


</div>



<br/> <br/>

        


    <!--All Expenses Reports -->
    <div class="col-xl-12 col-lg-7 col-md-7 order-0 order-md-1">

    <ul class="nav nav-pills flex-column flex-md-row mb-3">


    <li class="nav-item">
    <button type="button" class="nav-link active py-2" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-expense-reports" aria-controls="navs-pills-justified-expense-reports" aria-selected="true"> Expenses Reports </button>
    </li>



    <li class="nav-item">
    <button type="button" class="nav-link py-2" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-category-reports" aria-controls="navs-pills-justified-category-reports" aria-selected="false"> Category Reports</button>
    </li>



    </ul>


    <div class="tab-content">



    <div class="tab-pane fade show active" id="navs-pills-justified-expense-reports" role="tabpanel">

    
    <div class="col-xl-9 col-lg-7 col-md-7 order-0 order-md-1">

<ul class="nav nav-pills flex-column flex-md-row mb-3">


<li class="nav-item">
<button type="button" class="nav-link active py-2" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-expense-termly-reports" aria-controls="navs-pills-justified-expense-termly-reports" aria-selected="true">Termly Reports </button>
</li>

<li class="nav-item">
<button type="button" class="nav-link py-2" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-expense-yearly-reports" aria-controls="navs-pills-justified-expense-yearly-reports" aria-selected="false">Yearly Reports</button>
</li>



</ul>


<div class="tab-content">


<div class="tab-pane fade show active" id="navs-pills-justified-expense-termly-reports" role="tabpanel">

<div class="row">
                        <div class="col-12">

                        <h5 class="text">School Expenses By Term</h5>
    <div class="card mb-6">

<div class="card-body">

    <div class="row">
<div class="col-xl">
<div class="card mb-4">
<div class="card-header d-flex justify-content-between align-items-center">

</div>
<div class="card-body">
<form method="POST" action="{{ route('search-school-expenses-by-term') }}" target="_blank">
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

</div>




<div class="tab-pane fade" id="navs-pills-justified-expense-yearly-reports" role="tabpanel">


<div class="row">
                        <div class="col-12">

                        <h5 class="text">School Expenses By Year</h5>
    <div class="card mb-6">

<div class="card-body">

    <div class="row">
<div class="col-xl">
<div class="card mb-4">
<div class="card-header d-flex justify-content-between align-items-center">

</div>
<div class="card-body">
<form method="POST" action="{{ route('search-school-expenses-by-year') }}" target="_blank">
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




    
    <div class="tab-pane fade" id="navs-pills-justified-category-reports" role="tabpanel">

    <div class="col-xl-9 col-lg-7 col-md-7 order-0 order-md-1">

<ul class="nav nav-pills flex-column flex-md-row mb-3">


<li class="nav-item">
<button type="button" class="nav-link active py-2" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-category-termly-reports" aria-controls="navs-pills-justified-category-termly-reports" aria-selected="true">Category Termly Report </button>
</li>

<li class="nav-item">
<button type="button" class="nav-link py-2" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-category-yearly-reports" aria-controls="navs-pills-justified-category-yearly-reports" aria-selected="false">Category Yearly Report</button>
</li>



</ul>


<div class="tab-content">


<div class="tab-pane fade show active" id="navs-pills-justified-category-termly-reports" role="tabpanel">

<div class="row">
                        <div class="col-12">

                        <h5 class="text">Expense Category By Term</h5>
    <div class="card mb-6">

<div class="card-body">

    <div class="row">
<div class="col-xl">
<div class="card mb-4">
<div class="card-header d-flex justify-content-between align-items-center">

</div>
<div class="card-body">
<form method="POST" action="{{ route('search-school-expense-category-by-term') }}" target="_blank">
@csrf


<div class="row">

<div class="col mb-4 mt-2">
<div class="form-floating form-floating-outline">
<select id="category_id" name="category_id" required class="select2 form-select form-select-lg" data-allow-clear="true"">
<option value="">Select Category</option>
@foreach ($categories as $cate)
<option value="{{ $cate->id }}">{{ $cate->name }}</option>
@endforeach

</select>
<label for="category_id">Expense Categories</label>
</div>
</div>
</div>





<div class="row">

<div class="col mb-4 mt-2">
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
</div>

<div class="row">
<div class="col mb-4 mt-2">
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




<div class="tab-pane fade" id="navs-pills-justified-category-yearly-reports" role="tabpanel">


<div class="row">
                        <div class="col-12">

                        <h5 class="text">Expense Category By Year</h5>
    <div class="card mb-6">

<div class="card-body">

    <div class="row">
<div class="col-xl">
<div class="card mb-4">
<div class="card-header d-flex justify-content-between align-items-center">

</div>
<div class="card-body">
<form method="POST" action="{{ route('search-school-expense-category-by-year') }}" target="_blank">
@csrf




<div class="row">

<div class="col mb-4 mt-2">
<div class="form-floating form-floating-outline">
<select id="category_id" name="category_id" required class="select2 form-select form-select-lg" data-allow-clear="true"">
<option value="">Select Category</option>
@foreach ($categories as $cate)
<option value="{{ $cate->id }}">{{ $cate->name }}</option>
@endforeach

</select>
<label for="category_id">Expense Categories</label>
</div>
</div>
</div>




<div class="row">

<div class="col mb-4 mt-2">
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










    </div>
    <!--/ End Of Tab-content -->

            


                        </div>
                        <!--/ Content -->





@endsection