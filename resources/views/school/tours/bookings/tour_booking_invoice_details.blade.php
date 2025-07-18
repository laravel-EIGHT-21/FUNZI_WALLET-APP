<!DOCTYPE html>



<html lang="en" class="light-style layout-menu-fixed layout-compact " dir="ltr" data-theme="theme-default" data-assets-path="../../../../../../../../Tours/assets/" data-template="horizontal-menu-template">

  
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title> Tour Bookings - Details | Report Print</title>

    
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 5" />
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://1.envato.market/vuexy_admin">
    
    
    <!-- ? PROD Only: Google Tag Manager (Default ThemeSelection: GTM-5DDHKGP, PixInvent: GTM-5J3LMKC) -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
      '../../../../www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer','GTM-5J3LMKC');</script>
    <!-- End Google Tag Manager -->
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="https://demos.pixinvent.com/materialize-html-admin-template/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;ampdisplay=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="{{asset('Tours/assets/vendor/fonts/fontawesome.css')}}" />
    <link rel="stylesheet" href="{{asset('Tours/assets/vendor/fonts/tabler-icons.css')}}"/>
    <link rel="stylesheet" href="{{asset('Tours/assets/vendor/fonts/flag-icons.css')}}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('Tours/assets/vendor/css/rtl/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('Tours/assets/vendor/css/rtl/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('Tours/assets/css/demo.css')}}" />
    
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('Tours/assets/vendor/libs/node-waves/node-waves.css')}}" />
    <link rel="stylesheet" href="{{asset('Tours/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
    <link rel="stylesheet" href="{{asset('Tours/assets/vendor/libs/typeahead-js/typeahead.css')}}" /> 
    

    <!-- Page CSS -->
    
<link rel="stylesheet" href="{{asset('Tours/assets/vendor/css/pages/app-invoice.css')}}" />

    <!-- Helpers -->
    <script src="{{asset('Tours/assets/vendor/js/helpers.js')}}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{asset('Tours/assets/vendor/js/template-customizer.js')}}"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('Tours/assets/js/config.js')}}"></script>
    
</head> 

<body>

  
  <!-- ?PROD Only: Google Tag Manager (noscript) (Default ThemeSelection: GTM-5DDHKGP, PixInvent: GTM-5J3LMKC) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5DDHKGP" height="0" width="0" style="display: none; visibility: hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->



<!-- Content -->
        
<div class="invoice-print p-5">

<div class="d-flex justify-content-between flex-row">
  <div class="mb-4">
    <div class="d-flex svg-illustration mb-3 gap-2">
      
<svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z" fill="#7367F0" />
<path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd" d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z" fill="#161616" />
<path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd" d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z" fill="#161616" />
<path fill-rule="evenodd" clip-rule="evenodd" d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z" fill="#7367F0" />
</svg>

      <span class="app-brand-text fw-bold">
        Funzi Wallet
      </span>
    </div>
    <p class="mb-1">Office 149, 450 South Brand Brooklyn</p>
    <p class="mb-1">San Diego County, CA 91905, USA</p>
    <p class="mb-0">+1 (123) 456 7891, +44 (876) 543 2198</p>
  </div>
  <div>
    <h4 class="fw-medium">BOOKING No. #{{$booking->booking_number}}</h4>

    <div>
      <span class="text-muted">Print Date:</span>
      <span class="fw-medium">{{ date("d M Y") }}</span>
    </div>
  </div>
</div> 

<hr />


<div class="row">
  <div class="col-12">

    <span><b>TOUR BOOKINGS DETAILS REPORT</b></span>
  </div>
</div>


<hr />

<div class="row d-flex justify-content-between mb-4">
<div class="col-sm-6 w-50">
    <h6>Invoice To:</h6>
    <table>
      <tbody>
        <tr>
          <td class="pe-3">School:</td>
          <td class="fw-medium">{{$booking->name}}</td>
        </tr>

        <tr>
          <td class="pe-3">Email:</td>
          <td class="fw-medium">{{$booking->email}}</td>
        </tr>

        <tr>
          <td class="pe-3">Tel 1:</td>
          <td>{{$booking->school_tel1}}</td>
        </tr>
        <tr>
          <td class="pe-3">Tel 2:</td>
          <td>{{$booking->school_tel2}}</td>
        </tr>
        <tr>
          <td class="pe-3">Address:</td>
          <td>{{$booking->school_address}}</td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="col-sm-6 w-50">
    <h6>Booking Details:</h6>
    <table>
      <tbody>
      <tr>
          <td class="pe-3">Date:</td>
          <td>{{$booking->booking_date}}</td>
        </tr>

        <tr>
          <td class="pe-3">Time:</td>
          <td>{{$booking->time}}</td>
        </tr>

      <tr>
      <td class="pe-3">Total Tours:</td>
      <td class="fw-medium">{{$booking->total_tours}}</td>
      </tr>


        <tr>
          <td class="pe-3">Payment :</td>
          <td class="fw-medium">{{$booking->payment_status}}</td>
        </tr>


      <tr>
      <td class="pe-3">Total Price:</td>
      <td class="fw-medium">ugx {{$booking->total_amount}}</td>
      </tr>


      </tbody>
    </table>
  </div>
</div>

<br />

 <div class="table-responsive">
    <table class="table m-0">
      <thead class="table-light border-top">
      <tr>
        <th>Tour</th>
        <th>Stud Qty</th>
        <th>Adult Qty</th>
        <th>Stud Total</th>
        <th>AdultTotal</th>
      </tr>
    </thead>
    @foreach($tours as $value )
    <tbody>

      <tr>
        <td>

                          <div class="d-flex align-items-center">

                            <img src="{{ (!empty($value['tour']['image_thambnail']))? url('upload/tour_package_thumbnail/'.$value['tour']['image_thambnail']):url('upload/no_image.jpg') }}" class="rounded-circle" alt="Product Image" width="50" height="50">

                            <div class="ms-3">
                              <h6 class="fw-bold mb-0 fs-6">{{$value->tour->name}}</h6>
                            </div>
                          </div>
          </td>
  
  
          <td>
  
          <div class="d-flex">
  
          <h6 class="mb-0">{{ $value->stud_qty}}</h6>
  
          </div>
  
  
          </td>

  
  
  
          <td>
  
          <div class="d-flex">
  
          <h6 class="mb-0">{{ $value->adult_qty}}</h6>
  
          </div>
  
  
          </td>
  
    
  
          <td>
  
          <div class="d-flex">
  
          <h6 class="mb-0">{{ $value->stud_pricetotal}}</h6>
  
          </div>
  
          </td>
  
          <td>
  
          <div class="d-flex">
  
          <h6 class="mb-0">{{ $value->adult_pricetotal}}</h6>
  
          </div>
  
          </td>
                            
      </tr>

    </tbody>
    @endforeach
  </table>
</div>

<br />


<div class="row">
  <div class="col-12">
    <span class="fw-medium">Note:</span>
    <span>If This Document Found Lost, Please return to Above Address. Thank You!</span>
  </div>
</div>

</div>

  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  
  <script src="{{asset('Tours/assets/vendor/libs/jquery/jquery.js')}}"></script>
  <script src="{{asset('Tours/assets/vendor/libs/popper/popper.js')}}"></script>
  <script src="{{asset('Tours/assets/vendor/js/bootstrap.js')}}"></script>
  <script src="{{asset('Tours/assets/vendor/libs/node-waves/node-waves.js')}}"></script>
  <script src="{{asset('Tours/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
  <script src="{{asset('Tours/assets/vendor/libs/hammer/hammer.js')}}"></script>
  <script src="{{asset('Tours/assets/vendor/libs/i18n/i18n.js')}}"></script>
  <script src="{{asset('Tours/assets/vendor/libs/typeahead-js/typeahead.js')}}"></script>
   <script src="{{asset('Tours/assets/vendor/js/menu.js')}}"></script>
  
  <!-- endbuild -->

  <!-- Vendors JS -->
  
  

  <!-- Main JS -->
  <script src="{{asset('Tours/assets/js/main.js')}}"></script>
  

  <!-- Page JS -->
  <script src="{{asset('Tours/assets/js/app-invoice-print.js')}}"></script>
  
</body>



</html>
