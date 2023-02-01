<div>
<div class="top_rated_section">
            <div class="container">
                <div class="tittle_div">
                    <h3 class="h3_tittle">Top Rated Canary Cleaners</h3>
                    <a href="{{ route('search-result') }}" class="browse_link">Browse<img src="assets/images/icons/arrow.svg" class="ms-2" /></a>
                </div>
                <div class="row">
                    @foreach($cleaners as $cleaner)
                    <div class="col-md-3">
                        <div class="card_rated">
                            @if ( $cleaner->image )
                                <img src={{ asset('/storage/images/'.$cleaner->image) }} class="clnr_img">
                            @else
                                <img src={{ asset('/assets/images/iconshow.png') }} class="clnr_img">
                            @endif
                            <div class="bottom_part">
                                <h5>{{$cleaner->name}}</h5>
                                <div class="star_rating">
                                    <img src="/assets/images/icons/star.svg">
                                    <span>{{ formatAvgRating( $cleaner->cleanerReviews->avg('rating') ) }} ({{ $cleaner->cleanerReviews->count() }})</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach
                </div>
                <div class="d-block d-md-none text-center">
                    <a href="{{ route('search-result') }}" class="btn_c" style="background-color:var(--primary);color:#fff;">Browse All</a>
                </div>
            </div>
        </div>
</div>
