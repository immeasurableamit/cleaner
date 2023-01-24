@extends('layouts.cleanerapp')

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
                                <a href="#"><img src="{{ asset('assets/images/logo/logo.svg') }}"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 no-padd">
                        <div class="row no-mrg">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 no-padd cleaner-reviews_section">
                                <div class="customer-account-forms ">

                                    <div class="form-headeing-second top_heading feadback_tittle mb-5">
                                        <h3 class=" ">Customer Feedback </h3>
                                        <div class="stars_top">
                                            <p class="review-totel-no">Total Reviews: <span
                                                    class="review-no">{{ $reviews->count() }}</span></p>
                                            <span>Overall </span>
                                            <img src="{{ asset('assets/images/star.svg') }}" />
                                            <span>{{ $reviews->avg('rating') }}</span>
                                        </div>
                                    </div>

                                    <div class="feedback_reviews_section">
                                        @forelse ( $reviews as $review )
                                        <div class="card_reviews">
                                            <div class="name_img_star">
                                                @if ($review->user->image)
                                                <img src="{{ asset('storage/images/' . $review->user->image) }}"  class="pr_img">
                                            @else
                                                <img src="/assets/images/iconshow.png" class="pr_img">
                                            @endif

                                                <h5 class="text-capitalize">{{ $review->user->name }}</h5>
                                                <div class="star_2">
                                                    <div class="input_star me-3">
                                                        @foreach ( range(1,5) as $i )

                                                            @if ( $i <= $review->rating )
                                                            <img src="{{ asset('assets/images/star.svg') }}">
                                                            @else
                                                            <img src="{{ asset('assets/images/e_star.svg') }}">
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                    <span class="me-3">{{ $review->rating}} out of 5</span>
                                                    <span class="r_date">{{ $review->created_at->toFormattedDateString() }}</span>
                                                </div>
                                            </div>
                                            <p class="msg_reviewr">
                                                {{ $review->review }}
                                            </p>
                                        </div>
                                        @empty
                                            <p>No Reviews Found!</p>
                                        @endforelse

                                        @if ( $reviews->count() > 3 )
                                        <div class="btn_show_more">
                                            <a href="#" class="">Show more</a>
                                        </div>
                                        @endif


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
