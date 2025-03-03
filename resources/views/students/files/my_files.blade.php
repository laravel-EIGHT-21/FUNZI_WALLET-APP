 
@extends('students.body.admin_master')
@section('content')

@section('title')
My Files | funzi wallet
@endsection

@php 

$student_id = Auth::user()->id;

$academics= App\Models\studentfiles::where('student_id',$student_id)->get();

$academic_folders= App\Models\academic_folders::where('student_id',$student_id)->get();


@endphp
 
        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">

        <h4 class="py-3 mb-4">
              <span class="text-muted fw-light"><a href="{{ route('student.dashboard')}}">FunziWallet</a> / View /</span> All Files Manager


            </h4>

<br/>

<div class="card p-0 mb-4">
              <div class="card-body d-flex flex-column flex-md-row justify-content-between p-0 pt-4">
                <div class="app-academy-md-25 card-body py-0">
                  <img src="{{asset('Admin/assets/img/illustrations/bulb-light.png')}}" class="img-fluid app-academy-img-height scaleX-n1-rtl" alt="Bulb in hand" height="90" />
                </div>
                <div class="app-academy-md-50 card-body d-flex align-items-md-center flex-column text-md-center mb-4">
                  <span class="card-title mb-3 lh-lg px-md-5 display-6 text-heading">
                    Have All Your Files & Photos
                    <span class="text-primary text-nowrap">All In One Place</span>.
                  </span>
                

                </div>
                <div class="app-academy-md-25 d-flex align-items-end justify-content-end">
                  <img src="{{asset('Admin/assets/img/illustrations/pencil-rocket.png')}}" alt="pencil rocket" height="188" class="scaleX-n1-rtl" />
                </div>
              </div>
            </div>


<br/>




            
<div class="col-xl-12 col-lg-7 col-md-7 order-0 order-md-1">


<div class="tab-content">




<div class="tab-pane fade show active" role="tabpanel">


  <div class="row">

  <div class="mb-2">
  <button type="button" class="btn rounded-pill btn-success" style="float:right;" data-bs-toggle="modal" data-bs-target="#addUser"><i class='tf-icons mdi mdi-plus mdi-20px'></i>Upload New File</button>
  </div>

  </div>


<div class="row">
                        <div class="col-12">
                        <div class="nav-align-left col-xl-12 col-lg-7 col-md-7 order-0 order-md-1">
                        <ul class="nav nav-pills flex-column me-3" role="tablist">
        <li class="nav-item">
          <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-left-general" aria-controls="navs-pills-left-general" aria-selected="true">General</button>
        </li>
        <li class="nav-item">
          <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-left-folders" aria-controls="navs-pills-left-folders" aria-selected="false">Folders</button>
        </li>
        <li class="nav-item">
          <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-left-files" aria-controls="navs-pills-left-files" aria-selected="false">Files</button>
        </li>


                        </ul>

                        <div class="tab-content p-0">
        <div class="tab-pane fade show active" id="navs-pills-left-general" role="tabpanel">
        
        <div class="row mb-4">
  <!-- Cards with few info -->
  <div class="col-lg-6 col-sm-6">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-center flex-wrap gap-2">
          <div class="avatar me-3">
            <div class="avatar-initial bg-label-primary rounded">
              <i class="mdi mdi-vector-arrange-below mdi-24px">
              </i>
            </div>
          </div>
          <div class="card-info">
            <div class="d-flex align-items-center">
              <h4 class="mb-0">{{count($academic_folders)}}</h4>
            </div>
            <small>Total Folders</small>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="col-lg-6 col-sm-6">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-center flex-wrap gap-2">
          <div class="avatar me-3">
            <div class="avatar-initial bg-label-warning rounded">
              <i class="mdi mdi-vector-arrange-below mdi-24px">
              </i>
            </div>
          </div>
          <div class="card-info">
            <div class="d-flex align-items-center">
              <h4 class="mb-0">{{count($academics)}}</h4>

            </div>
            <small>Total Files</small>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--/ Cards with few info -->
        </div>


        <div class="card mb-4">
        <div class="card-header d-flex justify-content-end align-items-end">

        <a href="{{ route('view.files.board') }}" class="btn rounded-pill btn-label-pinterest"><i class='tf-icons mdi mdi-vector-arrange-below mdi-20px'></i>Files Board</a>
          </div>
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <div class="d-flex align-items-center">

                <div class="d-flex flex-column">
                  <h6 class="m-0">Folders` Details</h6>

                </div>
              </div>

            </div>

            @php 
      
            $files_count = App\Models\studentfiles::select('student_id','folder_id')->groupBY('student_id','folder_id')->where('student_id',$student_id)->get();

            @endphp

            <div class="mb-3">
              <div class="table-responsive text-nowrap border rounded">
                <table class="table">
                  <thead class="table-light">
                    <tr>
                      <th>Folder</th>
                      <th>Total Files</th>
                     
                    </tr>
                  </thead>
                  @foreach ($files_count as $value)
                  <tbody>
                    <tr>
                      <td>{{ $value['folder']['name']}}</td>

        @php 

        $academic_files= App\Models\studentfiles::where('student_id',$value->student_id)->where('folder_id',$value->folder_id)->get();


        @endphp

                      <td>{{count($academic_files)}}</td>

                    </tr>

                  </tbody>
                  @endforeach
                </table>
              </div>
            </div>

           
          </div>
        </div>
        </div>


        <div class="tab-pane fade" id="navs-pills-left-folders" role="tabpanel">


        <div class="card mb-4">
        <div class="card-header d-flex justify-content-end align-items-end">

        <button type="button" class="btn rounded-pill btn-info"  data-bs-toggle="modal" data-bs-target="#addFolder"><i class='tf-icons mdi mdi-plus mdi-20px'></i>Add Folder</button>
          </div>
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <div class="d-flex align-items-center">

                <div class="d-flex flex-column">
                  <h6 class="m-0">All My Folders</h6>

                </div>
              </div>

            </div>

            <div class="mb-3">
              <div class="table-responsive text-nowrap border rounded">
                <table class="table">
                  <thead class="table-light">
                    <tr>
                      <th>Folder</th>
                      <th>Action</th>
                     
                    </tr>
                  </thead>
                  @foreach ($folders as $value)
                  <tbody>
                    <tr>
                      <td>{{$value->name}}</td>

                      <td>


                      <a href="javascript:void(0);" title="Edit Folder" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#editFolder" id="{{ $value->id }}" onclick="folderView(this.id)">
                          <i class="mdi mdi-pencil-outline me-2"></i>
                        </a>


                <a href="{{route('delete.academic.folder',$value->id)}}" id="delete" title="Delete" class="btn btn-sm btn-danger"><i class='mdi mdi-delete-outline'></i></a>
                      </td>

                    </tr>

                  </tbody>
                  @endforeach
                </table>
              </div>
            </div>

           
          </div>
        </div>


        </div>




        <div class="tab-pane fade" id="navs-pills-left-files" role="tabpanel">

        <div class="row">
                        <div class="col-12">
                            <!-- ---------------------
                                    start Zero Configuration
                          
                                ---------------- -->
                            <div class="card">
                                <div class="card-body">
     
                                    <div class="table-responsive">
                                        <table id="zero_config"
                                            class="table border table-bordered text-nowrap">
                                            <thead>
                                                <!-- start row -->
                                                <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Folder</th>
                                <th scope="col">File</th>
                                <th scope="col">Date</th>

                                <th scope="col"></th>

                                                </tr>
                                                <!-- end row -->
                                            </thead>

          <tbody>

          @foreach($files as $key => $value )
<tr>


<td>
<div class="d-flex align-items-center">

<div class="ms-3">
  
  <h6 class="fw-semibold mb-0 fs-8">{{ $value->title}}

</h6>
<p class="mb-0">{{ $value->description}}</p>
</div>
</div>
</td>



<td>
    
<div class="d-flex align-items-center">

<div class="ms-3">
<h6 class="mb-0">{{ $value['folder']['name']}}</h6>

</div>
</div>


</td>


<td>

<div class="d-flex align-items-center">
<div class="ms-3">
<a href="{{ url('https://'.$value->file_url) }}" class="btn btn-sm btn-primary" target="_blank">Download</a>
               

</div>
</div>

</td>

<td>

<div class="d-flex align-items-center">
<div class="ms-3">
<h6 class="fw-semibold mb-0">{{ $value->date}}</h6>

</div>
</div>

</td>



<td>

<div class="action-btn">
  <div class="btn-group">
    <button type="button" class="btn btn-label-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Actions</button>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="{{route('edit.file',$value->id)}}">Edit</a></li>
      <li><a class="dropdown-item" href="{{route('delete.file',$value->id)}}" id="delete"> Delete</a></li>

      
    </ul>
  </div>
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

        </div>





      </div>



                        </div>
                    </div>


</div>    <!--/Academic Files -->

</div>




</div>

      
          <!-- Academic Files Upload Modal -->
          <div class="modal fade" id="addUser" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="modalCenterTitle">Upload New Academic File</h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form  method="post" action="{{ route('file.store') }}" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
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
                  <div class="col mb-6">
                      <div class="form-floating form-floating-outline">
                      <select id="folderid" name="folder_id" class="select2 form-select" data-allow-clear="true">
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








                    <!-- Academic Folders Upload Modal -->
                    <div class="modal fade" id="addFolder" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="modalCenterTitle">Upload New Academic Folder </h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form  method="post" action="{{ route('academic.folder.store') }}" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                                @csrf
                <div class="modal-body">
                  <div class="row g-2">
                    <div class="col mb-6 mt-4">
                      <div class="form-floating form-floating-outline">
                        <input type="text" id="nameWithTitle" class="form-control" name="name" placeholder="Enter Folder Name" required>
                        <label for="nameWithTitle">Folder Name</label>
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





                              <!-- Update  Academic Folders Modal -->
                              <div class="modal fade" id="editFolder" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="modalCenterTitle">Update Academic Folder </h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="closeModal"></button>
                </div>

<form action="{{ url('/students/update-academic-folder')}}"  method="post">
@csrf

<input type="hidden" name="id" id="id">

                <div class="modal-body">
                  <div class="row g-2">
                    <div class="col mb-6 mt-4">
                      <div class="form-floating form-floating-outline">
                        <input type="text" class="form-control" name="name" id="name" required >
                        <label for="nameWithTitle">Folder Name</label>
                      </div>
                    </div>


                  </div>


                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary me-sm-3 me-1">Update Folder</button>
                </div>
                
</form>


              </div>
            </div>
          </div>















<br/>            
            
                      </div>
                      <!--/ Content -->


                      

  <script type="text/javascript">

 
$.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    })


function folderView(id){

$.ajax({
  type: 'GET',
  url: '/students/academic/folder/view-modal/'+id,
  dataType: 'json',
  success:function(data){
     
    $('#name').val(data.folder.name);
    $('#id').val(id);

  }
})

}

</script>



                                  

@endsection 