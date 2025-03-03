@extends('school.ecommerce.body.admin_master')
@section('content')
        



@section('title')

{{$product->product_name}} details

@endsection




        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">
            
            
            
        <h4 class="py-3 mb-4">
              <span class="text-muted fw-light">View /</span> <b>{{$product->product_name}}</b>  Detail
            </h4>


            <div class="row">

<div class="mb-4">

<a href="{{ route('school.products')}}" class="btn rounded-pill btn-warning" style="float:right;"><i class='tf-icons mdi mdi-cart-arrow-right mdi-20px'></i>Contiune Shopping</a>

</div>

</div>
            
            <div class="card g-3 mt-5">
              <div class="card-body row g-3">


                <div class="col-lg-8">
                  <div class="d-flex justify-content-between align-items-center flex-wrap mb-2 gap-1">
                    <div class="me-1">
                      <h5 class="mb-1">{{$product->product_name}}</h5>                      
                    </div>

                  </div>
                  <div class="card academy-content shadow-none border">
                    <div class="p-2">
                      <div class="cursor-pointer">

                       <img src="{{ (!empty($product->product_thambnail))? url('upload/product_images/'.$product->product_thambnail):url('upload/no_image.jpg') }}" class="img-fluid w-100" alt="Product Image" >


                      </div>
                    </div>
                    <div class="card-body">
                      <h5 class="mb-2">Product Details</h5>

                      <hr class="my-4">
                    
                      <div class="d-flex flex-wrap">
                        <div class="me-5">
                        <p class="text-nowrap fw-semibold"><i class='mdi mdi-wallet-giftcard mdi-24px me-2'></i>Product Name : {{$product->product_name}}</p>
                          <p class="text-nowrap fw-bold"><i class='mdi mdi-currency-usd mdi-24px me-2'></i>Selling Price : ugx {{$product->selling_price}}</p>
                          <p class="text-nowrap fw-semibold"><i class='mdi mdi-wallet-giftcard mdi-24px me-2'></i>Product Category : {{$product['category']['category_name']}}</p>

                        </div>

                      </div>
                      <hr class="mb-4 mt-2">
                      <h5>Description</h5>
                      <p class="mb-4">
                      {{$product->short_descp_en}}
                      </p>



                    </div>
                  </div>
                </div>



                <div class="col-lg-4">
                  <div class="accordion stick-top" id="courseContent">
                    <div class="accordion-item shadow-none border border-bottom-0 active my-0 overflow-hidden">
                      <div class="accordion-header border-0" id="headingOne">
                        <button type="button" class="accordion-button bg-lighter rounded-0" data-bs-toggle="collapse" data-bs-target="#chapterOne" aria-expanded="true" aria-controls="chapterOne">
                          <span class="d-flex flex-column">
                            <span class="h4 mb-1">Add Product to Cart</span>

                          </span>
                        </button>
                      </div>
                      <div id="chapterOne" class="accordion-collapse collapse show" data-bs-parent="#courseContent">
                        <div class="accordion-body py-3 border-top">

                        <form action="{{ route('add.to.cart') }}"  method="POST" >
                    @csrf

                    <input class="form-control" type="hidden" name="id" value="{{$product->id}}" id="html5-text-input" />

                    
            <div class="row">
            <div class="col-md">

            <div class="form-floating form-floating-outline mb-4">
          <input class="form-control" type="number" id="qty" name="quantity" value="1" min="1" />
          <label for="qty">Product Quantity</label>
        </div>

            </div>
            </div>

            <div class="row">
            <div class="col-md">
            <button type="submit" class="btn rounded-pill btn-success me-2"><i class='tf-icons mdi mdi-cart-variant mdi-20px'></i>Add To Cart</button>
            </div>
            </div>

            </form>

                        </div>
                      </div>
                    </div>


                  </div>
                </div>



              </div>
            </div>
            
            
            
                      </div>
                      <!-- / Content -->






@endsection 