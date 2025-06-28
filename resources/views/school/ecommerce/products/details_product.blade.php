@extends('school.ecommerce.body.main_master')
@section('content')
        



@section('title')

{{$product->product_name}} details

@endsection



       
	<div class='container'>
		<div class='row single-product'>


			<div class='col-md-12'>
            <div class="detail-block">
				<div class="row  wow fadeInUp">
                
					     <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
    <div class="product-item-holder size-big single-product-gallery small-gallery">

        <div id="owl-single-product">
            <div class="single-product-gallery-item" id="slide1">
                <a data-lightbox="image-1" data-title="Gallery" href="{{ (!empty($product->product_thambnail))? url('upload/product_images/'.$product->product_thambnail):url('upload/no_image.jpg') }}">
                    <img class="img-responsive" alt="" src="{{ (!empty($product->product_thambnail))? url('upload/product_images/'.$product->product_thambnail):url('upload/no_image.jpg') }}" data-echo="{{ (!empty($product->product_thambnail))? url('upload/product_images/'.$product->product_thambnail):url('upload/no_image.jpg') }}" />
                </a>
            </div><!-- /.single-product-gallery-item -->


        </div><!-- /.single-product-slider -->



    </div><!-- /.single-product-gallery -->
</div><!-- /.gallery-holder -->        			
					<div class='col-sm-6 col-md-7 product-info-block'>
						<div class="product-info">
							<h1 class="name">{{$product->product_name}}</h1>
							

							<div class="description-container m-t-20">
								{{$product->short_descp_en}}
							</div><!-- /.description-container -->

							<div class="price-container info-container m-t-20">
								<div class="row">
									

									<div class="col-sm-6">
										<div class="price-box">
											<span class="price">UGX {{$product->selling_price}}</span>
										
										</div>
									</div>


								</div><!-- /.row -->
							</div><!-- /.price-container -->

              <div class="quantity-container info-container">

                <form action="{{ route('add.to.cart') }}"  method="POST" >
                  @csrf

                  <input class="form-control" type="hidden" name="id" value="{{$product->id}}" id="html5-text-input" />


								<div class="row">
									
									<div class="col-sm-2">
										<span class="label">Qty :</span>
										
									</div>
									

					 				<div class="col-sm-2">
										<div class="cart-quantity">
											<div class="quant-input">

												<input type="number" id="qty" name="quantity" value="1" min="1">

							              </div>
							            </div>
									</div>


							@php 

							$school_id = Auth::user()->id;
							$Cart = App\Models\order_carts::where('school_id',$school_id)->where('product_id',$product->id)->first();


							@endphp 

							@if($Cart == null)
							<input type="hidden" id="product_id" value="{{ $product->id }}" min="1">

							<div class="col-sm-7">
							<button type="submit" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</button>
							</div>

							@else

							<button type="button" class="btn btn-warning"><i class="fa fa-shopping-cart inner-right-vs"></i> Already in Cart</button>



							@endif


									
								</div><!-- /.row -->

                </form>

							</div><!-- /.quantity-container -->


							

							
						</div><!-- /.product-info -->
					</div><!-- /.col-sm-7 -->
				</div><!-- /.row -->
                </div>
				
<br/><br/>

				<!-- ============================================== RELATED PRODUCTS ============================================== -->
<section class="section featured-product wow fadeInUp">
	<h3 class="section-title">related products</h3>
	<div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">

    @php 

$relatedProduct = App\Models\products::where('category_id',$product->category_id)->get(); 

    @endphp
	    	

    @foreach($relatedProduct as $prod)
		<div class="item item-carousel">
			<div class="products">
				
	<div class="product">		
		<div class="product-image">
			<div class="image">

        <img  src="{{ (!empty($prod->product_thambnail))? url('upload/product_images/'.$prod->product_thambnail):url('upload/no_image.jpg') }}" alt="">
			</div><!-- /.image -->			
           		   
		</div><!-- /.product-image -->
			
		
		<div class="product-info text-left">
			<h3 class="name"><a href="{{url('school/product/details/'.$prod->id .'/'.$prod->product_name)}}">{{$prod->product_name}}</a></h3>
			
			<div class="description">{{ $product->short_descp_en}}</div>

			<div class="product-price">	
				<span class="price">
					ugx {{$prod->selling_price}}			</span>
										    
									
			</div><!-- /.product-price -->
			
		</div><!-- /.product-info -->
					<div class="cart clearfix animate-effect">
				<div class="action">
					<ul class="list-unstyled">
            <li class="add-cart-button btn-group">
              <a href="{{url('school/product/details/'.$prod->id .'/'.$prod->product_name)}}">
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




<br/><br/><br/>




	</div><!-- /.container -->



  




@endsection 