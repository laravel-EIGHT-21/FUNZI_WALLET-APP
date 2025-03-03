 
@extends('students.body.admin_master')
@section('content')

@section('title')
Update Academic File | funziwallet
@endsection




        
        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">
            
            
            <h4 class="py-3 mb-4">
              <span class="text-muted fw-light">Academic File / Information /</span> Update  {{$editFile->title}}
            </h4>


            <div class="row">

<div class="mb-4">

<a href="{{ route('view.my.files')}}" class="btn rounded-pill btn-primary" style="float:right;"><i class='tf-icons mdi mdi-arrow-left mdi-20px'></i>Back</a>

</div>

</div>


            <div class="row">

<!-- file Sidebar -->
              <div class="col-xl-5 col-lg-5 col-md-5 order-1 order-md-0">
                <!-- File Card -->
                <div class="col">
      
      <iframe height="350" width="350" src="{{ url('https://'.$editFile->file_url) }}" class="item rounded overflow-hidden">
      
      </iframe>
      
        </div>
      
                <!-- /File Card -->

              </div>
              <!--/ file Sidebar -->




                          
              <!-- User Content -->
              <div class="col-xl-7 col-lg-7 col-md-7 order-0 order-md-1">

            
                <!-- Change Password -->
                <div class="card mb-4">
                  <h5 class="card-header">Update {{$editFile->title}}  Information Below</h5>
                  <div class="card-body">
                    <form action="{{ route('file.update',$editFile->id) }}" enctype="multipart/form-data" method="POST" >
                    @csrf

            <div class="row">
            <div class="col-md">


            <div class="form-floating form-floating-outline mb-4">
            <input class="form-control" type="text" name="title"  value="{{$editFile->title}}" id="html5-text-input" />
            <label for="html5-text-input">File Title</label>
            </div>

            </div>
            </div>





            <div class="row">
            <div class="col-md">


            <div class="form-floating form-floating-outline mb-4">
            <input class="form-control" type="text" name="description"  value="{{$editFile->description}}" id="html5-text-input" />
            <label for="html5-text-input">Description</label>
            </div>

            </div>
            </div>



            <div class="row">
                  <div class="col-md">
                      <div class="form-floating form-floating-outline mb-4">
                      <select id="folderid" name="folder_id" class="select2 form-select" data-allow-clear="true">
                <option value="">Select Folder</option>
                @foreach ($folders as $folder)
            <option value="{{ $folder->id }}" {{ ($editFile->folder_id == $folder->id)? "selected": ""  }}>{{ $folder->name }}</option>
            @endforeach

              </select>
              <label for="folderid">File Folder</label>
                      </div>
                    </div>
                  </div>



            <div class="row">
            <div class="col-md">


            <div class="mb-3">
            <label for="files" class="form-label">Update Document</label>
            <input class="form-control" type="file" id="files" name="files" value="{{$editFile->files}}">
            </div>
            <ul class="ps-3 mb-0">
            <li class="mb-1">File Size Should not Exceed 1MB</li>

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
              
              <!-- User Sidebar -->
              <div class="col-xl-5 col-lg-5 col-md-5 order-1 order-md-0">
                <!-- User Card -->
                <div class="card mb-4">
                  <div class="card-body">


                    <h5 class="pb-3 border-bottom mb-3">{{$editFile->title}} Details</h5>
                    <div class="info-container">
                      <ul class="list-unstyled mb-4">



                      <li class="mb-3">
                          <span class="fw-medium text-heading me-2">Name:</span>
                          <span>{{$editFile->title}}</span>
                        </li>

                        <li class="mb-3">
                          <span class="fw-medium text-heading me-2"> Description:</span>
                          <span>{{$editFile->description}}</span>
                        </li>


                        <li class="mb-3">
                          <span class="fw-medium text-heading me-2"> Folder:</span>
                          <span>{{$editFile['folder']['name']}}</span>
                        </li>


                        <li class="mb-3">
                          <span class="fw-medium text-heading me-2">Uplaod Date:</span>
                          <span>{{$editFile->date}}</span>
                        </li>


                      </ul>

                    </div>
                  </div>
                </div>
                <!-- /User Card -->

              </div>
              <!--/ User Sidebar -->





            </div>
            

            
                      </div>
                      <!--/ Content -->
            
                                                        

@endsection 