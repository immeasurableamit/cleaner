
@if ( session()->has('success')  )
<script>

    window.addEventListener('load', function() {
        swal({
            title: "{{ session()->get('success') }}",
            icon: "success",
        });
    });
    

</script>
@endif