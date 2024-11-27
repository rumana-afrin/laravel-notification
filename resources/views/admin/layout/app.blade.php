<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Dashboard - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @vite(['resources/js/app.js', 'resources/css/app.css'])

    @include('admin.layout.style')
    @stack('style')
</head>


<body>

    <!-- ======= Header ======= -->
    @include('admin.layout.header')
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    @include('admin.layout.sidebar')

    <!-- End Sidebar-->

    <main id="main" class="main">
        @yield('content')
    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('admin.layout.footer')
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- script file -->
    @include('admin.layout.script'); <!-- added all script file link-->
    @stack('script'); <!-- added aditional script-->

</body>

</html>
