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
                                <a href="{{ route('index') }}"><img src="{{ asset('assets/images/logo/logo.svg') }}"></a>
                            </div>
                        </div>
                    </div>

                    <div id="data_Table" class="col-xl-9 col-lg-9 col-md-12 col-sm-12 car_right_div py-3">

                        <div class="listing-row">
                            @if (count($favourites) <= 0)
                                <div class="p-5">
                                    <h3>No Favourite Found</h3>
                                </div>
                            @else
                                @foreach ($favourites as $favourite)
                                    <div class="listing-column lcd-4 lc-6">
                                        <div class="card_search_result pro-card">
                                            <div class="like_img">
                                                <input type="hidden" class="senddelete_val_id"
                                                    value="{{ $favourite->id }}">
                                                <div id="" class="profile-pic">
                                                    @if ($favourite->cleaner->image)
                                                        <img
                                                            src="{{ asset('storage/images/' . $favourite->cleaner->image) }}">
                                                    @else
                                                        <img src="assets/images/iconshow.png">
                                                    @endif


                                                </div>
                                            </div>
                                            <div class="bottom_card_text">
                                                <div class="name_str">
                                                    <a href="javascript::void(0)"
                                                        class="name_s">{{ $favourite->cleaner->name }}</a>
                                                    <div class="m-hide">

                                                        <img src="{{ asset('assets/images/icons/star.svg') }}">
                                                        {{ formatAvgRating($favourite->cleaner->cleanerReviews->avg('rating')) }}<span>
                                                            ({{ $favourite->cleaner->cleanerReviews->count() }})</span>
                                                    </div>
                                                </div>
                                                {{-- <div class="routine_text">

                                        <p class="font-semibold"> title</p>
                                        <p class="font-medium">{{$favourite->home_size}} sq. ft.</p>
                                        <p class="font-regular">{{$favourite->estimated_time}}Est Time : 1hr hours</p>
                                        <p class="font-medium"><b>{{$favourite->price}}356$</b></p>

                                        <div class="badges_insurnce_img">

                                        </div> --}}
                                            </div>
                                            <div class="position-relative bottom-btn">
                                                <a href="{{ route('profile', $favourite->cleaner->id) }}"><button
                                                        class="btn_view d-none d-md-block">View</button></a>

                                                <form method="POST"
                                                    action="{{ route('customer.favourite.deleteFavouriteCleaner', $favourite->id) }}">
                                                    @csrf

                                                    <button class="btn btn-danger servideletebtn"
                                                        data-id="{{ $favourite->id }}">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>


                </div>
            </div>
        </div>



    </section>

@endsection

@section('script')
    {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}

    <script>
        // $(document).ready(function() {
        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //     });
        //     $('.servideletebtn').click(function(e) {
        //         e.preventDefault();


        //         var delete_id = $(this).attr('data-id');
        //         // alert(delete_id);
        //         swal({

        //                 title: "Are you sure you want to remove cleaner from Favourites?",

        //                 icon: "warning",
        //                 buttons: true,
        //                 buttons: ["No", "Yes"],

        //                 dangerMode: true,
        //             })

        //             .then((willDelete) => {
        //                 if (willDelete) {
        //                     var data = {
        //                         "_token": $('input[name=_token]').val(),
        //                         "id": delete_id,
        //                     };
        //                     console.log(data, "hello");
        //                     $.ajax({
        //                         'type': "DELETE",
        //                         url: '/customer/favourite/delete/' + delete_id,
        //                         data: data,

        //                         success: function(response) {
        //                             console.log(response, "res");
        //                             swal(response.status, {
        //                                     icon: "success",
        //                                 })
        //                                 .then((result) => {
        //                                     location.reload();
        //                                 });
        //                         }
        //                     });

        //                 }

        //             });

        //     });
        // });
    </script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">

     $('.servideletebtn').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to remove cleaner from Favourites?`,
            //   text: "If you delete this, it will be gone forever.",
            //   icon: "warning",
              buttons: true,
              buttons: ["No", "Yes"],
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });

</script>
@endsection
