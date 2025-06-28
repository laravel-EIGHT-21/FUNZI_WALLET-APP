@extends('school.bus_rentals.body.main_master')
@section('content')
        

@section('title')

Funzi Wallet Vehicle Rentals

@endsection


      
            
<div class='container'>
  <div class='row'>
    <div class='col-md-3 sidebar'> 
     
     
      <div class="sidebar-module-container">
        <div class="sidebar-filter"> 
         
        
                    
        <!-- ============================================== HOT DEALS ============================================== -->
        <div class="sidebar-widget wow fadeInUp outer-top-vs">
          <a href="{{ route('tours.travels.dashboard')}}" target="_blank"><h4 class="section-title">View Tour Packages</h4></a>
          <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">

            @foreach($tours as $tou )
            <div class="item">
              <div class="products">
                <div class="hot-deal-wrapper">
                  <div class="image">
                     <img src="{{ (!empty($tou->image_thambnail))? url('upload/tour_package_thumbnail/'.$tou->image_thambnail):url('upload/no_image.jpg') }}" alt="" width="250px" height="240px">
                   </div>
                 
                </div>
                <!-- /.hot-deal-wrapper -->
                
                <div class="product-info text-left m-t-20">
                  <h4 class="name"><b><a href="javascript:void(0);">{{$tou->name}}</a></b></h4>

                  
                  <div class="product-price">
 <span class="price"><b>Student Px : {{$tou->students_price}}</b></span><br>
       <span class="price"><b>Adult Px : {{$tou->adults_price}}</b></span>

                  
                  </div>
                  <!-- /.product-price --> 

<br/>
                   <div class="product-price">
                    <b>	
      <span class="price">
        
        FROM : {{ Carbon\Carbon::parse($tou->availability_start_date)->format('D, d F Y') }}
        
      </span>
                    </b>
      <br/>
      <b>
       <span class="price">
        
        TO : {{ Carbon\Carbon::parse($tou->availability_end_date)->format('D, d F Y') }}
      
      </span>
      </b>
                
    </div><!-- /.product-price -->

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

<h3 class="text">All Vehicle Rentals Available </h3>

</div>

<br/> <br/> 
 
      
   
      <div class="search-result-container ">
        <div id="myTabContent" class="tab-content category-list">
          

            <div class="category-product">
              <div class="row">

                
                @foreach($rentals as $bus )

                <div class="col-sm-6 col-md-4 wow fadeInUp">
                  <div class="products">
                    <div class="product">
                      <div class="product-image">
                        <div class="image"> 
                          <a href="{{url('school/bus/rentals/details/'.$bus->id)}}">
                            <img  src="{{ (!empty($bus->car_photo))? url('upload/car_photos/'.$bus->car_photo):url('upload/no_image.jpg') }}" alt="">
                          
                          </a> 
                        
                        </div>
                        <!-- /.image -->
                        

                      </div>
                      <!-- /.product-image -->
                      
                      <div class="product-info text-left">
                        <h2 class="name"><a href="{{url('school/bus/rentals/details/'.$bus->id)}}"><b>{{ $bus->car_name}}</b></a></h2>
      
                    <div class="description">Number Of Seats : {{$bus->no_of_seats}}</div>

                    <b><hr/></b>
                    <div class="product-price">
                    <span class="price"><b>Hire Px/Day(Fuel) : UGX {{$bus->hire_price_fuel}}</b></span><br>
                    <span class="price"><b>Hire Px/Day(No Fuel) : UGX {{$bus->hire_price_no_fuel}}</b></span>
                    </div>
                    <!-- /.product-price --> 

                      </div>
                      <!-- /.product-info -->

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


        {{$rentals->appends($_GET)->links('pagination.bootstrap-4') }}
 




      </div>
      <!-- /.search-result-container --> 
  
      


  <br/><br/><br/><br/><br/><br/>


    </div>
    <!-- /.col --> 
  

 
</div>
<!-- /.container --> 


            
            @endsection