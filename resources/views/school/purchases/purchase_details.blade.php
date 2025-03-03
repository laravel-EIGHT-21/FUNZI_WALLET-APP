 
@extends('school.body.admin_master')
@section('content')

@section('title')
Purchase Details
@endsection
                           

        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">
            
            
            <h3 class="py-3 mb-2">
              <span class="text-muted fw-light"> View /</span> {{$purchase_details['0']['purchase']['name']}}`s  Purchase Details   </script>
            </h3>


            <div class="row"> 

<div class="mb-4">

<a href="{{ route('view.all.purchases')}}" class="btn rounded-pill btn-warning" style="float:right;"><i class='tf-icons mdi mdi-arrow-left mdi-20px'></i>Back</a>

</div>

</div>


<div class="d-flex flex-column flex-sm-row align-items-center justify-content-sm-between mb-4 text-center text-sm-start gap-2">
              <div class="mb-2 mb-sm-0">
                <h4 class="mb-1">
                  Invoice No #{{$purchase_details['0']['invoice_no']}}
                </h4>

              </div>

              <div class="mb-4">

<a href="{{route('purchase.information.report',$purchase_details['0']['id'])}}" style="float:right;"  target="_blank" class="btn btn-success d-grid w-100 mb-3">
<span class="d-flex align-items-center justify-content-center text-nowrap"><i class="mdi mdi-printer-outline scaleX-n1-rtl me-1"></i>Print Report</span>
</a>
</div>

            </div>



            

<div class="row">
    <!-- Row -->


    <!-- Ourchase Details Sidebar -->
    <div class="col-xl-3 col-lg-5 col-md-5 order-1 order-md-0">
    @foreach($purchase_details as $key => $value )

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
    <small class="d-block pt-4 border-top fw-bold text-uppercase my-3">{{$value['purchase']['name']}} DETAILS</small>
    <ul class="list-unstyled">

    <li class="mb-3">
    <span class="fw-medium text-heading me-2">Term : </span>
    <span><b>{{$value['term']['name']}}</b></span>
    </li>


    <li class="mb-3">
    <span class="fw-medium text-heading me-2"> Quantity: </span>
    <span><b>{{$value->item_qty}}</b></span>
    </li>

    <li class="mb-3">
    <span class="fw-medium text-heading me-2"> Supplier : </span>
    <span><b>{{$value->supplier}}</b></span>
    </li>
    
    <li class="mb-3">
    <span class="fw-medium text-heading me-2"> Date : </span>
    <span><b>{{$value->date}}</b></span>
    </li>


    <li class="mb-3">
    <span class="fw-medium text-heading me-2"> Month : </span>
    <span><b>{{$value->month}}</b></span>
    </li>


    <li class="mb-3">
    <span class="fw-medium text-heading me-2"> Year : </span>
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
    <button type="button" class="nav-link py-2" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-current-year-payments" aria-controls="navs-pills-justified-current-year-payments" aria-selected="false"> Other Terms</button>
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
    <div class="avatar-initial rounded bg-label-warning">
    <i class='mdi mdi-currency-usd'></i>
    </div>
    </div>
    </div>
    @php 

    $unit_price = $purchase_details['0']['unit_price'];

    @endphp
    <div class="card-info">
    <h6 class="card-title mb-3">Unit Price Amount </h6>
    <div class="d-flex align-items-baseline mb-1 gap-1">
    <h5 class="text-primary mb-0">ugx {{$unit_price}}</h5>
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
    <div class="avatar-initial rounded bg-label-success">
    <i class='mdi mdi-currency-usd'></i>
    </div>
    </div>
    </div>
    @php 

    $total_price = $purchase_details['0']['total_price'];

    @endphp
    <div class="card-info">
    <h6 class="card-title mb-3">Total Price Amount </h6>
    <div class="d-flex align-items-baseline mb-1 gap-1">
    <h5 class="text-primary mb-0">ugx {{$total_price}}</h5>
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
                            <th>Item</th>
                            <th>Date</th>
                            <th>InvoiceNo</th>
                            <th>Unit Price</th>
                            <th>Total</th>
                              <th>Actions</th>

                            </tr>
                            <!-- end row -->
                            </thead>
                            @foreach($otherpurchase_details as $key => $value )
                            <tbody>
                                <tr>

                                <td>{{ $value['term']['name']}}</td>

                               
<td>{{ $value['purchase']['name']}}</td>

<td>{{ $value->date}}</td>

<td>{{ $value->invoice_no}}</td>

<td>

<span class="badge rounded-pill text-success bg-dark-info p-2 text-uppercase px-3">
<b><i class='align-middle me-1'></i> 

UGX {{ $value->unit_price }}



</b></span>


</td>

<td>

<span class="badge rounded-pill text-primary bg-dark-info p-2 text-uppercase px-3">
<b><i class='align-middle me-1'></i>UGX {{$value->total_price}} </b></span>


</td>



<td>


<div class="action-btn">
<a href="{{route('purchase.details',$value->id)}}" target="_blank"  class="btn btn-sm btn-success"  title="Purchase Details">
<span class="mdi mdi-notebook-outline"></span>
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


    </div>








    </div>
    <!--/ End Of Tab-content -->


    </div>
    <!--/ Purchase Details -->


    </div>
    <!--/Row -->


            

          

            
                      </div>
                      <!--/ Content -->
                          

@endsection 