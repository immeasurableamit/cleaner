@extends('layouts.app')

@section('content')
@livewire('cleaner.team')

@endsection
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('assets/js/mdb.min.js') }}"></script>
<x-livewire-alert::scripts />

@section('script')

<script>
  $(document).ready(function() {
    window.livewire.on('close-modal', () => {
      $("#closeexample").click();
    });

    window.livewire.on('close-modal', () => {
      $("#updateModalClose").click();
    });
    // window.livewire.on('updateclosemodal', () => {
    //   $("#updateModalClose").click();
    // });

  });
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
        window.livewire.emit('delete',event.detail.id);
      }
    });
});
</script>