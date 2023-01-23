@extends('layouts.cleanerapp')

@section('content')

<section class="light-banner customer-account-page" style="background-image: url('/assets/images/white-pattern.png')">
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
                                <a href="javascript::void(0)"><img src="{{asset('/assets/images/logo/logo.svg')}}"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 no-padd">
                        <div class="row no-mrg">
                          <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 no-padd cleaner_badges_insurance_section">
                            <div class="customer-account-forms ">
                              <div class="form-headeing-second  mb-4 ">
                                <h4 class="border-0 mb-0">Insurance</h4>
                                <p>Purchase 1 milion in coverage Through our partner Thimble in order to prove coverage and activate your Canary Defence badge.</p>
                              </div>

                              @if ( $policy )
                                <div><a target="_blank" href="{{ $policy['policy_pdf_url'] }}" class="btn_blue">Download policy</a></div>
                              @else
                                <div><a target="_blank" href="{{ route('cleaner.insurance-provider') }}" class="btn_blue">Insure me</a></div>
                              @endif

                                 <div class="badges_div mt-5">

                                    <div class="form-check form-switch form-design-switch-1">
                                      <img src="/assets/images/insurance.svg">
                                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"
                                      @if ($policy) checked @endif
                                      disabled>
                                      <label class="form-check-label" for="flexSwitchCheckChecked">(toggle locked to status of insurance)</label>
                                      {{-- <span class="learn-more-link" data-bs-toggle="modal" data-bs-target="#learn-more-badge" type="button">Learn More</span> --}}
                                    </div>

                                    <div class="form-headeing-second  mt-3 ">
                                      <h4 class="border-0 mb-0 pb-3">Other Badges</h4>
                                    </div>

                                    <div class="form-check form-switch form-design-switch-1">
                                      <img src="/assets/images/badges.svg">
                                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" oninput="toggleOrganicService(this)"
                                      @if ( $user->UserDetails->provide_organic_service == 1)
                                        checked
                                    @endif

                                      >
                                      <label class="form-check-label" for="flexSwitchCheckChecked">Organic service offered upon Required</label>
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
<script>
    function toggleOrganicService(elem)
    {
        let url = "{{ route('cleaner.toggle-organic-service') }}";
        console.log( url );
        $.get(url, function(data, status){
            if ( data.success ) {
                window.swalToast.fire({icon: 'success', title: data.text });
            }

        })
    }

</script>
@endsection
