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
                                    <input type="hidden" class="senddelete_val_id" value="{{$cleaner->id}}">
                                    <div id="" class="profile-pic">
                                        @if ($cleaner->cleaner->image)
                                        <img src="{{ asset('storage/images/' . $cleaner->cleaner->image) }}">
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

                                        <form method="POST" action="{{route('customer.favourite.deleteFavouriteCleaner',$cleaner->id)}}">
                                            @csrf

                                            <button class="btn btn-danger servideletebtn" data-id="{{$cleaner->id}}">Delete</button>
                                        </form>
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

@section('script')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
	$(document).ready(function(){
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$('.servideletebtn').click(function(e){
			e.preventDefault();
			
			
            var delete_id = $(this).attr('data-id');
            // alert(delete_id);
			swal({
				
				title: "Are you sure want to delete ?",
				
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			
			.then((willDelete) => {
				if (willDelete) {
					var data = {
						"_token": $('input[name=_token]').val(),
						"id": delete_id,
					};
					console.log(data, "hello");
					$.ajax({
						'type': "DELETE",
						url: '/customer/favourite/delete/'+delete_id,
						data: data,
						
						success: function(response){
                            console.log(response, "res");
							swal(response.status, {
								icon: "success",
							})
							.then((result) => {
								location.reload();
							});
						}
					});
					
				} 
				
			});
			
		});
	});
</script> 


@endsection