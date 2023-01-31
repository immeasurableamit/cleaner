@extends('layouts.cleanerapp')

@section('content')

<section class="light-banner customer-account-page" style="background-image: url('assets/images/white-pattern.png')">
  <div class="container">
    <div class="customer-white-wrapper">
      <div class="row no-mrg">
        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 no-padd">
          <div class="blue-bg-wrapper bar_left">
            <div class="blue-bg-heading">
              <h4>Settings</h4>
            </div>
            @include('layouts.common.sidebar')
            <div class="blue-logo-block text-center max-width-100">
              <a href="{{ route('index') }}"><img src="{{asset('assets/images/logo/logo.svg')}}"></a>
            </div>
          </div>
        </div>
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 no-padd">
          <div class="row no-mrg">
            @livewire('cleaner.team.team')
          </div>
        </div>
      </div>
    </div>
  </div>

</section>

@endsection
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
{{-- <script src="{{ asset('assets/js/mdb.min.js') }}"></script>
 --}}<x-livewire-alert::scripts />

@section('script')

<script>
//   $(document).ready(function() {
//     window.livewire.on('close-modal', () => {
//       $("#closeexample").click();
//     });

//     window.livewire.on('close-modal', () => {
//       $("#updateModalClose").click();
//     });
    // window.livewire.on('updateclosemodal', () => {
    //   $("#updateModalClose").click();
    // });

//   });
</script>
@endsection

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  window.addEventListener('swal:modal', event => {
    swal({
      title: event.detail.message,
      text: event.detail.text,
      icon: event.detail.type,
    });
  });

  window.addEventListener('swal:confirm', event => {
    swal({
        title: event.detail.message,
        text: event.detail.text,
        icon: event.detail.type,
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          window.livewire.emit('delete', event.detail.id);
        }
      });
  });
</script>
