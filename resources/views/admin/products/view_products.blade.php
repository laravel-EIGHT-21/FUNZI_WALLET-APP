  
@extends('admin.body.admin_master')
@section('content')
        

@section('title')

All Products | funziwallet

@endsection

        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">

        <h4 class="py-3 mb-4">
              <span class="text-muted fw-light">View /</span> All Products Information
            </h4>

            @can('ecommerce-products-create')
    <div class="row">

    <div class="mb-2">
    <button type="button" class="btn rounded-pill btn-label-primary" style="float:right;" data-bs-toggle="modal" data-bs-target="#addUser"><i class='tf-icons mdi mdi-plus mdi-20px'></i>Add New Product</button>
    </div>

    </div>
    @endcan

          <!-- Modal -->
          <div class="modal fade" id="addUser" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="modalCenterTitle">Enter New Product Information</h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form  method="post" action="{{ route('product.store') }}" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                                @csrf
                <div class="modal-body">
                  <div class="row g-2">
                    <div class="col mb-4 mt-2">
                      <div class="form-floating form-floating-outline">
                        <input type="text" id="nameWithTitle" class="form-control" name="product_name" required placeholder="Enter Product Name">
                        <label for="nameWithTitle">Name</label>
                      </div>
                    </div>

                    <div class="col mb-4 mt-2">
                      <div class="form-floating form-floating-outline">
                        <input type="text" id="priceWithTitle" class="form-control" name="selling_price" required placeholder="Enter Selling Price">
                        <label for="priceWithTitle">Selling Price</label>
                      </div>
                    </div>

                  </div>

                  <div class="row mt-2">
                    <div class="col mb-6 ">
                      <div class="form-floating form-floating-outline">
                        <input type="text" id="desWithTitle" class="form-control" name="short_descp_en"  required placeholder="Description">
                        <label for="desWithTitle">Product Description</label>
                      </div>
                    </div>

                  </div>

                  <div class="row">
                    <div class="col mb-1 mt-4">
                    <div class="form-floating form-floating-outline mb-4">
                        <select id="categoryid" name="category_id" required class="select2 form-select form-select-lg" data-allow-clear="true"">
                          <option value="">Select Category</option>
                          @foreach ($categories as $category)
									<option value="{{ $category->id }}">{{ $category->category_name }}</option>
									@endforeach

                        </select>
                        <label for="categoryid">Categories</label>
                      </div>
                    </div>
                  </div>

                  <div class="row mt-2">
                  <div class="col mb-2 ">
                  <div class="input-group input-group-merge">
                <div class="form-floating form-floating-outline">
                  <input type="file" id="product_thambnail" name="product_thambnail" class="form-control" required />
                  <label for="product_thambnail">Product Photo</label>
                </div>

              </div>
                    </div>
                  </div>

                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>
                      <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
                </form>
              </div>
            </div>
          </div>



            <div class="row">
                        <div class="col-12">
                            <!-- ---------------------
                                    start Zero Configuration
                          
                                ---------------- -->
                            <div class="card">
                                <div class="card-body">
     
                                    <div class="table-responsive">
                                        <table id="zero_config"
                                            class="table border table-striped table-bordered text-nowrap">
                                            <thead>
                                                <!-- start row -->
                                                <tr>
                                            <th scope="col">Product</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Selling Price</th>
                                            <th scope="col">Actions</th>


                                                </tr>
                                                <!-- end row --> 
                                            </thead>

<tbody>
@foreach($products as $key => $value )
<tr>

<td>
<div class="d-flex align-items-center">
<img src="{{ (!empty($value->product_thambnail))? url('upload/product_images/'.$value->product_thambnail):url('upload/no_image.jpg') }}" class="rounded-circle" alt="..." width="56" height="56">


<div class="ms-3">
<h6 class="fw-semibold mb-0 fs-6">{{ $value->product_name}}</h6>
<p class="mb-0">{{ $value->short_descp_en}}</p>
</div>
</div>
</td>

<td>

<div class="d-flex align-items-center">
<div class="ms-3">
<h6 class="fw-semibold mb-0">{{ $value['category']['category_name']}}</h6>

</div>
</div>

</td>



<td>
    
<div class="d-flex align-items-center">

<div class="ms-3">
<h6 class="fw-semibold mb-0">{{ $value->selling_price}}</h6>

</div>
</div>


</td>


<td>
@can('ecommerce-products-edit')

<div class="action-btn">

<a href="{{route('product.edit',$value->id)}}" title="Edit Product" class="btn btn-sm btn-info">
<i class="mdi mdi-square-edit-outline me-1"></i>
</a>


</div>

@endcan



</td>

</tr>
@endforeach
</tbody>

                                        </table>
                                    </div>




                                </div>
                            </div>
                            <!-- ---------------------
                                    end Zero Configuration
                                ---------------- -->
                        </div>
                    </div>

            
            
                      </div>
                      <!--/ Content -->





                                  

@endsection 