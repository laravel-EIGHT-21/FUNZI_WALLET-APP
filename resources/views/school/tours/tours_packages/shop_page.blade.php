@extends('school.tours.body.main_master')

@section('content')
@section('title')
Shopping By Tour Regions 
@endsection


<style>
         .mall-slider-handles{
         margin-top: 50px; 
         }
         .filter-container-1{
         display: flex;
         justify-content: center;
         margin-top: 60px;
         }
         .filter-container-1 input{
         border: 1px solid #ddd;
         width: 100%;
         text-align: center;
         height: 30px;
         border-radius: 5px;
         }
         .filter-container-1 button{
         background: #51a179;
         color:#fff;
         padding: 5px 20px;
         }
         .filter-container-1 button:hover{
         background: #2e7552;
         color:#fff;
         }
          
      </style>

        

<form action="{{ route('tours.filtered') }}" method="post">
  @csrf


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
            <h3 class="section-title">shop by</h3>
            <div class="widget-header">
              <h4 class="widget-title">Region Or Price Filters</h4>
            </div>

            <div class="sidebar-widget-body m-t-10">
              <div class="accordion">

                @if(!empty($_GET['region']))
                @php
                $filterCat = explode(',',$_GET['region']);
                @endphp
                @endif
                
                
                
                @foreach($destzz as $des)
                <div class="accordion-group">
                <div class="accordion-heading">   
                
                <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="region[]" value="{{ $des->destination_name }}" @if(!empty($filterCat) && in_array($des->destination_name,$filterCat)) checked @endif  onchange="this.form.submit()">
                
                 {{ $des->destination_name }} 
                
                </label>
                
                
                </div>
                <!-- /.accordion-heading -->
                
                
                </div>
                <!-- /.accordion-group -->
                @endforeach          
                                
                                </div>
                                <!-- /.accordion --> 
                              
            </div>
            
          </div>
          <!-- /.sidebar-widget --> 
          <!-- ============================================== SIDEBAR CATEGORY : END ============================================== --> 
          
          <!-- ============================================== PRICE SILDER============================================== -->
            <div class="sidebar-widget wow fadeInUp">
              <div class="widget-header">
                <h4 class="widget-title"><b><u>Price Filter</u></b></h4>
              </div>

                <div class="mall-property">
                <div class="mall-property__label">
                <a class="mall-property__clear-filter mall-clear-filter" href="javascript:;" data-filter="students_price" >
                </a> 
                </div>

                @php

                $min_price = App\Models\tour_packages::min('students_price');
                $max_price = App\Models\tour_packages::max('students_price');

                $filter_min_price = $min_price; 
                $filter_max_price = $max_price;

                @endphp

                <div class="mall-slider-handles" data-start="{{ $filter_min_price ?? $min_price }}" data-end="{{ $filter_max_price ?? $max_price }}" data-min="{{ $min_price}}" data-max="{{ $max_price }}" data-target="students_price" style="width: 100%">
                </div>
                <div class="row filter-container-1">
                <div class="col-md-4">
                <input data-min="students_price" id="skip-value-lower" name="min_price" value="{{ $filter_min_price ?? $min_price }}" >  
                </div> 

                <div class="col-md-4">
                <input data-max="students_price" id="skip-value-upper" name="max_price" value="{{ $filter_max_price ?? $max_price }}" >
                </div>

                <div class="col-md-4">
                <button type="submit" class="btn btn-sm">Filter</button>
                </div>

                </div>
                </div>
                </div>
<!-- /.sidebar-widget --> 
            <!-- ============================================== PRICE SILDER : END ============================================== --> 
            




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
                          
                          <a href="{{url('school/tour/package/details/'.$tour->id)}}">
                            <div class="image"> <img src="{{ (!empty($tour->image_thambnail))? url('upload/tour_package_thumbnail/'.$tour->image_thambnail):url('upload/no_image.jpg') }}" alt="">
  
                          </div>
                          <!-- /.image -->
                          </a>
  
                        </div>
                        <!-- /.product-image -->
                        
                        
    <div class="product-info text-left">
      <h3 class="name"><a href="{{url('school/tour/package/details/'.$tour->id)}}">{{$tour->name}}</a></h3>
        
      
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
  
  <strong><hr/></strong>
      
  <h6><b>Tour Dates</b></h6>
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
  
      
    </div><!-- /.product-info -->
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
  
  
        </div>
          <!-- /.search-result-container --> 
   
      
    </div>
    <!-- /.col --> 
  </div>
  <!-- /.row --> 
 
<br/><br/><br/><br/><br/><br/>



<!-- /.container --> 

</div>

</form>


<!--Price Filter -->
<script type="text/javascript">

  $(function () {
          var $propertiesForm = $('.mall-clear-filter');
          var $body = $('body');
          $('.mall-slider-handles').each(function () {
              var el = this;
              noUiSlider.create(el, {
                  start: [el.dataset.start, el.dataset.end],
                  connect: true,
                  tooltips: true,
                  range: {
                      min: [parseFloat(el.dataset.min)],
                      max: [parseFloat(el.dataset.max)]
                  },
                  pips: {
                      mode: 'range',
                      density: 10
                  }
              }).on('change', function (values) {
                  $('[data-min="' + el.dataset.target + '"]').val(values[0])
                  $('[data-max="' + el.dataset.target + '"]').val(values[1])
                  $propertiesForm.trigger('submit');
             });


          });
      });  



</script>



<script type="text/javascript">

  $(document).ready(function(){
  
      if($('.mall-slider-handles').length >0) {
  
        const max_value = parseInt($('.mall-slider-handles').data('max'));
        const min_value = parseInt($('.mall-slider-handles').data('min'));
        let price_range = min_price+'-'+max_price;
         
        if($("#prices").length > 0 && $("#prices").val()){
          price_range = $("#prices").val().trim();
        }
  
        let price = price_range.split('-');
  
        $('.mall-slider-handles').slider({
  
              range:true,
              min:min_value,
              max:max_value,
              values:price,
              slide:function(event,ui){
  
                $('#amount').val(ui.values[0]+"-"+ui.values[1]);
                $('#prices').val(Ui.values[0]+"-"+Ui.values[1]);
  
              }
  
        })
  
  
  
      }
  
  });
  
  </script>
  

            
            @endsection