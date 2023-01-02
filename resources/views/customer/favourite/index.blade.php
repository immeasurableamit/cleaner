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
                            <a href="#"><img src="{{asset('assets/images/logo/logo.svg')}}"></a>
                        </div>
                    </div>
                </div>

                <div id="data_Table" class="col-xl-9 col-lg-9 col-md-12 col-sm-12 car_right_div">
                
                    <div class="listing-row">
                   @foreach($customerFavouriteRecord as $cleaner)
                        <div class="listing-column lcd-4 lc-6">
                            <div class="card_search_result">
                                <div class="like_img">
                                 
                                    <div id="" class="profile-pic">
                                    @if ($cleaner->cleaner->image)
                                            <img src="{{ asset('storage/images/' . $cleaner->image) }}">
                                        @else
                                            <img src="assets/images/iconshow.png">
                                        @endif
                                          
                                       
                                    </div>
                                </div>
                                <div class="bottom_card_text">
                                    <div class="name_str">
                                        <a href="javascript::void(0)" class="name_s">{{$cleaner->cleaner->name}}</a>
                                        <div class="m-hide">
                                            <img src="{{ asset('assets/images/icons/star.svg') }}">
                                            
                                        </div>
                                    </div>
                                    <!-- <div class="routine_text">

                                        <p class="font-semibold"> title</p>
                                        <p class="font-medium">homeSize sq. ft.</p>
                                        <p class="font-regular">Est Time : 

                                            hours</p>
                                        <div class="badges_insurnce_img">
                                           
                                        </div>
                                    </div> -->
                                    <div class="position-relative">

                                    <a href="{{ route('customer.favourite.deleteFavouriteCleaner',$cleaner->id) }}" class="btn btn-xs btn-danger btn-flat show-alert-delete-box btn-sm" data-toggle="tooltip" title='Delete' >Delete</a>
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                
                @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<script type="text/javascript">
    $('.show-alert-delete-box').click(function(event){
        debugger;
        event.preventDefault();
        const url = $(this).attr('href');
        swal({
            title: "Are you sure you want to delete this record?",
            text: "If you delete this, it will be gone forever.",
            icon: "warning",
            type: "warning",
            buttons: ["Cancel","Yes!"],
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then(function(value) {
        if (value) {
          swal('Your  file has been updated!!', {
               icon: 'success',
               timer: 3000
              });
            window.location.href = url;
            }
        });
    });
      
</script>

@endsection