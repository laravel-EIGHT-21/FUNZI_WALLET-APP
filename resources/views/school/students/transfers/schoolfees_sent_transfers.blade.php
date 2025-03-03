
@extends('school.body.admin_master')
@section('content')


@section('title')

SchoolFees Amounts Received

@endsection


@php 

$school_code = Auth::user()->school_id_no;
 
$months = date('F Y');

$years = date('Y');

$today_fees = App\Models\school_fees_collections::where('school_id',$school_code)->whereDate('created_at',Carbon\Carbon::today())->sum('amount');

$month_fees = DB::table('school_fees_collections')->where('school_id',$school_code)->where('month',$months)->sum('amount');

$year_fees = DB::table('school_fees_collections')->where('school_id',$school_code)->where('year',$years)->sum('amount');




@endphp 

        
        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">
            
            

        <h4 class="py-3 mb-4">
              <span class="text-muted fw-light"><a href="{{route('dashboard')}}">Transactions</a> /View /</span> SchoolFees Amounts Received 
            </h4>
            
            
            

            <div class="card mb-4">

<div class="row gy-4 gy-sm-1">
      
      
<!-- Cards SchoolFees Transactions -->
<div class="col-lg-4 col-sm-6">
<div class="card">
<div class="card-body">
  <div class="d-flex align-items-center flex-wrap gap-2">
    <div class="avatar me-3">
      <div class="avatar-initial bg-label-primary rounded">
        <i class="mdi mdi-currency-usd mdi-24px">
        </i>
      </div>
    </div>
    <div class="card-info">
      <div class="d-flex align-items-center">
        <h4 class="mb-0">UGX {{ ($today_fees) }}</h4>

      </div>
      <small>Todays Total</small>
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
        <h4 class="mb-0">UGX {{ ($month_fees) }}</h4>

      </div>
      <small>Current Monthly Total</small>
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
      <div class="avatar-initial bg-label-warning rounded">
        <i class="mdi mdi-currency-usd mdi-24px">
        </i>
      </div>
    </div>
    <div class="card-info">
      <div class="d-flex align-items-center">
        <h4 class="mb-0">UGX {{ ($year_fees) }}</h4>

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

            <!-- Pocketmoney Table -->
<!-- ---------------------
                                    start Zero Configuration
                          
                                ---------------- -->
                        <div class="card">
                        <div class="card-body">

                        <div class="table-responsive">
                        <table id="zero_config"
                        class="table border table-striped table-bordered display text-nowrap">
                        <thead>
                        <!-- start row -->
                        <tr>
                        <th scope="col">Invoice No.</th>
                        <th scope="col">School</th>
                        <th scope="col">Deposite Date</th>
                        <th scope="col">Details</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($allData as $key => $value )
                        <tr>

                                                
<td>
<div class="d-flex align-items-center">
<div class="ms-3">
<h6 class="fw-semibold mb-0 fs-7">{{ $value->transfer_invoice}}</h6>
</div>


</div>
</td>


                                <td> {{ $value['school']['name']}}</td>
                        <td> {{ $value->transfer_date}}</td>

                        <td>
                      
                        <div class="action-btn">
                      
                        <a href="{{route('report.schoolsfees_transfer.sent.info',$value->transfer_invoice)}}" title="Invoice Details" class="btn btn-sm btn-success">
<i class="mdi mdi-notebook-outline me-1"></i>
</a>

                        </div>                  
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