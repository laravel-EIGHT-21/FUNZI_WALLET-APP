
@extends('admin.body.admin_master')
@section('content')
        

@section('title')

Yearly SchoolFees Transations Report

@endsection


@php 



$months = date('F Y');

$years = date('Y');


$today_fees = App\Models\school_fees_collections::whereDate('created_at',Carbon\Carbon::today())->sum('amount');

$month_fees = DB::table('school_fees_collections')->where('month',$months)->sum('amount');

$year_fees = DB::table('school_fees_collections')->where('year',$years)->sum('amount');





@endphp






 
        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">
            
            

            <h4 class="py-3 mb-4">
              <span class="text-muted fw-light"><a href="{{route('dashboard')}}">Transactions</a> /View/</span>Yearly SchoolFees Transactions Reports
            </h4>

      
<br/>
           
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




<br/>


            


            <div class="row">
                        

    <h4 class="text"><b>Yearly Reports</b></h4>
    <div class="nav-align-top mb-6">


        <div class="col-xl-12">

    <div class="card mb-6">

        <div class="p-0">
          <div class="row">
  <div class="col-xl">
    
      <div class="card-header d-flex justify-content-between align-items-center">

      </div>
      <div class="card-body">
      <form method="post" action="{{ route('search-schoolfees-deposits-by-year') }}">
                                            @csrf
  <div class="form-floating form-floating-outline mb-4">
    <input class="form-control" type="month" name="year" id="html5-month-input" required />
    <label for="html5-month-input">Year</label>
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
                        </div>


<br /><br />
<div class="row">
  <div class="col-xl-12">
  <h4 class="text"><b>SchoolFees Deposits Yearly Reports</b></h4>

<div class="nav-align-top mb-4">

<div class="card">


                        <div class="card-body">
                                    
                        <div class="table-responsive">
                        <table id="file_export2" class="table border table-bordered display text-nowrap">
                        <thead>
                        <!-- start row -->
                        <tr>
                        <th>School </th>
                        <th>Month</th>
                        <th>Total Deposits (UGX)</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($transfers as $key => $value )
                        <tr>

  @php 

  $school= App\Models\school_fees_collections::where('school_id',$value->school_id)->get();

$total = App\Models\school_fees_collections::where('school_id',$value->school_id)->where('month',$value->month)->sum('amount');

  @endphp

  <td> {{ $school['0']['school']['name']}}</td>
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

</div>
      


<br/>

<div class="row">
  <div class="col-xl-12">
  <h4 class="text"><b>SchoolFees Deposits BarChart Report</b></h4>

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
 label : 'Total SchoolFees Deposited',
backgroundColor: 'rgb(138, 43, 226,0.8)',
borderColor         : 'rgba(138, 43, 226,1)',
 pointColor          : 'rgba(138, 43, 226,0.8)',
pointHighlightFill  : '#fff',
pointHighlightStroke: 'rgba(138, 43, 226,0.8)',
borderWidth: 2,
data: <?php echo json_encode($schoolfees_deposits_total);?>, 



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