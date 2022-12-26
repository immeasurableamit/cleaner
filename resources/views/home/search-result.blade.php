@extends('layouts.app')
@section('content')
<section class="light-banner customer-account-page" style="background-image: url('assets/images/white-pattern.png')">
   <div class="container">
      <div class="customer-white-wrapper search_result_section">
         <div class="result_text">
            <h3>Results that keep you wanting more.</h3>
            <p>See the cleaners available for your selected service and address below. Feel free to filter further using the “Filter by” feature. We hope you enjoy every experience in your journey to find the perfect cleaner. </p>
            <p>Prices listed are for typical cleanings. <strong>If you feel your cleaning needs are unique, send a chat to the cleaner from their profile for a custom quote!</strong></p>
         </div>

         @livewire('home.search-result',[
            'selectedServiceItem' => $serviceItem,
            'address' => $address,
            'homeSize' => $homeSize,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'selectedServiceItemId' => $serviceItemId,
         ])


      </div>
   </div>
</section>
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/litepicker/dist/litepicker.js"></script>
@endpush
@endsection
