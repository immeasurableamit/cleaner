<script src="{{asset('assets/js/custom.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>
<script src="{{asset('assets/js/croppie.js')}}"></script>
{{-- <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('assets/js/slick.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


@livewireScripts

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAPS_API_KEY')}}&libraries=places" defer></script>


<x-livewire-alert::scripts />



@yield('script')
@stack('scripts')
<script>
    $(document).ready(function() {

        $('.slider').slick({
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 1,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });
    });
</script>
<script>
    $(document).ready(function() {

        $('.customer_slider').slick({
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 2,
            slidesToScroll: 1,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });
    });
</script>
<script>
    $(document).ready(function() {
        $(".toggle_menu").click(function() {
            $(".bar_left").toggleClass("show");
        });
    });
</script>
<script>
    $(document).ready(function() {
        $(".service_toggle_s").click(function() {
            $(this).parent().toggleClass("show");
        });
    });
</script>

<script>



function makeAddressInputAutocompletable( element, place_changed_callback, options = {}){
    var gmap_places = new google.maps.places.Autocomplete( element, options );

    google.maps.event.addListener( gmap_places, 'place_changed', () => {
        let selected_place = gmap_places.getPlace();
        window.jsnPlace = selected_place;
        place_changed_callback(selected_place);
    });
}


function parseGmapPlace(gmap_place)
{
    var address = {};

    for ( address_component of gmap_place.address_components) {

        let types_map = {
            locality: 'city',
            neighborhood: 'city',
            administrative_area_level_1: 'state',
            postal_code: 'zip',
            country: 'country',
        };

        let component_type = address_component.types[0];
        let address_key    = types_map[ component_type ];
        if (  address_key ){
            address[ address_key ] = address_component.long_name;
        }
    }

    address.lat = gmap_place.geometry.location.lat();
    address.lng = gmap_place.geometry.location.lng();

    return address;
}
function initToastInstance()
{
    const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
});

window.swalToast = Toast;
}

window.addEventListener('load', () => {
    initToastInstance();
})
</script>
