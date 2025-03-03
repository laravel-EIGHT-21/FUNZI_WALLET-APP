
@extends('school.ecommerce.body.admin_master')
@section('content')
        

@section('title')

Admin - Dashboard | funziwallet

@endsection


@php 


$school_id = Auth::user()->id;

$months = date('F Y');

$years = date('Y');



$orders_delivered = App\Models\orders::where('status','Order Delivered')->where('school_id',$school_id)->where('order_year',$years)->get();

$orders_cancelled = App\Models\orders::where('status','Order Cancelled')->where('school_id',$school_id)->where('order_year',$years)->get();

$products = App\Models\products::latest()->limit(6)->get();

@endphp

      
              <!-- Content -->
        
              <div class="container-xxl flex-grow-1 container-p-y">
       
                <div class="row gy-4">
                
                  <!-- Cards with users info -->
                 
                  <div class="col-lg-6 col-sm-6">
                    <div class="card">
                      <div class="card-body">
                        <div class="d-flex align-items-center flex-wrap gap-2">
                          <div class="avatar me-3">
                            <div class="avatar-initial bg-label-success rounded">
                              <i class="mdi mdi-bus mdi-24px">
                              </i>
                            </div>
                          </div>
                    
                          <div class="card-info">
                            <div class="d-flex align-items-center">
                              <h4 class="mb-0">{{count($orders_delivered)}}</h4>

                            </div>
                            <h6>Annual Total Confirmed Orders</h6>
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
                              <i class="mdi mdi-bus mdi-24px">
                              </i>
                            </div>
                          </div>
                
                          <div class="card-info">
                            <div class="d-flex align-items-center">
                              <h4 class="mb-0">{{count($orders_cancelled)}}</h4>

                            </div>
                            <h6>Annual Total Cancelled Orders</h6>
                          </div>
                        
                        </div>
                      </div>
                    </div>
                  </div>
                
                
                
                </div>
                




                 <br />   <br />
            

                 <div class="row">
                  <div class="col-xl-12">
                    <div class="nav-align-top mb-4">
                      <h5 class="mb-1"><a href="{{route('school.products')}}">View More Products</a></h5>
                      <div class="tab-content">
                        <div class="tab-pane fade show active" id="navs-pills-all" role="tabpanel">
                
                        <div class="card mb-4">

                              <div class="card-body">
                                <div class="row gy-4 mb-4">
                
                
                                @foreach($products as $product )
                
                                  <div class="col-sm-6 col-lg-4">
                                    <div class="card p-2 h-100 shadow-none border">
                                      <div class="rounded-2 text-center mb-3">
                                       
                                       <img src="{{asset($product->product_thambnail)}}" class="img-fluid" alt="Product Image" >
                
                                      </div>
                                      <div class="card-body p-3 pt-2">
                
                                        <a href="javascript:void(0);" class="h5">{{ $product->product_name}}</a>
                                        <p class="mt-2">{{ $product->short_descp_en}}</p>
                                       
                                        <hr>

                                        <div class="row mb-6 g-4">
                                          <div class="col-6">
                                            <div class="d-flex">
                                              <div class="avatar flex-shrink-0 me-4">
                                                <span class="avatar-initial rounded-3 bg-label-success"><i class="ri-money-dollar-circle-fill ri-24px"></i></span>
                                              </div>
                                              <div>
                                                <h6 class="mb-0 text-nowrap fw-semibold"> ugx {{$product->selling_price}}</h6>

                                                <small>Price</small>
                                              </div>
                                            </div>
                                          </div>
                                        </div>

                                        <br>

                                        <div class="d-flex flex-column flex-md-row gap-3 text-nowrap flex-wrap flex-md-nowrap  flex-lg-wrap flex-xxl-nowrap">
                                          <a href="{{url('school/product/details/'.$product->id .'/'.$product->product_name)}}">
                                            <button type="button" title="Add to Cart" class="w-100 btn btn-primary d-flex align-items-center">
                                            <i class="mdi mdi-cart-variant lh-1 scaleX-n1-rtl"></i>
                                            </button>
                                          </a>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                
                
                                  @endforeach
                
                
                                </div>
                
                

                
                
                              </div>
                            </div>
                        </div>
                
                
                
                
                
                
                
                        </div>
                        
                
                
                
                
                      </div>
                    </div>
                  </div>
  

<br/><br/>

                          </div>
                          <!-- / Content -->
                

                      

                      <script src="{{asset('Admin/assets/vendor/libs/chart.js/Chart.js')}}"></script>
<script src="{{asset('Admin/assets/vendor/libs/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('Admin/assets/vendor/libs/chart.js/Chart.bundle.min.js')}}"></script>

                      

            
            @endsection