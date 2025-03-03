 
@extends('admin.body.admin_master')
@section('content')



@section('title')

{{$product->product_name}} details

@endsection

        
        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">
            
            
            <h4 class="py-3 mb-4">
              <span class="text-muted fw-light">Product / Information /</span> Update 
            </h4>


            <div class="row">

<div class="mb-4">
  
<a href="{{ route('view.products')}}" class="btn rounded-pill btn-primary" style="float:right;"><i class='tf-icons mdi mdi-arrow-left mdi-20px'></i>Back</a>

</div>

</div>


            <div class="row">

<!-- User Sidebar -->
              <div class="col-xl-6 col-lg-5 col-md-5 order-1 order-md-0">
                <!-- User Card -->
                <div class="card mb-4">
                  <div class="card-body"> 
                  <h5 class="pb-3 border-bottom mb-3">Product Image</h5>
                      <div class="item rounded overflow-hidden">
                        
                        <img src="{{ (!empty($product->product_thambnail))? url('upload/product_images/'.$product->product_thambnail):url('upload/no_image.jpg') }}" class="img-fluid" alt="Product Image" >


                      </div>
                      
                  <br /> <br />

                  <h5 class="pb-3 border-bottom mb-3">Product Details</h5>
                    <div class="info-container">
                      <ul class="list-unstyled mb-4">



                      <li class="mb-3">
                          <span class="fw-medium text-heading me-2">Name:</span>
                          <span>{{$product->product_name}}</span>
                        </li>

                        <li class="mb-3">
                          <span class="fw-medium text-heading me-2">Selling Price:</span>
                          <span>ugx {{$product->selling_price}}</span>
                        </li>
                        <li class="mb-3">
                          <span class="fw-medium text-heading me-2">Description:</span>

                          <span>ugx {{$product->short_descp_en}}</span>

                          
                        </li>



                      </ul>

                    </div>


                  </div>


                </div>
                <!-- /User Card -->

              </div>
              <!--/ User Sidebar -->




                          
              <!-- User Content -->
              <div class="col-xl-6 col-lg-7 col-md-7 order-0 order-md-1">

            
                <!-- Change Password -->
                <div class="card mb-4">
                  <h5 class="card-header">Update Product Information Below</h5>
                  <div class="card-body">
                    <form action="{{ route('product.update',$product->id) }}" enctype="multipart/form-data" method="POST" >
                    @csrf

            <div class="row">
            <div class="col-md">


            <div class="form-floating form-floating-outline mb-4">
            <input class="form-control" type="text" name="product_name"  value="{{$product->product_name}}" id="html5-text-input" />
            <label for="html5-text-input">Product Name</label>
            </div>

            </div>
            </div>


            <div class="row">
            <div class="col-md">


            <div class="form-floating form-floating-outline mb-4">
            <select id="category_id" name="category_id" required class="select2 form-select form-select-lg" data-allow-clear="true"">
            <option value="">Select Category</option>
            @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ ($product->category_id == $category->id)? "selected": ""  }}>{{ $category->category_name }}</option>
            @endforeach

            </select>
            <label for="category_id">Categories</label>
            </div>

            </div>
            </div>



            <div class="row">
            <div class="col-md">


            <div class="form-floating form-floating-outline mb-4">
            <input class="form-control" type="text" name="selling_price"  value="{{$product->selling_price}}" id="html5-text-input" />
            <label for="html5-text-input">Selling Price</label>
            </div>

            </div>

            </div>



            <div class="row">
            <div class="col-md">


            <div class="form-floating form-floating-outline mb-4">
            <input class="form-control" type="text" name="short_descp_en"  value="{{$product->short_descp_en}}" id="html5-text-input" />
            <label for="html5-text-input">Description</label>
            </div>

            </div>
            </div>



            <div class="row">
            <div class="col-md">


            <div class="mb-3">
            <label for="product_image" class="form-label">Product Image</label>
            <input class="form-control" type="file" id="product_image" name="product_thambnail" value="{{$product->product_thambnail}}">
            </div>

            </div>
            </div>

            @can('ecommerce-products-edit')
            <div class="row">
            <div>
            <button type="submit" class="btn btn-primary me-2">Update Product Information</button>
            </div>
            </div>
            @endcan

            </form>
            </div>
            </div>



            

              </div>
              <!--/ User Content -->




            </div>
            

            
                      </div>
                      <!--/ Content -->
            
                                                        

@endsection 