
@extends('school.tours.body.admin_master')
@section('content')
        

@section('title')

Tour Cart | funzitours

@endsection


      
 

        <!-- Content -->
        
          <div class="container-xxl flex-grow-1 container-p-y">



            <h4 class="py-3 mb-4">
              <span class="text-muted fw-light">View /</span> <b>Tours</b>  Cart Details
            </h4>

            <!-- Checkout Wizard -->
            <div id="wizard-checkout" class="bs-stepper wizard-icons wizard-icons-example mt-2">
              <div class="bs-stepper-header m-auto border-0">
                <div class="step" data-target="#checkout-cart">
                  <button type="button" class="step-trigger">
                    <span class="bs-stepper-label">Tour Packages Cart</span>
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
                        $tourCartCout = App\Models\tours_cart::where('school_id',$school_id)->count();
                        $tourCartSubtotal_Stud = App\Models\tours_cart::where('school_id',$school_id)->sum('stud_pricetotal');
                        $tourCartSubtotal_Adult = App\Models\tours_cart::where('school_id',$school_id)->sum('adult_pricetotal');
                        
                        
                              @endphp
            
                        <!-- Shopping bag -->
                        <h5>My Tour Cart ({{$tourCartCout}} Tour Packages)</h5>
                        <ul class="list-group mb-3">
                        @if($tourCartCout > 0)

                        @foreach($tourCart as $cart)
                          <li class="list-group-item p-4">
                            <div class="d-flex gap-3">
                              <div class="flex-shrink-0">
                                <img src="{{ (!empty($cart['tour']['image_thambnail']))? url('upload/tour_package_thumbnail/'.$cart['tour']['image_thambnail']):url('upload/no_image.jpg') }}" alt="image Thambnail" class="w-px-100">

                              </div>
                              <div class="flex-grow-1">
                                <div class="row">
                                  <div class="col-md-8">
                                    <h6 class="me-3"><a href="javascript:void(0)" class="text-heading">{{$cart['tour']['name']}}</a></h6>

                                    <label>Student Qty</label>
                                    <div class="d-flex d-md-block align-items-center mb-2 gap-4 justify-content-center justify-content-sm-start">

                                      <a href="{{route('tour.cart.students.qty.decrement',$cart->id)}}" class="btn btn-sm btn-danger">
                                        <span class="ri-indeterminate-circle-fill"></span>
                                        </a>
                                    
                                      <input name="stud_qty" value="{{$cart->stud_qty}}" min="1" style="width:70px;">
                                        
                                      <a href="{{route('tour.cart.students.qty.increment',$cart->id)}}"  class="btn btn-sm btn-success">
                                        <span class="ri-add-circle-fill"></span>
                                        </a>
                                        
                                    </div>

                                    <label>Adult Qty</label>
                                    <div class="d-flex d-md-block align-items-center mb-2 gap-2 justify-content-center justify-content-sm-start">

                                      <a href="{{route('tour.cart.adults.qty.decrement',$cart->id)}}" class="btn btn-sm btn-danger">
                                        <span class="ri-indeterminate-circle-fill"></span>
                                        </a>
                                    
                                      <input name="adult_qty" value="{{$cart->adult_qty}}" min="1" style="width:70px;">
                                        
                                      <a href="{{route('tour.cart.adults.qty.increment',$cart->id)}}"  class="btn btn-sm btn-success">
                                        <span class="ri-add-circle-fill"></span>
                                        </a>
                                    </div>


                                  </div>
                                  <div class="col-md-4">
                                    <div class="text-md-end">
                                      <button type="button" onclick="removeTourFromCart('{{$cart->id}}')" class="btn-close btn-pinned" aria-label="Close"></button>
            

                                      <div class="d-flex d-md-block align-items-center mb-2 gap-2 justify-content-center justify-content-sm-start">
                                        <div class="mt-md-6 mb-md-0">Student Px :<span class="text-primary">ugx {{$cart->stud_pricetotal}}</span></div>
                                        <div class="mt-md-6 mb-md-0">Adult Px :<span class="text-primary">ugx {{$cart->adult_pricetotal}}</span></div>
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

                        <h5>Tour Cart Is EMPTY</h5>
                        <ul class="list-group mb-3">
                    
                          <li class="list-group-item p-4">
                            <div class="d-flex gap-3">

                              <div class="flex-grow-1">
                                <div class="row">
                                  <div class="col-md-6">
                                    <a href="{{route('school.tour.packages')}}" class="btn round-pill btn-warning"><i class='tf-icons mdi mdi-cart-arrow-right mdi-20px'></i>Add Tours To Cart!</a>
            

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
                            <dt class="col-6 fw-normal text-heading">Tour Cart Total</dt>


                        @php 

                        $subtotal =(float)$tourCartSubtotal_Stud + (float)$tourCartSubtotal_Adult;

                        @endphp
                            <dd class="col-6 text-end">ugx {{$subtotal}}</dd>
            
                            <dt class="col-6 fw-normal text-heading">Bookings Total</dt>
                            <dd class="col-6 text-end">{{$tourCartCout}}</dd>
                          </dl>

                        </div>
                        <div class="d-grid">
                          <a href="{{ route('tour.checkout')}}" class="btn btn-warning btn-next">CheckOut (ugx {{$subtotal}})</a>
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



  
  <form id="deleteFromCart" action="{{route('tour.cart.remove')}}" method="post">
  @csrf 
  @method('delete')
  <input type="hidden" id="id_D" name="id" />
  </form>


  
  <form id="clearCart" action="{{route('tour.cart.clear')}}" method="POST">
  @csrf 
  @method('delete')

  </form>


                       
              
<script type="text/javascript">

function removeTourFromCart(id)
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