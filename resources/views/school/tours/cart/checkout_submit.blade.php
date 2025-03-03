
@extends('school.tours.body.admin_master')
@section('content')
        

@section('title')

Tour Booking Confirmation | funziwallet

@endsection


        

        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">
            
            
        <h4 class="py-3 mb-4">
              <span class="text-muted fw-light">Tour Ecommerce /</span> Tour Booking Confirmation
            </h4>
            
            <br/>
            <!-- Checkout Wizard -->
            <div id="wizard-checkout" class="bs-stepper wizard-icons wizard-icons-example mt-2">
              <div class="bs-stepper-header m-auto border-0">
                <div class="step" data-target="#checkout-cart">
                  <button type="button" class="step-trigger">
                    <span class="bs-stepper-label">Confirm Tour Booking Payments</span>
                  </button>
                </div>

              </div>

              
              <div class="bs-stepper-content border-top rounded-0" id="wizard-checkout-form">
            
                  <!-- Cart -->
                  <div id="checkout-cart" class="content">
                    <div class="row">
                      <!-- Payment left -->
                      <div class="col-xl-8 mb-4 mb-xl-0">
                        <!-- Offer alert -->
                        @php 

                        $school_id = Auth::user()->id;
                        $tourCartCout = App\Models\tours_cart::where('school_id',$school_id)->count();
                        $tourCartSubtotal_Stud = App\Models\tours_cart::where('school_id',$school_id)->sum('stud_pricetotal');
                        $tourCartSubtotal_Adult = App\Models\tours_cart::where('school_id',$school_id)->sum('adult_pricetotal');
                        
                        
                              @endphp


            
                        <!-- Payment Tabs -->
                        <div class="col-xxl-7 col-lg-8">
                          <div class="nav-align-top">
                            <ul class="nav nav-pills mb-6 row-gap-2" id="paymentTabs" role="tablist">
                              <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="mtn-momo-tab" data-bs-toggle="pill" data-bs-target="#mtn-momo" type="button" role="tab" aria-controls="mtn-momo" aria-selected="true">MTN MoMo</button>
                              </li>
                              <li class="nav-item" role="presentation">
                                <button class="nav-link" id="airtel-momo-tab" data-bs-toggle="pill" data-bs-target="#airtel-momo" type="button" role="tab" aria-controls="airtel-momo" aria-selected="false">Airtel MobileMoney</button>
                              </li>

                            </ul>
                          </div>

                          <br/>

                          <div class="tab-content p-0" id="paymentTabsContent">
                            <!-- Credit card -->
                            <div class="tab-pane fade show active" id="mtn-momo" role="tabpanel" aria-labelledby="mtn-momo-tab">
                              <div class="row g-5">


                                <form action="{{ route('submit.tour.bookings') }}" method="post" id="ConfirmOrder" >
                                  @csrf

                                  <input type="hidden" name="name" value="{{ $data['shipping_name'] }}" class="form-control" id="floatingInput" aria-describedby="floatingInputHelp" />
                                  <input type="hidden" name="email" value="{{ $data['shipping_email'] }}" class="form-control" id="floatingInput" aria-describedby="floatingInputHelp" />
                                  <input type="hidden" name="school_tel1" value="{{ $data['shipping_tel1'] }}" class="form-control" id="floatingInput" aria-describedby="floatingInputHelp" />
                                  <input type="hidden" name="school_tel2" value="{{ $data['shipping_tel2'] }}" class="form-control" id="floatingInput" aria-describedby="floatingInputHelp" />
                                  <input type="hidden" name="school_address" value="{{ $data['shipping_address'] }}" class="form-control" id="floatingInput" aria-describedby="floatingInputHelp" /> 
                      

                                <div class="col-12">

                                  <div class="input-group input-group-merge">
                                    <div class="form-floating form-floating-outline">
                                      <input id="paymentCard" name="mobile_number" class="form-control" type="text" placeholder="077,078,076...etc" />
                                      <label for="paymentCard">Enter MTN MoMo Number</label>
                                    </div>
                                    <span class="input-group-text p-1" id="paymentCard2"><span class="card-type"></span></span>
                                  </div>
                                </div>


                                <div class="col-12">


                              <a href="javascript:void(0)" onclick="event.preventDefault();document.getElementById('ConfirmOrder').submit();" class="btn btn-primary btn-next m-3">
                              <span>Submit Payment</span>
                              </a>      

                                  <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                </div>
                                </form>

                              </div>



                            </div>
            

                            <!-- COD -->
                            <div class="tab-pane fade" id="airtel-momo" role="tabpanel" aria-labelledby="airtel-momo-tab">
                              <div class="tab-pane fade show" id="airtel-momo" role="tabpanel" aria-labelledby="airtel-momo-tab">
                                <div class="row g-5">
                                  <div class="col-12">
                                    <div class="input-group input-group-merge">
                                      <div class="form-floating form-floating-outline">
                                        <input id="paymentCard" name="mobile_number" class="form-control credit-card-mask" type="text" placeholder="075,070...etc" />
                                        <label for="paymentCard">Enter Airtel MobileMoney Number</label>
                                      </div>
                                      <span class="input-group-text p-1" id="paymentCard2"><span class="card-type"></span></span>
                                    </div>
                                  </div>
  
  
                                  <div class="col-12">
                                    <button type="button" class="btn btn-primary btn-next me-3">Save Changes</button>
                                    <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                  </div>
                                </div>
                              </div>
                            </div>
            




                          </div>
                        </div>
            
                      </div>
                      <!-- Address right -->
                      <div class="col-xl-4">
                        <div class="border rounded p-3 mb-3">
            
            
                          <!-- Price Details -->
                          <h6 class="mb-4">Price Details</h6>
                          <dl class="row mb-0">
                            <dt class="col-6 fw-normal text-heading">Tour Cart Amount</dt>


                        @php 

                        $subtotal =(float)$tourCartSubtotal_Stud + (float)$tourCartSubtotal_Adult;

                        @endphp
                            <dd class="col-6 text-end">ugx {{$subtotal}}</dd>
            
                            <dt class="col-6 fw-normal text-heading">Tours</dt>
                            <dd class="col-6 text-end">{{$tourCartCout}}</dd>
                          </dl>

                        </div>
                      </div>
                    </div>
                  </div>

              </div>
            </div>
            <!--/ Checkout Wizard -->
            
            



<br/>
<br/>

            
                      </div>
                      <!-- / Content -->
            


            

@endsection 