   
@extends('school.body.admin_master')
@section('content')
        

@section('title')

Purchase Items Categories | funziwallet

@endsection

        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">

        <h4 class="py-3 mb-4">
              <span class="text-muted fw-light"><a href="{{route('dashboard')}}">Home</a> / View /</span> Purchase Items Categories  Information
            </h4>


<div class="row">

<div class="mb-2">
<button type="button" class="btn rounded-pill btn-label-primary" style="float:right;" data-bs-toggle="modal" data-bs-target="#addCategory"><i class='tf-icons mdi mdi-plus mdi-20px'></i>Add Category</button>
</div>

</div>


          <!-- Modal -->
          <div class="modal fade" id="addCategory" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="modalCenterTitle">Enter Purchase Items Category Information</h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form  method="post" action="{{ route('store.purchase.item.category') }}" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                                @csrf
                <div class="modal-body">
                  <div class="row">
                    <div class="col mb-4 mt-2">
                      <div class="form-floating form-floating-outline">
                        <input type="text" id="nameWithTitle" class="form-control" name="name" required placeholder="Enter Category Name">
                        <label for="nameWithTitle">Catgeory Name</label>
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
                                            <th scope="col">Category</th>

                                            <th scope="col">Actions</th>


                                                </tr>
                                                <!-- end row --> 
                                            </thead>

<tbody>
@foreach($categories as $key => $value )
<tr>

<td>

<div class="d-flex align-items-center">
<div class="ms-3">
<h6 class="fw-semibold mb-0">{{ $value->name}}</h6>

</div>
</div>

</td>





<td>


<div class="action-btn d-flex align-items-center">

<a href="javascript:void(0);" title="Edit Category" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editCategory" id="{{ $value->id }}" onclick="categoryView(this.id)">
<i class="mdi mdi-square-edit-outline me-2"></i>
</a>


</div>





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






                              <!-- Modal Edit Expense Category -->
          <div class="modal fade" id="editCategory" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="modalCenterTitle">Update Category Information</h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>


                <form action="{{ url('/school/purchase-item-category-update')}}"  method="post">
                @csrf

                <input type="hidden" name="id" id="id">

                <div class="modal-body">
                  <div class="row">
                    <div class="col mb-4 mt-2">
                      <div class="form-floating form-floating-outline">
                        <input type="text" class="form-control" name="name" id="name" required>
                        <label for="name">Catgeory Name</label>
                      </div>
                    </div>

                  </div>




                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary me-sm-3 me-1">Update Category</button>
                </div>
                </form>
              </div>
            </div>
          </div>

            
            
                      </div>
                      <!--/ Content -->




    <script type="text/javascript">


    $.ajaxSetup({
    headers:{
    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    }
    })


    function categoryView(id){

    $.ajax({
    type: 'GET',
    url: '/school/purchase/item/category/edit/'+id,
    dataType: 'json',
    success:function(data){

    $('#name').val(data.purchasecate.name);
    $('#id').val(id);

    }
    })

    }

    </script>




                                  

@endsection 