
@extends('admin.body.admin_master')
@section('content')
        

@section('title')

Monthly Orders Reports

@endsection



@php  



$months = date('F Y');

$years = date('Y');


$today_orders = App\Models\order_items::whereDate('created_at',Carbon\Carbon::today())->where('status','Order Delivered')->sum('pricetotal');

$month_orders = DB::table('order_items')->where('month',$months)->where('status','Order Delivered')->sum('pricetotal');

$year_orders = DB::table('order_items')->where('year',$years)->where('status','Order Delivered')->sum('pricetotal');



$today_orders_count = App\Models\orders::whereDate('created_at',Carbon\Carbon::today())->get();


$month_orders_count = DB::table('orders')->where('order_month',$months)->get();


$year_orders_count = DB::table('orders')->where('order_year',$years)->get();





@endphp






 
        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">
            
            

            <h4 class="py-3 mb-4">
              <span class="text-muted fw-light"><a href="{{route('dashboard')}}">Orders</a> /View/</span>Monthly School Orders Reports
            </h4>

            
            
            
<div class="card mb-4">

      <div class="row gy-4 gy-sm-1">
            
            
<!-- Cards with few info -->
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
              <h4 class="mb-0">UGX {{ ($today_orders) }}</h4>

            </div>
            <small>Todays Total </small>
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
              <h4 class="mb-0">UGX {{ ($month_orders) }}</h4>

            </div>
            <small>Current Monthly Total </small>
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
              <h4 class="mb-0">UGX {{ ($year_orders) }}</h4>

            </div>
            <small>Yearly Total </small>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--/ Cards with few info -->
            </div>
            </div>




<br/>
            
            
<div class="card mb-4">

<div class="row gy-4 gy-sm-1">
      
      

<div class="col-lg-4 col-sm-6">
<div class="card">
<div class="card-body">
  <div class="d-flex align-items-center flex-wrap gap-2">
    <div class="avatar me-3">
      <div class="avatar-initial bg-label-danger rounded">
        <i class="mdi mdi-cart-outline mdi-24px">
        </i>
      </div>
    </div>
    <div class="card-info">
      <div class="d-flex align-items-center">
        <h4 class="mb-0"> {{ count($today_orders_count) }}</h4>

      </div>
      <small>Todays Total Orders</small>
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
        <i class="mdi mdi-cart-outline mdi-24px">
        </i>
      </div>
    </div>
    <div class="card-info">
      <div class="d-flex align-items-center">
        <h4 class="mb-0">{{ count($month_orders_count) }}</h4>

      </div>
      <small>Monthly Total Orders</small>
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
        <i class="mdi mdi-cart-outline mdi-24px">
        </i>
      </div>
    </div>
    <div class="card-info">
      <div class="d-flex align-items-center">
        <h4 class="mb-0">{{ count($year_orders_count) }}</h4>

      </div>
      <small>Yearly Total Orders</small>
    </div>
  </div>
</div>
</div>
</div>


      </div>
      </div>


            


            <div class="row">

    <h4 class="text"><b>Monthly Orders` Reports</b></h4>
    <div class="nav-align-top mb-4">

        <div class="col-xl-12">

    <div class="card mb-6">
      <div class="card-header p-0">

      </div>
      <div class="card-body">

          <div class="row">
  <div class="col-xl">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">

      </div>
      <div class="card-body">
        <form method="post" action="{{ route('search-orders-by-month') }}">
          @csrf
        <div class="form-floating form-floating-outline mb-4">
        <input class="form-control" type="month" name="month" id="html5-month-input" required />
        <label for="html5-month-input">Month</label>
        </div> 

          <button type="submit" class="btn btn-primary">Submit</button>


          <a href="{{ route('monthly.orders.reports')}}"  class="btn btn-success">Reset</a>

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

  
<br/>


<div class="row">
    
    <div class="col-xl-12">
    <h4 class="text"><b>Monthly Orders Report</b></h4>
  
  <div class="nav-align-top mb-2">
  
  <div class="card">
  
  
                          <div class="card-body">
                                      
                          <div class="table-responsive">
                          <table id="file_export2" class="table border table-bordered display text-nowrap">
                          <thead>
                          <!-- start row -->
                          <tr>

                            <th>Month  </th>
            
                            <th>Total Order Amount (UGX) </th>
              
                                      </tr>
                                      </thead>
                                      <tbody>
            
                                      @foreach($orders as $key => $value )
            
            <tr>
            @php 
            
                  
            $total = App\Models\order_items::where('month',$value->month)->sum('pricetotal');
            
            @endphp
            
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
  




                        </div>
                        <!--/ Content -->







@endsection