 
@extends('admin.body.admin_master')
@section('content')



@section('title')

{{$permit->name}} Permission Update

@endsection

        
        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">
            
            
            <h4 class="py-3 mb-4">
              <span class="text-muted fw-light">Permission / Information /</span> Update 
            </h4>


            <div class="row">

<div class="mb-4">

<a href="{{ route('permissions.view')}}" class="btn rounded-pill btn-primary" style="float:right;"><i class='tf-icons mdi mdi-arrow-left mdi-20px'></i>Back</a>

</div>

</div>



            <div class="row">
                          
              <!-- User Content -->
              <div class="col-xl-10 col-lg-7 col-md-7 order-0 order-md-1">

            
                <!-- Change Password -->
                <div class="card mb-4">
                  <h5 class="card-header">Update Permission Information Below</h5>
                  <div class="card-body">
                    <form action="{{ route('permission.update',$permit->id) }}" enctype="multipart/form-data" method="POST" >
                    @csrf

            <div class="row">
            <div class="col-md">


            <div class="form-floating form-floating-outline mb-4">
            <input class="form-control" type="text" name="name"  value="{{$permit->name}}" id="html5-text-input" />
            <label for="html5-text-input"> Name</label>
            </div>

            </div>
            </div>


            @can('permit-edit')
            <div class="row">
            <div>
            <button type="submit" class="btn btn-primary me-2">Update Permission Information</button>
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