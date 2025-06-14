
<!-- Navbar -->

<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
  

      
      
      <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0   d-xl-none ">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
          <i class="mdi mdi-menu mdi-24px"></i>
        </a>
      </div>
      

      <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

@php 


$school_id = Auth::user()->id;
$tourCartCout = App\Models\tours_cart::where('school_id',$school_id)->count();
$tourCart = App\Models\tours_cart::where('school_id',$school_id)->get();

$CartCout = App\Models\car_rental_cart::where('school_id',$school_id)->count();
$RentalCart = App\Models\car_rental_cart::where('school_id',$school_id)->get();

$carts = App\Models\order_carts::where('school_id',$school_id)->get();
$CartCount = App\Models\order_carts::where('school_id',$school_id)->count();
$Subtotal = App\Models\order_carts::where('school_id',$school_id)->sum('pricetotal');

@endphp

        <ul class="navbar-nav flex-row align-items-center ms-auto">


                      <!-- Quick links  -->
                      <li class="nav-item dropdown-shortcuts navbar-dropdown dropdown me-1 me-xl-0">
                        <a class="nav-link btn btn-text-secondary rounded-pill btn-icon dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                          <i class='mdi mdi-view-grid-plus-outline mdi-24px'></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end py-0">
                          <div class="dropdown-menu-header border-bottom"> 
                            <div class="dropdown-header d-flex align-items-center py-3">
                              <h5 class="text-body mb-0 me-auto">Shortcuts</h5>
                              <a href="javascript:void(0)" class="dropdown-shortcuts-add text-muted" data-bs-toggle="tooltip" data-bs-placement="top" title="Add shortcuts"><i class="mdi mdi-view-grid-plus-outline mdi-24px"></i></a>
                            </div>
                          </div>
                          <div class="dropdown-shortcuts-list scrollable-container">
                            <div class="row row-bordered overflow-visible g-0">
                              <div class="dropdown-shortcuts-item col">
                                <span class="dropdown-shortcuts-icon bg-label-warning rounded-circle mb-2">

                                  <i class="mdi mdi-bus mdi-24px"></i>
                                </span> 
                                <a href="{{ route('tours.travels.dashboard')}}"  target="_blank" class="stretched-link"><b>Dashboard</b></a>
                                <small class="text-primary"><b>Funzi Tours & Travel</b></small>
                              </div>


                              
                              <div class="dropdown-shortcuts-item col">
                                <span class="dropdown-shortcuts-icon bg-label-success rounded-circle mb-2">
                                  <i class="mdi mdi-bus-school mdi-24px fs-4"></i>
                                </span>
                                <a href="{{ route('school.car.rentals.dashboard')}}" class="stretched-link"><b>Dashboard</b></a>
                                <small class="text-primary"><b>Funzi Bus Rentals</b></small>
                              </div>



                            </div>
                            <div class="row row-bordered overflow-visible g-0">
                              <div class="dropdown-shortcuts-item col">
                                <span class="dropdown-shortcuts-icon bg-label-danger rounded-circle mb-2">
                                  <i class="mdi mdi-cart-outline mdi-24px fs-4"></i>
                                </span>
                                <a href="{{ route('school.ecommerce.dashboard')}}" target="_blank" class="stretched-link">Dashboard</a>
                                <small class="text-primary"><b>Funzi eCommerce</b></small>
                              </div>

                              <div class="dropdown-shortcuts-item col">
                                <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                                  <i class="mdi mdi-shield-check-outline fs-4"></i>
                                </span>
                                <a href="app-access-roles.html" class="stretched-link">Role Management</a>
                                <small class="text-muted mb-0">Permission</small>
                              </div>
                            </div>
                            <div class="row row-bordered overflow-visible g-0">
                              <div class="dropdown-shortcuts-item col">
                                <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                                  <i class="mdi mdi-chart-pie-outline fs-4"></i>
                                </span>
                                <a href="index-2.html" class="stretched-link">Dashboard</a>
                                <small class="text-muted mb-0">Analytics</small>
                              </div>
                              <div class="dropdown-shortcuts-item col">
                                <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                                  <i class="mdi mdi-cog-outline fs-4"></i>
                                </span>
                                <a href="pages-account-settings-account.html" class="stretched-link">Setting</a>
                                <small class="text-muted mb-0">Account Settings</small>
                              </div>
                            </div>
                            <div class="row row-bordered overflow-visible g-0">
                              <div class="dropdown-shortcuts-item col">
                                <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                                  <i class="mdi mdi-help-circle-outline fs-4"></i>
                                </span>
                                <a href="pages-faq.html" class="stretched-link">FAQs</a>
                                <small class="text-muted mb-0">FAQs & Articles</small>
                              </div>
                              <div class="dropdown-shortcuts-item col">
                                <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                                  <i class="mdi mdi-dock-window fs-4"></i>
                                </span>
                                <a href="modal-examples.html" class="stretched-link">Modals</a>
                                <small class="text-muted mb-0">Useful Popups</small>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                      <!-- Quick links -->
            
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        
          <!-- Shopping Cart -->
          <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-2 me-xl-1">
            <a class="nav-link btn btn-text-secondary btn-icon dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
              <span class="position-absolute top-0 start-50 translate-middle-y badge badge-dot bg-success mt-2 ">{{$CartCount}}</span>
              <i class="mdi mdi-cart-variant lh-1 scaleX-n1-rtl mdi-24px"></i>

            </a>
            <ul class="dropdown-menu dropdown-menu-end py-0">
              <li class="dropdown-menu-header border-bottom">
                <div class="dropdown-header d-flex align-items-center py-3">
                  <h6 class="mb-0 me-auto">My Shopping Cart</h6>
                  <span class="badge rounded-pill bg-label-danger">{{$CartCount}} items</span>
                </div>
              </li>
              <li class="dropdown-notifications-list scrollable-container">
                <ul class="list-group list-group-flush">

                  @foreach($carts as $cart)
                  <li class="list-group-item list-group-item-action dropdown-notifications-item">
                    <div class="d-flex gap-2">
                      <div class="flex-shrink-0">
                      <div class="avatar me-1">
                        <img src="{{ (!empty($cart['product']['product_thambnail']))? url('upload/product_images/'.$cart['product']['product_thambnail']):url('upload/no_image.jpg') }}" alt class="w-px-50 h-px-50 rounded-circle">
                      </div>
                      </div>
                      &nbsp;&nbsp;
                      <div class="d-flex flex-column flex-grow-1 overflow-hidden w-px-200">
                        <h6 class="mb-1 text-truncate"> {{$cart['product']['product_name']}}</h6>
                        <small class="text-truncate text-body">Qty : {{$cart->qty}}</small>
                      @php 

                      $product_price = (float)$cart->price * (float)$cart->qty;

                      @endphp
                        <small class="text-truncate text-body">Total : ugx {{$product_price}}</small>
                      </div>
                      <div class="flex-shrink-0 dropdown-notifications-actions">
                        <button type="button" onclick="removeItemFromCart('{{$cart->id}}')" class="btn-close btn-pinned" aria-label="Close"></button>
                      </div>
                    </div>
                  </li>
                  @endforeach

                </ul>
              </li>

            </ul>
          </li>
          <!--/ Shopping Cart -->

          &nbsp;&nbsp;

 <!-- Tours Cart -->
 <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-2 me-xl-1">
  <a class="nav-link btn btn-text-secondary btn-icon dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
    <span class="position-absolute top-0 start-50 translate-middle-y badge badge-dot bg-info mt-2 ">{{$tourCartCout}}</span>
    <i class="mdi mdi-bus lh-1 scaleX-n1-rtl mdi-24px"></i>

  </a>
  <ul class="dropdown-menu dropdown-menu-end py-0">
    <li class="dropdown-menu-header border-bottom">
      <div class="dropdown-header d-flex align-items-center py-3">
        <h6 class="mb-0 me-auto">My Tours Cart</h6>
        <span class="badge rounded-pill bg-label-danger">{{$tourCartCout}} items</span>
      </div>
    </li>
    <li class="dropdown-notifications-list scrollable-container">
      <ul class="list-group list-group-flush">

        @foreach($tourCart as $cart)

        <li class="list-group-item list-group-item-action dropdown-notifications-item">
          <div class="d-flex gap-2">
            <div class="flex-shrink-0">
            <div class="avatar me-1">
                <img src="{{ (!empty($cart['tour']['image_thambnail']))? url('upload/tour_package_thumbnail/'.$cart['tour']['image_thambnail']):url('upload/no_image.jpg') }}" alt class="w-px-50 h-px-50 rounded-circle">
              </div>
            </div> 
            &nbsp;&nbsp;
            <div class="d-flex flex-column flex-grow-1 overflow-hidden w-px-200">
              <h6 class="mb-1 text-truncate">{{$cart['tour']['name']}} </h6>
              <small class="text-truncate text-body">Student qty : {{$cart->stud_qty}}</small>

              <small class="text-truncate text-body">Adult qty : {{$cart->adult_qty}}</small>

              @php 

              $total_tour_price = (float)$cart->stud_pricetotal + (float)$cart->adult_pricetotal;

              @endphp
                <small class="text-truncate text-body">Total Px: ugx {{$total_tour_price}}</small>
            </div>
            <div class="flex-shrink-0 dropdown-notifications-actions">
              <button type="button" onclick="removeTourFromCart('{{$cart->id}}')" class="btn-close btn-pinned" aria-label="Close"></button>
            </div>
          </div>
        </li>
        @endforeach
        

      </ul>
    </li>
    
  </ul>
</li>
<!--/ Tours Cart -->




&nbsp;&nbsp; 

 <!-- Bus Rentals Cart -->
 <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-2 me-xl-1">
  <a class="nav-link btn btn-text-secondary btn-icon dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
    <span class="position-absolute top-0 start-50 translate-middle-y badge badge-dot bg-warning mt-2 ">{{$CartCout}}</span>
    <i class="mdi mdi-bus-school lh-1 scaleX-n1-rtl mdi-24px"></i>

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

  </ul>
</li>
<!--/ Bus Rentals Cart -->



&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                 <!-- User -->
@php
$id = Auth::user()->id;
$userData = App\Models\User::find($id);
@endphp
          <li class="nav-item navbar-dropdown dropdown-user dropdown">
            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
              <div class="avatar avatar">
                <img src="{{ (!empty($userData->profile_photo_path))? url('upload/logo/'.$userData->profile_photo_path):url('upload/no_image.jpg') }}" alt class="w-px-40 h-auto rounded-circle">
              </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li>
                <a class="dropdown-item" href="pages-account-settings-account.html">
                  <div class="d-flex">
                    <div class="flex-shrink-0 me-3">
                      <div class="avatar">
                        <img src="{{ (!empty($userData->profile_photo_path))? url('upload/logo/'.$userData->profile_photo_path):url('upload/no_image.jpg') }}" alt class="w-px-40 h-auto rounded-circle">
                      </div>
                    </div>
                    <div class="flex-grow-1">
                      <span class="fw-medium d-block">{{$userData->name}}</span>
                      
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <div class="dropdown-divider"></div>
              </li>
              <li>
                <a class="dropdown-item" href="{{route('school.user.profile.view')}}">
                  <i class="mdi mdi-account-outline me-2"></i>
                  <span class="align-middle">My Profile</span>
                </a>
              </li>

             



              <li>
                <div class="dropdown-divider"></div>
              </li>
              <li>
                <a class="dropdown-item" href="{{ route('school.logout') }}">
                  <i class="mdi mdi-logout me-2"></i>
                  <span class="align-middle">Log Out</span>
                </a>
              </li>
            </ul>
          </li>
          <!--/ User -->
          


        </ul>
      </div>

      

          
      <form id="deleteItemFromCart" action="{{route('cart.remove')}}" method="post">
          @csrf 
          @method('delete')
          <input type="hidden" id="rowId_D" name="id" />
          </form>


                    
  <form id="deleteTourFromCart" action="{{route('tour.cart.remove')}}" method="post">
    @csrf 
    @method('delete')
    <input type="hidden" id="id_D" name="id" />
    </form>
      

              
  <form id="deleteRentalFromCart" action="{{route('car.rental.cart.remove')}}" method="post">
    @csrf 
    @method('delete')
    <input type="hidden" id="id_D" name="id" />
    </form>
      
  
</nav>

<!-- / Navbar -->

         
<script type="text/javascript">


function removeItemFromCart(id)
{

$('#rowId_D').val(id);
$('#deleteItemFromCart').submit();

}




function removeTourFromCart(id)
  {
  
  $('#id_D').val(id);
  $('#deleteTourFromCart').submit();
  
  }




  
  function removeRentalFromCart(id)
  {
  
  $('#id_D').val(id);
  $('#deleteRentalFromCart').submit();
  
  }



</script>
