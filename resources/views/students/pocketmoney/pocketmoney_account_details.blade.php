
@extends('students.body.admin_master')
@section('content')

@section('title')
PocketMoney Account Details
@endsection

                           

        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">
            
            
            <h4 class="py-3 mb-2">
              <span class="text-muted fw-light"> View /</span> {{$account['0']['name']}}`s  Account Details
            </h4>
            
            <div class="d-flex flex-column flex-sm-row align-items-center justify-content-sm-between mb-4 text-center text-sm-start gap-2">
              <div class="mb-2 mb-sm-0">
                <h4 class="mb-1">
                  Student WalletID #{{$account['0']['student_code']}}
                </h4>

              </div>

            </div>
            
            
            <div class="row">
              <!-- Customer-detail Sidebar -->
              <div class="col-xl-3 col-lg-5 col-md-5 order-1 order-md-0">
              @foreach($account as $key => $value )
                <!-- Customer-detail Card -->
                <div class="card mb-4">
                  <div class="card-body">
                    <div class="customer-avatar-section">
                      <div class="d-flex align-items-center flex-column">
                        <div class="customer-info text-center">
                          <h4 class="mb-1">{{$value->name}}</h4>
                          <small>Wallet ID #{{$value->student_code}}</small>
                        </div>
                      </div>
                    </div>
                   
            
                    <div class="info-container">
                      <small class="d-block pt-4 border-top fw-normal text-uppercase text-muted my-3">DETAILS</small>
                      <ul class="list-unstyled">
                        
                            @php 
                            $school = App\Models\User::where('school_id_no',$value->student_school_code)->where('user_type',1)->get();
                            @endphp

                        <li class="mb-3">
                          <span class="fw-medium me-2">School:</span>
                            <span> 
                            @foreach($school as $sch)

                            {{ ($sch->name)}}

                            @endforeach
                            </span>
                        </li>

                        <li class="mb-3">
                          <span class="fw-medium me-2">Email:</span>
                          <span>{{$value->email}}</span>
                        </li>


                        <li class="mb-3">
                          <span class="fw-medium me-2">Class:</span>
                          <span>{{$value->student_class}}</span>
                        </li>

                        <li class="mb-3">
                          <span class="fw-medium me-2">Status:</span>

                        @if($value->status == 1)
                        <span class="badge bg-label-success rounded-pill">Active</span>
                        @elseif($value->status == 0 )
                        <span class="badge bg-label-danger rounded-pill">Deactive</span>
                        @endif


                        </li>

                      </ul>

                    </div>
                  </div>
                </div>
                <!-- /Customer-detail Card -->
                @endforeach
              </div>
              <!--/ Customer Sidebar -->
            
            
              <!-- Customer Content -->
              <div class="col-xl-9 col-lg-7 col-md-7 order-0 order-md-1">
                <!-- Customer Pills -->
                <ul class="nav nav-pills flex-column flex-md-row mb-3">


                <li class="nav-item">
          <button type="button" class="nav-link active py-2" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-overview" aria-controls="navs-pills-justified-overview" aria-selected="true"><i class="ti ti-user me-1"></i>Overview </button>
        </li>
        <li class="nav-item">
          <button type="button" class="nav-link py-2" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-deposits" aria-controls="navs-pills-justified-deposits" aria-selected="false"><i class="ti ti-currency-dollar me-1"></i> Deposits</button>
        </li>
        <li class="nav-item">
          <button type="button" class="nav-link py-2" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-withdrawals" aria-controls="navs-pills-justified-withdrawals" aria-selected="false"><i class="tf-icons ti ti-currency-dollar me-1"></i> Withdrawals</button>
        </li>

        <li class="nav-item">
          <button type="button" class="nav-link py-2" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-loans" aria-controls="navs-pills-justified-loans" aria-selected="false"><i class="tf-icons ti ti-currency-dollar me-1"></i> Loans</button>
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
                            <div class="avatar-initial rounded bg-label-primary">
                              <i class='mdi mdi-currency-usd'></i>
                            </div>
                          </div>
                        </div>
                        <div class="card-info">
                          <h4 class="card-title mb-3">Account Balance</h4>
                          <div class="d-flex align-items-baseline mb-1 gap-1">
                            <h4 class="text-primary mb-0">ugx {{$acct_bal}}</h4>

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
                        <div class="card-info">
                          <h4 class="card-title mb-3">Total Deposits</h4>
                          <div class="d-flex align-items-baseline mb-1 gap-1">
                            <h4 class="text-primary mb-0">ugx {{$acct}}</h4>

                          </div>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="card">
                      <div class="card-body">
                        <div class="card-icon mb-3">
                          <div class="avatar">
                            <div class="avatar-initial rounded bg-label-warning">
                              <i class='mdi mdi-currency-usd'></i>
                            </div>
                          </div>
                        </div>
                        <div class="card-info">
                          <h4 class="card-title mb-3">Total Monthly Withdrawal</h4>
                          <div class="d-flex align-items-baseline mb-1 gap-1">
                            <h4 class="text-warning mb-0"> ugx {{$monthly_withdrawal}}</h4>
                    
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="card">
                      <div class="card-body">
                        <div class="card-icon mb-3">
                          <div class="avatar">
                            <div class="avatar-initial rounded bg-label-info">
                              <i class='mdi mdi-currency-usd'></i>
                            </div>
                          </div>
                        </div>
                        <div class="card-info">
                          <h4 class="card-title mb-3">Total Monthly Loans</h4>
                          <div class="d-flex align-items-baseline mb-1 gap-1">
                            <h4 class="text-info mb-0">ugx {{$monthly_loans}}</h4>
                            
                          </div>
            
                         
                        </div>
                      </div>
                    </div>
                  </div>
                </div>


        </div>




        <div class="tab-pane fade" id="navs-pills-justified-deposits" role="tabpanel">
        
<div class="card">
                                <div class="card-body">
     
                            <div class="table-responsive">
                            <table id="one_config"
                            class="table border table-striped table-bordered text-nowrap">
                            <thead>
                            <!-- start row -->
                            <tr>

                            <th>Deposit Date</th>
                            <th> Amounts (UGX)</th>

                            </tr>
                            <!-- end row -->
                            </thead>
                            @foreach($student_deposite as $key => $value )
                            <tbody>
                                <tr>

                        <td> {{ $value->transfer_date}}</td>
                        <td>{{ $value->amount}}</td>
                                </tr>






                            </tbody>
          @endforeach
                            </table>
                            </div>
                            </div>
                            </div>

        </div>




        <div class="tab-pane fade" id="navs-pills-justified-withdrawals" role="tabpanel">


                        <div class="row text-nowrap">
        <div class="card mb-4">
      <div class="card-body">

          <div class="table-responsive">
            <table id="two_config"
            class="table border table-striped table-bordered text-nowrap">
            <thead>
            <tr>

            <th class="pe-0 fw-solid text-heading">Withdrawn Date</th>
           <th class="pe-0 fw-solid text-heading"> Amount (UGX)</th>
              
            </tr>
          </thead>
          <tbody>
  @foreach($student_withdrawal as $key => $value )
  <tr>

  <td class="pe-0 text-success">{{ $value->withdrawal_date}}</td>
  
    <td class="pe-0 ">
    {{$value->withdrawal_amount}}
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


        



        

        <div class="tab-pane fade" id="navs-pills-justified-loans" role="tabpanel">


                        <div class="row text-nowrap">
        <div class="card mb-4">
      <div class="card-body">
        <div class="table-responsive ">
          <table id="zero_config"
          class="table border table-striped table-bordered text-nowrap">
          <thead>
            <tr>

            <th class="pe-0 fw-solid text-heading">Loan Date</th>
           <th class="pe-0 fw-solid text-heading"> Amount</th>
           <th class="pe-0 fw-solid text-heading">Status</th>
          <th class="pe-0 fw-solid text-heading">Payment</th>
          <th class="pe-0 fw-solid text-heading">Pay_Date</th>

              
            </tr>
          </thead>
          <tbody>
  @foreach($student_loans as $key => $value )
  <tr>

  <td class="pe-0 text-success">{{ $value->loan_date}}</td>


    <td class="pe-0 ">
{{$value->loan_amount}}
  </td>


    <td class="pe-0 h6">

@php 
$loan = $value->loan_amount;

$payment_loan = $value->loan_payment_amount;

$zero = 00 ;


@endphp


@if($payment_loan == $zero)
<div class="badge rounded-pill text-danger bg-light-info p-2 text-uppercase px-3"><i class='fas fa-circle align-middle me-1'></i>Not Paid</div>
@elseif($payment_loan >= $loan )
<div class="badge rounded-pill text-success bg-light-info p-2 text-uppercase px-3"><i class='fas fa-circle align-middle me-1'></i>Paid</div>
@endif


</td>

    <td class="pe-0 ">
{{$value->loan_payment_amount}}  
  </td>
</form>

<td class="pe-0 text-success">{{ $value->loan_payment_date}}</td>


  </tr>
  @endforeach
  </tbody>
        </table>
      </div>

      </div>
    </div>



                </div>

        </div>




      </div>

            
            

              </div>
              <!--/ Customer Content -->
            </div>
            

            
                      </div>
                      <!--/ Content -->
                                  

@endsection 