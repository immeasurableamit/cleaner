<script src="../assets/js/jquery-3.6.0.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="../assets/admin/js/admin.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/litepicker/dist/litepicker.js"></script>


    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
      integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
@livewireScripts
@yield('script')
@stack('scripts')
<script>
    $(document).ready(function () {
    $('#all-jobs-table,#schedule-jobs-table,#canceled-jobs-table,#Completed-jobs-table').DataTable();
  });
  $(document).ready(function () {
    $('#all-customer-table,#active-customers-table,#inactive-customers-table').DataTable();
  });
  $(document).ready(function(){
$(".dataTables_filter input").attr("placeholder", "Search here...");
});
</script>
<script>
  new Litepicker({
  element: document.getElementById('all-time'),
  singleMode: false,
  allowRepick: true,
  numberOfMonths: 2,
  numberOfColumns: 2,
})
</script>
<script>
    $(document).ready(function(){

    $('.slider').slick({
  dots: true,
  infinite: true,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});
});
</script>