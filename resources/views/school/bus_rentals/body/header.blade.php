<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1"> 
  
    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-bar animate-dropdown">
      <div class="container">
        <div class="header-top-inner">
          <div class="cnt-account">
            <ul class="list-unstyled">
              
              <li><a href="{{ route('view.car.rental.cart')}}"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>
            
              <li><a href="{{route('view.bus.rental.bookings')}}"><i class="icon fa fa-align-justify fa-fw"></i>Bookings</a></li>
            </ul>
          </div>
          <!-- /.cnt-account -->
          
          
          <!-- /.cnt-cart -->
          <div class="clearfix"></div> 
        </div> 
        <!-- /.header-top-inner --> 
      </div>
      <!-- /.container --> 
    </div>
    <!-- /.header-top --> 
    <!-- ============================================== TOP MENU : END ============================================== -->
    <div class="main-header">
      <div class="container"> 
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-3 logo-holder"> 
            <!-- ============================================================= LOGO ============================================================= -->
            <div class="logo"> <a href="{{route('school.car.rentals.dashboard')}}"> <img src="{{asset('eCOMM/assets/images/logo.png')}}" alt=""> </a> </div>
            <!-- /.logo --> 
            <!-- ============================================================= LOGO : END ============================================================= --> </div>
          <!-- /.logo-holder -->
          
          <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder"> 
            <!-- /.contact-row --> 
            <!-- ============================================================= SEARCH AREA ============================================================= -->
                      <div class="search-area">
              <form method="POST" action="{{ route('bus.rental.search') }}">
                  @csrf
                <div class="control-group">
                 
        <input class="search-field" onfocus="search_result_show()" onblur="search_result_hide()" id="search" name="search" placeholder="Search here..." />
       <button class="search-button" type="submit"></button> </div>
              </form> 
              <div id="searchTours"></div>
            </div>
            <!-- /.search-area --> 
            <!-- ============================================================= SEARCH AREA : END ============================================================= --> </div>
          <!-- /.top-search-holder -->
          
          <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row"> 
            <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
            

      @php 

$school_id = Auth::user()->id;
$CartCout = App\Models\car_rental_cart::where('school_id',$school_id)->count();
$RentalCart = App\Models\car_rental_cart::where('school_id',$school_id)->get();
$totalcartpx = App\Models\car_rental_cart::where('school_id',$school_id)->sum('pricetotal');



      @endphp


            <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
              <div class="items-cart-inner">
                <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
                <div class="basket-item-count"><span class="count">{{$CartCout}}</span></div>
                <div class="total-price-basket"> <span class="lbl">total -</span> <span class="total-price"> <span class="value">{{$totalcartpx}}</span> </span> </div>
              </div>
              </a>
              <ul class="dropdown-menu">
                <li>
                   @foreach($RentalCart as $cart)
                  <div class="cart-item product-summary">
                    <div class="row">
                      <div class="col-xs-6">
                        <div class="image"> <img src="{{ (!empty($cart['car']['car_photo']))? url('upload/car_photos/'.$cart['car']['car_photo']):url('upload/no_image.jpg') }}" alt class="w-px-50 h-px-50 rounded-circle"></div>
                      </div>
                      <div class="col-xs-8">
                        <h4 class="name">{{$cart['car']['car_name']}}</h4>
                       
                        <div class="price">UGX {{$cart->pricetotal}}</div>
                      </div>
                      <div class="col-xs-1 action">
                         <button type="button" onclick="removeRentalFromCart('{{$cart->id}}')"><i class="fa fa-trash"></i></button> 
                        
                        </div>
                    </div>
                  </div>
                  <!-- /.cart-item -->
                  @endforeach

                  <div class="clearfix"></div>
                  <hr>
                  <div class="clearfix cart-total">
                    <div class="pull-right"> <span class="text">Sub Total :</span><span class='price'>{{$totalcartpx}}</span> </div>
                    <div class="clearfix"></div>

                    <form id="CheckOutOrder" method="post" action="{{ route('bus.rental.checkout.store') }}">
                      @csrf
                    
                    <div class="row">
                    <div class="form-floating">
                    <input type="hidden" name="shipping_name" value="{{ Auth::user()->name }}" class="form-control" id="floatingInput" aria-describedby="floatingInputHelp" />
                    <input type="hidden" name="shipping_email" value="{{Auth::user()->email}}" class="form-control" id="floatingInput" aria-describedby="floatingInputHelp" />
                    <input type="hidden" name="shipping_tel1" value="{{Auth::user()->school_tel1}}" class="form-control" id="floatingInput" aria-describedby="floatingInputHelp" />
                    <input type="hidden" name="shipping_tel2" value="{{Auth::user()->school_tel2}}" class="form-control" id="floatingInput" aria-describedby="floatingInputHelp" />
                    <input type="hidden" name="shipping_address" value="{{Auth::user()->address}}" class="form-control" id="floatingInput" aria-describedby="floatingInputHelp" /> 
                    
                    
                    
                    </div>
                    </div>
                    
                    </form>
                    
                    
                    
                    
                    <a href="javascript:void(0)" onclick="event.preventDefault();document.getElementById('CheckOutOrder').submit();" class="btn btn-upper btn-primary btn-block m-t-20">
                    <span>CHECKOUT</span>
                    </a>                     
                </li>
              </ul>
              <!-- /.dropdown-menu--> 
            </div>
            <!-- /.dropdown-cart --> 
            
            <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= --> </div>
          <!-- /.top-cart-row --> 
        </div>
        <!-- /.row --> 
        
      </div>
      <!-- /.container --> 
      
    </div>
    <!-- /.main-header --> 

    

            
  <form id="deleteFromCart" action="{{route('car.rental.cart.remove')}}" method="post">
    @csrf 
    @method('delete')
    <input type="hidden" id="id_D" name="id" />
    </form>


  </header>
  
  <!-- ============================================== HEADER : END ============================================== --> 
  


<script type="text/javascript">


  function removeRentalFromCart(id)
  {
  
  $('#id_D').val(id);
  $('#deleteFromCart').submit();
  
  }
  
  
  </script>


<style>
  
  .search-area{
    position: relative;
  }
    #searchProducts {
      position: absolute;
      top: 100%;
      left: 0;
      width: 100%;
      background: #ffffff;
      z-index: 999;
      border-radius: 8px;
      margin-top: 5px;
    }
  </style>


  <script type="text/javascript">

    function search_result_hide(){
      $("#searchProducts").slideUp();
    }
     function search_result_show(){
        $("#searchProducts").slideDown();
    } 
  </script>
  
  
  
  
<!-- ====== === HEADER : END === ========== -->
