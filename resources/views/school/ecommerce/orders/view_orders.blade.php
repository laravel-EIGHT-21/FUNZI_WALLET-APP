
@extends('school.ecommerce.body.admin_master')
@section('content')
        


@section('title')

Orders List | funziwallet

@endsection

@php




$id = Auth::user()->id;


$months = date('F Y');

$years = date('Y');

$month_orders = DB::table('orders')->where('school_id',$id)->where('order_month',$months)->where('status','Order Delivered')->get();

$year_orders = DB::table('orders')->where('school_id',$id)->where('order_year',$years)->where('status','Order Delivered')->get();


$month_orders_amounts = DB::table('order_items')->where('month',$months)->where('school_id',$id)->where('status','Order Delivered')->sum('pricetotal');

$year_orders_amounts = DB::table('order_items')->where('year',$years)->where('school_id',$id)->where('status','Order Delivered')->sum('pricetotal');



@endphp 
        


        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">


        <h4 class="py-3 mb-4">
              <span class="text-muted fw-light"><a href="{{route('school.ecommerce.dashboard')}}">Home</a> /View /</span> My Orders List
            </h4>

            <br/>




             
            <h5 class="py-3 mb-2">Total Order Amounts  </h5>
<div class="row gy-4">

  <!-- Cards with users info -->

  <div class="col-lg-6 col-sm-6">
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
  <div class="col-lg-6 col-sm-6">
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

                    
<h5 class="py-3 mb-2">Total School Orders Delivered  </h5>
<div class="row gy-4">

  <div class="col-lg-6 col-sm-6">
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
  <div class="col-lg-6 col-sm-6">
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


<br /><br />


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
                                            <th scope="col">Order No.</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Time</th>
                                            <th scope="col">Total Px</th>
                                            <th scope="col">Pay status</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Actions</th>


                                                </tr>
                                                <!-- end row --> 
                                            </thead>

<tbody>
@foreach($orders as $value )
<tr>

<td>

<div class="d-flex align-items-center">
<div class="ms-3">
<h6 class="fw-semibold mb-0">{{ $value->order_number}}</h6>

</div>
</div>

</td>


<td>

<div class="d-flex align-items-center">
<div class="ms-3">
<h6 class="fw-semibold mb-0">{{ $value->order_date}}</h6>

</div>
</div>

</td>



<td>

<div class="d-flex align-items-center">
<div class="ms-3">
<h6 class="fw-semibold mb-0">{{ $value->order_time}}</h6>

</div>
</div>

</td>



<td>
    
<div class="d-flex align-items-center">

<div class="ms-3">
<h6 class="fw-semibold mb-0">{{ $value->amount}}</h6>

</div>
</div>


</td>



<td>
    
  <div class="d-flex align-items-center">
  
  <div class="ms-3">
  <h6 class="fw-semibold mb-0">{{ $value->payment_status}}</h6>
  
  </div>
  </div>
  
  
  </td>



<td class="pe-0">
@if($value->status == 'Order Pending')        
<span class="badge badge-pill badge-warning" style="background: #800080;">Order Pending </span>

@elseif($value->status == 'Order Confirmed')
<span class="badge badge-pill badge-warning" style="background: #0000FF;">Order  Confirmed </span>


@elseif($value->status == 'Out for Delivery')
<span class="badge badge-pill badge-warning" style="background: #FFA500;">Out For Delivery </span>


@elseif($value->status == 'Order Delivered')
<span class="badge badge-pill badge-warning" style="background: green;">Order Delivered </span>


@elseif($value->status == 'Order Cancelled')
<span class="badge badge-pill badge-warning" style="background: red;">Order Cancelled </span>


@endif

</td>




<td>

<div class="action-btn d-flex align-items-center">
<a href="{{route('school.order.details',$value->id)}}"   title="Order Details" class="btn btn-sm btn-primary">
<i class="mdi mdi-notebook-outline me-1"></i>
</a>

&nbsp;&nbsp;&nbsp;

<a href="{{route('order.invoice.report.details',$value->id)}}"  target="_blank" title="Order Invoice Report" class="btn btn-sm btn-warning">
<i class="mdi mdi-printer-outline me-1"></i>
</a>





&nbsp;&nbsp;&nbsp;

@if($value->status == 'Order Pending')       

<a href="{{route('cancel.order',$value->id)}}" title="Cancel Order" class="btn btn-sm bg-danger" id="cancelled">
<span class="mdi mdi-delete-empty bg-label-danger"></span>
</a>

@else


@endif




</div>







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


            
            
                      </div>
                      <!--/ Content -->




                                  

@endsection 