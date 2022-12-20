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
                                <a href="javascript::void(0)"><img src="{{ asset('assets/images/logo/logo.svg') }}"></a>
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
                                        <h4 class="mb-0 border-0">Click or search a point on the map and adjust slider to
                                            define service area </h4>
                                    </div>
                                    <div class="form-grouph input-design mb-30 col-md-6" style="position: relative;">
                                        <input type="text" name="address" id="address" class="" placeholder="Enter address" />
                                        <button class="search-btn"
                                            style="position: absolute; top: 4px; right: 10px; width: 48px; height: 48px; background: var(--primary); border: none; border-radius: 50%; box-shadow: 0px 6px 4px rgba(55, 169, 251, 0.26); padding: 0px;">
                                            <img src="http://cleaner.local:8000/assets/images/icons/search.svg"></button>
                                    </div>

                                    <div id="map" class="" style="height: 400px; width: 100%;"></div>

                                    <form method="POST" action="{{ route('cleaner.set-location') }}" id="location-form" class="row my-3">
                                        @csrf

                                        <input  type="hidden" id="radius-input" name="radius" />
                                        <input  type="hidden" id="latitude" name="latitude" />
                                        <input  type="hidden" id="longitude" name="longitude" />

                                        <div class="co-md-12 mb-3">
                                            <label for="customRange1" class="form-label">Area kms: <span id="radius-area-kms"></span></label>
                                            <input id="radius_area_range_input" oninput="radiusChanged( this.value )" type="range" class="form-range" id="customRange1" min="10" max="300">
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn_blue">Save</button>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')

        <script>
            var radiusInKms = 100;
            function initMap() {
                var new_york_lat_lng = {
                    lat: 40.730610,
                    lng: -73.935242,
                };

                /* Construct map  */
                var myLatlng = @json($latLngForMap); // TODO: replace this with the user's lat/lng saved in DB
                if ( myLatlng.length == 0 ) {
                   myLatlng = new_york_lat_lng;
                }

                const map = new google.maps.Map(document.getElementById("map"), {
                    zoom: 6,
                    center: myLatlng,
                });

                window.setLocationMap = map;

                /* Add circle in map */

                const servedLocationCircle = new google.maps.Circle({
                    strokeColor: "#FF0000",
                    strokeOpacity: 0.8,
                    strokeWeight: 2,
                    fillColor: "#FF0000",
                    fillOpacity: 0.35,
                    map,
                    center: myLatlng,
                    radius: radiusInKms * 1000,
                    editable: false,
                    draggable: true,
                });

                /* Refill radius input when circle get resized */
                google.maps.event.addListener(servedLocationCircle, 'radius_changed', function() {
                    setRadiusAndLatLngInInputs( servedLocationCircle );
                });

                google.maps.event.addListener(servedLocationCircle, 'center_changed', function() {
                    setRadiusAndLatLngInInputs( servedLocationCircle );
                });


                window.servedLocationCircle = servedLocationCircle;
                document.getElementById('radius-area-kms').innerText = radiusInKms;
                document.getElementById('radius_area_range_input').value = radiusInKms;
                setRadiusAndLatLngInInputs( servedLocationCircle );
            };

            function setRadiusAndLatLngInInputs(servedLocationCircle)
            {
                document.getElementById('radius-input').value = servedLocationCircle.getRadius();
                document.getElementById('latitude').value     = servedLocationCircle.center.lat();
                document.getElementById('longitude').value    = servedLocationCircle.center.lng();
            }

            function radiusChanged(radiusInKms)
            {
                radius = Number( radiusInKms ) * 1000;
                window.servedLocationCircle.setRadius(radius);
                document.getElementById('radius-area-kms').innerText = radiusInKms;


            }

            function changeAddressInMap(gmap_place)
            {
                let parsed_gmap_place = parseGmapPlace( gmap_place );
                let myLatLng = {
                    lat: parsed_gmap_place.lat,
                    lng: parsed_gmap_place.lng,
                };

                window.setLocationMap.setCenter( myLatLng );
                window.servedLocationCircle.setCenter( myLatLng );
            }

            window.addEventListener('load', function() {
                initMap();
                var address_input = document.getElementById('address');
                var map_options = { componentRestrictions: { country: ["us", "ca"] } }
                makeAddressInputAutocompletable( address_input, changeAddressInMap, map_options);
            });


            window.initMap = initMap;
        </script>
    @endpush
@endsection
