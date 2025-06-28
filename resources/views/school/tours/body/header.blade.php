
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



<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1"> 
  
    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-bar animate-dropdown">
      <div class="container">
        <div class="header-top-inner">
          <div class="cnt-account">
            <ul class="list-unstyled">
              
              <li><a href="{{ route('view.tour.cart')}}"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>
            
              <li><a href="{{route('view.tour.bookings')}}"><i class="icon fa fa-align-justify fa-fw"></i>Bookings</a></li>
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
            <div class="logo"> <a href="{{route('tours.travels.dashboard')}}"> <img src="{{asset('eCOMM/assets/images/logo.png')}}" alt=""> </a> </div>
            <!-- /.logo --> 
            <!-- ============================================================= LOGO : END ============================================================= --> </div>
          <!-- /.logo-holder -->
          
          <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder"> 
            <!-- /.contact-row --> 
            <!-- ============================================================= SEARCH AREA ============================================================= -->
            <div class="search-area">
              <form method="POST" action="{{ route('tour.search') }}">
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
          





          
      @php 

      $school_id = Auth::user()->id;
      $tourCartCout = App\Models\tours_cart::where('school_id',$school_id)->count();
      $tourCart = App\Models\tours_cart::where('school_id',$school_id)->get();
      $totalstudpx = App\Models\tours_cart::where('school_id',$school_id)->sum('stud_pricetotal');
      $totaladultpx = App\Models\tours_cart::where('school_id',$school_id)->sum('adult_pricetotal');

      $totalcartpx = (float)$totalstudpx + (float)$totaladultpx;
      
       
            @endphp


          <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row"> 
            <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
            
            <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
              <div class="items-cart-inner">
                <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
                <div class="basket-item-count"><span class="count">{{$tourCartCout}}</span></div>
                <div class="total-price-basket"> <span class="lbl">total-</span> <span class="total-price"> <span class="value">{{$totalcartpx}}</span> </span> </div>
              </div>
              </a>
              <ul class="dropdown-menu">
                <li>
                  @foreach($tourCart as $cart)
                  <div class="cart-item product-summary">
                    <div class="row">
                      <div class="col-xs-6">
                        <div class="image"> <img src="{{ (!empty($cart['tour']['image_thambnail']))? url('upload/tour_package_thumbnail/'.$cart['tour']['image_thambnail']):url('upload/no_image.jpg') }}" alt class="w-px-50 h-px-50 rounded-circle"></div>
                      </div>
                      <div class="col-xs-8">
                        <h4 class="name">{{$cart['tour']['name']}}</h4>
                        @php 

                        $total_tour_price = (float)$cart->stud_pricetotal + (float)$cart->adult_pricetotal;
  
                        @endphp
                        <div class="price">ugx {{$total_tour_price}}</div>
                      </div>
                      <div class="col-xs-1 action">
                         <button type="button" onclick="removeTourFromCart('{{$cart->id}}')"><i class="fa fa-trash"></i></button> 
                        
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


                    <form id="CheckOutOrder" method="post" action="{{ route('tour.checkout.store') }}">
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
                                      
                  
                  
                  
                  </div>
                  <!-- /.cart-total--> 
                  
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


    
          
  <form id="deleteTourFromCart" action="{{route('tour.cart.remove')}}" method="post">
    @csrf 
    @method('delete')
    <input type="hidden" id="id_D" name="id" />
    </form>

    

  </header>
  
  <!-- ============================================== HEADER : END ============================================== --> 
  

         
<script type="text/javascript">


  function removeTourFromCart(id)
  {
  
  $('#id_D').val(id);
  $('#deleteTourFromCart').submit();
  
  }
  
  
  </script>
  

  


  <script type="text/javascript">

    function search_result_hide(){
      $("#searchProducts").slideUp();
    }
     function search_result_show(){
        $("#searchProducts").slideDown();
    } 
  </script>
  
  
  

  
<!-- ====== === HEADER : END === ========== -->
