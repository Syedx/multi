<!doctype html>
<html lang="en">


<!-- Mirrored from www.wrraptheme.com/templates/lucid/html/light/index8.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 Dec 2021 09:17:01 GMT -->
<head>
    @include('backend.layouts.head')
</head>
<body class="theme-cyan">

    <!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img src="https://www.wrraptheme.com/templates/lucid/html/assets/images/logo-icon.svg" width="48" height="48" alt="Lucid"></div>
        <p>Please wait...</p>
    </div>
</div>
<!-- Overlay For Sidebars -->

<div id="wrapper">

    @include('backend.layouts.nav')
    
    @include('backend.layouts.sidebar')

    @yield('content')

</div>

<!-- Javascript -->
    @includeIf('backend.layouts.footer')
</body>

<!-- Mirrored from www.wrraptheme.com/templates/lucid/html/light/index8.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 Dec 2021 09:17:01 GMT -->
</html>
