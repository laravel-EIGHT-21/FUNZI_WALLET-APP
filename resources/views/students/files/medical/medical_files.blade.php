 
@extends('students.body.admin_master')
@section('content')

@section('title')
Academic Files | funzi wallet
@endsection

        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">

        <h4 class="py-3 mb-4">
              <span class="text-muted fw-light"><a href="{{ route('dashboard')}}">FunziWallet</a>/View /</span> All  Medical Files Manager &nbsp;  {{ count($allData) }} items


            </h4>

           

            <div class="row">

            <div class="mb-4">
                <a href="{{ route('view.medical.board') }}" class="btn rounded-pill btn-warning" style="float:left;">
                  View Medical Files Board</a>
                                      </div>

            <div class="mb-4">
                                <button type="button" class="btn rounded-pill btn-primary" style="float:right;" data-bs-toggle="modal" data-bs-target="#addUser"><i class='tf-icons mdi mdi-plus mdi-20px'></i>Upload New File</button>
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
                                            <th scope="col">Title</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Month</th>
                                            <th scope="col">Last Modified</th>
                                            <th scope="col"></th>


                                                </tr>
                                                <!-- end row --> 
                                            </thead>

<tbody>
@foreach($allData as $key => $value )
<tr>


<td>
<div class="d-flex align-items-center">

<div class="ms-3">
<a href="{{ (!empty($value->files))? url('upload/students/student_medicals/'.$value->files):url('upload/no_image.jpg') }}" target="_blank">
  
  <h6 class="fw-semibold mb-0 fs-6">{{ $value->title}}

</h6></a>
<p class="mb-0">{{ $value->description}}</p>
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
    
<div class="d-flex align-items-center">

<div class="ms-3">
<h6 class="fw-semibold mb-0">{{ $value->month}}</h6>

</div>
</div>


</td>


<td>
    
  <div class="d-flex align-items-center">
  
  <div class="ms-3">
  <h6 class="fw-semibold mb-0">{{ $value->updated_at}}</h6>
  
  </div>
  </div>
  
  
  </td>



<td>

<div class="action-btn">
  <div class="btn-group">
    <button type="button" class="btn btn-label-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Actions</button>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="{{route('edit.medical.file',$value->id)}}">Edit</a></li>
      <li><a class="dropdown-item" href="{{route('delete.medical.file',$value->id)}}" id="delete">Delete</a></li>

      
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
                      <!--/ Content -->





                                  

@endsection 