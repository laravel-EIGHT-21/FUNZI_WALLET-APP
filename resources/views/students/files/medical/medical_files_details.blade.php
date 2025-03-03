
 
@extends('students.body.admin_master')
@section('content')

@section('title')
My Medical Files Board
@endsection



        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">
            
            
          <h4 class="py-3 mb-4"><span class="text-muted fw-light"><a href="{{ route('dashboard')}}">FunziWallet</a>/Documents/View /</span> My Health Board</h4>
          

    <div class="row">

    <div class="mb-4">
    <button type="button" class="btn rounded-pill btn-label-primary" style="float:right;" data-bs-toggle="modal" data-bs-target="#addUser"><i class='tf-icons mdi mdi-plus mdi-20px'></i>Upload New File</button>
    </div>

    </div>


                  
            <!-- Modal -->
            <div class="modal fade" id="addUser" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="modalCenterTitle">Upload New Medical File</h4>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form  method="post" action="{{ route('file.medical.store') }}" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                                    @csrf
                    <div class="modal-body">
                      <div class="row g-2">
                        <div class="col mb-6 mt-4">
                          <div class="form-floating form-floating-outline">
                            <input type="text" id="nameWithTitle" class="form-control" name="title" required placeholder="Enter Title">
                            <label for="nameWithTitle">Title</label>
                          </div>
                        </div>
    
    
                      </div>
    
                      <div class="row mt-4">
                        <div class="col mb-6 ">
                          <div class="form-floating form-floating-outline">
                            <input type="text" id="desWithTitle" class="form-control" name="description"  required placeholder="Description">
                            <label for="desWithTitle">Description</label>
                          </div>
                        </div>
    
                      </div>
    
    
                      <div class="row mt-4">
                      <div class="col mb-2 ">
                      <div class="input-group input-group-merge">
                    <div class="form-floating form-floating-outline">
                      <input type="file" id="files" name="files" class="form-control" required />
                      <label for="files">Upload File</label>
                    </div>
    
                  </div>
                  <ul class="ps-3 mb-0">
            <li class="mb-1">File Size Should not Exceed 4mb</li>

          </ul>

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


          
          <div class="app-academy">
            <div class="card p-0 mb-4">
              <div class="card-body d-flex flex-column flex-md-row justify-content-between p-0 pt-4">
                <div class="app-academy-md-25 card-body py-0">
                  <img src="{{asset('Admin/assets/img/illustrations/bulb-light.png')}}" class="img-fluid app-academy-img-height scaleX-n1-rtl" alt="Bulb in hand" height="90" />
                </div>
                <div class="app-academy-md-50 card-body d-flex align-items-md-center flex-column text-md-center mb-4">
                  <span class="card-title mb-3 lh-lg px-md-5 display-6 text-heading">
                    Have All Your Medical Files
                    <span class="text-primary text-nowrap">All In One Place</span>.
                  </span>
                

                </div>
                <div class="app-academy-md-25 d-flex align-items-end justify-content-end">
                  <img src="{{asset('Admin/assets/img/illustrations/pencil-rocket.png')}}" alt="pencil rocket" height="188" class="scaleX-n1-rtl" />
                </div>
              </div>
            </div>



  <br/>
          

  <div class="card mb-4">
    <div class="card-header d-flex flex-wrap justify-content-between gap-3">
      <div class="card-title mb-0 me-1">
        <h5 class="mb-1">My Medical Files</h5>
        <p class="mb-0">Total of <span>{{count($allData)}} Medical Files</span></p>
      </div>

    </div>
    <div class="card-body">
      <div class="row gy-4 mb-4">
      @foreach($allData as $key => $value ) 
        <div class="col-sm-6 col-lg-4">
          <div class="card p-2 h-100 shadow-none border">
            <div class="rounded-2 text-center mb-3">
              <a href="{{ (!empty($value->files))? url('upload/students/student_medicals/'.$value->files):url('upload/no_image.jpg') }}" target="_blank"">
                       
  <iframe height="300" width="280" src="{{ (!empty($value->files))? url('upload/students/student_medicals/'.$value->files):url('upload/no_image.jpg') }}" class="item rounded overflow-hidden">
  
  </iframe>
              
              </a>
            </div>
            <div class="card-body p-3 pt-2">

              <a href="javascript:void(0);" class="h5">{{ $value->title}}</a>
              <p class="mt-2">{{ $value->description}}</p>
             
            </div>
          </div>
        </div>

        @endforeach

      </div>


      {{$allData->links('pagination.bootstrap-4') }}
  

    </div>
  </div>



  </div>


  <br />



          

          </div>
          
                    </div>
                    <!-- / Content -->



        
@endsection
