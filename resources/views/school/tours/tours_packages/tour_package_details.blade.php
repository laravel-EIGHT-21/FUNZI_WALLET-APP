
@extends('school.tours.body.main_master')
@section('content')
        

@section('title')

Tour Package Details | funzitours
 
@endsection


     
<style>
	.checked { 
  color: orange;
}
</style> 

<div class='container'>
  <div class='row single-product'>



    <div class='col-md-12'>
          <div class="detail-block">
      <div class="row  wow fadeInUp">
              
             <div class="col-xs-12 col-sm-6 col-md-4 gallery-holder">
  <div class="product-item-holder size-big single-product-gallery small-gallery">

      <div id="owl-single-product">
        @foreach($multiImgs as $img)
          <div class="single-product-gallery-item" id="slide{{$img->id}}">
              <a data-lightbox="image-1" data-title="Gallery" href="{{ (!empty($img->image_url))? url('upload/tour_package_multimages/'.$img->image_url):url('upload/no_image.jpg') }}">
                  <img class="img-responsive" alt="" src="{{ (!empty($img->image_url))? url('upload/tour_package_multimages/'.$img->image_url):url('upload/no_image.jpg') }}" data-echo="{{ (!empty($img->image_url))? url('upload/tour_package_multimages/'.$img->image_url):url('upload/no_image.jpg') }}" />
              </a>
          </div><!-- /.single-product-gallery-item -->
          @endforeach

      </div><!-- /.single-product-slider -->


      <div class="single-product-gallery-thumbs gallery-thumbs">

          <div id="owl-single-product-thumbnails">
            @foreach($multiImgs as $img)
              <div class="item">
                  <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="1" href="#slide{{$img->id}}">
                      <img class="img-responsive" width="85" alt="" src="{{ (!empty($img->image_url))? url('upload/tour_package_multimages/'.$img->image_url):url('upload/no_image.jpg') }}" data-echo="{{ (!empty($img->image_url))? url('upload/tour_package_multimages/'.$img->image_url):url('upload/no_image.jpg') }}" />
                  </a>
              </div>          
              @endforeach

                       </div><!-- /#owl-single-product-thumbnails -->

          

      </div><!-- /.gallery-thumbs -->

  </div><!-- /.single-product-gallery -->
</div><!-- /.gallery-holder -->        			
        <div class='col-sm-6 col-md-8 product-info-block'>
          <div class="product-info">
            <h1 class="name">{{$tour->name}}</h1>

            
            @php
            $reviewcount = App\Models\tour_reviews::where('tour_id',$tour->id)->where('status',1)->latest()->get();
            $average = App\Models\tour_reviews::where('tour_id',$tour->id)->where('status',1)->avg('rating');
     
        @endphp   
            <div class="rating-reviews m-t-20">
              <div class="row">

                <div class="col-sm-3">

                @if($average == 0)
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                  @elseif($average == 1 || $average < 2)
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  @elseif($average == 2 || $average < 3)
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  @elseif($average == 3 || $average < 4)
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>

                  @elseif($average == 4 || $average < 5)
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                  @elseif($average == 5 || $average < 5)
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>

                  @endif


                </div>

                <div class="col-sm-8">
                  <div class="reviews">
                  <a href="#" class="link">({{ count($reviewcount) }} Reviews)</a>
                  </div>
                </div>
              </div><!-- /.row -->		
            </div><!-- /.rating-reviews -->
<br>

            <div class="stock-container info-container m-t-10">
              <div class="row">
                <div class="col-sm-4">
                  <div class="stock-box">
                    <span class="label"><b>From : {{ Carbon\Carbon::parse($tour->availability_start_date)->format('D, d F Y') }}</b></span>
                  </div>	
                </div>
                
                <div class="col-sm-5">
                  <div class="stock-box">
                    <span class="value"><b>To : {{ Carbon\Carbon::parse($tour->availability_end_date)->format('D, d F Y') }}</b></span>
                  </div>	
                </div>
              </div><!-- /.row -->	
            </div><!-- /.stock-container -->


            <div class="price-container info-container m-t-20">
              <div class="row">
                

                <div class="col-sm-12">
                  <div class="price-box">
                    <span class="price">Student Price : {{$tour->students_price}}</span> 
                    <span class="price"> &nbsp; || &nbsp;</span>
                    <span class="price">Adult Price :{{$tour->adults_price}}</span>
                  </div>
                </div>



              </div><!-- /.row -->
            </div><!-- /.price-container -->

            <div class="quantity-container info-container">



              <form action="{{ route('add.to.tour.cart') }}"  method="POST" >
                @csrf
            
                <input class="form-control" type="hidden" name="id" value="{{$tour->id}}" id="html5-text-input" />
            

              <div class="row">
                
                <div class="col-sm-2">
                  <span class="label">Student Qty :</span>
                </div>
                
                <div class="col-sm-2">
                  <div class="cart-quantity">
                    <div class="quant-input">

                              <input type="number" id="qty" name="stud_qty" value="1" min="1">
                          </div>
                        </div>
                </div>

                <div class="col-sm-2">
                  <span class="label">Adult Qty :</span>
                </div>
                
                <div class="col-sm-2">
                  <div class="cart-quantity">
                    <div class="quant-input">

                              <input type="number" id="qty2" name="adult_qty" value="1" min="1">
                          </div>
                        </div>
                </div>

                
              </div><!-- /.row -->

              <br><br>


<div class="row">



  @php 

  $school_id = Auth::user()->id;
  $tourCart = App\Models\tours_cart::where('school_id',$school_id)->where('tour_package_id',$tour->id)->first();
  
  
        @endphp

    @if($tourCart == null)

    <div class="col-sm-7">
      <button type="submit" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</button>
    </div>
  
  @else

  <button type="button" class="btn btn-warning"><i class="fa fa-shopping-cart inner-right-vs"></i> Tour Package Already in Cart</button>



  @endif


</div>


            </div><!-- /.quantity-container -->

          </form>

            

            
          </div><!-- /.product-info -->
        </div><!-- /.col-sm-7 -->
      </div><!-- /.row -->
              </div>
      
      <div class="product-tabs inner-bottom-xs  wow fadeInUp">
        <div class="row">
          <div class="col-sm-3">
            <ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
              <li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
              <li><a data-toggle="tab" href="#activities">Tour Activities</a></li>
              <li><a data-toggle="tab" href="#review">REVIEW</a></li>
              
            </ul><!-- /.nav-tabs #product-tabs -->
          </div>
          <div class="col-sm-9">

            <div class="tab-content">
              
              <div id="description" class="tab-pane in active">
                <div class="product-tab">
                  <p class="text">
                    {{$tour->description}}  
                      
                      
                      
                      </p>
                </div>	
              </div><!-- /.tab-pane -->



								<div id="activities" class="tab-pane">

									
									<div class="product-tag">
										
										<h4 class="title">Tour Activities</h4>
										<form role="form" class="form-inline form-cnt">
											<div class="form-container"> 

 <ul class="product-more-infor mt-30">


@foreach ($tour_activities as $acts)

  <li><span class="badge badge-pill badge-warning" style="background: #0aec0a;"><b>{{ $acts->tour_activity }}</b></span> </li>
  <br>

@endforeach


                                            </ul>



											</div><!-- /.form-container -->
										</form><!-- /.form-cnt -->


									</div><!-- /.product-tab -->




								</div><!-- /.tab-pane -->



								<div id="review" class="tab-pane">
									<div class="product-tab">
																				
										<div class="product-reviews">
											<h4 class="title">Reviews</h4>

											@php
							$reviews = App\Models\tour_reviews::where('tour_id',$tour->id)->where('status',1)->latest()->limit(5)->get();
							@endphp			

	<div class="reviews">
		 
		@foreach($reviews as $item)
		@if($item->status == 0)

		@else

		<div class="review">

        <div class="row">

			<div class="col-md-6">
			


 @if($item->rating == NULL)

 @elseif($item->rating == 1)
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
 @elseif($item->rating == 2)
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>

 @elseif($item->rating == 3)
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>

 @elseif($item->rating == 4)
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
 @elseif($item->rating == 5)
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>

@endif



			</div>

			<div class="col-md-6">
				
			</div>			
		</div> <!-- // end row -->



			<div class="review-title"><span class="date"><i class="fa fa-calendar"></i><span> {{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }} </span></span></div>
			<div class="text">"{{ $item->comment }}"</div>
		 </div>

		 @endif
	@endforeach
	</div><!-- /.reviews -->


		</div><!-- /.product-reviews -->
										

  @php 

  $school_id = Auth::user()->id;
  $school_review = App\Models\tour_reviews::where('school_id',$school_id)->where('tour_id',$tour->id)->first();
  
  
        @endphp


    @if($school_review == NULL)
										
<div class="product-add-review">
	<h4 class="title">Write your own review</h4>
	<div class="review-table">
		 
	</div><!-- /.review-table -->
											
		<div class="review-form">
	

			<div class="form-container">

  <form role="form" class="cnt-form" method="post" action="{{ route('store.review') }}">
  	@csrf

  	<input type="hidden" name="tour_id" value="{{ $tour->id }}">


<table class="table">	
	<thead>
		<tr>
			<th class="cell-label">&nbsp;</th>
			<th>1 star</th>
			<th>2 stars</th>
			<th>3 stars</th>  
			<th>4 stars</th>
			<th>5 stars</th>
		</tr>
	</thead>	
	<tbody>
		<tr>
			<td class="cell-label">Ratings</td>
			<td><input type="radio" name="rate" class="radio" value="1"></td>
			<td><input type="radio" name="rate" class="radio" value="2"></td>
			<td><input type="radio" name="rate" class="radio" value="3"></td>
			<td><input type="radio" name="rate" class="radio" value="4"></td>
			<td><input type="radio" name="rate" class="radio" value="5"></td>
		</tr>
		 
	</tbody>
</table>
 


	
	<div class="row">


		<div class="col-md-6">
			<div class="form-group">
				<label for="exampleInputReview">Review <span class="astk">*</span></label>
 <textarea class="form-control txt txt-review" name="comment" id="exampleInputReview" rows="4" placeholder=""></textarea>
			</div><!-- /.form-group -->
		</div>
	</div><!-- /.row -->
	
	<div class="action text-right">
		<button type="submit" class="btn btn-primary btn-upper">SUBMIT REVIEW</button>
	</div><!-- /.action -->

</form><!-- /.cnt-form -->
			</div><!-- /.form-container -->

											</div><!-- /.review-form -->

										</div><!-- /.product-add-review -->			
                    
                    
                    @else

	<div class="action">
		<button type="button" class="btn btn-warning btn-upper">YOUR REVIEW WAS ALREADY SUBMITTED</button>
	</div><!-- /.action -->

  @endif
										
							        </div><!-- /.product-tab -->
								</div><!-- /.tab-pane -->



            </div><!-- /.tab-content -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.product-tabs -->


      <br/><br/>




      <!-- ============================================== UPSELL PRODUCTS ============================================== -->
<section class="section featured-product wow fadeInUp">
<h3 class="section-title">related tour packages</h3>
<div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">
      

  @php 

  $relatedTours = App\Models\tour_packages::where('destination_id',$tour->destination_id)->get(); 
  
      @endphp

@foreach($relatedTours as $tou)
  <div class="item item-carousel">
    <div class="products">
      
<div class="product">		
  <div class="product-image">
    <div class="image">
      <img  src="{{ (!empty($tou->image_thambnail))? url('upload/tour_package_thumbnail/'.$tou->image_thambnail):url('upload/no_image.jpg') }}" alt="">
    </div><!-- /.image -->			

                   		   
  </div><!-- /.product-image -->
    
  
  <div class="product-info text-left">
    <h3 class="name"><a href="{{url('school/tour/package/details/'.$tou->id)}}">{{$tou->name}}</a></h3>
			
    
    @php
    $reviewcount = App\Models\tour_reviews::where('tour_id',$tou->id)->where('status',1)->latest()->get();
    $average = App\Models\tour_reviews::where('tour_id',$tou->id)->where('status',1)->avg('rating');

@endphp   


<div class="rating-reviews m-t-20">
<div class="row">

<div class="col-sm-6">

@if($average == 0)
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
@elseif($average == 1 || $average < 2)
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
@elseif($average == 2 || $average < 3)
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
@elseif($average == 3 || $average < 4)
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>

@elseif($average == 4 || $average < 5)
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
@elseif($average == 5 || $average < 5)
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>

@endif


</div>

<div class="col-sm-8">
<div class="reviews">
<a href="#" class="link">({{ count($reviewcount) }} Reviews)</a>
</div>
</div>
</div><!-- /.row -->		
</div><!-- /.rating-reviews -->


    <div class="product-price">	
      <span class="price">Student Px: {{$tou->students_price}}</span><br>
       <span class="price">Adult Px: {{$tou->adults_price}}</span>
                
    </div><!-- /.product-price -->
    
  </div><!-- /.product-info -->
        <div class="cart clearfix animate-effect">
      <div class="action">
        <ul class="list-unstyled">
          <li class="add-cart-button btn-group">
            <a href="{{url('school/tour/package/details/'.$tou->id)}}">
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