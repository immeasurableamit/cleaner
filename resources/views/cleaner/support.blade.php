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
            <div class="blue-logo-block text-center max-width-100">
              <a href="#"><img src="assets/images/logo/logo.svg"></a>
            </div>
         </div>
        </div>
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 no-padd">
          <div class="row no-mrg">
           <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 no-padd">
            <div class="customer-account-forms support_service_section pe-3">   
              <div class="support_tabs">
                  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                      <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Past services</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Contact Us</button>
                      </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                    	 <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
				@livewire('cleaner.support')
			</div>
             <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">     
               @livewire('cleaner.support-contact')
           </div>
           </div>
              </div>
 
         </div>
           </div>
           </div>
        </div>
       </div>   
       </div>
     </div>
   </section>


@endsection
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('assets/js/mdb.min.js') }}"></script>
<x-livewire-alert::scripts />