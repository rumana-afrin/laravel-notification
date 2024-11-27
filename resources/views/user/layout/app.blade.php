<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Dashboard - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    

    @include('user.layout.style'); <!-- added all style file link-->
    @stack('style'); <!-- added aditional style-->


</head>

<body>

    <!-- ======= Header ======= -->
    @include('user.layout.header')
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    @include('user.layout.sidebar')

    <!-- End Sidebar-->

    <main id="main" class="main">
        @yield('content')
    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('user.layout.footer')
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- script file -->
    @include('user.layout.script'); <!-- added all script file link-->
    @stack('script'); <!-- added aditional script-->

</body>

</html>
