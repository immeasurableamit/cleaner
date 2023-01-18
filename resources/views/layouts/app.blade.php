<!doctype html>
<html lang="en">

<head>
    <title>CanaryClean</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/admin.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/croppie.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/slick-theme.css') }}" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="{{asset('assets/js/jquery-3.6.0.js')}}"></script>
</head>

<body class="light-theme">
    @include('layouts.includes.header')
    <main id="main-content">
        @yield('content')
    </main>
    @include('layouts.includes.footer')
    @include('layouts.includes.script')
    @yield('script')

    <script>
        window.addEventListener('load', () => {
            var address_input_in_header = document.getElementById('address_in_header');
            makeAddressInputAutocompletable(address_input_in_header, (gmap_place) => {
                document.getElementById('latitude_in_header').value = gmap_place.geometry.location.lat();
                document.getElementById('longitude_in_header').value = gmap_place.geometry.location.lng();
            });


            $(".search-bar.select-service").select2({
                    placeholder: 'Any Service'
            });

            $(".search-bar.select-homesize").select2({
                    placeholder: 'Any Size'
            });
        });
    </script>

@stack('scripts')

</body>

</html>
