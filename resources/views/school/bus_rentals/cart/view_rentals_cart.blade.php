
@extends('school.bus_rentals.body.admin_master')
@section('content')
        

@section('title')

Rental Cart | funzi bus rentals

@endsection


      


        <!-- Content -->
        
          <div class="container-xxl flex-grow-1 container-p-y">



            <h4 class="py-3 mb-4">
              <span class="text-muted fw-light">View /</span> <b>Bus Rental</b>  Cart Details
            </h4>

            <!-- Checkout Wizard -->
            <div id="wizard-checkout" class="bs-stepper wizard-icons wizard-icons-example mt-2">
              <div class="bs-stepper-header m-auto border-0">
                <div class="step" data-target="#checkout-cart">
                  <button type="button" class="step-trigger">
                    <span class="bs-stepper-label">Bus Rental Cart</span>
                  </button>
                </div>




              </div>
              <div class="bs-stepper-content border-top rounded-0">
                <form id="wizard-checkout-form">
            
                  <!-- Cart -->
                  <div id="checkout-cart" class="content">
                    <div class="row">
                      <!-- Cart left -->
                      <div class="col-xl-8 mb-3 mb-xl-0">
            
            
                        @php 

                        $school_id = Auth::user()->id;
                        $CartCout = App\Models\car_rental_cart::where('school_id',$school_id)->count();
                        $CartSubtotal = App\Models\car_rental_cart::where('school_id',$school_id)->sum('pricetotal');

                        
                        
                              @endphp
            
                        <!-- Shopping bag -->
                        <h5>My Bus Rental Cart ({{$CartCout}} Total Rentals)</h5>
                        <ul class="list-group mb-3">
                        @if($CartCout > 0)

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

                                    <div class="row">

                                      <div class="col-md-4">
                                      <label>Total Buses</label>
                                      <div class="d-flex d-md-block">
  
                                        <button class="btn btn-rounded text-white fw-bold btn-info">{{$cart->vehicle_total}}</button>
                                          
                                      </div>
                                    </div>


                                    <div class="col-md-4">
                                      <label>Total Days</label>
                                      <div class="d-flex d-md-block">
  
                                        <button class="btn btn-rounded text-white fw-bold btn-success">{{$cart->total_days}}</button>
                                          
                                      </div>
                                    </div>

                                    </div>





                                  </div>
                                  <div class="col-md-4">
                                    <div class="text-md-end">
                                      <button type="button" onclick="removeRentalFromCart('{{$cart->id}}')" class="btn-close btn-pinned" aria-label="Close"></button>
            

                                      <div class="d-flex d-md-block align-items-center mb-2 gap-2 justify-content-center justify-content-sm-start">
                                        <div class="mt-md-6 mb-md-0">Total px : <span class="text-primary"> ugx {{$cart->pricetotal}}</span></div>

                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </li>
                          @endforeach

                        </ul>

                        
                        @else

                        <h5>Your Cart Is EMPTY</h5>
                        <ul class="list-group mb-3">
                    
                          <li class="list-group-item p-4">
                            <div class="d-flex gap-3">

                              <div class="flex-grow-1">
                                <div class="row">
                                  <div class="col-md-6">
                                    <a href="{{route('school.car.rentals')}}" class="btn round-pill btn-warning"><i class='tf-icons mdi mdi-cart-arrow-right mdi-20px'></i>Choose Bus Rentals</a>
            

                                  </div>


  
                                  
                                </div>
                              </div>
                            </div>
                          </li>
                          

                        </ul>



                        @endif
            

                      </div>
            
                      <!-- Cart right -->
                      <div class="col-xl-4">
                        <div class="border rounded p-3 mb-3">
            
            
                          <!-- Price Details -->
                          <h6 class="mb-4">Price Details</h6>
                          <dl class="row mb-0">
                            <dt class="col-6 fw-normal text-heading"> Cart Total</dt>


                            <dd class="col-6 text-end">ugx {{$CartSubtotal}}</dd>
            
                            <dt class="col-6 fw-normal text-heading">Bookings Total</dt>
                            <dd class="col-6 text-end">{{$CartCout}}</dd>
                          </dl>

                        </div>
                        <div class="d-grid">
                          <a href="{{ route('bus.rental.checkout')}}" class="btn btn-warning btn-next">CheckOut (ugx {{$CartSubtotal}})</a>
                          </div>
                      </div>
                    </div>
                  </div>

        
                </form>
              </div>
            </div>
            <!--/ Checkout Wizard -->
                        



            
<br/><br/>

</div>
<!-- / Content -->



  
  <form id="deleteFromCart" action="{{route('car.rental.cart.remove')}}" method="post">
  @csrf 
  @method('delete')
  <input type="hidden" id="id_D" name="id" />
  </form>


  
  <form id="clearCart" action="{{route('car.rental.cart.clear')}}" method="POST">
  @csrf 
  @method('delete')

  </form>


                       
              
<script type="text/javascript">

function removeRentalFromCart(id)
{

$('#id_D').val(id);
$('#deleteFromCart').submit();

}



function clearCart()
{

$('#clearCart').submit();
}

</script>



            

            

  
  @endsection