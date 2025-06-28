<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="">
<meta name="author" content="">
<meta name="keywords" content="MediaCenter, Template, eCommerce">
<meta name="robots" content="all">
<title>@yield('title')</title>

<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="{{asset('eCOMM/assets/css/bootstrap.min.css')}}">

<!-- Customizable CSS -->
<link rel="stylesheet" href="{{asset('eCOMM/assets/css/main.css')}}">
<link rel="stylesheet" href="{{asset('eCOMM/assets/css/blue.css')}}">
<link rel="stylesheet" href="{{asset('eCOMM/assets/css/owl.carousel.css')}}">
<link rel="stylesheet" href="{{asset('eCOMM/assets/css/owl.transitions.css')}}">
<link rel="stylesheet" href="{{asset('eCOMM/assets/css/animate.min.css')}}">
<link rel="stylesheet" href="{{asset('eCOMM/assets/css/rateit.css')}}">
<link rel="stylesheet" href="{{asset('eCOMM/assets/css/bootstrap-select.min.css')}}">

<!-- Icons/Glyphs -->
<link rel="stylesheet" href="{{asset('eCOMM/assets/css/font-awesome.css')}}">

<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

<link rel="stylesheet" href="{{asset('Tours/assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.8.1/nouislider.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.8.1/nouislider.css" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.8.1/nouislider.min.css" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />


<!-- Toastr -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" ></script>



</head>
<body>



  @include('school.ecommerce.body.header')
        
<br/><br/>



<div class="body-content outer-top-xs">
 
  @yield('content') 
        
  
</div>
<!-- /.body-content --> 



@include('school.ecommerce.body.footer')    


<!-- JavaScripts placed at the end of the document so the pages load faster --> 
<script src="{{asset('eCOMM/assets/js/jquery-1.11.1.min.js')}}"></script> 
<script src="{{asset('eCOMM/assets/js/bootstrap.min.js')}}"></script> 
<script src="{{asset('eCOMM/assets/js/bootstrap-hover-dropdown.min.js')}}"></script> 
<script src="{{asset('eCOMM/assets/js/owl.carousel.min.js')}}"></script> 
<script src="{{asset('eCOMM/assets/js/echo.min.js')}}"></script> 
<script src="{{asset('eCOMM/assets/js/jquery.easing-1.3.min.js')}}"></script> 
<script src="{{asset('eCOMM/assets/js/bootstrap-slider.min.js')}}"></script> 
<script src="{{asset('eCOMM/assets/js/jquery.rateit.min.js')}}"></script> 
<script type="text/javascript" src="{{asset('eCOMM/assets/js/lightbox.min.js')}}"></script>
<script src="{{asset('eCOMM/assets/js/bootstrap-select.min.js')}}"></script> 
<script src="{{asset('eCOMM/assets/js/wow.min.js')}}"></script> 
<script src="{{asset('eCOMM/assets/js/scripts.js')}}"></script>
<script src="{{asset('Tours/assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
<script src="{{asset('Tours/assets/js/code.js')}}"></script>


<script type="text/javascript">
      
  @session("success")
      toastr.success("{{ $value }}", "Success");
  @endsession

  @session("info")
      toastr.info("{{ $value }}", "Info");
  @endsession

  @session("warning")
      toastr.warning("{{ $value }}", "Warning");
  @endsession

  @session("error")
      toastr.error("{{ $value }}", "Error");
  @endsession

</script>



</body>
</html>