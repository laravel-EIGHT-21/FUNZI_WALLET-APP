<!DOCTYPE html>



<html lang="en" class="light-style layout-menu-fixed layout-compact " dir="ltr" data-theme="theme-default" data-assets-path="../../../../../../../../Admin/assets/" data-template="horizontal-menu-template">

  
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>All School Tour Booking Payments Records | Report Print</title>

    
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
    <link rel="icon" type="image/x-icon" href="https://demos.pixinvent.com/vuexy-html-admin-template/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;ampdisplay=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="{{asset('Admin/assets/vendor/fonts/fontawesome.css')}}" />
    <link rel="stylesheet" href="{{asset('Admin/assets/vendor/fonts/tabler-icons.css')}}"/>
    <link rel="stylesheet" href="{{asset('Admin/assets/vendor/fonts/flag-icons.css')}}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('Admin/assets/vendor/css/rtl/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('Admin/assets/vendor/css/rtl/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('Admin/assets/css/demo.css')}}" />
    
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('Admin/assets/vendor/libs/node-waves/node-waves.css')}}" />
    <link rel="stylesheet" href="{{asset('Admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
    <link rel="stylesheet" href="{{asset('Admin/assets/vendor/libs/typeahead-js/typeahead.css')}}" /> 
    

    <!-- Page CSS -->
    
<link rel="stylesheet" href="{{asset('Admin/assets/vendor/css/pages/app-invoice.css')}}" />

    <!-- Helpers -->
    <script src="{{asset('Admin/assets/vendor/js/helpers.js')}}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{asset('Admin/assets/vendor/js/template-customizer.js')}}"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('Admin/assets/js/config.js')}}"></script>
    
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
    <h4 class="fw-medium">Booking No #{{$payments_record['booking']['booking_number']}}</h4>

    <div>
      <span class="text-muted">Print Date:</span>
      <span class="fw-medium">{{ date("d F Y") }}</span>
    </div>
  </div>
</div>

<hr />


<div class="row">
  <div class="col-12">

    <span>SCHOOL TOUR BOOKING PAYMENT INVOICE </span>
  </div>
</div>


<hr />

<div class="row d-flex justify-content-between mb-4">
<div class="col-sm-6 w-50">
    <h6>School Details:</h6>
    <table>
      <tbody>
        <tr>
          <td class="pe-3">School:</td>
          <td class="fw-medium">{{$payments_record['school']['name']}}</td>
        </tr>

        <tr>
          <td class="pe-3">Tel 1:</td>
          <td>{{$payments_record['school']['school_tel1']}}</td>
        </tr>
        <tr>
          <td class="pe-3">Tel 2:</td>
          <td>{{$payments_record['school']['school_tel2']}}</td>
        </tr>
        <tr>
          <td class="pe-3">Address:</td>
          <td>{{$payments_record['school']['address']}}</td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="col-sm-6 w-50">
    <h6>Tour Booking Details:</h6>
    <table>
      <tbody>
      <tr>
          <td class="pe-3">Booking No :</td>
          <td>{{$payments_record['booking']['booking_number']}}</td>
        </tr>

        <tr>
          <td class="pe-3">Total Tours:</td>
          <td>{{$payments_record['booking']['total_tours']}}</td>
        </tr>

        <tr>
          <td class="pe-3">Date :</td>
          <td>{{$payments_record['booking']['booking_date']}}</td>
        </tr>

        <tr>
          <td class="pe-3">Time :</td>
          <td>{{$payments_record['booking']['time']}}</td>
        </tr>

        <tr>
          <td class="pe-3">Booking Status :</td>
          <td>{{$payments_record['booking']['status']}}</td>
        </tr>
        

      </tbody>
    </table>
  </div>
</div>

<br /><br />

<h6>Tour Booking Payment Details</h6>
<div class="table-responsive">
    <table class="table m-0">
      <thead class="table-light border-top">
      <tr>
    <th>Paid</th>
    <th>Total Amount</th>
    <th>Balance Amount</th>


      </tr>
    </thead>
    
    <tbody>

      <tr>
                  <td>UGX {{ $payments_record->amount}}</td>	
                  <td>UGX {{ $payments_record->total_amount}}</td>
                  
                  @php 

                  $bal=(float)$payments_record->total_amount-$payments_record->amount;

                  @endphp
                  
                  <td>UGX {{ $bal}}</td>


      </tr>

    </tbody>
  </table>
</div>

<br/><br/>


<h6>Tour Booking Payments Records Track</h6>
 <div class="table-responsive">
    <table class="table m-0">
      <thead class="table-light border-top">
      <tr>

    <th>Payment</th>
    <th>Balance</th>
    <th> Date</th>
    <th>Pay Type</th>
        <th>Payment Notes</th>

      </tr>
    </thead>
    @foreach($payment_records_track as $value )
    <tbody>

      <tr>
    <td> {{ $value->payment_amount }}</td>	

    <td> {{ $value->tour_amount_balance}}</td>	

    <td> {{ $value->date }}</td>	
    <td> {{ $value->payment_type }}</td>	
        <td> {{ $value->payment_note }}</td>	

      </tr>
@endforeach
    </tbody>

  </table>
</div>





<br /><br />


<div class="row">
  <div class="col-12">
    <span class="fw-medium">Note:</span>
    <span>If This Document Found Lost, Please return to Above School Address. Thank You!</span>
  </div>
</div>

</div>

  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  
  <script src="{{asset('Admin/assets/vendor/libs/jquery/jquery.js')}}"></script>
  <script src="{{asset('Admin/assets/vendor/libs/popper/popper.js')}}"></script>
  <script src="{{asset('Admin/assets/vendor/js/bootstrap.js')}}"></script>
  <script src="{{asset('Admin/assets/vendor/libs/node-waves/node-waves.js')}}"></script>
  <script src="{{asset('Admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
  <script src="{{asset('Admin/assets/vendor/libs/hammer/hammer.js')}}"></script>
  <script src="{{asset('Admin/assets/vendor/libs/i18n/i18n.js')}}"></script>
  <script src="{{asset('Admin/assets/vendor/libs/typeahead-js/typeahead.js')}}"></script>
   <script src="{{asset('Admin/assets/vendor/js/menu.js')}}"></script>
  
  <!-- endbuild -->

  <!-- Vendors JS -->
  
  

  <!-- Main JS -->
  <script src="{{asset('Admin/assets/js/main.js')}}"></script>
  

  <!-- Page JS -->
  <script src="{{asset('Admin/assets/js/app-invoice-print.js')}}"></script>
  
</body>



</html>
