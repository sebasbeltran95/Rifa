<footer class="main-footer text-center">
    {{-- <strong>Copyright &copy; {{ date("Y") }} <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved. --}}
</footer>
<script src="{{ asset('plugins/jquery/jquery.min.js') }} "></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }} "></script>
<script src="{{ asset('plugins/chart.js/Chart.min.js') }} "></script>
<script src="{{ asset('plugins/sparklines/sparkline.js') }} "></script>
<script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }} "></script>
<script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }} "></script>
<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }} "></script>
<script src="{{ asset('plugins/moment/moment.min.js') }} "></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }} "></script>
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }} "></script>
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }} "></script>
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }} "></script>
<script src="{{ asset('dist/js/adminlte.js') }} "></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@livewireScripts
@stack('js')