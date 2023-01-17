@extends('layouts.app')

@section('content')

<!-- Checkout Page -->
<section class="light-banner build-checkout-page" style="">
<div class="container">

<!-- multistep form -->
@livewire('home.checkout', [ 'details' => $details, 'currentlyActiveStep' => request()->input('step', 1 ) ])
      </div>
    </section>
<!-- Checkout Page End -->
@endsection
