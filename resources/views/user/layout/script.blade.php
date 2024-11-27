  <!-- Vendor JS Files -->
<script src="{{asset('assets/js/jquery.3.7.1.min.js')}}"></script>

  <script src="{{asset('assets/admin/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/admin/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{asset('assets/admin/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('assets/admin/vendor/quill/quill.min.js')}}"></script>
  <script src="{{asset('assets/admin/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('assets/admin/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('assets/admin/vendor/php-email-form/validate.js')}}"></script>

<!-- Toastr JS File -->
<script src="{{asset('assets/js/toastr.min.js')}}"></script>
<!-- sweetalert  JS File -->
<script src="{{asset('assets/sweetalert/sweetalert2.all.js')}}"></script>
<script src="{{asset('assets/sweetalert/sweetalert2.all.min.js')}}"></script>
<script src="{{asset('assets/sweetalert/sweetalert2.js')}}"></script>
<script src="{{asset('assets/sweetalert/sweetalert2.min.js')}}"></script>
  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/common.js')}}"></script>
  <script src="{{asset('assets/admin/js/main.js')}}"></script>
  <script>
    "use strict"
    @if(Session::has('success'))
    toastr.success("{{ session('success') }}");
    @endif
    @if(Session::has('error'))
    toastr.error("{{ session('error') }}");
    @endif
    @if(Session::has('info'))
    toastr.info("{{ session('info') }}");
    @endif
    @if(Session::has('warning'))
    toastr.warning("{{ session('warning') }}");
    @endif

    @if (@$errors->any())
    @foreach ($errors->all() as $error)
    toastr.error("{{ $error }}");
    @endforeach
    @endif
</script>