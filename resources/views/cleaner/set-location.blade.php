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
                                <a href="javascript::void(0)"><img src="{{asset('assets/images/logo/logo.svg')}}"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 no-padd">
                    <div class="row no-mrg">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 no-padd cleaner_location_section">
              <div class="customer-account-forms ">
                 <div class="form-headeing-second border-bottom pb-3 ">
                   <h3 class="mb-0  d-none d-sm-block">Set your Service Area</h3>
                   <h4 class="mb-0 d-block d-sm-none border-0 pb-0">Set Availability</h4>
                 </div>
  
    
                 <div class="form-headeing-second pt-3 ">
                    <h4 class="mb-0 border-0">Click or search a point on the map and adjust slider to define service area </h4>
                  </div>

                <div id="map" class="" style="height: 350px;   width: 900px;"></div>

                <form method="POST" action="{{ route('cleaner.set-location') }}" id="location-form">
                  @csrf 
                    <input type="hidden" id="radius-input" name="radius"/>

                    <button type="submit" class="btn_blue">Save</button>
                </form>

              </div>
              </div>
           </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push ('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_API_KEY')}}&callback=initMap&v=weekly" defer></script>

<script>

function initMap() {

  /* Construct map  */
  const myLatlng =  { lat: 41.878, lng: -87.629 }; // TODO: replace this with the user's lat/lng saved in DB
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 6,
    center: myLatlng,
  });

  /* Add circle in map */
  let radiusInKms = 100;
  const servedLocationCircle = new google.maps.Circle({
    strokeColor: "#FF0000",
    strokeOpacity: 0.8,
    strokeWeight: 2,
    fillColor: "#FF0000",
    fillOpacity: 0.35,
    map,
    center: myLatlng,
    radius: radiusInKms * 1000,
    editable: true,
    draggable: true,
  });

  /* Refill radius input when circle get resized */
  google.maps.event.addListener(servedLocationCircle, 'radius_changed', function() {    
    document.getElementById('radius-input').value = servedLocationCircle.getRadius();
  });

};

window.initMap = initMap;

</script>
@endpush
        
    @endsection