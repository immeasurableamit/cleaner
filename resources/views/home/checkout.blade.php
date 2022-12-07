@extends('layouts.app')

@section('content')

<!-- Checkout Page -->
<section class="light-banner build-checkout-page" style="background-image: url('assets/images/white-pattern.png')">
<div class="container">

<!-- Jsn -->

<!-- Jsn end -->
<!-- multistep form -->
@livewire('home.checkout', [ 'details' => $details ])
      </div>
    </section>
<!-- Checkout Page End -->
@endsection
