@extends('school.tours.body.main_master')

@section('content')
        

@section('title')
 
Funzi Wallet Tours & Travel

@endsection 


<style>
	.checked { 
  color: orange;
}
</style>

<div class='container'>
    <div class='row'>
      <div class='col-md-3 sidebar'> 
        <!-- ================================== TOP NAVIGATION ================================== -->
        @php 

        $destinations = App\Models\tours_destinations::orderBy('destination_name','ASC')->get();
        
        @endphp 
  
        <div class="side-menu animate-dropdown outer-bottom-xs">
          <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Regions</div>
          <nav class="yamm megamenu-horizontal">
  
            <ul class="nav">
  
  
              @foreach($destinations as $dest)
              <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa-solid fa-bus" aria-hidden="true"></i>
                {{$dest->destination_name}}  
            </a>
                <ul class="dropdown-menu mega-menu">
                  <li class="yamm-content">
                    <div class="row"> 
            
                    @php
                $dest_tours = App\Models\tour_packages::where('destination_id',$dest->id)->orderBy('name','ASC')->get();
                @endphp
            
                @foreach($dest_tours as $tou)
                      <div class="col-sm-12 col-md-3">
            
                        <ul class="links list-unstyled">
                          <li> <a href="{{url('school/tour/package/details/'.$tou->id)}}">
                            {{$tou->name}}
                          </a></li>
                         
                        </ul>
            
            
                      </div>
                      <!-- /.col -->
                      @endforeach <!-- endforeach SubCategories -->
            
                    
                    </div>
                    <!-- /.row --> 
                  </li>
                  <!-- /.yamm-content -->
                </ul>
                <!-- /.dropdown-menu --> </li>
            
              <!-- /.menu-item -->
              @endforeach <!-- endforeach Categories -->
              
              
              
              
               
            </ul>
            <!-- /.nav --> 
          </nav>
          <!-- /.megamenu-horizontal --> 
        </div>
        <!-- /.side-menu --> 
        <!-- ================================== TOP NAVIGATION : END ================================== -->



        <div class="sidebar-module-container">
          <div class="sidebar-filter"> 
            <!-- ============================================== SIDEBAR CATEGORY ============================================== -->
            <div class="sidebar-widget wow fadeInUp">
              <h3 class="section-title">shop by Regions</h3>
  
              <div class="sidebar-widget-body m-t-10">
                
                <!-- /.price-range-holder --> 
                <a href="{{route('tours.filter.page')}}" class="lnk btn btn-primary">Book Now</a>
              
              </div>
              
            </div>
            <!-- /.sidebar-widget --> 
            <!-- ============================================== SIDEBAR CATEGORY : END ============================================== --> 
            
  
  
                    
        <!-- ============================================== HOT DEALS ============================================== -->
        <div class="sidebar-widget wow fadeInUp outer-top-vs">
          <a href="{{ route('school.car.rentals.dashboard')}}" target="_blank"><h4 class="section-title">View Bus Rentals</h4></a>
          <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">

            @foreach($rentals as $bus )
            <div class="item">
              <div class="products">
                <div class="hot-deal-wrapper">
                  <div class="image">
                     <img src="{{ (!empty($bus->car_photo))? url('upload/car_photos/'.$bus->car_photo):url('upload/no_image.jpg') }}" alt="" width="250px" height="240px">
                   </div>
                 
                </div>
                <!-- /.hot-deal-wrapper -->
                
                <div class="product-info text-left m-t-20">
                  <h4 class="name"><b><a href="javascript:void(0);">{{ $bus->car_name}}</a></b></h4>

                  <h5 class="name"><b>No. of Seats : {{$bus->no_of_seats}}</b></h5>

                  
                  <div class="product-price"><b>Hire Price / Day : <span class="price">UGX {{$bus->hire_price_fuel}} </b></span> </div>
                  <!-- /.product-price --> 
                  <!-- /.product-price --> 
                  
                </div>
                <!-- /.product-info -->
                

                <!-- /.cart --> 
              </div>
            </div>
@endforeach
            

          </div>
          <!-- /.sidebar-widget --> 
        </div>
        <!-- ============================================== HOT DEALS: END ============================================== --> 
        



            
          </div>
          <!-- /.sidebar-filter --> 
        </div>
        <!-- /.sidebar-module-container --> 
      </div>
      <!-- /.sidebar -->




      <div class='col-md-9'> 

      <!-- ========================================== SECTION – HERO ========================================= -->
      
      <div id="hero">
        <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
          <div class="item" style="background-image: url({{asset('eCOMM/assets/images/sliders/01.jpg')}});">
            <div class="container-fluid">
              <div class="caption bg-color vertical-center text-left">
                <div class="slider-header fadeInDown-1">Top Brands</div>
                <div class="big-text fadeInDown-1"> New Collections </div>
                <div class="excerpt fadeInDown-2 hidden-xs"> <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span> </div>
                <div class="button-holder fadeInDown-3"> <a href="index.php?page=single-product" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a> </div>
              </div>
              <!-- /.caption --> 
            </div>
            <!-- /.container-fluid --> 
          </div>
          <!-- /.item -->
          
          <div class="item" style="background-image: url({{asset('eCOMM/assets/images/sliders/02.jpg')}});">
            <div class="container-fluid">
              <div class="caption bg-color vertical-center text-left">
                <div class="slider-header fadeInDown-1">Spring 2016</div>
                <div class="big-text fadeInDown-1"> Women <span class="highlight">Fashion</span> </div>
                <div class="excerpt fadeInDown-2 hidden-xs"> <span>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit</span> </div>
                <div class="button-holder fadeInDown-3"> <a href="index.php?page=single-product" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a> </div>
              </div>
              <!-- /.caption --> 
            </div>
            <!-- /.container-fluid --> 
          </div>
          <!-- /.item --> 
          
        </div>
        <!-- /.owl-carousel --> 
        </div>
        
        <!-- ========================================= SECTION – HERO : END ========================================= --> 
        
        <!-- ============================================== INFO BOXES ============================================== -->
        <div class="info-boxes wow fadeInUp">
        <div class="info-boxes-inner">
          <div class="row">
        
            
        
            
        
          </div>
          <!-- /.row --> 
        </div>
        <!-- /.info-boxes-inner --> 
        
        </div>
        <!-- /.info-boxes --> 
        <!-- ============================================== INFO BOXES : END ============================================== --> 
        
<br/> <br/> 
   
<div class="row">

<h3 class="text">All Tours Available </h3>
</div>

<br/> <br/> 
   
        
     
             <div class="search-result-container ">
        <div id="myTabContent" class="tab-content category-list">
          

            <div class="category-product">
              <div class="row">


                @foreach($tours as $tour )

                <div class="col-sm-6 col-md-4 wow fadeInUp">
                  <div class="products">
                    <div class="product">
                      <div class="product-image">
                        <div class="image"> 

                         <a href="{{url('school/tour/package/details/'.$tour->id)}}">
                            <img  src="{{ (!empty($tour->image_thambnail))? url('upload/tour_package_thumbnail/'.$tour->image_thambnail):url('upload/no_image.jpg') }}" alt="">
                          
                          </a> 
                        
                        </div>
                        <!-- /.image -->
                        

                      </div>
                      <!-- /.product-image -->
                      
                      <div class="product-info text-left">
                        <h2 class="name"><a href="{{url('school/tour/package/details/'.$tour->id)}}">{{$tour->name}}</b></a></h2>
      
    @php
    $reviewcount = App\Models\tour_reviews::where('tour_id',$tour->id)->where('status',1)->latest()->get();
    $average = App\Models\tour_reviews::where('tour_id',$tour->id)->where('status',1)->avg('rating');

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
      <span class="price"><b>Student Px : {{$tour->students_price}}</b></span><br>
       <span class="price"><b>Adult Px : {{$tour->adults_price}}</b></span>
                
       <h4 class="name">
        <span class="badge badge-pill badge-warning" style="background: #82f554;">
          {{$tour['destination']['destination_name']}}
        </span>
        </h4>
    </div><!-- /.product-price -->

    

                      </div>
                      <!-- /.product-info -->


<strong><hr/></strong>

                  <div class="product-info text-left">

<h5><b>Tour Dates</b></h5>
    <div class="product-price">	
      <span class="price">
        <span class="badge badge-pill badge-warning" style="background: #f43bad;">
        FROM : {{ Carbon\Carbon::parse($tour->availability_start_date)->format('D, d F Y') }}
        </span>
      </span>
      <br/>
       <span class="price">
        <span class="badge badge-pill badge-warning" style="background: #8935f7;">  
        TO : {{ Carbon\Carbon::parse($tour->availability_end_date)->format('D, d F Y') }}
        </span>
      </span>
                
    </div><!-- /.product-price -->


                      </div>
                      <!-- /.product-info -->

                      <div class="cart clearfix animate-effect">
                        <div class="action">
                          <ul class="list-unstyled">
                            <li class="add-cart-button btn-group">
                              <a href="{{url('school/tour/package/details/'.$tour->id)}}">
                              <button class="btn btn-primary icon" type="button" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>
                              <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                              </a>
                            </li>
                            
                          </ul>
                        </div>
                        <!-- /.action --> 
                      </div>
                      <!-- /.cart --> 

                    </div>
                    <!-- /.product --> 
                    
                  </div>
                  <!-- /.products --> 
                </div>
                <!-- /.item -->

                
                @endforeach
                 
              </div>
              <!-- /.row --> 
            </div>
            <!-- /.category-product --> 
        </div>

        {{$tours->appends($_GET)->links('pagination.bootstrap-4') }}
 





      </div>
      <!-- /.search-result-container --> 





<br/><br/><br/><br/><br/><br/>



        
      </div>
      <!-- /.col --> 


   
  </div>
  <!-- /.container --> 


  <!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5e4b85f98de5201f"></script>

  

            
            @endsection