@extends('school.ecommerce.body.main_master')

@section('content')

@section('title')

 Search Products

@endsection





<div class="body-content outer-top-xs">
  <div class='container'>
    <div class='row'>
      <div class='col-md-3 sidebar'> 
              <!-- ================================== TOP NAVIGATION ================================== -->

      @php 

      $categories = App\Models\categories::orderBy('category_name','ASC')->get();
      
      @endphp 

      <div class="side-menu animate-dropdown outer-bottom-xs">
        <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
        <nav class="yamm megamenu-horizontal">

          <ul class="nav">


            @foreach($categories as $category)
            <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon {{$category->category_icon}}" aria-hidden="true"></i>
              {{$category->category_name}}  
          </a>
              <ul class="dropdown-menu mega-menu">
                <li class="yamm-content">
                  <div class="row"> 
          
                  @php
              $cate_products = App\Models\products::where('category_id',$category->id)->orderBy('product_name','ASC')->get();
              @endphp
          
              @foreach($cate_products as $prods)
                    <div class="col-sm-12 col-md-3">
          
                      <ul class="links list-unstyled">
                        <li> <a href="{{url('school/product/details/'.$prods->id .'/'.$prods->product_name)}}">
                          {{$prods->product_name}}
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
            
            <!-- ============================================== PRICE SILDER============================================== -->
            <div class="sidebar-widget wow fadeInUp">
              <h3 class="section-title">shop by</h3> 
              <div class="widget-header">
                <h4 class="widget-title">Category Or Price Filters</h4>
              </div>
  
              <div class="sidebar-widget-body m-t-10">
                
                <!-- /.price-range-holder --> 
                <a href="{{route('shopping.filter.page')}}" class="lnk btn btn-primary">Shop Now</a>
              
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
      
        <div class="clearfix filters-container m-t-10">
          <div class="row">
           
          

            <div class="col col-sm-6 col-md-4 text-right">


               </div>
            <!-- /.col --> 
          </div>
          <!-- /.row --> 
        </div>

      <div class="search-result-container ">
        <div id="myTabContent" class="tab-content category-list">
          

            <div class="category-product">
              <div class="row">

                
                @foreach($products as $product )

                <div class="col-sm-6 col-md-4 wow fadeInUp">
                  <div class="products">
                    <div class="product">
                      <div class="product-image">
                        <div class="image"> 
                          <a href="{{url('school/product/details/'.$product->id .'/'.$product->product_name)}}">
                            <img  src="{{ (!empty($product->product_thambnail))? url('upload/product_images/'.$product->product_thambnail):url('upload/no_image.jpg') }}" alt="">
                          
                          </a> 
                        
                        </div>
                        <!-- /.image -->
                        

                      </div>
                      <!-- /.product-image -->
                      
                      <div class="product-info text-left">
                        <h2 class="name"><a href="{{url('school/product/details/'.$product->id .'/'.$product->product_name)}}"><b>{{ $product->product_name}}</b></a></h2>
      
                        <div class="description">{{ $product->short_descp_en}}</div>
                        <div class="product-price"> <span class="price"> UGX {{$product->selling_price}}</span>  </div>
                       
                        <!-- /.product-price --> 
                        
                      </div>
                      <!-- /.product-info -->

                      <div class="cart clearfix animate-effect">
                        <div class="action">
                          <ul class="list-unstyled">
                            <li class="add-cart-button btn-group">
                              <a href="{{url('school/product/details/'.$product->id .'/'.$product->product_name)}}">
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


        <br/><br/><br/><br/>
        
      </div>
      <!-- /.col --> 
    </div>
    <!-- /.row --> 




@endsection