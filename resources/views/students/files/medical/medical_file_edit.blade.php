 
@extends('students.body.admin_master')
@section('content')

@section('title')
Update Medical File | funziwallet
@endsection




        
        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">
            
            
            <h4 class="py-3 mb-4">
              <span class="text-muted fw-light">Medical File / Information /</span> Update  {{$editData->title}}
            </h4>


            <div class="row">

<div class="mb-4">

<a href="{{ route('view.medical.files')}}" class="btn rounded-pill btn-primary" style="float:right;"><i class='tf-icons mdi mdi-arrow-left mdi-20px'></i>Back</a>

</div>

</div>


            <div class="row">

<!-- files Sidebar -->
              <div class="col-xl-5 col-lg-5 col-md-5 order-1 order-md-0">
                <!-- File Card -->
                <div class="col">
    
    <iframe height="350" width="350" src="{{ (!empty($editData->files))? url('upload/students/student_medicals/'.$editData->files):url('upload/no_image.jpg') }}" class="item rounded overflow-hidden">
    
    </iframe>
        
      </div>
                <!-- /File Card -->

              </div>
              <!--/ files Sidebar -->




                          
              <!-- User Content -->
              <div class="col-xl-7 col-lg-7 col-md-7 order-0 order-md-1">

            
                <!-- Change Password -->
                <div class="card mb-4">
                  <h5 class="card-header">Update {{$editData->title}}  Information Below</h5>
                  <div class="card-body">
                    <form action="{{ route('file.medical.update',$editData->id) }}" enctype="multipart/form-data" method="POST" >
                    @csrf

            <div class="row">
            <div class="col-md">


            <div class="form-floating form-floating-outline mb-4">
            <input class="form-control" type="text" name="title"  value="{{$editData->title}}" id="html5-text-input" />
            <label for="html5-text-input">File Title</label>
            </div>

            </div>
            </div>





            <div class="row">
            <div class="col-md">


            <div class="form-floating form-floating-outline mb-4">
            <input class="form-control" type="text" name="description"  value="{{$editData->description}}" id="html5-text-input" />
            <label for="html5-text-input">Description</label>
            </div>

            </div>
            </div>



            <div class="row">
            <div class="col-md">


            <div class="mb-3">
            <label for="files" class="form-label">Update Document</label>
            <input class="form-control" type="file" id="files" name="files" value="{{$editData->files}}">
            </div>
            <ul class="ps-3 mb-0">
            <li class="mb-1">File Size Should not Exceed 4mb</li>

          </ul>

            </div>
            </div>


            <hr/>


            <div class="row">
            <div>
            <button type="submit" class="btn btn-primary me-2">Update File Information</button>
            </div>
            </div>

            </form>
            </div>
            </div>



            

              </div>
              <!--/ User Content -->




            </div>
            
            <br/>

              <div class="row">
              
              <!-- Files Sidebar -->
              <div class="col-xl-5 col-lg-5 col-md-5 order-1 order-md-0">
                <!-- Card -->
                <div class="card mb-4">
                  <div class="card-body">


                    <h5 class="pb-3 border-bottom mb-3">{{$editData->title}} Details</h5>
                    <div class="info-container">
                      <ul class="list-unstyled mb-4">



                      <li class="mb-3">
                          <span class="fw-medium text-heading me-2">File Name:</span>
                          <span>{{$editData->title}}</span>
                        </li>

                        <li class="mb-3">
                          <span class="fw-medium text-heading me-2"> File Description:</span>
                          <span>{{$editData->description}}</span>
                        </li>

                        
                        <li class="mb-3">
                          <span class="fw-medium text-heading me-2"> File Date:</span>
                          <span>{{$editData->date}}</span>
                        </li>


                      </ul>

                    </div>
                  </div>
                </div>
                <!-- / Card -->

              </div>
              <!--/ Files Sidebar -->





            </div>
            

            
                      </div>
                      <!--/ Content -->
            
                                                        

@endsection 