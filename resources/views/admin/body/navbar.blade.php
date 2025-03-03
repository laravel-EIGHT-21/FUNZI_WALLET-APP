
<!-- Navbar -->

<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
  
  

      
      
      <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0   d-xl-none ">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
          <i class="mdi mdi-menu mdi-24px"></i>
        </a>
      </div>
      

      <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

        

        <ul class="navbar-nav flex-row align-items-center ms-auto">

        <!-- User -->


@php
$id = Auth::user()->id;
$userData = App\Models\Admin::find($id);
@endphp


          <li class="nav-item navbar-dropdown dropdown-user dropdown">
            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
              <div class="avatar avatar">
                <img src="{{ (!empty($userData->profile_photo_path))? url('upload/admin_images/'.$userData->profile_photo_path):url('upload/no_image.jpg') }}" alt class="w-px-40 h-auto rounded-circle">
              </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li>
                <a class="dropdown-item" href="pages-account-settings-account.html">
                  <div class="d-flex">
                    <div class="flex-shrink-0 me-3">
                      <div class="avatar">
                        <img src="{{ (!empty($userData->profile_photo_path))? url('upload/admin_images/'.$userData->profile_photo_path):url('upload/no_image.jpg') }}" alt class="w-px-40 h-auto rounded-circle">
                      </div>
                    </div>
                    <div class="flex-grow-1">
                      <span class="fw-medium d-block">{{$userData->name}}</span>
                      <small class="text-muted">


                      
                      @if(!empty($userData->getRoleNames()))
        @foreach($userData->getRoleNames() as $v)
        <span class="h6 mb-0 rounded-pill bg-label-success">{{ $v }}</span>
        @endforeach
      @endif

                      </small>


         
  


                    </div>
                  </div>
                </a>
              </li>
              <li>
                <div class="dropdown-divider"></div>
              </li>
              <li>
                <a class="dropdown-item" href="{{route('profile.view')}}">
                  <i class="mdi mdi-account-outline me-2"></i>
                  <span class="align-middle">My Profile</span>
                </a>
              </li>

             



              <li>
                <div class="dropdown-divider"></div>
              </li>
              <li>
                <a class="dropdown-item" href="{{ route('admin.logout') }}">
                  <i class="mdi mdi-logout me-2"></i>
                  <span class="align-middle">Log Out</span>
                </a>
              </li>
            </ul>
          </li>
          <!--/ User -->
          


        </ul>
      </div>

      

      
      
  
</nav>

<!-- / Navbar -->
