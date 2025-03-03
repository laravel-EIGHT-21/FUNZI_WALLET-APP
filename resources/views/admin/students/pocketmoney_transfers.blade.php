
@extends('admin.body.admin_master')
@section('content')



@section('title')

Students PocketMoney Transactions

@endsection

@php 

$months = date('F Y');

$years = date('Y');

$today_pocket = App\Models\students_pocketmoney::whereDate('created_at',Carbon\Carbon::today())->sum('amount');

$month_pocket = DB::table('students_pocketmoneys')->where('month',$months)->sum('amount');

$year_pocket = DB::table('students_pocketmoneys')->where('transfer_year',$years)->sum('amount');




@endphp 

        
        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">
            
            

            <h4 class="py-3 mb-4">
              <span class="text-muted fw-light"><a href="{{route('dashboard')}}">Transactions</a> /View/</span>Students PocketMoney Deposits
            </h4>
            
            
            
<div class="card mb-4">

      <div class="row gy-4 gy-sm-1">
            
            
<!-- Cards PocketMoney Transactions -->
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
              <h4 class="mb-0">UGX {{ ($today_pocket) }}</h4>

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
              <h4 class="mb-0">UGX {{ ($month_pocket) }}</h4>

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
            <div class="avatar-initial bg-label-info rounded">
              <i class="mdi mdi-currency-usd mdi-24px">
              </i>
            </div>
          </div>
          <div class="card-info">
            <div class="d-flex align-items-center">
              <h4 class="mb-0">UGX {{ ($year_pocket) }}</h4>

            </div>
            <small>Yearly Total</small>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--/ Cards PocketMoney Transactions -->
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
                        <table id="file_export"
                        class="table border table-striped table-bordered display text-nowrap">
                        <thead>
                        <!-- start row -->
                        <tr>
                        <th>Student Account </th>
                        <th>School </th>
                        <th>Transfer Date</th>
                        <th>Time Deposited</th>
                        <th>Deposits (UGX)</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($allData as $key => $value )
                        <tr>

                        <td> {{ $value->student_acct_no}}</td>
                        <td> {{ $value['school']['name']}}</td>
                        <td> {{ $value->transfer_date}}</td>
                        <td> {{ $value->sent_time}}</td>
                        <td> {{ $value->amount}}</td>


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