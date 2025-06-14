
@php

$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();

@endphp

<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

  
  <div class="app-brand demo ">
    <a href="{{ route('dashboard')}}" class="app-brand-link">
      <span class="app-brand-logo demo">
<span style="color:var(--bs-primary);">
  <svg width="268" height="150" viewBox="0 0 38 20" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M30.0944 2.22569C29.0511 0.444187 26.7508 -0.172113 24.9566 0.849138C23.1623 1.87039 22.5536 4.14247 23.5969 5.92397L30.5368 17.7743C31.5801 19.5558 33.8804 20.1721 35.6746 19.1509C37.4689 18.1296 38.0776 15.8575 37.0343 14.076L30.0944 2.22569Z" fill="currentColor" />
    <path d="M30.171 2.22569C29.1277 0.444187 26.8274 -0.172113 25.0332 0.849138C23.2389 1.87039 22.6302 4.14247 23.6735 5.92397L30.6134 17.7743C31.6567 19.5558 33.957 20.1721 35.7512 19.1509C37.5455 18.1296 38.1542 15.8575 37.1109 14.076L30.171 2.22569Z" fill="url(#paint0_linear_2989_100980)" fill-opacity="0.4" />
    <path d="M22.9676 2.22569C24.0109 0.444187 26.3112 -0.172113 28.1054 0.849138C29.8996 1.87039 30.5084 4.14247 29.4651 5.92397L22.5251 17.7743C21.4818 19.5558 19.1816 20.1721 17.3873 19.1509C15.5931 18.1296 14.9843 15.8575 16.0276 14.076L22.9676 2.22569Z" fill="currentColor" />
    <path d="M14.9558 2.22569C13.9125 0.444187 11.6122 -0.172113 9.818 0.849138C8.02377 1.87039 7.41502 4.14247 8.45833 5.92397L15.3983 17.7743C16.4416 19.5558 18.7418 20.1721 20.5361 19.1509C22.3303 18.1296 22.9391 15.8575 21.8958 14.076L14.9558 2.22569Z" fill="currentColor" />
    <path d="M14.9558 2.22569C13.9125 0.444187 11.6122 -0.172113 9.818 0.849138C8.02377 1.87039 7.41502 4.14247 8.45833 5.92397L15.3983 17.7743C16.4416 19.5558 18.7418 20.1721 20.5361 19.1509C22.3303 18.1296 22.9391 15.8575 21.8958 14.076L14.9558 2.22569Z" fill="url(#paint1_linear_2989_100980)" fill-opacity="0.4" />
    <path d="M7.82901 2.22569C8.87231 0.444187 11.1726 -0.172113 12.9668 0.849138C14.7611 1.87039 15.3698 4.14247 14.3265 5.92397L7.38656 17.7743C6.34325 19.5558 4.04298 20.1721 2.24875 19.1509C0.454514 18.1296 -0.154233 15.8575 0.88907 14.076L7.82901 2.22569Z" fill="currentColor" />
    <defs>
      <linearGradient id="paint0_linear_2989_100980" x1="5.36642" y1="0.849138" x2="10.532" y2="24.104" gradientUnits="userSpaceOnUse">
        <stop offset="0" stop-opacity="1" />
        <stop offset="1" stop-opacity="0" />
      </linearGradient>
      <linearGradient id="paint1_linear_2989_100980" x1="5.19475" y1="0.849139" x2="10.3357" y2="24.1155" gradientUnits="userSpaceOnUse">
        <stop offset="0" stop-opacity="1" />
        <stop offset="1" stop-opacity="0" />
      </linearGradient>
    </defs>
  </svg>
</span>
</span>
      <span class="app-brand-text demo menu-text fw-bold ms-2">funzi wallet</span>
    </a>

    <a href="{{ route('admin.dashboard') }}" class="layout-menu-toggle menu-link text-large ms-auto">
      <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M11.4854 4.88844C11.0081 4.41121 10.2344 4.41121 9.75715 4.88844L4.51028 10.1353C4.03297 10.6126 4.03297 11.3865 4.51028 11.8638L9.75715 17.1107C10.2344 17.5879 11.0081 17.5879 11.4854 17.1107C11.9626 16.6334 11.9626 15.8597 11.4854 15.3824L7.96672 11.8638C7.48942 11.3865 7.48942 10.6126 7.96672 10.1353L11.4854 6.61667C11.9626 6.13943 11.9626 5.36568 11.4854 4.88844Z" fill="currentColor" fill-opacity="0.6" />
        <path d="M15.8683 4.88844L10.6214 10.1353C10.1441 10.6126 10.1441 11.3865 10.6214 11.8638L15.8683 17.1107C16.3455 17.5879 17.1192 17.5879 17.5965 17.1107C18.0737 16.6334 18.0737 15.8597 17.5965 15.3824L14.0778 11.8638C13.6005 11.3865 13.6005 10.6126 14.0778 10.1353L17.5965 6.61667C18.0737 6.13943 18.0737 5.36568 17.5965 4.88844C17.1192 4.41121 16.3455 4.41121 15.8683 4.88844Z" fill="currentColor" fill-opacity="0.38" />
      </svg>
    </a>
  </div> 

  <div class="menu-inner-shadow"></div>

  
  <ul class="menu-inner py-1">
    <!-- Dashboards -->
    <li class="menu-item {{($route == 'admin.dashboard')? 'active':''}}">
      <a href="{{route('admin.dashboard')}}" class="menu-link ">
        <i class="menu-icon tf-icons mdi mdi-home-outline"></i>
        <div data-i18n="Dashboard">Dashboard</div>
      </a>

    </li>


    <!-- Front Pages -->
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class='menu-icon tf-icons mdi mdi-account-outline'></i>
        <div data-i18n="Users Section">Users Section</div>
      </a>
      <ul class="menu-sub">

      @can('view-admin-users')
        <li class="menu-item {{($route == 'view.admin.user')? 'active':''}}">
          <a href="{{ route('view.admin.user') }}" class="menu-link">
            <div data-i18n="Administrators">Administrators</div>
          </a>
        </li>
        @endcan

        @can('view-schools')
        <li class="menu-item {{($route == 'view.schools')? 'active':''}}">
          <a href="{{ route('view.schools') }}" class="menu-link">
            <div data-i18n="Schools">Schools</div>
          </a>
        </li>
@endcan

        <li class="menu-item {{($route == 'view.all.students')? 'active':''}}">
          <a href="{{ route('view.all.students') }}" class="menu-link">
            <div data-i18n="Students">Student</div>
          </a>
        </li>


      </ul>
    </li>

    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class='menu-icon tf-icons mdi mdi-cart-outline'></i>
        <div data-i18n="eCommerce">eCommerce</div>
      </a>
      <ul class="menu-sub">
        
        <li class="menu-item ">
          <a href="javascript:void(0);" class="menu-link menu-toggle">
            <div data-i18n="Products">Products</div>
          </a>
          <ul class="menu-sub">

        
            <li class="menu-item {{($route == 'view.products')? 'active':''}}">
              <a href="{{ route('view.products') }}" class="menu-link">
                <div data-i18n="Product List">Product List</div>
              </a>
            </li>

            <li class="menu-item {{($route == 'view.categories')? 'active':''}}">
              <a href="{{ route('view.categories') }}" class="menu-link">
                <div data-i18n="Category List">Category List</div>
              </a>
            </li>
          </ul>
        </li>
        <li class="menu-item">
          <a href="javascript:void(0);" class="menu-link menu-toggle">
            <div data-i18n="School Orders">School Orders</div>
          </a>
          <ul class="menu-sub">
          @can('school-orders-view')
            <li class="menu-item {{($route == 'school.orders')? 'active':''}}">
              <a href="{{ route('school.orders') }}" class="menu-link">
                <div data-i18n="Pending Orders">Pending Orders</div>
              </a>
            </li>
            <li class="menu-item {{($route == 'confirmed-orders')? 'active':''}}">
              <a href="{{ route('confirmed-orders') }}" class="menu-link">
                <div data-i18n="Confirmed Orders">Confirmed Orders</div>
              </a>
            </li>
            <li class="menu-item {{($route == 'shipped-orders')? 'active':''}}">
              <a href="{{ route('shipped-orders') }}" class="menu-link">
                <div data-i18n="Out for Delivery ">Out for Delivery</div>
              </a>
            </li>

            <li class="menu-item {{($route == 'delivered-orders')? 'active':''}}">
                    <a href="{{ route('delivered-orders') }}" class="menu-link">
                      <div data-i18n="Orders Delivered ">Orders Delivered</div>
                    </a>
                  </li>

                  

                  <li class="menu-item {{($route == 'school-orders-payments')? 'active':''}}">
                    <a href="{{ route('school-orders-payments') }}" class="menu-link">
                      <div data-i18n="Momo Payments">Momo Payments</div>
                    </a>
                  </li>


                  

                  <li class="menu-item {{($route == 'school-orders-payments-records')? 'active':''}}">
                    <a href="{{ route('school-orders-payments-records') }}" class="menu-link">
                      <div data-i18n="Payments Records">Payments Records</div>
                    </a>
                  </li>




                  @endcan

          </ul>
        </li>


        


@can('school-orders-reports')

<li class="menu-item ">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <div data-i18n="Orders Reports">Orders Reports</div>
      </a>

      <ul class="menu-sub">


<li class="menu-item {{($route == 'monthly.orders.reports')? 'active':''}}">
      <a href="{{ route('monthly.orders.reports') }}" class="menu-link">
        <div data-i18n="Monthly Reports">Monthly Reports</div>
      </a>
</li>



<li class="menu-item {{($route == 'yearly.orders.reports')? 'active':''}}">
      <a href="{{ route('yearly.orders.reports') }}" class="menu-link">
        <div data-i18n="Yearly Reports">Yearly Reports</div>
      </a>
</li>


</ul>

</li>
@endcan



      </ul>
    </li>



    @can('school-tours-operate')    
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class='menu-icon tf-icons mdi mdi mdi-bus-side'></i>
        <div data-i18n="School Tours">School Tours</div>
      </a>
      <ul class="menu-sub">


    <li class="menu-item {{($route == 'view.tour.destinations')? 'active':''}}">
      <a href="{{ route('view.tour.destinations') }}" class="menu-link">
        <div data-i18n="Tour Regions">Tour Regions</div>
      </a>
    </li>
    

        <li class="menu-item {{($route == 'all.school.tour.packages')? 'active':''}}">
          <a href="{{ route('all.school.tour.packages') }}" class="menu-link">
            <div data-i18n="Tour Packages">Tour Packages</div>
          </a>
        </li>
        

            <li class="menu-item {{($route == 'pending-tour-bookings')? 'active':''}}">
              <a href="{{ route('pending-tour-bookings') }}" class="menu-link">
                <div data-i18n="Pending Tours">Pending Tours</div>
              </a>
            </li>

            <li class="menu-item {{($route == 'confirmed-tour-bookings')? 'active':''}}">
              <a href="{{ route('confirmed-tour-bookings') }}" class="menu-link">
                <div data-i18n="Confirmed Tours">Confirmed Tours</div>
              </a>
            </li>

            <li class="menu-item {{($route == 'cancelled-tour-bookings')? 'active':''}}">
                    <a href="{{ route('cancelled-tour-bookings') }}" class="menu-link">
                      <div data-i18n="Cancelled Tours">Cancelled Tours</div>
                    </a>
                  </li>



                  <li class="menu-item {{($route == 'tour-bookings-payments')? 'active':''}}">
                    <a href="{{ route('tour-bookings-payments') }}" class="menu-link">
                      <div data-i18n="Tour Payment">Tour Payment</div>
                    </a>
                  </li>



                  <li class="menu-item {{($route == 'pending.reviews')? 'active':''}}">
                    <a href="{{ route('pending.reviews') }}" class="menu-link">
                      <div data-i18n="Pending Reviews">Pending Reviews</div>
                    </a>
                  </li>


                  <li class="menu-item {{($route == 'published.reviews')? 'active':''}}">
                    <a href="{{ route('published.reviews') }}" class="menu-link">
                      <div data-i18n="Publised Reviews">Publised Reviews</div>
                    </a>
                  </li>


                  <li class="menu-item {{($route == 'all.tour.bookings.reports')? 'active':''}}">
                    <a href="{{route('all.tour.bookings.reports')}}" class="menu-link">
                      <div data-i18n="Bookings Reports">Bookings Reports</div>
                    </a> 
                  </li>


        </li>
  </ul>
        @endcan




        @can('taxi-bus-view')    
        <li class="menu-item">
          <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class='menu-icon tf-icons mdi mdi mdi-bus'></i>
            <div data-i18n="Vehicle Rentals">Vehicle Rentals</div>
          </a>
          <ul class="menu-sub">


            <li class="menu-item {{($route == 'all.rental.operators')? 'active':''}}">
              <a href="{{ route('all.rental.operators') }}" class="menu-link">
                <div data-i18n="View Operators">View Operators</div>
              </a>
            </li>


            <li class="menu-item {{($route == 'view.all.bus.rentals')? 'active':''}}">
              <a href="{{ route('view.all.bus.rentals') }}" class="menu-link">
                <div data-i18n="Bus Rentals">Bus Rentals</div>
              </a>
            </li>

    
                <li class="menu-item {{($route == 'pending-car-rental-bookings')? 'active':''}}">
                  <a href="{{ route('pending-car-rental-bookings') }}" class="menu-link">
                    <div data-i18n="Pending Rentals">Pending Rentals</div>
                  </a>
                </li>
    
                <li class="menu-item {{($route == 'confirmed-car-rental-bookings')? 'active':''}}">
                  <a href="{{ route('confirmed-car-rental-bookings') }}" class="menu-link">
                    <div data-i18n="Confirmed Rentals">Confirmed Rentals</div>
                  </a>
                </li>
    
                <li class="menu-item {{($route == 'cancelled-car-rental-bookings')? 'active':''}}">
                        <a href="{{ route('cancelled-car-rental-bookings') }}" class="menu-link">
                          <div data-i18n="Cancelled Rentals">Cancelled Rentals</div>
                        </a>
                      </li>
    
    
                      <li class="menu-item {{($route == 'car-rental-bookings-payments')? 'active':''}}">
                        <a href="{{ route('car-rental-bookings-payments') }}" class="menu-link">
                          <div data-i18n="Payments">Payments</div>
                        </a>
                      </li>

                      <li class="menu-item {{($route == 'all.rental.bookings.reports')? 'active':''}}">
                        <a href="{{route('all.rental.bookings.reports')}}" class="menu-link">
                          <div data-i18n="Bookings Reports">Bookings Reports</div>
                        </a> 
                      </li>
    
    
    
            </li>
      </ul>
    
    
            @endcan
    
    






@can('role-list')


<li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class='menu-icon tf-icons mdi mdi-shield-outline'></i>
        <div data-i18n="Roles & Permissions">Roles & Permissions</div>
      </a>
      <ul class="menu-sub">

      @can('role-list')
        <li class="menu-item {{($route == 'role.index')? 'active':''}}">
          <a href="{{ route('role.index') }}" class="menu-link">
            <div data-i18n="User Roles">User Roles</div>
          </a>
        </li>
        @endcan

        @can('permit-list')
        <li class="menu-item {{($route == 'permissions.view')? 'active':''}}">
          <a href="{{ route('permissions.view') }}" class="menu-link">
            <div data-i18n="Permissions">Permissions</div>
          </a>
        </li>
        @endcan


      </ul>
    </li>
@endcan












      </ul>
    </li>



  </ul>
  
  

</aside>
<!-- / Menu -->
