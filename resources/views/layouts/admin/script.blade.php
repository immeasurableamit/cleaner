<script src="{{asset('assets/js/jquery-3.6.0.js')}}"></script>
<script src="{{asset('assets/js/custom.js')}}"></script>
<!-- <script src="{{asset('assets/admin/js/admin.js')}}"></script> -->
<!-- <script src="{{asset('assets/js/main.js')}}"></script> -->
<!-- <script src="{{asset('assets/js/croppie.js')}}"></script> -->
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/slick.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
{{-- <script src="{{ asset('assets/js/mdb.min.js') }}"></script> --}}

<x-livewire-alert::scripts />

<script type="text/javascript">
  $(document).ready(function () {
    $('#all-customer-table').DataTable();
});
    $(document).ready(function () {
    $('#all-cleaner-table').DataTable();
});
    $(document).ready(function(){
$(".dataTables_filter input").attr("placeholder", "Search here...");
});
</script>




@livewireScripts
@yield('script')
@stack('scripts')
