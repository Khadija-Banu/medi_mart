<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
<meta charset="utf-8">
<title>Medi Mart</title>
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta property="og:title" content="">
<meta property="og:type" content="">
<meta property="og:url" content="">
<meta property="og:image" content="">
<link href="{{asset('ui/backend')}}/assets/img/medi_logo.png" rel="icon">
<link rel="stylesheet" href="{{asset('ui/frontend')}}/assets/css/main.css">
<link rel="stylesheet" href="{{asset('ui/frontend')}}/assets/css/custom.css"></head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN67P1FNGOdI5qFf5YO2TC1iPbpe5Z9sN" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.15.0/font/bootstrap-icons.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<body>
      
    @include('frontend.layouts.partials.nav')
    
   @yield('content')

    @include('frontend.layouts.partials.footer')  
    <!-- Vendor JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset('ui/frontend')}}/assets/js/vendor/modernizr-3.6.0.min.js"></script>
<script src="{{asset('ui/frontend')}}/assets/js/vendor/jquery-3.6.0.min.js"></script>
<script src="{{asset('ui/frontend')}}/assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
<script src="{{asset('ui/frontend')}}/assets/js/vendor/bootstrap.bundle.min.js"></script>
<script src="{{asset('ui/frontend')}}/assets/js/plugins/slick.js"></script>
<script src="{{asset('ui/frontend')}}/assets/js/plugins/jquery.syotimer.min.js"></script>
<script src="{{asset('ui/frontend')}}/assets/js/plugins/wow.js"></script>
<script src="{{asset('ui/frontend')}}/assets/js/plugins/jquery-ui.js"></script>
<script src="{{asset('ui/frontend')}}/assets/js/plugins/perfect-scrollbar.js"></script>
<script src="{{asset('ui/frontend')}}/assets/js/plugins/magnific-popup.js"></script>
<script src="{{asset('ui/frontend')}}/assets/js/plugins/select2.min.js"></script>
<script src="{{asset('ui/frontend')}}/assets/js/plugins/waypoints.js"></script>
<script src="{{asset('ui/frontend')}}/assets/js/plugins/counterup.js"></script>
<script src="{{asset('ui/frontend')}}/assets/js/plugins/jquery.countdown.min.js"></script>
<script src="{{asset('ui/frontend')}}/assets/js/plugins/images-loaded.js"></script>
<script src="{{asset('ui/frontend')}}/assets/js/plugins/isotope.js"></script>
<script src="{{asset('ui/frontend')}}/assets/js/plugins/scrollup.js"></script>
<script src="{{asset('ui/frontend')}}/assets/js/plugins/jquery.vticker-min.js"></script>
<script src="{{asset('ui/frontend')}}/assets/js/plugins/jquery.theia.sticky.js"></script>
<script src="{{asset('ui/frontend')}}/assets/js/plugins/jquery.elevatezoom.js"></script>
<!-- Template  JS -->
<script src="{{asset('ui/frontend')}}/assets/js/main.js?v=3.3"></script>
<script src="{{asset('ui/frontend')}}/assets/js/shop.js?v=3.3"></script>





<script>
    (function (window, document) {
           var loader = function () {
               var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
           script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
               tag.parentNode.insertBefore(script, tag);
       };

           window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
       })(window, document);
</script>

</body>

</html>