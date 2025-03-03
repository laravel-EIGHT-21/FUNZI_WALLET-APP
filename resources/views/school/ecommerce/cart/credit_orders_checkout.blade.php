@extends('school.ecommerce.body.admin_master')
@section('content')
        


@section('title')

School Credit Orders | funziwallet

@endsection


        

        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">
            
            
        <h4 class="py-3 mb-4">
              <span class="text-muted fw-light">Ecommerce /</span> Credit Orders Confirmation
            </h4>
            
            <!-- Checkout Wizard -->
            <div id="wizard-checkout" class="bs-stepper wizard-icons wizard-icons-example mt-2">
              <div class="bs-stepper-header m-auto border-0">
                <div class="step" data-target="#checkout-cart">
                  <button type="button" class="step-trigger">
                    <span class="bs-stepper-label">Confirm Credit Order</span>
                  </button>
                </div>




              </div>
              <div class="bs-stepper-content border-top rounded-0" id="wizard-checkout-form">
            
                  <!-- Cart -->
                  <div id="checkout-cart" class="content">
                    <div class="row">
                      <!-- Cart left -->
                      <div class="col-xl-8 mb-3 mb-xl-0">


                        
@php 

$school_id = Auth::user()->id;
$CartCount = App\Models\order_carts::where('school_id',$school_id)->count();
$Subtotal = App\Models\order_carts::where('school_id',$school_id)->sum('pricetotal');



@endphp
            
            
                        <!-- Shopping bag -->
                        <h5>My Shopping Bag ({{$CartCount}} Items)</h5>
                        <ul class="list-group mb-3">

                        @foreach($carts as $cart)
                          <li class="list-group-item p-4">
                            <div class="d-flex gap-3">
                              <div class="flex-shrink-0">
                                <img src="{{ (!empty($cart['product']['product_thambnail']))? url('upload/product_images/'.$cart['product']['product_thambnail']):url('upload/no_image.jpg') }}" alt="product image" class="w-px-100">
                              </div>
                              <div class="flex-grow-1">
                                <div class="row">
                                  <div class="col-md-8">
                                    <h6 class="me-3"><a href="javascript:void(0)" class="text-heading">{{$cart['product']['product_name']}}</a></h6>


                                        <p class="fw-medium">Quantity : {{$cart->qty}}</p>

                                        <p class="fw-medium">Total Price : {{$cart->pricetotal}}</p>


                                  </div>
                                  <div class="col-md-4">
                                    <div class="text-md-end">

                                      <div class="my-2 mt-md-4 mb-md-5"><span class="text-primary">ugx {{$cart->pricetotal}}</span></div>

                                     
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </li>
                          @endforeach

                        </ul>
            

                      </div>
            
                      <!-- Cart right -->
                      <div class="col-xl-4">
                        <div class="border rounded p-3 mb-3">
            
            
                          <!-- Price Details -->
                          <h6 class="mb-4">Price Details</h6>
                          <dl class="row mb-0">
                            <dt class="col-6 fw-normal text-heading">Bag Total</dt>
                            <dd class="col-6 text-end">ugx {{$Subtotal}}</dd>
            
            
                            <dt class="col-6 fw-normal text-heading">Order Total</dt>
                            <dd class="col-6 text-end">{{count($carts)}}</dd>
            
            
                          </dl>
                          <hr class="mx-n3 my-3">
                          <dl class="row mb-0 h6">
                            <dt class="col-6 mb-0">Total</dt>
                            <dd class="col-6 text-end mb-0">ugx {{$Subtotal}}</dd>
                          </dl>
                        </div>
                        <div class="d-grid">

                        


                            <form action="{{ route('submit.credit.orders') }}" method="post" id="ConfirmCreditOrder" >
                                @csrf
                                
                                <div class="row">
                                <div class="form-floating">
                                    <input type="hidden" name="name" value="{{ $data['shipping_name'] }}" class="form-control" id="floatingInput" aria-describedby="floatingInputHelp" />
                                    <input type="hidden" name="email" value="{{ $data['shipping_email'] }}" class="form-control" id="floatingInput" aria-describedby="floatingInputHelp" />
                                   <input type="hidden" name="school_tel1" value="{{ $data['shipping_tel1'] }}" class="form-control" id="floatingInput" aria-describedby="floatingInputHelp" />
                                   <input type="hidden" name="school_tel2" value="{{ $data['shipping_tel2'] }}" class="form-control" id="floatingInput" aria-describedby="floatingInputHelp" />
                                   <input type="hidden" name="school_address" value="{{ $data['shipping_address'] }}" class="form-control" id="floatingInput" aria-describedby="floatingInputHelp" /> 
                                      
                                
                                </div>
                                </div>
                                
                                </form>
                                
                                
                                
                                
                                <a href="javascript:void(0)" onclick="event.preventDefault();document.getElementById('ConfirmCreditOrder').submit();" class="btn btn-warning btn-next">
                                <span>Credit Order(s)</span>
                                </a>      
                                
                      
                      

                        </div>

                      </div>
                    </div>
                  </div>

              </div>
            </div>
            <!--/ Checkout Wizard -->
            
            

            
                      </div>
                      <!-- / Content -->
            


            

@endsection 