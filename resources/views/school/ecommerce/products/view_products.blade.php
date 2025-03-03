@extends('school.ecommerce.body.admin_master')
@section('content')
        

@section('title')

eCommerce Shopping | funziwallet 

@endsection 
        

        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">
            
            

          <h4 class="py-3 mb-4"><span class="text-muted fw-light"><a href="{{route('school.ecommerce.dashboard')}}">Home</a>/eCommerce/</span> School Shopping</h4>
          
          <div class="app-academy">
            <div class="card p-0 mb-4">
              <div class="card-body d-flex flex-column flex-md-row justify-content-between p-0 pt-4">
                <div class="app-academy-md-25 card-body py-0">
                  <img src="{{asset('Admin/assets/img/illustrations/bulb-light.png')}}" class="img-fluid app-academy-img-height scaleX-n1-rtl" alt="Bulb in hand" height="90" />
                </div>
                <div class="app-academy-md-50 card-body d-flex align-items-md-center flex-column text-md-center mb-4">
                  <span class="card-title mb-3 lh-lg px-md-5 display-6 text-heading">
                    Do All Your School Shopping ,
                    <span class="text-primary text-nowrap">All In One Place</span>.
                  </span>
                  <p class="mb-3 px-2">
                    We Will Just Deliver at your Comfort!.
                  </p>

                </div>
                <div class="app-academy-md-25 d-flex align-items-end justify-content-end">
                  <img src="{{asset('Admin/assets/img/illustrations/pencil-rocket.png')}}" alt="pencil rocket" height="188" class="scaleX-n1-rtl" />
                </div>
              </div>
            </div>



  <br/>
          

  <div class="row">
  <div class="col-xl-12">
    <h6 class="text-semibold">Filter Products By Category</h6>
    <div class="nav-align-top mb-4">
      <ul class="nav nav-pills mb-3" role="tablist">
        <li class="nav-item">
          <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-all" aria-controls="navs-pills-all" aria-selected="true">All</button>
        </li>
        @foreach($categories as $category )
        <li class="nav-item">
          <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#category{{$category->id}}" aria-controls="navs-pills-category" aria-selected="false">{{$category->category_name}}</button>
        </li>
        @endforeach

      </ul>
      <div class="tab-content">
        <div class="tab-pane fade show active" id="navs-pills-all" role="tabpanel">

        <div class="card mb-4">
              <div class="card-header d-flex flex-wrap justify-content-between gap-3">
                <div class="card-title mb-0 me-1">
                  <h4 class="mb-1">All Available Products</h4>
                 
                </div>
               
              </div>
              <div class="card-body">
                <div class="row gy-4 mb-4">


                @foreach($products as $product )

                  <div class="col-sm-6 col-lg-4">
                    <div class="card p-2 h-100 shadow-none border">
                      <div class="rounded-2 text-center mb-3">
                       
                       <img src="{{ (!empty($product->product_thambnail))? url('upload/product_images/'.$product->product_thambnail):url('upload/no_image.jpg') }}" class="img-fluid" alt="Product Image" >

                      </div>
                      <div class="card-body p-3 pt-2">

                        <a href="javascript:void(0);" class="h5">{{ $product->product_name}}</a>
                        <p class="mt-2">{{ $product->short_descp_en}}</p>
                       
                        <div class="mb-4">
                        <span class="badge rounded-pill bg-label-success">ugx {{$product->selling_price}}</span>
                        </div>
                        <div class="d-flex flex-column flex-md-row gap-3 text-nowrap flex-wrap flex-md-nowrap  flex-lg-wrap flex-xxl-nowrap">
                          <a href="{{url('school/product/details/'.$product->id .'/'.$product->product_name)}}">
                            <button type="button" title="Add to Cart" class="w-100 btn btn-primary d-flex align-items-center">
                            <i class="mdi mdi-cart-variant lh-1 scaleX-n1-rtl"></i>
                            </button>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>


                  @endforeach


                </div>




                {{$products->links('pagination.bootstrap-4') }}


              </div>
            </div>
        </div>



        @foreach($categories as $category)
        <div class="tab-pane fade" id="category{{$category->id}}" role="tabpanel">


          
        <div class="card mb-4">
              <div class="card-header d-flex flex-wrap justify-content-between gap-3">
                <div class="card-title mb-0 me-1">
                  <h4 class="mb-1">All Available Products</h4>
                 
                </div>
               
              </div>
              <div class="card-body">
                <div class="row gy-4 mb-4">

                @php
                  $catewiseProduct = App\Models\products::where('category_id',$category->id)->paginate(9);
                @endphp

                @foreach($catewiseProduct as $product)
                  <div class="col-sm-6 col-lg-4">
                    <div class="card p-2 h-100 shadow-none border">
                      <div class="rounded-2 text-center mb-3">

                        <img src="{{ (!empty($product->product_thambnail))? url('upload/product_images/'.$product->product_thambnail):url('upload/no_image.jpg') }}" class="img-fluid" alt="Product Image" >

                      </div>
                      <div class="card-body p-3 pt-2">
                       
                        <a href="javascript:void(0);" class="h5">{{$product->product_name}}</a>
                        <p class="mt-2">{{$product->short_descp_en}}</p>
                       
                        <div class="mb-4">
                        <span class="badge rounded-pill bg-label-success">ugx {{$product->selling_price}}</span>
                        </div>
                        <div class="d-flex flex-column flex-md-row gap-3 text-nowrap flex-wrap flex-md-nowrap  flex-lg-wrap flex-xxl-nowrap">

                          <a href="{{url('school/product/details/'.$product->id .'/'.$product->product_name)}}">
                          <button type="button" title="Add to Cart" class="w-100 btn btn-primary d-flex align-items-center">
                          <i class="mdi mdi-cart-variant lh-1 scaleX-n1-rtl"></i>
                          </button>
                        </a>

                        </div>
                      </div>
                    </div>
                  </div>


                  @endforeach


                </div>



                {{$catewiseProduct->links('pagination.bootstrap-4') }}


              </div>
            </div>

        </div>
        @endforeach




        </div>
        




      </div>
    </div>
  </div>
  </div>


  <br />



          </div>
          
                    </div>
                    <!-- / Content -->




                                  

@endsection 