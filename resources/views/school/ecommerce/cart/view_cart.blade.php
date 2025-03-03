@extends('school.ecommerce.body.admin_master')
@section('content')
        

@section('title')

MyCart List | funziwallet

@endsection

         

        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">
            
            
        <h4 class="py-3 mb-4">
              <span class="text-muted fw-light">Ecommerce /</span> My Shopping Cart
            </h4>
            
            <!-- Checkout Wizard -->
            <div id="wizard-checkout" class="bs-stepper wizard-icons wizard-icons-example mt-2">
              <div class="bs-stepper-header m-auto border-0">
                <div class="step" data-target="#checkout-cart">
                  <button type="button" class="step-trigger">
                    <span class="bs-stepper-label">Shopping Cart</span>
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
                        $CartCount = App\Models\order_carts::where('school_id',$school_id)->count();
                        $Subtotal = App\Models\order_carts::where('school_id',$school_id)->sum('pricetotal');

                        
                              @endphp
            
                        <!-- Shopping bag -->
                        <h5>My Shopping Bag ({{$CartCount}} Items)</h5>
                        <ul class="list-group mb-3">
                        @if($CartCount > 0)

                        @foreach($carts as $cart)
                          <li class="list-group-item p-4">
                            <div class="d-flex gap-3">
                              <div class="flex-shrink-0">
                                <img src="{{ (!empty($cart['product']['product_thambnail']))? url('upload/product_images/'.$cart['product']['product_thambnail']):url('upload/no_image.jpg') }}" alt="image Thambnail" class="w-px-100">

                              </div>
                              <div class="flex-grow-1">
                                <div class="row">
                                  <div class="col-md-8">
                                    <h6 class="me-3"><a href="javascript:void(0)" class="text-heading">{{$cart['product']['product_name']}}</a></h6>
                                    <div class="mb-1 d-flex flex-wrap">{{$cart['product']['description']}}</div>

                                    
                                    <label>Quantity</label>
                                    <div class="d-flex d-md-block align-items-center mb-2 gap-4 justify-content-center justify-content-sm-start">

                                      <a href="{{route('cart.qty.decrement',$cart->id)}}" class="btn btn-sm btn-danger">
                                        <span class="ri-indeterminate-circle-fill"></span>
                                        </a>
                                    
                                      <input name="stud_qty" value="{{$cart->qty}}" min="1" style="width:70px;">
                                        
                                      <a href="{{route('cart.qty.increment',$cart->id)}}"  class="btn btn-sm btn-success">
                                        <span class="ri-add-circle-fill"></span>
                                        </a>
                                        
                                    </div>


                                  <div class="col-md-4">
                                    <div class="text-md-end">
                                    <button type="button" onclick="removeItemFromCart('{{$cart->id}}')" class="btn-close btn-pinned" aria-label="Close"></button>

                                    @php 

                                    $product_price = (float)$cart->price * (float)$cart->qty;

                                    @endphp
                                      <div class="my-2 mt-md-4 mb-md-5"><span class="text-primary">ugx {{$product_price}}</span></div>
                                     
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </li>
                          @endforeach
 
                        </ul>

                        
                        @else

                        <h5>Your Shopping Cart Is EMPTY</h5>
                        <ul class="list-group mb-3">
                    
                          <li class="list-group-item p-4">
                            <div class="d-flex gap-3">

                              <div class="flex-grow-1">
                                <div class="row">
                                  <div class="col-md-6">
                                  <a href="{{route('school.products')}}" class="btn round-pill btn-warning"><i class='tf-icons mdi mdi-cart-arrow-right mdi-20px'></i>Shop Now!</a>


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
                            <dt class="col-6 fw-normal text-heading">Bag Total</dt>
                            <dd class="col-6 text-end">ugx {{$Subtotal}}</dd>
            
            
                            <dt class="col-6 fw-normal text-heading">Order Total</dt>
                            <dd class="col-6 text-end">{{$CartCount}}</dd>
            
            
                          </dl>

                        </div>

                        <hr class="mx-n3 my-3">
 

                        <div class="d-grid">
                          <a href="{{ route('checkout')}}" class="btn btn-warning btn-next">CheckOut (ugx {{$Subtotal}})</a>
                          </div>


                      </div>
                    </div>
                  </div>

        
                </form>
              </div>
            </div>
            <!--/ Checkout Wizard -->
            
            

            
                      </div>
                      <!-- / Content -->
            


          
          <form id="deleteFromCart" action="{{route('cart.remove')}}" method="post">
          @csrf 
          @method('delete')
          <input type="hidden" id="rowId_D" name="id" />
          </form>


          
          <form id="clearCart" action="{{route('cart.clear')}}" method="POST">
          @csrf 
          @method('delete')

          </form>


                               
                      
<script type="text/javascript">



function removeItemFromCart(id)
{

$('#rowId_D').val(id);
$('#deleteFromCart').submit();

}



function clearCart()
{

$('#clearCart').submit();
}

</script>


@endsection 