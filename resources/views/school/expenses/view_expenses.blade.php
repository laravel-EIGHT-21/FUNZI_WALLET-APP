 
@extends('school.body.admin_master')
@section('content')
        



@section('title')

Expenses Fees Information | funziwallet
 
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
              <span class="text-muted fw-light"><a href="{{route('dashboard')}}">Home</a> /View /</span> All Expenses Fees Information 
            </h4>

            
            
<br/>


          
<h5 class="py-3 mb-2"> All Expenses Fees for Year {{$years}}</h5>
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

<a href="{{ route('view.expenses.filter')}}" class="btn rounded-pill btn-danger" style="float:center;"><i class='mdi mdi-currency-usd mdi-24px'></i>Expenses Fees Filter </a>

</div>



<div class="mb-4">
<button type="button" class="btn rounded-pill btn-label-primary" style="float:right;" data-bs-toggle="modal" data-bs-target="#addExpense"><i class='tf-icons mdi mdi-plus mdi-20px'></i>New Expense Data</button>
</div>

</div>



          <!-- Modal -->
          <div class="modal fade" id="addExpense" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="modalCenterTitle">Enter Expense Fees Information</h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form  method="post" action="{{ route('expense.fees.store') }}"  class="row g-3 needs-validation" novalidate>
                                @csrf
                <div class="modal-body">


                  <div class="row g-2">

 
                    <div class="col mb-4 mt-2">
                    <div class="form-floating form-floating-outline">
                    <select id="category_id" name="category_id" required class="select2 form-select form-select-lg" data-allow-clear="true">
                    <option value="">Select Category</option>
                    @foreach ($categories as $cate)
                    <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                    @endforeach

                    </select>
                    <label for="category_id">Expense Category</label>
                    </div>
                    </div>
                    
                    <div class="col mb-4 mt-2">
                    <div class="form-floating form-floating-outline">
                    <select id="term_id" name="term_id" required class="select2 form-select form-select-lg" data-allow-clear="true">
                    <option value="">Select Term</option>
                    @foreach ($terms as $term)
                    <option value="{{ $term->id }}">{{ $term->name }}</option>
                    @endforeach

                    </select>
                    <label for="term_id">School Term</label>
                    </div>
                    </div>

                  </div>





              <div class="row g-2">


              <div class="col mb-4 mt-2">
              <div class="form-floating form-floating-outline">
              <input type="text" id="invoice_amount" class="form-control" maxlength="7" name="invoice_amount" required>
              <label for="invoice_amount">Invoice Amount</label> 
              </div>
              </div>


              <div class="col mb-4 mt-2">
              <div class="form-floating form-floating-outline">
              <input type="text" id="amount" class="form-control" maxlength="7" name="amount" required>
              <label for="amount">Enter Expense Amount Paid</label> 
              </div>
              </div>

              </div>



              <div class="row g-2">


<div class="col mb-4 mt-2">
<div class="form-floating form-floating-outline">
<input type="date" id="date" class="form-control" name="date" required>
<label for="date">Enter Date</label> 
</div>
</div>


<div class="col mb-4 mt-2">
<div class="form-floating form-floating-outline">
<input type="text" id="year" class="form-control" name="year" required>
<label for="year">Enter Year</label> 
</div>
</div>

</div>



<div class="row g-2">


<div class="col mb-4 mt-2">
<div class="form-floating form-floating-outline">
<select id="payment_type" name="payment_type" class="select2 form-select" data-allow-clear="true">
<option value="">Select Type</option>
<option value="Cash">Cash</option>
<option value="MobileMoney">Mobile Money</option>
</select>
<label for="payment_type">Payment Type</label>
</div>
</div>


<div class="col mb-4 mt-2">
<div class="form-floating form-floating-outline">
<input class="form-control" type="text" name="invoice_no" id="html5-text-input" />
<label for="html5-text-input">Invoice No</label>   
</div>
</div>

</div>



<div class="row">



<div class="col mb-4 mt-2">
<div class="form-floating form-floating-outline">
<input class="form-control" type="text" name="notes" id="html5-text-input" />
<label for="html5-text-input">Notes</label>   
</div>
</div>

</div>





                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>
                      <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
                </form>
              </div>
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
                                        <table id="zero_config"
                                            class="table border table-striped table-bordered text-nowrap">
                                            <thead>
                                                <!-- start row -->
                                                <tr>
                                                <th>Details</th>
                                      <th>Expense</th>
                                      <th>Date</th>
                                      <th>InvoiceNo</th>
                                      <th>Paid</th>
                                      <th>Total</th>
                                      <th>Balance</th>

                                                </tr>
                                                <!-- end row -->
                                            </thead>

                                            <tbody>
@foreach($expensefees_term1 as $key => $term1 )
<tr>


<td>

                  
<div class="action-btn">
  <a href="{{route('expense.fees.details',$term1->invoice_no)}}" target="_blank"  class="btn btn-sm btn-success"  title="Expense Fees Details">
  <span class="mdi mdi-notebook-outline me-1"></span>
  </a>

  <a href="{{route('expense.fees.edit',$term1->id)}}" title="Edit Expense" class="btn btn-sm btn-info">
<i class="mdi mdi-square-edit-outline me-1"></i>
</a>


</div>

</td>

<td>{{ $term1['category']['name']}}</td>

<td>{{ $term1->date}}</td>

<td>{{ $term1->invoice_no}}</td>

<td>

<span class="badge rounded-pill text-success bg-dark-info p-2 text-uppercase px-3">
  <b><i class='align-middle me-1'></i> 
  
  UGX {{ $term1->amount }}



</b></span>


</td>

<td>

<span class="badge rounded-pill text-primary bg-dark-info p-2 text-uppercase px-3">
  <b><i class='align-middle me-1'></i>UGX {{$term1->invoice_amount}} </b></span>


</td>
@php 

$bal1 = (float)$term1->invoice_amount-(float)$term1->amount;

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


</div>    <!--/Term 1 Expenses -->




<!--Term 2 Expenses -->

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
                                                <th>Expense</th>
                                      <th>Date</th>
                                      <th>InvoiceNo</th>
                                      <th>Paid</th>
                                      <th>Total</th>
                                      <th>Balance</th>
                                                </tr>
                                                <!-- end row -->
                                            </thead>

                                            <tbody>
@foreach($expensefees_term2 as $key => $term2 )
<tr>


<td>

                  
<div class="action-btn">
<a href="{{route('expense.fees.details',$term2->invoice_no)}}" target="_blank"  class="btn btn-sm btn-success"  title="Expense Fees Details">
  <span class="mdi mdi-notebook-outline me-1"></span>
  </a>

  <a href="{{route('expense.fees.edit',$term2->id)}}" title="Edit Expense" class="btn btn-sm btn-info">
<i class="mdi mdi-square-edit-outline me-1"></i>
</a>

</div>

</td>


<td>{{ $term2['category']['name']}}</td>

<td>{{ $term2->date}}</td>

<td>{{ $term2->invoice_no}}</td>

<td>

<span class="badge rounded-pill text-success bg-dark-info p-2 text-uppercase px-3">
  <b><i class='align-middle me-1'></i> 
  
 UGX {{ $term2->amount }}



</b></span>


</td>


<td>

<span class="badge rounded-pill text-primary bg-dark-info p-2 text-uppercase px-3">
  <b><i class='align-middle me-1'></i>UGX {{$term2->invoice_amount}} </b></span>


</td>
@php 

$bal2 = (float)$term2->invoice_amount-(float)$term2->amount;

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


</div>    <!--/Term 2 Expenses -->





<!--Term 3 Expenses -->

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
                                                <th>Expense</th>
                                      <th>Date</th>
                                      <th>InvoiceNo</th>
                                      <th>Paid</th>
                                      <th>Total</th>
                                      <th>Balance</th>
                                                </tr>
                                                <!-- end row -->
                                            </thead>

                                            <tbody>
@foreach($expensefees_term3 as $key => $term3 )
<tr>


<td>

                  
<div class="action-btn">
<a href="{{route('expense.fees.details',$term3->invoice_no)}}" target="_blank"  class="btn btn-sm btn-success"  title="Expense Fees Details">
  <span class="mdi mdi-notebook-outline me-1"></span>
  </a>


<a href="{{route('expense.fees.edit',$term3->id)}}" title="Edit Expense" class="btn btn-sm btn-info">
<i class="mdi mdi-square-edit-outline me-1"></i>
</a>


</div>

</td>


<td>{{ $term3['category']['name']}}</td>

<td>{{ $term3->date}}</td>
<td>{{ $term3->invoice_no}}</td>


<td>

<span class="badge rounded-pill text-success bg-dark-info p-2 text-uppercase px-3">
  <b><i class='align-middle me-1'></i> 
  
  UGX {{ $term3->amount }}



</b></span>


</td>


<td>

<span class="badge rounded-pill text-primary bg-dark-info p-2 text-uppercase px-3">
  <b><i class='align-middle me-1'></i>UGX {{$term3->invoice_amount}} </b></span>


</td>
@php 

$bal3 = (float)$term3->invoice_amount-(float)$term3->amount;

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


</div>    <!--/Term 3 Expenses -->





</div>

</div>



            
            
                      </div>
                      <!--/ Content -->




        













@endsection