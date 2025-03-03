<!DOCTYPE html>



<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact " dir="ltr" data-theme="theme-default" data-assets-path="../../../../../../../../Admin/assets/" data-template="vertical-menu-template">


<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title> @yield('title') </title>

    
    <meta name="description" content="Materialize – is the most developer friendly &amp; highly customizable Admin Dashboard Template." />
    <meta name="keywords" content="dashboard, material, material design, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://1.envato.market/materialize_admin">
    
    
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
   <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;ampdisplay=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="{{asset('Admin/assets/vendor/fonts/materialdesignicons.css')}}" />
    <link rel="stylesheet" href="{{asset('Admin/assets/vendor/fonts/flag-icons.css')}}" />
    
    <!-- Menu waves for no-customizer fix -->
    <link rel="stylesheet" href="{{asset('Admin/assets/vendor/libs/node-waves/node-waves.css')}}" />


    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('Admin/assets/vendor/css/rtl/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('Admin/assets/vendor/css/rtl/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('Admin/assets/css/demo.css')}}" />
    
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('Admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
    <link rel="stylesheet" href="{{asset('Admin/assets/vendor/libs/typeahead-js/typeahead.css')}}" /> 
    <link rel="stylesheet" href="{{asset('Admin/assets/vendor/libs/apex-charts/apex-charts.css')}}" />
<link rel="stylesheet" href="{{asset('Admin/assets/vendor/libs/swiper/swiper.css')}}" />

<link rel="stylesheet" type="text/css" href="{{asset('Admin/assets/icons/feather-icon/feather-icon.css')}}">
<link rel="stylesheet" href="{{asset('Admin/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('Admin/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('Admin/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('Admin/assets/dist/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css')}}">

<link rel="stylesheet" href="{{asset('Admin/assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />
<link rel="stylesheet" href="{{asset('Admin/assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('Admin/assets/vendor/libs/plyr/plyr.css')}}" />
<link rel="stylesheet" href="{{asset('Admin/assets/vendor/libs/%40form-validation/umd/styles/index.min.css')}}" />
<link rel="stylesheet" href="{{asset('Admin/assets/vendor/libs/animate-css/animate.css')}}" />
<link rel="stylesheet" href="{{asset('Admin/assets/vendor/libs/flatpickr/flatpickr.css')}}" />
<link rel="stylesheet" href="{{asset('Admin/assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css')}}" />
<link rel="stylesheet" href="{{asset('Admin/assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css')}}" />
<link rel="stylesheet" href="{{asset('Admin/assets/vendor/libs/jquery-timepicker/jquery-timepicker.css')}}" />
<link rel="stylesheet" href="{{asset('Admin/assets/vendor/libs/pickr/pickr-themes.css')}}" />
<link rel="stylesheet" href="{{asset('Admin/assets/vendor/libs/bootstrap-select/bootstrap-select.css')}}" />
<link rel="stylesheet" href="{{asset('Admin/assets/vendor/libs/rateyo/rateyo.css')}}" />
<link rel="stylesheet" href="{{asset('Admin/assets/vendor/libs/bs-stepper/bs-stepper.css')}}" />



    <!-- Page CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('Admin/assets/owlcarousel/owlcarousel.css')}}">
    <link rel="stylesheet" href="{{asset('Admin/assets/vendor/css/pages/cards-statistics.css')}}" />
<link rel="stylesheet" href="{{asset('Admin/assets/vendor/css/pages/cards-analytics.css')}}" />

<link rel="stylesheet" href="{{asset('Admin/assets/vendor/css/pages/app-academy.css')}}" />

<link rel="stylesheet" href="{{asset('Admin/assets/vendor/css/pages/wizard-ex-checkout.css')}}" />

<link rel="stylesheet" href="{{asset('Admin/assets/vendor/css/pages/app-academy-details.css')}}" />


<link rel="stylesheet" href="{{asset('Admin/assets/vendor/css/pages/page-profile.css')}}" />
<link rel="stylesheet" href="{{asset('Admin/assets/vendor/css/pages/cards-statistics.css')}}" />
<link rel="stylesheet" href="{{asset('Admin/assets/vendor/css/pages/page-icons.css')}}" />
<link rel="stylesheet" href="{{asset('Admin/assets/vendor/css/pages/page-account-settings.css')}}" />

<link rel="stylesheet" href="{{asset('Admin/assets/vendor/fonts/remixicon/remixicon.css')}}" />


<!-- Tables Only CSS -->
<link  id="themeColors"  rel="stylesheet" href="{{asset('Admin/assets/css/table.css')}}" />


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
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5J3LMKC" height="0" width="0" style="display: none; visibility: hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
  
  <!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar  ">
  <div class="layout-container">

    
    


  @include('school.body.header_menus')
    

    <!-- Layout container -->
    <div class="layout-page">
      
      


    @include('school.body.navbar')
      

      <!-- Content wrapper -->
      <div class="content-wrapper">
      @include('flash_msg.flash_message')

      @yield('content') 
          
          @include('school.body.footer')          

          
          <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>

    
    
    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    
    
    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>
    
  </div>
  <!-- / Layout wrapper -->





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
  <script src="{{asset('Admin/assets/vendor/libs/chartjs/chartjs.js')}}"></script>
<script src="{{asset('Admin/assets/vendor/libs/swiper/swiper.js')}}"></script>
<script src="{{asset('Admin/assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
<script src="{{asset('Admin/assets/dist/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('Admin/assets/js/code.js')}}"></script>
<script src="{{asset('Admin/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>

<script src="{{asset('Admin/assets/icons/feather-icon/feather.min.js')}}"></script>
    <script src="{{asset('Admin/assets/icons/feather-icon/feather-icon.js')}}"></script>


<script src="{{asset('Admin/assets/cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('Admin/assets/cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js')}}"></script>
    <script src="{{asset('Admin/assets/cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js')}}"></script>
    <script src="{{asset('Admin/assets/cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js')}}"></script>
    <script src="{{asset('Admin/assets/cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js')}}"></script>



    <script src="{{asset('Admin/assets/cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('Admin/assets/cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('Admin/assets/dist/js/datatable/datatable-advanced.init.js')}}"></script>
    <script src="{{asset('Admin/assets/dist/js/datatable/datatable-basic.init.js')}}"></script>

    <script src="{{asset('Admin/assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
<script src="{{asset('Admin/assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('Admin/assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
<script src="{{asset('Admin/assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('Admin/assets/vendor/libs/plyr/plyr.js')}}"></script>
<script src="{{asset('Admin/assets/vendor/libs/%40form-validation/umd/bundle/popular.min.js')}}"></script>
<script src="{{asset('Admin/assets/vendor/libs/%40form-validation/umd/plugin-bootstrap5/index.min.js')}}"></script>
<script src="{{asset('Admin/assets/vendor/libs/%40form-validation/umd/plugin-auto-focus/index.min.js')}}"></script>
<script src="{{asset('Admin/assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
<script src="{{asset('Admin/assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('Admin/assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js')}}"></script>
<script src="{{asset('Admin/assets/vendor/libs/jquery-timepicker/jquery-timepicker.js')}}"></script>
<script src="{{asset('Admin/assets/vendor/libs/pickr/pickr.js')}}"></script>

<script src="{{asset('Admin/assets/vendor/libs/bs-stepper/bs-stepper.js')}}"></script>
<script src="{{asset('Admin/assets/vendor/libs/rateyo/rateyo.js')}}"></script>


  <!-- Main JS -->
  <script src="{{asset('Admin/assets/js/main.js')}}"></script>
  

  <!-- Page JS -->
  <script src="{{asset('Admin/assets/js/dashboards-analytics.js')}}"></script>
  <script src="{{asset('Admin/assets/js/app-academy-course.js')}}"></script>
  <script src="{{asset('Admin/assets/js/app-academy-dashboard.js')}}"></script>
  <script src="{{asset('Admin/assets/js/app-ecommerce-dashboard.js')}}"></script>
  <script src="{{asset('Admin/assets/js/cards-advance.js')}}"></script>
  <script src="{{asset('Admin/assets/js/cards-statistics.js')}}"></script>
  <script src="{{asset('Admin/assets/js/forms-pickers.js')}}"></script>
  <script src="{{asset('Admin/assets/js/forms-selects.js')}}"></script>
  <script src="{{asset('Admin/assets/js/form-basic-inputs.js')}}"></script>
  <script src="{{asset('Admin/assets/owlcarousel/owl.carousel.js')}}"></script>
  <script src="{{asset('Admin/assets/js/app-academy-course-details.js')}}"></script>
  <script src="{{asset('Admin/assets/js/modal-create-app.js')}}"></script>
 
  <script src="{{asset('Admin/assets/js/wizard-ex-checkout.js')}}"></script>
            
 

  
</body>



</html>
 
