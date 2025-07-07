@extends('school.bus_rentals.body.main_master')
@section('content')

 
@section('title')

Bus Rental Checkout 

@endsection 

            


             
<div class="container"> 


  
  <div class="row">
    
    <h4>CheckOut Section</h4> 
  
  </div>
  
  <br/>
  
  
  
    <div class="checkout-box ">
      <div class="row">
        <div class="col-md-12">
          <div class="panel-group checkout-steps" id="accordion">
            <!-- checkout-step-01  -->
  <div class="panel panel-default checkout-step-01">
  
  <!-- panel-heading -->
   
    <!-- panel-heading -->
  
  <div id="collapseOne" class="panel-collapse collapse in">
  
    <!-- panel-body  -->
      <div class="panel-body">
      <div class="row">		
  
        <!-- guest-login -->			
       <div class="col-md-12 col-sm-12 already-registered-login">
     <h4 class="checkout-subtitle"><b>Shipping Information</b></h4>
           
     <div class="row ">

      <div class="col-md-6 col-sm-6 ">
    <div class="form-group"> 
      <label class="info-title" for="exampleInputEmail1"><b>Shipping Name</b>  <span>*</span></label>
      <input type="text" name="shipping_name" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Full Name" value="{{ Auth::user()->name }}" required="">
    </div>  <!-- // end form group  -->
      </div>
  
    <div class="col-md-6 col-sm-6">
  <div class="form-group">
      <label class="info-title" for="exampleInputEmail1"><b>Email </b> <span>*</span></label>
      <input type="email" name="shipping_email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Email" value="{{ Auth::user()->email }}" required="">
    </div>  <!-- // end form group  -->
    </div>

  </div>
  
  <div class="row ">

    <div class="col-md-6 col-sm-6 ">
  <div class="form-group">
      <label class="info-title" for="exampleInputEmail1"><b>Phone 1</b>  <span>*</span></label>
      <input type="number" name="shipping_tel1" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Phone" value="{{ Auth::user()->school_tel1}}" required="">
    </div>  <!-- // end form group  -->
    </div>
  
    

      <div class="col-md-6 col-sm-6 ">
    <div class="form-group">
      <label class="info-title" for="exampleInputEmail1"><b>Phone 2</b>  <span>*</span></label>
      <input type="number" name="shipping_tel1" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Phone 2" value="{{ Auth::user()->school_tel2}}" required="">
    </div>  <!-- // end form group  -->
      </div>
  </div>
  
    
  <div class="row ">

    <div class="col-md-6 col-sm-6 ">
    <div class="form-group">
      <label class="info-title" for="exampleInputEmail1"><b>Address</b>  <span>*</span></label>
      <input type="text" name="shipping_address" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Address" value="{{Auth::user()->address}}" required="">
    </div>  <!-- // end form group  -->
    </div>
  </div>
  
   
        </div>	
        <!-- guest-login -->
  
  
  
  
      </div>			
    </div>
    <!-- panel-body  -->
  
  </div><!-- row -->
  </div>
  <!-- End checkout-step-01  -->
  
  
              
              
          </div><!-- /.checkout-steps -->
        </div>
  
  
  
        
        
  
        <div class="col-md-12">
          <!-- checkout-progress-sidebar -->
  <div class="checkout-progress-sidebar ">
  <div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading">
          <h4 class="unicase-checkout-title">Checkout Progress</h4>
        </div>
        <div class="">
          <div class="shopping-cart">
            <div class="shopping-cart-table ">
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
			
				<th class="cart-product-name item">Name</th>
        <th class="cart-qty item">Fuel</th>
					<th class="cart-qty item">Vehicles</th>
        <th class="cart-qty item">Days</th>
            <th class="cart-product-name item">Dates</th>
				<th class="cart-sub-total item">Subtotal</th>
            
            </tr>
          </thead><!-- /thead -->
  
      
          @php 
      
  $school_id = Auth::user()->id;
  $CartCount = App\Models\car_rental_cart::where('school_id',$school_id)->count();
  $CartSubtotal = App\Models\car_rental_cart::where('school_id',$school_id)->sum('pricetotal');

    
            
                @endphp
      
      
      
      @foreach($carts as $cart)
      
          <tbody>
            <tr>

      

              <td class="cart-product-name-info">
                <h4 class='cart-product-description'><a href="">{{$cart['car']['car_name']}}</a></h4>
      
      
              </td>

                      				<td class="cart-product-name-info">
					<h4 class='cart-product-description'><a href="">{{$cart->fuel_status}}</a></h4>


				</td>
      
              <td class="cart-product-quantity">
                <div class="quant-input">
      
                  <input readonly name="vehicle_total" value="{{$cart->vehicle_total}}" >
                    
                  </div>
              </td>

              <td class="cart-product-quantity">
                <div class="quant-input">
      
                  <input readonly name="total_days" value="{{$cart->total_days}}" >
                    
                  </div>
              </td>


              <td class="cart-product-name-info">
                <h4 class='cart-product-description'><a href="">{{$cart->start_day}} to {{$cart->end_day}}</a></h4>
      
      
              </td>

              <td class="cart-product-sub-total"><span class="cart-sub-total-price">UGX {{$cart->pricetotal}}</span></td>
              

            </tr>
      
      
      
      
            
      
      
          </tbody><!-- /tbody -->
      
          @endforeach
  
        </table><!-- /table -->
      </div>
      </div><!-- /.shopping-cart-table -->				<div class="col-md-4 col-sm-12 estimate-ship-tax">
      <table class="table">
        
        
      </table>
      </div><!-- /.estimate-ship-tax -->
      
      <div class="col-md-4 col-sm-12 estimate-ship-tax">
      <table class="table">
        
        <tbody>
            <tr>
              <td>
      
              </td>
            </tr>
        </tbody><!-- /tbody -->
      </table><!-- /table -->
      </div><!-- /.estimate-ship-tax -->
      
      <div class="col-md-4 col-sm-12 cart-shopping-total">
      <table class="table">
        <thead>
          <tr>
            <th>
      

      

              <div class="cart-grand-total">
                Total<span class="inner-left-md">UGX {{$CartSubtotal}}</span>
              </div>
            </th>
          </tr>
        </thead><!-- /thead -->
  
      </table><!-- /table -->
      </div><!-- /.cart-shopping-total -->			
      
      
      
      
      
      
      </div><!-- /.shopping-cart -->	
      </div>
  
    </div> <!-- // end row  -->
    <hr>
  
  
    <form action="{{ route('submit.bus.rental.bookings') }}" method="post" id="ConfirmBooking" >
      @csrf
  
      <input type="hidden" name="name" value="{{ $data['shipping_name'] }}" class="form-control" id="floatingInput" aria-describedby="floatingInputHelp" />
       <input type="hidden" name="email" value="{{ $data['shipping_email'] }}" class="form-control" id="floatingInput" aria-describedby="floatingInputHelp" />
      <input type="hidden" name="school_tel1" value="{{ $data['shipping_tel1'] }}" class="form-control" id="floatingInput" aria-describedby="floatingInputHelp" />
      <input type="hidden" name="school_tel2" value="{{ $data['shipping_tel2'] }}" class="form-control" id="floatingInput" aria-describedby="floatingInputHelp" />
      <input type="hidden" name="address" value="{{ $data['shipping_address'] }}" class="form-control" id="floatingInput" aria-describedby="floatingInputHelp" /> 
  
  
  
    <a href="javascript:void(0)" onclick="event.preventDefault();document.getElementById('ConfirmBooking').submit();" class="btn btn-primary checkout-btn">
      <span>CONFIRM BOOKING</span>
      </a>  
    </form>
      
    </div>
  </div>
  </div> 
  <!-- checkout-progress-sidebar --> 
  </div>
  
  
  
  
  
      </div><!-- /.row -->
    </div><!-- /.checkout-box -->
  
    <br/><br/><br/><br/><br/>
  
  
  
  </div>
  


            
@endsection 