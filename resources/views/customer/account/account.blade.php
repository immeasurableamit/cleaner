@extends('layouts.app')

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
               </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 no-padd">
               <div class="row no-mrg">
                  <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 no-padd">
                     <div class="customer-account-forms">
                        <div class="form-headeing-second">
                           <h4>Account Info</h4>
                        </div>
                        @livewire('customer.account.account')
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>


@endsection
