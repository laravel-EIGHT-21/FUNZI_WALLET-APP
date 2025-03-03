
@extends('admin.body.admin_master')
@section('content')

 

@section('title')

Update School Infor | funziwallet

@endsection



        
        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">
            
            
            <h4 class="py-3 mb-4">
              <span class="text-muted fw-light">School / Information /</span> Update 
            </h4>

       

          <div class="row">

          <div class="mb-4">

          <a href="{{ route('view.schools')}}" class="btn rounded-pill btn-primary" style="float:right;"><i class='tf-icons mdi mdi-arrow-left mdi-20px'></i>Back</a>

          </div>

          </div>



            <div class="row">
              <!-- User Sidebar -->
              <div class="col-xl-5 col-lg-5 col-md-5 order-1 order-md-0">
                <!-- User Card -->
                <div class="card mb-4">
                  <div class="card-body">
                    <div class="user-avatar-section">
                      <div class=" d-flex align-items-center flex-column">
                        <img class="img-fluid rounded mb-3 mt-4" src="{{ (!empty($editSchool->profile_photo_path))? url('upload/logo/'.$editSchool->profile_photo_path):url('upload/no_image.jpg') }}" height="120" width="120" alt="User avatar" />
                        <div class="user-info text-center">
                          <h4>{{$editSchool->name}}</h4>

                        </div>
                      </div>
                    </div>

                    <h5 class="pb-3 border-bottom mb-3">More Details</h5>
                    <div class="info-container">
                      <ul class="list-unstyled mb-4">

                        <li class="mb-3">
                          <span class="fw-medium text-heading me-2">Email:</span>
                          <span>{{$editSchool->email}}</span>
                        </li>
                        <li class="mb-3">
                          <span class="fw-medium text-heading me-2">Status:</span>

                          
@if($editSchool->status == 1)
<span class="badge bg-label-success rounded-pill">Active</span>
@elseif($editSchool->status == 0 )
<span class="badge bg-label-danger rounded-pill">Deactive</span>
@endif


                          
                        </li>


                        <li class="mb-3">
                          <span class="fw-medium text-heading me-2">School Code:</span>
                          <span>{{$editSchool->school_id_no}}</span>
                        </li>


                        
                        <li class="mb-3">
                          <span class="fw-medium text-heading me-2">Telephone One:</span>
                          <span>{{$editSchool->school_tel1}}</span>
                        </li>


                        <li class="mb-3">
                          <span class="fw-medium text-heading me-2">Telephone Two:</span>
                          <span>{{$editSchool->school_tel2}}</span>
                        </li>

                        <li class="mb-3">
                          <span class="fw-medium text-heading me-2">School Type:</span>
                          <span>{{$editSchool->school_type}}</span>
                        </li>

                        <li class="mb-3">
                          <span class="fw-medium text-heading me-2">Address:</span>
                          <span>{{$editSchool->address}}</span>
                        </li>

                      </ul>

                    </div>
                  </div>
                </div>
                <!-- /User Card -->

              </div>
              <!--/ User Sidebar -->
            
            
              <!-- User Content -->
              <div class="col-xl-7 col-lg-7 col-md-7 order-0 order-md-1">

            
                <!-- Change Password -->
                <div class="card mb-4">
                  <h5 class="card-header">Update School Information Below</h5>
                  <div class="card-body">
                    <form action="{{ route('school.update',$editSchool->id) }}" method="POST" >
                    @csrf

                      <div class="row">
                        <div class="mb-3 col-12 col-sm-6 form-password-toggle">
                          <div class="input-group input-group-merge">
                            <div class="form-floating form-floating-outline">
                              <input class="form-control" type="text" id="user_name" name="name" value="{{$editSchool->name}}" required" />
                              <label for="user_name">Name</label>
                            </div>

                          </div>
                        </div>
            
                        <div class="mb-3 col-12 col-sm-6 form-password-toggle">
                          <div class="input-group input-group-merge">
                            <div class="form-floating form-floating-outline">
                              <input class="form-control" type="text" name="school_tel1" id="user_tel" maxlength="10" minlength="10" value="{{$editSchool->school_tel1}}" required" />
                              <label for="user_tel">Telephone One</label>
                            </div>

                          </div>
                        </div>


                        <div class="mb-3 col-12 col-sm-6 form-password-toggle">
                          <div class="input-group input-group-merge">
                            <div class="form-floating form-floating-outline">
                              <input class="form-control" type="text" name="school_tel2" id="user_tel2" maxlength="10" minlength="10" value="{{$editSchool->school_tel2}}" required" />
                              <label for="user_tel2">Telephone Two</label>
                            </div>

                          </div>
                        </div>
 

                        <div class="mb-3 col-12 col-sm-6">
                      <div class="form-floating form-floating-outline">
                      <select id="schooltype" name="school_type" class="select2 form-select" data-allow-clear="true">
                <option value="" selected="" disabled="">Select Type</option>
                <option value="Primary" {{ ($editSchool->school_type == 'Primary')? 'selected':'' }}>Primary</option>
                <option value="Secondary" {{ ($editSchool->school_type == 'Secondary')? 'selected':'' }}>Secondary</option>
                <option value="Nursery&Primary" {{ ($editSchool->school_type == 'Nursery&Primary')? 'selected':'' }}>Nursery & Primary</option>
                <option value="Tertiary" {{ ($editSchool->school_type == 'Tertiary')? 'selected':'' }}>Tertiary</option>

              </select>
              <label for="schooltype">School Type</label>
                      </div>
                    </div>


                        <div class="mb-3 col-12 col-sm-12 form-password-toggle">
                          <div class="input-group input-group-merge">
                            <div class="form-floating form-floating-outline">
                              <input class="form-control" type="text" name="address" id="school_address" value="{{$editSchool->address}}" required />
                              <label for="school_address">School Address</label>
                            </div>

                          </div>
                        </div>




                        @can('edit-school')
                        <div>
                          <button type="submit" class="btn btn-primary me-2">Update School Information</button>
                        </div>
                        @endcan


                      </div>

                    </form>
                  </div>
                </div>

            

            

              </div>
              <!--/ User Content -->
            </div>
            

            
                      </div>
                      <!--/ Content -->
            
                                                        

@endsection 