
@extends('school.body.admin_master')
@section('content')
        

@section('title')

Weekly Orders Reports

@endsection



@php  




$id = Auth::user()->id;


$months = date('F Y');

$years = date('Y');


$today_orders = App\Models\orders::whereDate('created_at',Carbon\Carbon::today())->where('school_id',$id)->get();

$month_orders = DB::table('orders')->where('school_id',$id)->where('order_month',$months)->get();

$year_orders = DB::table('orders')->where('school_id',$id)->where('order_year',$years)->get();



$today_orders_amounts = App\Models\order_items::whereDate('created_at',Carbon\Carbon::today())->where('school_id',$id)->where('status','Order Delivered')->sum('pricetotal');

$month_orders_amounts = DB::table('order_items')->where('month',$months)->where('school_id',$id)->where('status','Order Delivered')->sum('pricetotal');

$year_orders_amounts = DB::table('order_items')->where('year',$years)->where('school_id',$id)->where('status','Order Delivered')->sum('pricetotal');





@endphp






 
        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">
            
            

            <h4 class="py-3 mb-4">
              <span class="text-muted fw-light"><a href="{{route('dashboard')}}">Orders</a> /View/</span>Weekly School Orders Reports
            </h4>

            
            <br />
   
            <h5 class="py-3 mb-2">Total Order Amounts  </h5>
<div class="row gy-4">

  <!-- Cards with users info -->
  <div class="col-lg-4 col-sm-6">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-center flex-wrap gap-2">
          <div class="avatar me-3">
            <div class="avatar-initial bg-label-danger rounded">
              <i class="mdi mdi-cart-plus mdi-24px">
              </i>
            </div>
          </div>
          
          <div class="card-info">
            <div class="d-flex align-items-center">
              <h4 class="mb-0">{{ ($today_orders_amounts) }}</h4>
              
            </div>
            <small>Todays` Total</small>
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
              <i class="mdi mdi-cart-plus mdi-24px">
              </i>
            </div>
          </div>
    
          <div class="card-info">
            <div class="d-flex align-items-center">
              <h4 class="mb-0">{{ ($month_orders_amounts) }}</h4>

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
              <i class="mdi mdi-cart-plus mdi-24px">
              </i>
            </div>
          </div>

          <div class="card-info">
            <div class="d-flex align-items-center">
              <h4 class="mb-0">{{ ($year_orders_amounts) }}</h4>

            </div>
            <small>Yearly Total</small>
          </div>
        
        </div>
      </div>
    </div>
  </div>



</div>



<br />

                    
<h5 class="py-3 mb-2">Total School Orders Made </h5>
<div class="row gy-4">

  <!-- Cards with users info -->
  <div class="col-lg-4 col-sm-6">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-center flex-wrap gap-2">
          <div class="avatar me-3">
            <div class="avatar-initial bg-label-danger rounded">
              <i class="mdi mdi-cart-plus mdi-24px">
              </i>
            </div>
          </div>
          
          <div class="card-info">
            <div class="d-flex align-items-center">
              <h4 class="mb-0">{{ count($today_orders) }}</h4>
              
            </div>
            <small>Todays` Orders Made</small>
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
              <i class="mdi mdi-cart-plus mdi-24px">
              </i>
            </div>
          </div>
    
          <div class="card-info">
            <div class="d-flex align-items-center">
              <h4 class="mb-0">{{ count($month_orders) }}</h4>

            </div>
            <small>Monthly Orders</small>
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
              <i class="mdi mdi-cart-plus mdi-24px">
              </i>
            </div>
          </div>

          <div class="card-info">
            <div class="d-flex align-items-center">
              <h4 class="mb-0">{{ count($year_orders) }}</h4>

            </div>
            <small>Yearly Orders</small>
          </div>
        
        </div>
      </div>
    </div>
  </div>



</div>

<br />

            


            <div class="row">


                        <div class="col-xl-12">
    <h4 class="text"><b>Weekly Orders` Reports</b></h4>
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
      <form method="post" action="{{ route('search-school-orders-by-week') }}">
                                                  @csrf
          <div class="form-floating form-floating-outline mb-4">
            <input class="form-control" type="date" name="start_date" id="start_date" required />
            <label for="start_date">Start Date</label>
          </div>
          <div class="form-floating form-floating-outline mb-4">
            <input class="form-control" type="date" name="end_date" id="end_date" required />
            <label for="end_date">End Date</label>
          </div>

          <button type="submit" class="btn btn-primary">Submit</button>

          <a href="{{ route('school.weekly.orders.reports')}}"  class="btn btn-success">Reset</a>

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
    <h4 class="text"><b>Weekly Orders Report</b></h4>
  
  <div class="nav-align-top mb-2">
  
  <div class="card">
  
  
                          <div class="card-body">
                                      
                          <div class="table-responsive">
                          <table id="file_export2" class="table border table-bordered display text-nowrap">
                          <thead>
                          <!-- start row -->
                          <tr>
                          <th>School </th>
                <th>Order Date  </th>

                <th>Total Order Amount (UGX) </th>
  
                          </tr>
                          </thead>
                          <tbody>

                          @foreach($orders as $key => $value )

<tr>

@php 

$depo_total = App\Models\order_items::where('date',$value->date)->where('school_id',$value->school_id)->sum('pricetotal');

@endphp
<td> {{ $value['school']['name']}}</td>
<td> {{ $value->date}}</td>
<td> {{ ($depo_total) }}</td>

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


                        
                        </div>




                        </div>
                        <!--/ Content -->







@endsection