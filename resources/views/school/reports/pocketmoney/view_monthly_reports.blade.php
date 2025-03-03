
@extends('school.body.admin_master')
@section('content')
        


@section('title')

Monthly Students PocketMoney Transactions Report

@endsection



@php  


$school_code = Auth::user()->school_id_no;

$months = date('F Y');

$years = date('Y');

$today_pocket = App\Models\students_pocketmoney::where('school_id',$school_code)->whereDate('created_at',Carbon\Carbon::today())->sum('amount');

$month_pocket = DB::table('students_pocketmoneys')->where('school_id',$school_code)->where('month',$months)->sum('amount');

$year_pocket = DB::table('students_pocketmoneys')->where('school_id',$school_code)->where('transfer_year',$years)->sum('amount');



@endphp






 
        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">
            
            

            <h4 class="py-3 mb-4">
              <span class="text-muted fw-light"><a href="{{route('dashboard')}}">Transactions</a> /View/</span>Monthly Students PocketMoney Transactions Reports
            </h4>

            
            
          
            <h5 class="py-3 mb-2"> PocketMoney Transactions</h5>
<div class="row gy-4">

  <!-- Cards PocketMoney Transactions -->
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
            <small>Monthly Total</small>
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


<br/>


            


            <div class="row">
                        <div class="col-12">

                        <div class="col-xl-12">
    <h4 class="text"><b>Monthly Students PocketMoney Transactions Report</b></h4>
    <div class="nav-align-top mb-4">


        <div class="col-xl-12">

    <div class="card mb-6">

      <div class="card-body">

          <div class="row">
  <div class="col-xl">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">

      </div>
      <div class="card-body">
      <form method="post" action="{{ route('search-pocketmoney-transfers-by-month') }}">
  @csrf
<div class="form-floating form-floating-outline mb-4">
<input class="form-control" type="month" name="month" id="html5-month-input" required />
<label for="html5-month-input">Month</label>
</div> 

<button type="submit" class="btn btn-primary">Submit</button>
</form>
      </div>
    </div>
  </div>

</div>

      </div>
    </div>
  </div>


  
<br/><br/>
    
    <div class="col-xl-12">
    <h4 class="text"><b>PocketMoney Monthly Reports</b></h4>
  
  <div class="nav-align-top mb-2">
  
  <div class="card">
  
  
                          <div class="card-body">
                                      
                          <div class="table-responsive">
                          <table id="file_export2" class="table border table-bordered display text-nowrap">
                          <thead>
                          <!-- start row -->
                          <tr>

          <th>School</th>
          <th>Month</th>
          <th>Total Amount Deposited (UGX) </th>
  
                          </tr>
                          </thead>
                          <tbody>
                          @foreach($transfers as $value )
                          <tr>
  
                          @php 

      
$total = App\Models\students_pocketmoney::where('school_id',$value->school_id)->where('month',$value->month)->sum('amount');

@endphp

<td> {{ $value['school']['name']}}</td>
<td> {{ $value->month}}</td>
<td> {{ ($total) }}</td>

  
                          </tr>
                          @endforeach
                          </tbody>
  
                          </table>
                          </div>
  
  
                          </div>
                          </div>
  
  
  </div>
  
  
  </div>
  

  
  <br/>

  <div class="col-xl-12">
  <h4 class="text">Students` PocketMoney Deposits BarChart Report</b></h4>

<div class="nav-align-top mb-2">

<div class="card">


                        <div class="card-body">
        
                        <div class="chart-container1">
      <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
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




                        <script src="{{asset('Admin/assets/vendor/libs/chart.js/Chart.js')}}"></script>
<script src="{{asset('Admin/assets/vendor/libs/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('Admin/assets/vendor/libs/chart.js/Chart.bundle.min.js')}}"></script>


                        
<script type="text/javascript">
 var ctx = document.getElementById("barChart").getContext('2d');
          var myChart = new Chart(ctx, {
              type:'bar',
              data:{
                      labels:<?php echo json_encode($month); ?>,
                      datasets:[
                        {
 label : 'Total PocketMoney Deposited',
backgroundColor: 'rgb(64, 224, 208,0.8)',
borderColor         : 'rgba(64, 224, 208,1)',
 pointColor          : 'rgba(64, 224, 208,0.8)',
pointHighlightFill  : '#fff',
pointHighlightStroke: 'rgba(64, 224, 208,0.8)',
borderWidth: 2,
data: <?php echo json_encode($pocketmoney_deposits);?>, 



                        },

                      ]

              },

              options: {
                maintainAspectRatio : false,
                responsive : true,
                legend:{
                  display:true

                },
                    scales: {
            xAxes: [{
              gridLines : {
                display : false,
              }
            }],
            yAxes: [{
              gridLines : {
                display : true,
              },
              ticks:{
                beginAtZero:true
              }

            }]
          }
       }



      });

</script>






@endsection