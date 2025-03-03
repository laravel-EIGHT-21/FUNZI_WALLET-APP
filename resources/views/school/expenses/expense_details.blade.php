 
@extends('school.body.admin_master')
@section('content')

@section('title')
Expense Fees Payment Details
@endsection
                           

        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">
            
            
            <h3 class="py-3 mb-2">
              <span class="text-muted fw-light"> View /</span> {{$expense_details['0']['category']['name']}}`s  Payment Details   </script>
            </h3>


            <div class="row"> 

<div class="mb-4">

<a href="{{ route('view.expenses')}}" class="btn rounded-pill btn-warning" style="float:right;"><i class='tf-icons mdi mdi-arrow-left mdi-20px'></i>Back</a>

</div>

</div>


<div class="d-flex flex-column flex-sm-row align-items-center justify-content-sm-between mb-4 text-center text-sm-start gap-2">
              <div class="mb-2 mb-sm-0">
                <h4 class="mb-1">
                  Invoice No #{{$expense_details['0']['invoice_no']}}
                </h4>

              </div>

              <div class="mb-4">

<a href="{{route('expense.information.report.print',$expense_details['0']['id'])}}" style="float:right;"  target="_blank" class="btn btn-success d-grid w-100 mb-3">
<span class="d-flex align-items-center justify-content-center text-nowrap"><i class="mdi mdi-printer-outline scaleX-n1-rtl me-1"></i>Print Report</span>
</a>
</div>

            </div>



            

<div class="row">
    <!-- Row -->


    <!-- Expense Details Sidebar -->
    <div class="col-xl-3 col-lg-5 col-md-5 order-1 order-md-0">
    @foreach($expense_details as $key => $value )

    <div class="card mb-4">
    <div class="card-body">
    <div class="customer-avatar-section">
    <div class="d-flex align-items-center flex-column">
    <div class="customer-info text-center">
    <h4 class="mb-1">{{$value['school']['name']}}</h4>
    </div>
    </div>
    </div>


    <div class="info-container">
    <small class="d-block pt-4 border-top fw-bold text-uppercase my-3">{{$value['category']['name']}} DETAILS</small>
    <ul class="list-unstyled">

    <li class="mb-3">
    <span class="fw-medium text-heading me-2">For Term : </span>
    <span><b>{{$value['term']['name']}}</b></span>
    </li>

    
    <li class="mb-3">
    <span class="fw-medium text-heading me-2"> For Date : </span>
    <span><b>{{$value->date}}</b></span>
    </li>


    <li class="mb-3">
    <span class="fw-medium text-heading me-2"> For Month : </span>
    <span><b>{{$value->month}}</b></span>
    </li>


    <li class="mb-3">
    <span class="fw-medium text-heading me-2"> For Year : </span>
    <span><b>{{$value->year}}</b></span>
    </li>



    </ul>

    </div>
    </div>
    </div>

    @endforeach
    </div>
    <!--/ Student Details Sidebar -->


    <!--Student Fees Collections -->
    <div class="col-xl-9 col-lg-7 col-md-7 order-0 order-md-1">

    <ul class="nav nav-pills flex-column flex-md-row mb-3">


    <li class="nav-item">
    <button type="button" class="nav-link active py-2" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-overview" aria-controls="navs-pills-justified-overview" aria-selected="true">Overview </button>
    </li>


    <li class="nav-item">
    <button type="button" class="nav-link py-2" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-topup-payments-details" aria-controls="navs-pills-justified-topup-payments-details" aria-selected="false">Track Payments</button>
    </li>


    
    <li class="nav-item">
    <button type="button" class="nav-link py-2" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-current-year-payments" aria-controls="navs-pills-justified-current-year-payments" aria-selected="false"> Other Terms</button>
    </li>



    <li class="nav-item">
    <button type="button" class="nav-link py-2" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-balance-payments" aria-controls="navs-pills-justified-balance-payments" aria-selected="false">Balance Payments</button>
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

    $amount_paid = $expense_details['0']['amount'];

    @endphp
    <div class="card-info">
    <h6 class="card-title mb-3">Total Amount Paid For {{$expense_details['0']['month']}}  |  {{$expense_details['0']['term']['name']}}</h6>
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
    <h6 class="card-title mb-3">Invoice Amount For {{$expense_details['0']['month']}}  | {{$expense_details['0']['term']['name']}}</h6>
    <div class="d-flex align-items-baseline mb-1 gap-1">
    <h5 class="text-primary mb-0">ugx {{$expense_details['0']['invoice_amount']}}</h5>
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
    <h5 class="card-title mb-3">Balance For {{$expense_details['0']['month']}}  | {{$expense_details['0']['term']['name']}}</h5>
    <div class="d-flex align-items-baseline mb-1 gap-1">

    @php 

    $balance = (float)$expense_details['0']['invoice_amount']-(float)$amount_paid;

    @endphp

    <h5 class="text-primary mb-0">ugx {{$balance}}</h5>
    </div>
    </div>

    </div>
    </div>
    </div>



    </div>


    </div>




    <div class="tab-pane fade" id="navs-pills-justified-topup-payments-details" role="tabpanel">
    <div class="row">

    
<div class="card">
                                <div class="card-body">

                                                            
<div class="row"> 

<div class="col-md-3" style="padding-top: 10px;">

<a href="{{ route('expense.fees.track.invoice',$expense_details['0']['invoice_no']) }}" target="_blank" class="btn rounded-pill btn-info">
<span class="d-flex align-items-center justify-content-center text-nowrap"><i class="mdi mdi-printer-outline scaleX-n1-rtl me-1"></i>Print Invoice</span>
</a>

</div>
    
</div> 

<br/>
       
     
                            <div class="table-responsive">
                            <table class="table border table-striped table-bordered text-nowrap">
                            <thead>
                            <!-- start row -->
                            <tr>

                          <th>Previous Fees</th> 
                          <th> Topup</th>
                          <th>Fees Paid</th>
                          <th> Date</th>
                          <th>Action</th>

                            </tr>
                            <!-- end row -->
                            </thead>
                            @foreach($expense_payments as $key => $value )
                            <tbody>
                                <tr>

                  <td> {{ $value->previous_fees_amount }}</td>	
                  <td> {{ $value->fees_topup_amount }}</td>	
                  <td> {{ $value->present_fees_amount }}</td>	
                  <td> {{ $value->date }}</td>	

                  <td>

                  <a href="{{route('expense.fees.topup.payment.invoice',$value->id)}}" title="Get Invoice" target="_blank" class="btn btn-sm btn-info"><i class='mdi mdi-file-document-outline'></i></a>
                
                  
                  <a href="{{route('delete.expense.fees.topup.payment',$value->id)}}" id="delete" title="Delete" class="btn btn-sm btn-danger"><i class='mdi mdi-delete-outline'></i></a>
                 
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
                              <th>date</th>
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

                                <td>{{ $value->date}}</td>

<td>


<span class="badge rounded-pill text-success bg-dark-success p-2 text-uppercase px-3"><b><i class='align-middle me-1'></i>ugx {{ $value->amount }}</b></span>


</td>



<td>


<span class="badge rounded-pill text-primary bg-dark-info p-2 text-uppercase px-3"><b><i class='align-middle me-1'></i>ugx {{ $value->invoice_amount }}</b></span>


</td>


@php 

$bal = (float)$value->invoice_amount-(float)$value->amount;

@endphp


<td>


<span class="badge rounded-pill text-danger bg-dark-danger p-2 text-uppercase px-3"><b><i class='align-middle me-1'></i>ugx {{ $bal }}</b></span>


</td>



<td>


<div class="action-btn">
<a href="{{route('expense.fees.details',$value->invoice_no)}}" target="_blank"  class="btn btn-sm btn-success"  title="Fees Collections Details">
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



    
    <div class="tab-pane fade" id="navs-pills-justified-balance-payments" role="tabpanel">


<div class="row text-nowrap">
    <div class="card mb-4">
                  <h5 class="card-header">Submit Expense Topup Payment For {{$expense_details['0']['term']['name']}}</h5>

                  <form action="{{ route('expense.fees.topup.payment',$expense_details['0']['invoice_no']) }}" method="POST" >
                  @csrf

                  <input type="hidden" name="invoice_no" value="{{ $expense_details['0']['invoice_no'] }}" />

                  <div class="row">

<div class="col mb-4 mt-2">
<div class="form-floating form-floating-outline">
<input class="form-control" type="text" name="invoice_amount" readonly value="{{$expense_details['0']['invoice_amount']}}"  id="html5-text-input" />
<label for="html5-text-input">Invoice Amount</label>
</div>

</div>
</div>


<div class="row">

<div class="col mb-4 mt-2">
  <div class="form-floating form-floating-outline">
  <input class="form-control" type="text" name="amount" readonly value="{{$expense_details['0']['amount']}}"  id="html5-text-input" />
  <label for="html5-text-input">Amount Paid</label>
  </div>

  </div>
</div>


<div class="row">

<div class="col mb-4 mt-2">
  <div class="form-floating form-floating-outline">
  <input class="form-control" type="text" name="amount" readonly value="{{$balance}}"  id="html5-text-input" />
  <label for="html5-text-input">Fees Balance </label>
  </div>

  </div>
</div>


@if($expense_details['0']['amount'] < $expense_details['0']['invoice_amount'])


<div class="row">

<div class="col mb-4 mt-2">
<div class="form-floating form-floating-outline">
<input class="form-control" type="text" maxlength="7" name="fees_topup_amount" id="cash" required />
<label for="cash">Enter Payment Topup</label>
</div>

</div>
</div>



<div class="row">

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
</div>




<div class="row">

<div class="col mb-4 mt-2">
<div class="form-floating form-floating-outline">
<input class="form-control" type="text" name="notes" id="html5-text-input" />
<label for="html5-text-input">Notes</label>
</div>

</div>
</div>


<div class="row">
                  <div>
                  <button type="submit" class="btn btn-primary mb-2 me-2">Submit Expense Topup Payment</button>
                  </div>
                  </div>

                  @else

                  @endif


                  </form>
                  </div>
                  </div>



    </div>










    </div>
    <!--/ End Of Tab-content -->


    </div>
    <!--/ Expense Details -->


    </div>
    <!--/Row -->


            

          

            
                      </div>
                      <!--/ Content -->
                          

@endsection 