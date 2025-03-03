@extends('school.ecommerce.body.admin_master')
@section('content')
        

@section('title')

Order Details | funziwallet

@endsection



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        
        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">
            
            
        <h4 class="py-3 mb-2">
              <span class="text-muted fw-light">View /</span> Order Details
            </h4>

            
                    
            <a href="{{ route('view.school.orders')}}" class="btn rounded-pill btn-primary" style="float:right;"><i class='tf-icons mdi mdi-arrow-left mdi-20px'></i>Back</a>



<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">
            
              <div class="d-flex flex-column justify-content-center gap-2 gap-sm-0">
                <h4 class="mb-1 mt-3 d-flex flex-wrap gap-2 align-items-end">Order No. #{{$order->order_number}} &nbsp;&nbsp; <b>|</b> &nbsp;&nbsp;


                 @if($order->status == 'Order Pending')        
                 Order Status : <span class="badge badge-pill badge-warning" style="background: #800080;">Order Pending </span>

@elseif($order->status == 'Order Confirmed')
Order Status : <span class="badge badge-pill badge-warning" style="background: #0000FF;">Order  Confirmed </span>


@elseif($order->status == 'Out for Delivery')
Order Status : <span class="badge badge-pill badge-warning" style="background: #FFA500;">Out For Delivery </span>


@elseif($order->status == 'Order Delivered')
Order Status : <span class="badge badge-pill badge-warning" style="background: green;">Order  Delivered </span>
@endif
                
                
                 
                </h4>
                <p class="text-body"><b>Order Date : {{$order->order_date}}</b> &nbsp;&nbsp; <b>|</b> &nbsp;&nbsp; <b>Order Time : {{$order->order_time}}</b> &nbsp;&nbsp; <b>|</b> &nbsp;&nbsp; <b>Credit Status : {{$order->payment_status}}</b>
                

                  &nbsp;&nbsp; <b>|</b> &nbsp;&nbsp; <b>Payment Status : 


                    @if($order_payments['0']['total_amount'] == $order_payments['0']['amount'])        
                    <span class="badge badge-pill badge-warning" style="background: #34f105;">Full Payment Made </span>
   
   @elseif($order_payments['0']['total_amount'] > $order_payments['0']['amount'] && $order_payments['0']['amount'] != 0)
   <span class="badge badge-pill badge-warning" style="background: #e0f718;">Partial Payment Made </span>
   
   
   @elseif($order_payments['0']['amount'] == 0)
   <span class="badge badge-pill badge-warning" style="background: #f80b0b;">No Payment Made </span>
   
   @endif

                  </b>
                
                </p>
              </div>


            </div>
            
            <div class="col-xl-12 col-lg-7 col-md-7 order-0 order-md-1">

              <ul class="nav nav-pills flex-column flex-md-row mb-4">
          
          
              <li class="nav-item">
              <button type="button" class="nav-link active py-2" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-overview" aria-controls="navs-pills-justified-overview" aria-selected="true">Overview </button>
              </li>
          
          
              <li class="nav-item">
              <button type="button" class="nav-link py-2" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-order-payments" aria-controls="navs-pills-justified-order-payments" aria-selected="false">Order Payment</button>
              </li>

                          
              <li class="nav-item">
                <button type="button" class="nav-link py-2" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-offline-orders-payments" aria-controls="navs-pills-justified-offline-orders-payments" aria-selected="false">Track Offline Payments </button>
                </li>            
            
          

  


              </ul>
          
          
              <div class="tab-content">

                
    <div class="tab-pane fade show active" id="navs-pills-justified-overview" role="tabpanel">


                  <!-- Order Details Table -->
            
                  <div class="row">
                    <div class="col-12 col-lg-9">
                      <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                          <h5 class="card-title m-0">Order details</h5>
      
                        </div>
                        <div class="table-responsive text-nowrap">
                    <table class="table table-borderless">
                      <thead class="border-bottom">
                              <tr>
            
                              <th class="w-50">Products</th>
                                <th class="w-20">Unit Price</th>
                                <th class="w-5">Qty</th>
                                <th class="w-15">Total</th>
                              </tr>
                            </thead>
                            @foreach($orderItems as $value )
                            <tbody>
                              <tr>
                              <td>
                                <div class="d-flex align-items-center">
                                 
                              <img src="{{ (!empty($value['product']['product_thambnail']))? url('upload/product_images/'.$value['product']['product_thambnail']):url('upload/no_image.jpg') }}" class="rounded-circle" alt="Product Image" width="50" height="50">
      
                                  
                                  
                                  <div class="ms-3">
                                    <h6 class="fw-semibold mb-0 fs-5">{{$value->product->product_name}}</h6>
                                    <p class="mb-0">{{$value->product->short_descp_en}}</p>
                                  </div>
                                </div>
                              </td>
       
      
                              <td>
          
          <div class="d-flex align-items-center">
          
          <div class="ms-3">
          <h6 class="fw-semibold mb-0">{{ $value->price}}</h6>
          
          </div>
          </div>
          
          
          </td>
          
          
          
          <td>
          
          <div class="d-flex align-items-center">
          
          <div class="ms-3">
          <h6 class="fw-semibold mb-0">{{ $value->qty}}</h6>
          
          </div>
          </div>
              
          </td>
      
          
          <td>
          
          <div class="d-flex align-items-center">
          
          <div class="ms-3">
          <h6 class="fw-semibold mb-0">{{ $value->pricetotal}}</h6>
          
          </div>
          </div>
              
          </td>
          
      
          
      
                              </tr>
                            </tbody>
                            @endforeach
                          </table>
                          <div class="d-flex justify-content-end align-items-center m-3 mb-2 p-1">
                            <div class="order-calculations">
      
                              <div class="d-flex justify-content-between">
                                <h6 class="w-px-100 mb-0">Total Px:</h6>
                                <h6 class="mb-0">ugx {{$order->amount}}</h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
      
      
      
      
      
      
                      <div class="card mb-4">
                        <div class="card-header">
                          <h5 class="card-title m-0">Shipping activity</h5>
                        </div>
      
                        <div class="card-body">
                          <ul class="timeline pb-0 mb-0">
      
                          @if($order->status == 'Order Pending')
      
      
                          <li class="timeline-item timeline-item-transparent border-left-dashed">
                              <span class="timeline-point timeline-point-danger"></span>
                              <div class="timeline-event">
                                <div class="timeline-header">
                                  <h6 class="mb-0">Order was placed (Order ID: #{{$order->order_number}})</h6>
                                  <span class="text">{{$order->created_at}}</span>
                                </div>
                                
                              </div>
                            </li>
      
      
      
                            <li class="timeline-item timeline-item-transparent border-border-left-dashed">
                              <span class="timeline-point timeline-point-secondary"></span>
                              <div class="timeline-event">
                                <div class="timeline-header">
                                  <h6 class="mb-0">Order Confirmed</h6>
                                  <span class="text">{{$order->confirmed_date}}</span>
                                </div>
                               
                              </div>
                            </li>
      
      
                            
                            <li class="timeline-item timeline-item-transparent border-border-left-dashed">
                              <span class="timeline-point timeline-point-secondary"></span>
                              <div class="timeline-event">
                                <div class="timeline-header">
                                  <h6 class="mb-0">Dispatched for delivery</h6>
                                  <span class="text">{{$order->shipped_date}}</span>
                                </div>
      
                              </div>
                            </li>
      
      
      
                            <li class="timeline-item timeline-item-transparent border-transparent pb-0">
                              <span class="timeline-point timeline-point-secondary"></span>
                              <div class="timeline-event pb-0">
                                <div class="timeline-header">
                                  <h6 class="mb-0">Delivered</h6>
                                  <span class="text">{{$order->delivered_date}}</span>
                                </div>
                                 </div>
                            </li>
      
                            
                            @elseif($order->status == 'Order Confirmed')
                           
                            <li class="timeline-item timeline-item-transparent border-danger">
                              <span class="timeline-point timeline-point-danger"></span>
                              <div class="timeline-event">
                                <div class="timeline-header">
                                  <h6 class="mb-0">Order was placed (Order ID: #{{$order->order_number}})</h6>
                                  <span class="text">{{$order->created_at}}</span>
                                </div>
                                
                              </div>
                            </li>
      
      
                            
      
                            <li class="timeline-item timeline-item-transparent border-border-warning">
                              <span class="timeline-point timeline-point-warning"></span>
                              <div class="timeline-event">
                                <div class="timeline-header">
                                  <h6 class="mb-0">Order Confirmed</h6>
                                  <span class="text">{{$order->confirmed_date}}</span>
                                </div>
                               
                              </div>
                            </li>
      
      
                            
                            <li class="timeline-item timeline-item-transparent border-border-left-dashed">
                              <span class="timeline-point timeline-point-secondary"></span>
                              <div class="timeline-event">
                                <div class="timeline-header">
                                  <h6 class="mb-0">Dispatched for delivery</h6>
                                  <span class="text">{{$order->shipped_date}}</span>
                                </div>
      
                              </div>
                            </li>
      
      
      
                            <li class="timeline-item timeline-item-transparent border-transparent pb-0">
                              <span class="timeline-point timeline-point-secondary"></span>
                              <div class="timeline-event pb-0">
                                <div class="timeline-header">
                                  <h6 class="mb-0">Delivered</h6>
                                  <span class="text">{{$order->delivered_date}}</span>
                                </div>
                               </div>
                            </li>
      
                            @elseif($order->status == 'Out for Delivery')
      
                            <li class="timeline-item timeline-item-transparent border-danger">
                              <span class="timeline-point timeline-point-danger"></span>
                              <div class="timeline-event">
                                <div class="timeline-header">
                                  <h6 class="mb-0">Order was placed (Order ID: #{{$order->order_number}})</h6>
                                  <span class="text">{{$order->created_at}}</span>
                                </div>
                                
                              </div>
                            </li>
      
      
                            
      
                            <li class="timeline-item timeline-item-transparent border-warning">
                              <span class="timeline-point timeline-point-warning"></span>
                              <div class="timeline-event">
                                <div class="timeline-header">
                                  <h6 class="mb-0">Order Confirmed</h6>
                                  <span class="text">{{$order->confirmed_date}}</span>
                                </div>
                               
                              </div>
                            </li>
      
      
                            
                            <li class="timeline-item timeline-item-transparent border-warning">
                              <span class="timeline-point timeline-point-warning"></span>
                              <div class="timeline-event">
                                <div class="timeline-header">
                                  <h6 class="mb-0">Dispatched for delivery</h6>
                                  <span class="text">{{$order->shipped_date}}</span>
                                </div>
      
                              </div>
                            </li>
      
      
      
                            <li class="timeline-item timeline-item-transparent border-left-dashed">
                              <span class="timeline-point timeline-point-secondary"></span>
                              <div class="timeline-event pb-0">
                                <div class="timeline-header">
                                  <h6 class="mb-0">Delivered</h6>
                                  <span class="text">{{$order->delivered_date}}</span>
                                </div>
      
                              </div>
                            </li>
      
      
      
                            
                            @elseif($order->status == 'Order Delivered')
      
                            <li class="timeline-item timeline-item-transparent border-danger">
                              <span class="timeline-point timeline-point-danger"></span>
                              <div class="timeline-event">
                                <div class="timeline-header">
                                  <h6 class="mb-0">Order was placed (Order ID: #{{$order->order_number}})</h6>
                                  <span class="text">{{$order->created_at}}</span>
                                </div>
                                
                              </div>
                            </li>
      
      
                            
      
                            <li class="timeline-item timeline-item-transparent border-warning">
                              <span class="timeline-point timeline-point-warning"></span>
                              <div class="timeline-event">
                                <div class="timeline-header">
                                  <h6 class="mb-0">Order Confirmed</h6>
                                  <span class="text">{{$order->confirmed_date}}</span>
                                </div>
                               
                              </div>
                            </li>
      
      
                            
                            <li class="timeline-item timeline-item-transparent border-warning">
                              <span class="timeline-point timeline-point-warning"></span>
                              <div class="timeline-event">
                                <div class="timeline-header">
                                  <h6 class="mb-0">Dispatched for delivery</h6>
                                  <span class="text">{{$order->shipped_date}}</span>
                                </div>
      
                              </div>
                            </li>
      
      
                            <li class="timeline-item timeline-item-transparent border-success">
                              <span class="timeline-point timeline-point-success"></span>
                              <div class="timeline-event pb-0">
                                <div class="timeline-header">
                                  <h6 class="mb-0">Delivered</h6>
                                  <span class="text">{{$order->delivered_date}}</span>
                                </div>
      
                              </div>
                            </li>
      
      
      
      
                            @endif  
      
      
      
                          </ul>
                        </div>
                      </div>
      
      
      
                    </div>
      
      
      
                    <div class="col-12 col-lg-3">
      
                         <div class="card mb-4">
            <div class="card-header">
              <h6 class="card-title m-0">Customer details</h6>
            </div>
            <div class="card-body">
              <div class="d-flex justify-content-start align-items-center mb-4">
      
                <div class="d-flex flex-column">
                  <a href="app-user-view-account.html" class="text-body text-nowrap">
                    <h6 class="mb-0">{{$order->name}}</h6>
                  </a>
      </div>
              </div>
              <div class="d-flex justify-content-start align-items-center mb-4">
                <span class="avatar rounded-circle bg-label-success me-2 d-flex align-items-center justify-content-center"><i class='mdi mdi-cart-plus mdi-24px'></i></span>
                <h6 class="text-body text-nowrap mb-0">{{$order->total_order_items}} Order Items</h6>
              </div>
              <div class="d-flex justify-content-between"> 
                <h6>Contact info</h6>
      
              </div>
              <p class=" mb-1">Email: {{$order->email}}</p>
              <p class=" mb-0">Tel One : {{$order->school_tel1}}</p>
              <p class=" mb-0">Tel Two : {{$order->school_tel2}}</p>
            </div>
          </div>
                  
                      <div class="card mb-4">
      
      <div class="card-header d-flex justify-content-between">
        <h6 class="card-title m-0">Shipping address</h6>
        
      </div>
      <div class="card-body">
        <p class="mb-0">{{$order->school_address}}</p>
      </div>
      
      </div>
      
                    </div>
                  </div>
      
      

    </div>



    <div class="tab-pane fade" id="navs-pills-justified-order-payments" role="tabpanel">
      <div class="row">
  
      <div class="card">
                                  <div class="card-body">

       
                              <div class="table-responsive">
                              <table class="table border table-striped table-bordered text-nowrap">
                              <thead>
                              <!-- start row -->
                              <tr>
  
                                <th>Order No</th>
                                <th>Paid</th>
                                <th>Total</th>
                                <th>Balance</th>

  
                              </tr>
                              <!-- end row -->
                              </thead>
                              @foreach($order_payments as $key => $value )
                              <tbody>
                                  <tr>
  
                                  <td>{{ $value['order']['order_number']}}</td>
  
  <td>
  
  
  <span class="badge rounded-pill text-success bg-dark-success p-2 text-uppercase px-3"><b><i class='align-middle me-1'></i>ugx {{ $value->amount }}</b></span>
  
  
  </td>
  
  
  
  <td>
  
  
  <span class="badge rounded-pill text-primary bg-dark-info p-2 text-uppercase px-3"><b><i class='align-middle me-1'></i>ugx {{ $value->total_amount }}</b></span>
  
  
  </td>
  
  
  @php 
  
  $bal = (float)$value->total_amount-(float)$value->amount;
  
  @endphp
  
  
  <td>
  
  
  <span class="badge rounded-pill text-danger bg-dark-danger p-2 text-uppercase px-3"><b><i class='align-middle me-1'></i>ugx {{ $bal }}</b></span>
  
  
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


      
      <div class="tab-pane fade" id="navs-pills-justified-offline-orders-payments" role="tabpanel">

        <div class="row">


          <div class="card">
                           <div class="card-body">
          
                                                                      
          <div class="row"> 
          
          <div class="col-md-3" style="padding-top: 10px;">
          
          <a href="{{ route('offline.order.payments.track.invoice',$order->id) }}" target="_blank" class="btn rounded-pill btn-info">
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
          
                                    <th>Order No.</th> 
                                    <th> Topup Pay</th>
                                    <th>Balance</th>
                                    <th> Payment type</th>
                                    <th> Date</th>
                                    <th>Month</th>
          
                                      </tr>
                                      <!-- end row -->
                                      </thead>
                                      @foreach($offline_payments_track as $key => $value )
                                      <tbody>
                                          <tr>
          
                            <td> {{ $value['order']['order_number']}}</td>	
                            <td> {{ $value->payment_amount }}</td>	
                            <td> {{ $value->order_amount_balance }}</td>	
                            <td> {{ $value->payment_type}}</td>	
                            <td> {{ $value->date }}</td>	
                            <td> {{ $value->month }}</td>

          
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
            
            
            
            
                      </div>
                      <!--/ Content -->
            
            
                    
@endsection
