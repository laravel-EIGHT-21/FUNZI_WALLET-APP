
@extends('school.bus_rentals.body.admin_master')
@section('content')
        
 
@section('title')

Bus Rental Checkout | funzitours

@endsection

            
        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">
            
            

            <h4 class="py-3 mb-0">
              <span class="text-muted fw-light">View/</span><span class="fw-medium">Bus Rental Booking CheckOut</span>
            </h4>
            
            <div class="app-ecommerce">
            
            <form id="CheckOutStore" method="post" action="{{ route('bus.rental.checkout.store') }}">
                @csrf
            
              <div class="row">

                <!-- First column-->
                <div class="col-12 col-lg-5">
                  <!-- Product Information -->
                  <div class="card mb-4">
                    <div class="card-header">
                      <h5 class="card-tile mb-0">School Information</h5>
                    </div>
                    <div class="card-body">
                      <div class="mb-3">
                        <label class="form-label" for="ecommerce-school-name">School</label>
                        <input type="text" class="form-control" id="ecommerce-school-name"  name="shipping_name" value="{{ Auth::user()->name }}" aria-label="School Name">
                      </div>


                      <div class="mb-3">
                        <label class="form-label" for="ecommerce-school-email">Email</label>
                        <input type="email" class="form-control" id="ecommerce-school-email" name="shipping_email" value="{{Auth::user()->email}}" aria-label="Email">
                      </div>

                      <div class="mb-3">
                        <label class="form-label" for="ecommerce-school_tel1">Telephone One</label>
                        <input type="text" class="form-control" id="ecommerce-school_tel1" name="shipping_tel1" value="{{Auth::user()->school_tel1}}" aria-label="Telephone One">
                      </div>

                      <div class="mb-3">
                        <label class="form-label" for="ecommerce-school_tel2">Telephone Two</label>
                        <input type="text" class="form-control" id="ecommerce-school_tel2" name="shipping_tel2" value="{{Auth::user()->school_tel2}}" aria-label="Telephone Two">
                      </div>

                      <div class="mb-3">
                        <label class="form-label" for="ecommerce-school_address">Address</label>
                        <input type="text" class="form-control" id="ecommerce-school_address" name="shipping_address" value="{{Auth::user()->address}}" aria-label="Address">
                      </div>
                    
                    </div>
                  </div>
                  <!-- /Product Information -->


                </div>
                <!-- /First column -->
            
                @php 

                $school_id = Auth::user()->id;
                $CartCout = App\Models\car_rental_cart::where('school_id',$school_id)->count();
                $CartSubtotal = App\Models\car_rental_cart::where('school_id',$school_id)->sum('pricetotal');
                
                
                      @endphp

                <!-- Second column -->
                <div class="col-12 col-lg-7"> 
                  <div class="card mb-4">
                    <div class="card-header">
                      <h5 class="card-title mb-0">Bus Rental(s) ({{$CartCout}})</h5>
                    </div>
                    <div class="card-body">
                  <ul class="list-group mb-3">
                  

                    @foreach($rentalCart as $cart)
                      <li class="list-group-item p-4">
                        <div class="d-flex gap-3">
                          <div class="flex-shrink-0">
                            <img src="{{ (!empty($cart['car']['car_photo']))? url('upload/car_photos/'.$cart['car']['car_photo']):url('upload/no_image.jpg') }}" alt="image Thambnail" class="w-px-100">

                          </div>
                          <div class="flex-grow-1">
                            <div class="row">
                              <div class="col-md-8">
                                <h6 class="me-3"><a href="javascript:void(0)" class="text-heading">{{$cart['car']['car_name']}}</a></h6>


                                <div class="d-flex d-md-block align-items-center mb-2 gap-4 justify-content-center justify-content-sm-start">

                                  <p class="fw-medium">Total Buses : {{$cart->vehicle_total}}</p>
                                  <p class="fw-medium">Total Days : {{$cart->total_days}}</p>

                                </div>


                              </div>


                            </div>
                          </div>
                        </div>
                      </li>
                      @endforeach

                    </ul>

                    <hr class="mx-n4">


<!-- Price Details -->
<h6>Price Details</h6>
<dl class="row mb-0">

  <dt class="col-6 fw-normal text-heading">Total</dt>
  <dd class="col-6 text-end">ugx {{ $CartSubtotal }}</dd>

</dl>
<hr class="mx-n4">
<div class="d-grid">
              <button type="button" onclick="event.preventDefault();document.getElementById('CheckOutStore').submit();" class="btn btn-primary btn-next">
            Proceed to CheckOut
</button>


            </div>

                  </div>



                </div>

                </div>
                <!-- /Second column -->

              </div>
              </form>
            </div>
            
                      </div>
                      <!--/ Content -->
                      
            
@endsection 