
@extends('students.body.admin_master')
@section('content')
        
@section('title')

Students - Dashboard | funziwallet

@endsection



@php 

$student_id = Auth::user()->id; 

$academics= App\Models\studentfiles::where('student_id',$student_id)->get();

$folders = App\Models\academic_folders::where('student_id',$student_id)->get();

$allData = App\Models\studentfiles::where('student_id',$student_id)->latest()->paginate(9);


@endphp



        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">
            
            

            <div class="row gy-4 mb-4">
              <!-- Documents Overview-->
              <div class="col-lg-6">
                <div class="card h-100">
                  <div class="card-header">
                    <div class="d-flex justify-content-between">
                      <h4 class="mb-2">Documents Overview</h4>

                    </div>

                  </div>
                  <div class="card-body d-flex justify-content-between flex-wrap gap-3">
                    <div class="d-flex gap-4">
                      <div class="avatar">
                        <div class="avatar-initial bg-label-primary rounded">
                          <i class="mdi mdi-file-document-outline mdi-24px"></i>
                        </div>
                      </div>
                      <div class="card-info">
                        <h4 class="mb-0">{{count($academics)}}</h4>
                        <small>All My Documents</small>
                      </div>
                    </div>

                   
                  </div>
                </div>
              </div>
              <!--/ Documents Overview-->
            


            
            </div>


            <div class="row">
        
              <div class="mb-4">
              <button type="button" class="btn rounded-pill btn-label-success" style="float:right;" data-bs-toggle="modal" data-bs-target="#addUser"><i class='tf-icons mdi mdi-plus mdi-20px'></i>Upload New File</button>
              </div>
          
              </div>
   

          <!-- Academic Files Upload Modal -->
          <div class="modal fade" id="addUser" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="modalCenterTitle">Upload New File</h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form  method="post" action="{{ route('file.store') }}" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                                @csrf
                <div class="modal-body">
                  <div class="row g-2">
                    <div class="col mb-6 mt-4">
                      <div class="form-floating form-floating-outline">
                        <input type="text" id="nameWithTitle" class="form-control" name="title" placeholder="Enter Title" >
                        <label for="nameWithTitle">Title</label>
                      </div>
                    </div>


                  </div>

                  <div class="row mt-4">
                    <div class="col mb-6 ">
                      <div class="form-floating form-floating-outline">
                        <input type="text" id="desWithTitle" class="form-control" name="description" placeholder="Description">
                        <label for="desWithTitle">Description</label>
                      </div>
                    </div>

                  </div>

                  <div class="row mt-4">
                  <div class="col mb-6">
                      <div class="form-floating form-floating-outline">
                      <select id="folderid" name="folder_id" class="select2 form-select" data-allow-clear="true" >
                <option value="">Select Folder</option>
                @foreach ($folders as $folder)
            <option value="{{ $folder->id }}">{{ $folder->name }}</option>
            @endforeach

              </select>
              <label for="folderid">My Folders</label>
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
              <br />
              <ul class="ps-3 mb-0">
            <li class="fw-bold mb-1">Note : File Size Should not Exceed 1MB (File type :csv,txt,xlx,xls,pdf) </li>

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


          <br/>
                    
          <div class="app-academy">
            <div class="card p-0 mb-4">
              <div class="card-body d-flex flex-column flex-md-row justify-content-between p-0 pt-4">
                <div class="app-academy-md-25 card-body py-0">
                  <img src="{{asset('Admin/assets/img/illustrations/bulb-light.png')}}" class="img-fluid app-academy-img-height scaleX-n1-rtl" alt="Bulb in hand" height="90" />
                </div>
                <div class="app-academy-md-50 card-body d-flex align-items-md-center flex-column text-md-center mb-4">
                  <span class="card-title mb-3 lh-lg px-md-5 display-6 text-heading">
                    Have All Your Files
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
        <h5 class="mb-1">My Academic/Other Files</h5>
        <p class="mb-0">Total of <span>{{count($allData)}} Academics Files</span></p>
      </div>

    </div>
    <div class="card-body"> 
      <div class="row gy-4 mb-4">
      @foreach($allData as $key => $value ) 
        <div class="col-sm-6 col-lg-4">
          <div class="card p-2 h-100 shadow-none border">
            <div class="rounded-2 text-center mb-3">         
  <iframe height="300" width="280" src="{{ url('https://'.$value->file_url) }}" class="item rounded overflow-hidden">
  
  </iframe> 
              
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
                      <!-- / Content -->

                      



                    

                      
@endsection
