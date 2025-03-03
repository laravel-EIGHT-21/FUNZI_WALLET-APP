
@extends('admin.body.admin_master')
@section('content')
    


@section('title')

User Profile - funziwallet

@endsection

               
        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">
                    @php
                    $id = Auth::user()->id;
                    $adminData = App\Models\Admin::find($id);
                    $editData = App\Models\Admin::find($id);


                    @endphp

            
            <h4 class="py-3 mb-4">
              <span class="text-muted fw-light">User /</span> Profile
            </h4>

            <div class="row">


            <div class="col-md-12">

    <ul class="nav nav-pills flex-column flex-md-row mb-3 gap-2 gap-lg-0" role="tablist">
      <li class="nav-item">
        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-account" aria-controls="navs-pills-justified-home" aria-selected="true"><i class="mdi mdi-account-outline mdi-20px me-1"></i> Account</button>
      </li>
      <li class="nav-item">
        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-security" aria-controls="navs-pills-justified-profile" aria-selected="false"><i class="mdi mdi-lock-open-outline mdi-20px me-1"></i> Security</button>
      </li>

    </ul>



    <div class="tab-content">


      <div class="card mb-4 tab-pane fade show active" id="navs-pills-justified-account" role="tabpanel">
      <h4 class="card-header">Profile Details</h4>
      <!-- Account -->
      <div class="card-body">
        <div class="d-flex align-items-start align-items-sm-center gap-4">
          <img src="{{ (!empty($adminData->profile_photo_path))? url('upload/admin_images/'.$adminData->profile_photo_path):url('upload/no_image.jpg') }}" alt="user-avatar" class="d-block w-px-150 h-px-170 rounded"  />

        </div>
      </div>
      <div class="card-body pt-2 mt-1">
        <form method="post" action="{{route('admin.profile.update') }}" enctype="multipart/form-data">
        @csrf
          <div class="row mt-2 gy-4">
            <div class="col-md-6">
              <div class="form-floating form-floating-outline">
                <input class="form-control" type="text" id="name" name="name" value="{{$editData->name}}" required autofocus />
                <label for="name">User Name</label>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-floating form-floating-outline">
                <input class="form-control" type="text" id="email" name="email" value="{{$editData->email}}" required />
                <label for="email">E-mail</label>
              </div>
            </div>

            <div class="col-md-6">
              <div class="input-group input-group-merge">
                <div class="form-floating form-floating-outline">
                  <input type="text" id="admin_tel" name="telephone" class="form-control" maxlength="10" minlength="10" value="{{$editData->telephone}}" placeholder="070000000" required />
                  <label for="admin_tel">Phone Number</label>
                </div>

              </div>
            </div>



            <div class="col-md-6">
              <div class="input-group input-group-merge">
                <div class="form-floating form-floating-outline">
                  <input type="file" id="profile_photo_path" name="profile_photo_path" class="form-control"  value="{{$editData->profile_photo_path}}" />
                  <label for="profile_photo_path">Profile Photo</label>
                </div>

              </div>
            </div>
            

          </div>
          <div class="mt-4">
            <button type="submit" class="btn btn-primary me-2">Save changes</button>
            <button type="reset" class="btn btn-outline-secondary">Cancel</button>
          </div>
        </form>
      </div>
      <!-- /Account -->
    



      </div>


<div class="tab-pane fade" id="navs-pills-justified-security" role="tabpanel">
     
 <!-- Change Password -->
 <div class="card mb-4" >
      <h5 class="card-header">Change Password</h5>
      <div class="card-body">
      <form method="POST" action="{{route('admin.password.update') }}" enctype="multipart/form-data" >
        @csrf
          <div class="row">
            <div class="mb-3 col-md-6 form-password-toggle">
              <div class="input-group input-group-merge">
                <div class="form-floating form-floating-outline">
                  <input class="form-control" type="password" name="oldpassword" id="current_password"  />
                  <label for="current_password">Current Password</label>
                </div>
                <span class="input-group-text cursor-pointer"><i class="mdi mdi-eye-off-outline"></i></span>
              </div>
            </div>
          </div>
          <div class="row g-3 mb-4">
            <div class="col-md-6 form-password-toggle">
              <div class="input-group input-group-merge">
                <div class="form-floating form-floating-outline">
                  <input class="form-control" type="password" id="password" name="password" />
                  <label for="new_password">New Password</label>
                </div>
                <span class="input-group-text cursor-pointer"><i class="mdi mdi-eye-off-outline"></i></span>
              </div>
            </div>
            <div class="col-md-6 form-passwords-toggle">
              <div class="input-group input-group-merge">
                <div class="form-floating form-floating-outline">
                  <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" />
                  <label for="password_confirmation">Confirm New Password</label>
                </div>
                <span class="input-group-text cursor-pointer"><i class="mdi mdi-eye-off-outline"></i></span>
              </div>
            </div>
          </div>
          <h6 class="text-body">Password Requirements:</h6>
          <ul class="ps-3 mb-0">
            <li class="mb-1">Minimum 8 characters long - the more, the better</li>
            <li class="mb-1">At least one lowercase character</li>
            <li>At least one number and a symbol</li>
          </ul>
          <div class="mt-4">
            <button type="submit" class="btn btn-primary me-2">Save changes</button>
            <button type="reset" class="btn btn-outline-secondary">Cancel</button>
          </div>
        </form>
      </div>
    </div>
    <!--/ Change Password -->

    <!-- Two-steps verification -->
    <div class="card mb-4">
      <h5 class="card-header">Two-steps verification</h5>
      <div class="card-body">
        <h5 class="mb-3">Two factor authentication is not enabled yet.</h5>
        <p class="w-75">Two-factor authentication adds an additional layer of security to your account by requiring more than just a password to log in.
          <a href="javascript:void(0);">Learn more.</a>
        </p>
        <button class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#enableOTP">Enable two-factor authentication</button>
      </div>
    </div>
    <!-- Modal -->
    <!-- Enable OTP Modal -->
<div class="modal fade" id="enableOTP" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-simple modal-enable-otp modal-dialog-centered">
    <div class="modal-content p-3 p-md-5">
      <div class="modal-body p-md-0">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="text-center mb-4">
          <h3 class="mb-2 pb-1">Enable One Time Password</h3>
          <p>Verify Your Mobile Number for SMS</p>
        </div>
        <p>Enter your mobile phone number with country code and we will send you a verification code.</p>
        <form id="enableOTPForm" class="row g-3" onsubmit="return false">
          <div class="col-12">
            <div class="input-group input-group-merge">
              <span class="input-group-text">US (+1)</span>
              <div class="form-floating form-floating-outline">
                <input type="text" id="modalEnableOTPPhone" name="modalEnableOTPPhone" class="form-control phone-number-otp-mask" placeholder="202 555 0111" />
                <label for="modalEnableOTPPhone">Phone Number</label>
              </div>
            </div>
          </div>
          <div class="col-12">
            <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
            <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!--/ Enable OTP Modal -->

    <!-- /Modal -->

    <!--/ Two-steps verification -->

    </div>


      
    </div>

</div>
            
            </div>
            
            
                      </div>
                      <!--/ Content -->
            

                      <script src="{{asset('Admin/assets/js/modal-enable-otp.js')}}"></script>
  <script src="{{asset('Admin/assets/js/pages-account-settings-account.js')}}"></script>
  <script src="{{asset('Admin/assets/js/pages-account-settings-security.js')}}"></script>
                    
                      @endsection