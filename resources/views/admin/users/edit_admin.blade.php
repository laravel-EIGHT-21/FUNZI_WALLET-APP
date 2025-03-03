
@extends('admin.body.admin_master')
@section('content')





@section('title')

Update Admin Infor | funziwallet

@endsection


        
        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">
            
            
            <h4 class="py-3 mb-4">
              <span class="text-muted fw-light">Admin-User / Information /</span> Update 
            </h4>


            <div class="row">

<div class="mb-4">

<a href="{{ route('view.admin.user')}}" class="btn rounded-pill btn-primary" style="float:right;"><i class='tf-icons mdi mdi-arrow-left mdi-20px'></i>Back</a>

</div>

</div>



            <div class="row">
              <!-- User Sidebar -->
              <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
                <!-- User Card -->
                <div class="card mb-4">
                  <div class="card-body">
                    <div class="user-avatar-section">
                      <div class=" d-flex align-items-center flex-column">
                        <img class="img-fluid rounded mb-3 mt-4" src="{{ (!empty($editUser->profile_photo_path))? url('upload/admin_images/'.$editUser->profile_photo_path):url('upload/no_image.jpg') }}" height="120" width="120" alt="User avatar" />
                        <div class="user-info text-center">
                          <h4>{{$editUser->name}}</h4>

                        </div>
                      </div>
                    </div>

                    <h5 class="pb-3 border-bottom mb-3">Details</h5>
                    <div class="info-container">
                      <ul class="list-unstyled mb-4">

                        <li class="mb-3">
                          <span class="fw-medium text-heading me-2">Email:</span>
                          <span>{{$editUser->email}}</span>
                        </li>
                        <li class="mb-3">
                          <span class="fw-medium text-heading me-2">Status:</span>

                          
@if($editUser->status == 1)
<span class="badge bg-label-success rounded-pill">Active</span>
@elseif($editUser->status == 0 )
<span class="badge bg-label-danger rounded-pill">Deactive</span>
@endif

                        </li>


                        @if(!empty($editUser->getRoleNames()))
        @foreach($editUser->getRoleNames() as $v)
                        <li class="mb-3">
                          <span class="fw-medium text-heading me-2">Role:</span>
                          <span>{{ $v }}</span>
                        </li>
                        @endforeach
      @endif


                        <li class="mb-3">
                          <span class="fw-medium text-heading me-2">Contact:</span>
                          <span>{{$editUser->telephone}}</span>
                        </li>


                      </ul>

                    </div>
                  </div>
                </div>
                <!-- /User Card -->

              </div>
              <!--/ User Sidebar -->
            
            
              <!-- User Content -->
              <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">

            
                <!-- Change Password -->
                <div class="card mb-4">
                  <h5 class="card-header">Update User Information Below</h5>
                  <div class="card-body">
                    <form action="{{ route('user.update',$editUser->id) }}" method="POST" >
                    @csrf

                      <div class="row">
                        <div class="mb-3 col-12 col-sm-6 form-password-toggle">
                          <div class="input-group input-group-merge">
                            <div class="form-floating form-floating-outline">
                              <input class="form-control" type="text" id="user_name" name="name" value="{{$editUser->name}}" required" />
                              <label for="user_name">Name</label>
                            </div>

                          </div>
                        </div>
            
                        <div class="mb-3 col-12 col-sm-6 form-password-toggle">
                          <div class="input-group input-group-merge">
                            <div class="form-floating form-floating-outline">
                              <input class="form-control" type="text" name="telephone" id="user_tel" maxlength="10" minlength="10" value="{{$editUser->telephone}}" required" />
                              <label for="user_tel">Phone Contact</label>
                            </div>

                          </div>
                        </div>

                        @foreach($editRole as $update)
                        <div class="mb-3 col-12 col-sm-6 form-password-toggle">
                          <div class="input-group input-group-merge">
                            <div class="form-floating form-floating-outline">
                            <select id="role_id" name="role_id" required class="select2 form-select">
                          <option value="">Select User Role</option>
                          @foreach ($roles as $role)
<option value="{{ $role->id }}" {{ ($update->role_id == $role->id)? "selected": ""  }}>{{ $role->name }}</option>
@endforeach

                        </select>
                        <label for="role_id">User Role</label>
                            </div>

                          </div>
                        </div>
                        @endforeach

                        @can('edit-admin-user')
                        <div>
                          <button type="submit" class="btn btn-primary me-2">Update User</button>
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