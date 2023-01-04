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
    @livewireStyles
</head>

<body class="light-theme">

    @include('layouts.includes.cleanerHeader')

    @if (auth()->user()->role == 'cleaner' &&
        auth()->user()->isEligibleForListing() == false)
        <div class="container" id="requirements-alert-container">
            <div class="alert alert-success alert-dismissible fade show mx-5 mt-3" role="alert">
                <div class="d-flex justify-content-between">
                    <h4 class="alert-heading">Attention!</h4>
                <button type="button" class="close bg-none border-0" data-dismiss="alert" aria-label="Close" onclick="document.getElementById('requirements-alert-container').remove()">
                    <span aria-hidden="true"><i class="fa-solid fa-xmark"></i></span>
                </button>

            </div>
                <p>You need to complete following requirements for your profile to be listed</p>
                <ul>
                    <li>Set Availability Hours</li>
                    <li>Set Services</li>
                    <li>Set Locations served</li>
                    <li>Connect Billing Account</li>
                </ul>


            </div>

        </div>
    @endif

    <main id="main-content">

        @yield('content')

    </main>

    @include('layouts.includes.footer')
    @include('layouts.includes.script')

</body>

</html>
