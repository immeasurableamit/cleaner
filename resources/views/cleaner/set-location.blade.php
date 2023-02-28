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
                                <a href="{{ route('index') }}"><img src="{{ asset('/assets/images/logo/logo.svg') }}"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 no-padd">
                        <div class="row no-mrg">
                            <form method="POST" action="{{ route('cleaner.set-location') }}" id="location-form"
                                class="row my-3">
                                @csrf

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 no-padd cleaner_location_section">
                                    <div class="customer-account-forms ">
                                        <div class="form-headeing-second border-bottom pb-3 ">
                                            <h3 class="mb-0  d-none d-sm-block">Set Your Service Area</h3>
                                            <h4 class="mb-0 d-block d-sm-none border-0 pb-0">Set Availability</h4>
                                        </div>

                                        <div class="form-headeing-second pt-3 ">
                                            <h4 class="mb-0 border-0">
                                                Adjust slider to refine service area.
                                            </h4>
                                        </div>

                                        <div class="row">
                                            <div class="form-grouph input-design mb-30 col-md-6"
                                                style="position: relative;">
                                                <input type="text" name="address" id="address" class=""
                                                    placeholder="Enter City, Zip, or Address" />
                                                <button type="button" class="search-btn"
                                                    style="position: absolute; top: 4px; right: 10px; width: 40px; height: 40px; background: var(--primary); border: none; border-radius: 50%; box-shadow: 0px 6px 4px rgba(55, 169, 251, 0.26); padding: 0px;">
                                                    <img src="{{ asset('assets/images/icons/search.svg') }}"></button>
                                            </div>

                                            <div class="col-md-6 ">
                                                <button type="button" class="btn_blue d-inline-block"
                                                    onclick="handleSetLocationSubmit(this)">{{ $serveLocationAlreadySet ? 'Save' : 'Save' }}
                                                </button>
                                                {{-- <button type="button" class="btn_blue d-inline-block"
                                                onclick="handleSetLocationSubmit(this)">{{ $serveLocationAlreadySet ? 'Update' : 'Save' }} </button> --}}
                                            </div>
                                        </div>

                                        <div class="co-md-12 my-3">
                                            <div id="miles_slider"></div>
                                        </div>
                                        <div id="map" class="" style="height: 400px; width: 100%;"></div>

                                        <input type="hidden" id="radius-input" name="radius" />
                                        <input type="hidden" id="latitude" name="latitude" />
                                        <input type="hidden" id="longitude" name="longitude" />

                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.6.1/nouislider.min.js"
            integrity="sha512-1mDhG//LAjM3pLXCJyaA+4c+h5qmMoTc7IuJyuNNPaakrWT9rVTxICK4tIizf7YwJsXgDC2JP74PGCc7qxLAHw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.6.1/nouislider.min.css"
            integrity="sha512-qveKnGrvOChbSzAdtSs8p69eoLegyh+1hwOMbmpCViIwj7rn4oJjdmMvWOuyQlTOZgTlZA0N2PXA7iA8/2TUYA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />

        <script>
            var radiusInMiles = '{{ $radiusInMilesForMap }}';

            /* Helper function */
            function convertMilesIntoMeters(miles) {
                var meters_in_a_mile = 1609.344;
                return Number(miles * meters_in_a_mile);
            }


            function addCircleInMap(map, center, radius) {
                const servedLocationCircle = new google.maps.Circle({
                    strokeColor: "#FF0000",
                    strokeOpacity: 0.8,
                    strokeWeight: 2,
                    fillColor: "#FF0000",
                    fillOpacity: 0.35,
                    map,
                    center,
                    radius,
                    draggable: true,
                });

                /* Refill radius input when circle get resized */
                google.maps.event.addListener(servedLocationCircle, 'radius_changed', function() {
                    setRadiusAndLatLngInInputs(servedLocationCircle);
                });

                google.maps.event.addListener(servedLocationCircle, 'center_changed', function() {
                    setRadiusAndLatLngInInputs(servedLocationCircle);
                });

                window.servedLocationCircle = servedLocationCircle;
            }

            function initMap() {
                var new_york_lat_lng = {
                    lat: 40.730610,
                    lng: -73.935242,
                };

                /* Construct map  */
                var myLatlng = @json($latLngForMap);
                if (myLatlng.length == 0) {
                    myLatlng = new_york_lat_lng;
                }

                const map = new google.maps.Map(document.getElementById("map"), {
                    zoom: 7,
                    center: myLatlng,
                });

                addCircleInMap(map, myLatlng, convertMilesIntoMeters(radiusInMiles));

                window.setLocationMap = map;

                /*
                // Create the initial InfoWindow.
                let infoWindow = new google.maps.InfoWindow({
                    content: "Click the map to get Lat/Lng!",
                    position: myLatlng,
                });

                infoWindow.open(map);
                // Configure the click listener.
                map.addListener("click", (mapsMouseEvent) => {
                    console.log( mapsMouseEvent );

                    console.log( JSON.stringify( mapsMouseEvent.latLng.toJSON() ) );
                    window.jsnMouseEvent = mapsMouseEvent;
                    // Close the current InfoWindow.
                    infoWindow.close();
                    // Create a new InfoWindow.
                    infoWindow = new google.maps.InfoWindow({
                        position: mapsMouseEvent.latLng,
                    });
                    infoWindow.setContent(
                        JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2)
                    );
                    infoWindow.open(map);
                });
                */
            };

            /*
             * fill value in fields that are required
             * to save the served location
             *
             */
            function setRadiusAndLatLngInInputs(servedLocationCircle) {
                document.getElementById('radius-input').value = servedLocationCircle.getRadius(); // in meters
                document.getElementById('latitude').value = servedLocationCircle.center.lat();
                document.getElementById('longitude').value = servedLocationCircle.center.lng();
            }


            /*
             * This function is a callback for
             * search address input field
             */
            function changeAddressInMap(gmap_place) {
                let parsed_gmap_place = parseGmapPlace(gmap_place);
                let myLatLng = {
                    lat: parsed_gmap_place.lat,
                    lng: parsed_gmap_place.lng,
                };

                window.setLocationMap.setCenter(myLatLng);
                window.servedLocationCircle.setCenter(myLatLng);
            }

            function integrateNoUiSliderInMilesSlider() {
                var slider = document.getElementById('miles_slider');
                var range = {
                    min: 1,     //10
                    max: 150,
                };

                var format = {
                    from: (value) => parseInt(value),
                    to: (value) => `${parseInt(value)} Miles`,
                }

                var sliderOptions = {
                    start: [radiusInMiles],
                    tooltips: true,
                    range,
                    format,
                };

                noUiSlider.create(slider, sliderOptions)

                slider.noUiSlider.on('update', (formatted_value, handle, value) => {
                    let miles = parseInt(value);
                    window.servedLocationCircle.setRadius(convertMilesIntoMeters(miles));
                });
            }

            function handleSetLocationSubmit(button) {
                button.innerText = 'Submitting...';
                let url = "{{ route('cleaner.set-location') }}";
                let token = document.querySelector('meta[name="csrf-token"]').content;

                $.ajax({
                    type: "POST",
                    url: url,
                    headers: {
                        X_CSRF_TOKEN: token,
                        'Accept': 'application/json'
                    },
                    data: $("#location-form").serialize(),
                    success: (data) => {
                        console.log(data);
                        // button.innerText = 'Update';
                        button.innerText = 'Save';
                        window.swalToast.fire({
                            icon: 'success',
                            title: 'Location set'
                        });
                    },

                });

            }

            window.addEventListener('load', function() {
                initMap();
                integrateNoUiSliderInMilesSlider();

                /* address autocomplete */
                var address_input = document.getElementById('address');
                var map_options = {
                    componentRestrictions: {
                        country: ["us", "ca"]
                    }
                }
                makeAddressInputAutocompletable(address_input, changeAddressInMap);
            });


            window.initMap = initMap;
        </script>
    @endpush
@endsection
