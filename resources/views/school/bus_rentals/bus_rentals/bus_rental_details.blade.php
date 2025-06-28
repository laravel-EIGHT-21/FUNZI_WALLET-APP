@extends('school.bus_rentals.body.main_master')
@section('content')


@section('title')

{{$rental->car_name}} details

@endsection





<div class='container'>
  <div class='row single-product'>



    <div class='col-md-12'>
          <div class="detail-block">
      <div class="row  wow fadeInUp">
              
             <div class="col-xs-12 col-sm-6 col-md-4 gallery-holder">
  <div class="product-item-holder size-big single-product-gallery small-gallery">

      <div id="owl-single-product">
        
          <div class="single-product-gallery-item" id="slide1">
              <a data-lightbox="image-1" data-title="Gallery" href="{{ (!empty($rental->car_photo))? url('upload/car_photos/'.$rental->car_photo):url('upload/no_image.jpg') }}">
                  <img class="img-responsive" alt="" src="{{ (!empty($rental->car_photo))? url('upload/car_photos/'.$rental->car_photo):url('upload/no_image.jpg') }}" data-echo="{{ (!empty($rental->car_photo))? url('upload/car_photos/'.$rental->car_photo):url('upload/no_image.jpg') }}" />
              </a>
          </div><!-- /.single-product-gallery-item -->
          

      </div><!-- /.single-product-slider -->


  </div><!-- /.single-product-gallery -->
</div><!-- /.gallery-holder -->        			
        <div class='col-sm-6 col-md-8 product-info-block'>
          <div class="product-info">
            <h1 class="name">{{$rental->car_name}}</h1>

            		<div class="description-container m-t-20">
								<b>Number of Seats : {{$rental->no_of_seats}} </b>
							</div><!-- /.description-container -->


            <div class="price-container info-container m-t-20">
              <div class="row">

                <div class="col-sm-12">
                  <div class="price-box">
                    <span class="price">Hire Px (Fuel) : UGX  {{$rental->hire_price_fuel}}</span> 

                  </div>
                </div>

                                <div class="col-sm-12">
                  <div class="price-box">
                    
                    <span class="price">Hire Px (No Fuel) : UGX {{$rental->hire_price_no_fuel}}</span>
                  </div>
                </div>



              </div><!-- /.row -->
            </div><!-- /.price-container -->

            <div class="quantity-container info-container">

              
                <form action="{{ route('add.to.car.rental.cart') }}"  method="POST" >
                  @csrf


 <input class="form-control" type="hidden" name="id" value="{{$rental->id}}" id="html5-text-input" />


								<div class="row">
									
									<div class="col-sm-2">
										<span class="label">Total Vehicles : </span>
										
									</div>
									

									<div class="col-sm-2">
										<div class="cart-quantity"> 
											<div class="quant-input">

												<input type="number" name="vehicle_total" value="1" min="1">

							              </div>
							            </div>
									</div>



									
									<div class="col-sm-2">
										<span class="label">Total Days : </span>
										
									</div>
                  
									<div class="col-sm-2">
										<div class="cart-quantity">
											<div class="quant-input">
													
												<input type="number" name="total_days" value="1" min="1">


							            </div>
                    </div>
									</div>





									<div class="col-sm-4">
										<div class="cart-quantity">
									<div class="form-group">
							
										<select class="form-control unicase-form-control selectpicker" name="fuel_status"  required>
											<option selected="" disabled="">Choose Price</option>
      <option value="With Fuel">With Fuel</option>
      <option value="With No Fuel">WIth No Fuel</option>

										</select>
									</div>
							            </div>
									</div>



									<div class="col-sm-2">
										<span class="label">Start Date : </span>
										
									</div>
                
									<div class="col-sm-4">
										<div class="cart-quantity">
																					
												<input type="date" name="start_day">
							          
                    </div>
									</div>


            <div class="col-sm-2">
            <span class="label">End Date : </span>

            </div>
            <div class="col-sm-4">
            <div class="cart-quantity">

            <input type="date" name="end_day">

            </div>
            </div>

									
								</div><!-- /.row -->



                

<br>
                <hr>
<br>

                  <div class="row">

                    
  @php 

  $school_id = Auth::user()->id;
  $rentalCart = App\Models\car_rental_cart::where('school_id',$school_id)->where('car_id',$rental->id)->first();


  @endphp

  @if($rentalCart == null)


                  <input type="hidden" id="car_id" value="{{ $rental->id }}" min="1">

									<div class="col-sm-7">
										<button type="submit" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</button>
									</div>

                  
  @else

  <button type="button" class="btn btn-warning"><i class="fa fa-shopping-cart inner-right-vs"></i> Already in Cart</button>



  @endif


                  </div>



                </form>

							</div><!-- /.quantity-container -->


            

            
          </div><!-- /.product-info -->
        </div><!-- /.col-sm-7 -->
      </div><!-- /.row -->
              </div>

      <br/><br/>




      <!-- ============================================== UPSELL PRODUCTS ============================================== -->
<section class="section featured-product wow fadeInUp">
<h3 class="section-title">other bus rentals</h3>
<div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">
      

  @php 

  $otherRentals = App\Models\car::latest()->get(); 
  
      @endphp

@foreach($otherRentals as $bus)
  <div class="item item-carousel">
    <div class="products">
      
<div class="product">		
  <div class="product-image">
    <div class="image">
      <img  src="{{ (!empty($bus->car_photo))? url('upload/car_photos/'.$bus->car_photo):url('upload/no_image.jpg') }}" alt="">
    </div><!-- /.image -->			

                   		   
  </div><!-- /.product-image -->
    
  
  <div class="product-info text-left">
    <h3 class="name"><a href="{{url('school/bus/rentals/details/'.$bus->id)}}"><b>{{$bus->car_name}}</b></a></h3>
			
     <div class="description">Number Of Seats : {{$bus->no_of_seats}}</div>

<b><hr/></b>


    <div class="product-price">	
       <span class="price"><b>Hire Px/Day(Fuel) : UGX {{$bus->hire_price_fuel}}</b></span><br>
       <span class="price"><b>Hire Px/Day(No Fuel) : UGX {{$bus->hire_price_no_fuel}}</b></span>
                
    </div><!-- /.product-price -->
    
  </div><!-- /.product-info -->
        <div class="cart clearfix animate-effect">
      <div class="action">
        <ul class="list-unstyled">
          <li class="add-cart-button btn-group">
            <a href="{{url('school/bus/rentals/details/'.$bus->id)}}">
            <button class="btn btn-primary icon" type="button" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>
            <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
            </a>
          </li>
                   
                 
        </ul>
      </div><!-- /.action -->
    </div><!-- /.cart -->
    </div><!-- /.product -->
    
    </div><!-- /.products -->
  </div><!-- /.item -->

  @endforeach

  
    </div><!-- /.home-owl-carousel -->
</section><!-- /.section -->
<!-- ============================================== UPSELL PRODUCTS : END ============================================== -->
    
    </div><!-- /.col -->
    <div class="clearfix"></div>
  </div><!-- /.row -->



  <br/><br/><br/><br/>

</div><!-- /.container -->







@endsection  
