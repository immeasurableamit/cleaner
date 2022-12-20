<script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_API_KEY')}}&libraries=places"></script>

<style>
    .pac-container.pac-logo {
        z-index: 99999;
    }
</style>

<script>
    google.maps.event.addDomListener(window, 'load', function() {

        var places = new google.maps.places.Autocomplete(document.getElementById("{{ $address_element_id ?? 'address' }}"));
        google.maps.event.addListener(places, 'place_changed', function() {

            var place = places.getPlace();

            var address = place.formatted_address;
            var latitude = place.geometry.location.lat();

            document.getElementById('lat').value = latitude;

            var longitude = place.geometry.location.lng();
            document.getElementById('long').value = latitude;

            // console.log(latitude,longitude,'---------------->')
            var latlng = new google.maps.LatLng(latitude, longitude);
            var geocoder = geocoder = new google.maps.Geocoder();
            geocoder.geocode({
                'latLng': latlng
            }, function(results, status) {
                console.log(results);
                // console.log(status, "yes---------------", google.maps.GeocoderStatus.OK);
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        var address = results[0].formatted_address;

                        for (i = 0; i < results[0].address_components.length; i++) {
                            if (results[0].address_components[i].types[0] == "neighborhood") {
                                var city = results[0].address_components[i].long_name;
                            } else if (results[0].address_components[i].types[0] == "locality") {
                                var city = results[0].address_components[i].long_name;
                            } else if (results[0].address_components[i].types[0] == "administrative_area_level_1") {
                                var state = results[0].address_components[i].long_name;
                            } else if (results[0].address_components[i].types[0] == "postal_code") {
                                var pin = results[0].address_components[i].long_name;
                            } else if (results[0].address_components[i].types[0] == "country") {
                                var country = results[0].address_components[i].long_name;
                            }
                        }

                        var txtCountry = document.getElementById('txtCountry').value = country;
                        if (txtCountry != '') {
                            var element = document.getElementById("txtCountry");
                            element.classList.add("active");
                        }
                        document.getElementById('txtState').value = state;
                        if (txtCountry != '') {
                            var element = document.getElementById("txtState");
                            element.classList.add("active");
                        }
                        document.getElementById('txtCity').value = city;
                        if (txtCountry != '') {
                            var element = document.getElementById("txtCity");
                            element.classList.add("active");
                        }
                        document.getElementById('txtZip').value = pin;
                        if (txtCountry != '') {
                            var element = document.getElementById("txtZip");
                            element.classList.add("active");
                        }
                        document.getElementById('txtlat').value = latitude;
                        document.getElementById('txtlog').value = longitude;
                    }
                }
            });
        });
    });
</script>