

<!-- Navbar -->

<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
  

      
      
  <div class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0   d-xl-none ">
    <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
      <i class="ri-menu-fill ri-22px"></i>
    </a>
  </div>
  

  <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
    

    <ul class="navbar-nav flex-row align-items-center ms-auto">

      <!-- Quick links  -->
      <li class="nav-item dropdown-shortcuts navbar-dropdown dropdown me-1 me-xl-0">
        <a class="nav-link btn btn-text-secondary rounded-pill btn-icon dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
          <i class='ri-grid-line ri-24px'></i>
          
        </a>
        <div class="dropdown-menu dropdown-menu-end py-0">
          <div class="dropdown-menu-header border-bottom py-50">
            <div class="dropdown-header d-flex align-items-center py-2">
              <h6 class="mb-0 me-auto">Shortcuts</h6>
              <a href="javascript:void(0)" class="btn btn-text-secondary rounded-pill btn-icon dropdown-shortcuts-add text-heading" data-bs-toggle="tooltip" data-bs-placement="top" title="Add shortcuts"><i class="ri-add-line ri-24px"></i></a>
            </div>
          </div>
          <div class="dropdown-shortcuts-list scrollable-container">
            <div class="row row-bordered overflow-visible g-0">
              <div class="dropdown-shortcuts-item col">
                <span class="dropdown-shortcuts-icon bg-label-success rounded-circle mb-3">
                  <i class="ri-pie-chart-2-line ri-26px text-heading"></i>
                </span>
                <a href="{{ route('dashboard') }}" class="stretched-link"><b>Dashboard</b></a>
                <small class="text-primary"><b>Main Dashboard</b></small>
              </div>
              <div class="dropdown-shortcuts-item col">
                <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                  <i class="ri-file-text-line ri-26px text-heading"></i>
                </span>
                <a href="app-invoice-list.html" class="stretched-link">Invoice App</a>
                <small class="mb-0">Manage Accounts</small>
              </div>
            </div>
            <div class="row row-bordered overflow-visible g-0">
              <div class="dropdown-shortcuts-item col">
                <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                  <i class="ri-user-line ri-26px text-heading"></i>
                </span>
                <a href="app-user-list.html" class="stretched-link">User App</a>
                <small class="mb-0">Manage Users</small>
              </div>
              <div class="dropdown-shortcuts-item col">
                <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                  <i class="ri-computer-line ri-26px text-heading"></i>
                </span>
                <a href="app-access-roles.html" class="stretched-link">Role Management</a>
                <small class="mb-0">Permission</small>
              </div>
            </div>
            <div class="row row-bordered overflow-visible g-0">
              <div class="dropdown-shortcuts-item col">
                <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                  <i class="ri-pie-chart-2-line ri-26px text-heading"></i>
                </span>
                <a href="index.html" class="stretched-link">Dashboard</a>
                <small class="mb-0">Analytics</small>
              </div>
              <div class="dropdown-shortcuts-item col">
                <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                  <i class="ri-settings-4-line ri-26px text-heading"></i>
                </span>
                <a href="pages-account-settings-account.html" class="stretched-link">Setting</a>
                <small class="mb-0">Account Settings</small>
              </div>
            </div>
            <div class="row row-bordered overflow-visible g-0">
              <div class="dropdown-shortcuts-item col">
                <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                  <i class="ri-question-line ri-26px text-heading"></i>
                </span>
                <a href="pages-faq.html" class="stretched-link">FAQs</a>
                <small class="mb-0">FAQs & Articles</small>
              </div>
              <div class="dropdown-shortcuts-item col">
                <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                  <i class="ri-tv-2-line ri-26px text-heading"></i>
                </span>
                <a href="modal-examples.html" class="stretched-link">Modals</a>
                <small class="mb-0">Useful Popups</small>
              </div>
            </div>
          </div>
        </div>
      </li>
      <!-- Quick links -->

      @php 

$school_id = Auth::user()->id;
$CartCout = App\Models\car_rental_cart::where('school_id',$school_id)->count();
$RentalCart = App\Models\car_rental_cart::where('school_id',$school_id)->get();


      @endphp

                <!-- Bus Rentals Cart -->
          <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-2 me-xl-1">
            <a class="nav-link btn btn-text-secondary btn-icon dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
              <span class="position-absolute top-0 start-50 translate-middle-y badge badge-dot bg-success mt-2 ">{{$CartCout}}</span>
              <i class="ri-bus-line lh-1 scaleX-n1-rtl ri-24px"></i>

            </a>
            <ul class="dropdown-menu dropdown-menu-end py-0">
              <li class="dropdown-menu-header border-bottom">
                <div class="dropdown-header d-flex align-items-center py-3">
                  <h6 class="mb-0 me-auto">Rentals Cart</h6>
                  <span class="badge rounded-pill bg-label-danger">{{$CartCout}} items</span>
                </div>
              </li>
              <li class="dropdown-notifications-list scrollable-container"> 
                <ul class="list-group list-group-flush">

                  @foreach($RentalCart as $cart)

                  <li class="list-group-item list-group-item-action dropdown-notifications-item">
                    <div class="d-flex gap-2">
                      <div class="flex-shrink-0">
                      <div class="avatar me-1">
                          <img src="{{ (!empty($cart['car']['car_photo']))? url('upload/car_photos/'.$cart['car']['car_photo']):url('upload/no_image.jpg') }}" alt class="w-px-50 h-px-50 rounded-circle">
                        </div>
                      </div> 
                      &nbsp;&nbsp;
                      <div class="d-flex flex-column flex-grow-1 overflow-hidden w-px-200">
                        <h6 class="mb-1 text-truncate">{{$cart['car']['car_name']}} </h6>
                        <small class="text-truncate text-body">Total Vehicles : {{$cart->vehicle_total}}</small>

                        <small class="text-truncate text-body">Total Days : {{$cart->total_days}}</small>

                        <small class="text-truncate text-body">Dates : <span class="badge bg-info">{{$cart->start_day}}</span> - <span class="badge bg-warning">{{$cart->end_day}}</span> </small>


                          <small class="text-truncate text-body">Total Px: ugx {{$cart->pricetotal}}</small>
                      </div>
                      <div class="flex-shrink-0 dropdown-notifications-actions">
                        <button type="button" onclick="removeRentalFromCart('{{$cart->id}}')" class="btn-close btn-pinned" aria-label="Close"></button>
                      </div>
                    </div>
                  </li>
                  @endforeach
                  

                </ul>
              </li>
              <li class="dropdown-menu-footer border-top p-2">
                <a href="{{ route('view.car.rental.cart')}}" class="btn btn-success d-flex justify-content-center"> 
                  <i class='tf-icons mdi mdi-cart-arrow-right mdi-20px'></i> Rental Cart
                </a>
              </li>
            </ul>
          </li>
          <!--/ Bus Rentals Cart -->


<!-- User -->
@php
$id = Auth::user()->id;
$userData = App\Models\User::find($id);
@endphp

      <li class="nav-item navbar-dropdown dropdown-user dropdown">
        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
          <div class="avatar">
            <img src="{{ (!empty($userData->profile_photo_path))? url('upload/logo/'.$userData->profile_photo_path):url('upload/no_image.jpg') }}" alt class="w-px-40 h-auto rounded-circle">
          </div>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
          <li>
            <a class="dropdown-item" href="pages-account-settings-account.html">
              <div class="d-flex">
                <div class="flex-shrink-0 me-2">
                  <div class="avatar avatar-online">
                    <img src="{{ (!empty($userData->profile_photo_path))? url('upload/logo/'.$userData->profile_photo_path):url('upload/no_image.jpg') }}" alt class="w-px-40 h-auto rounded-circle">
                  </div>
                </div>
                <div class="flex-grow-1">
        <span class="fw-medium d-block small">{{$userData->name}}</span> 
                </div>
              </div>
            </a>
          </li>
          <li>
            <div class="dropdown-divider"></div>
          </li>

          <li>
            <div class="dropdown-divider"></div>
          </li>


          <li>
            <div class="d-grid px-4 pt-2 pb-1">
              <a class="btn btn-sm btn-danger d-flex" href="{{ route('school.logout') }}" >
                <small class="align-middle">Logout</small>
                <i class="ri-logout-box-r-line ms-2 ri-16px"></i>
              </a>
            </div>
          </li>
        </ul>
      </li>
      <!--/ User -->
      
    
    </ul>
  </div>


  
          
  <form id="deleteFromCart" action="{{route('car.rental.cart.remove')}}" method="post">
    @csrf 
    @method('delete')
    <input type="hidden" id="id_D" name="id" />
    </form>

  

</nav>

<!-- / Navbar -->

         
<script type="text/javascript">


  function removeRentalFromCart(id)
  {
  
  $('#id_D').val(id);
  $('#deleteFromCart').submit();
  
  }
  
  
  </script>
  