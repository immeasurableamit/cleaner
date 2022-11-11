<div>

    <div class="listing-row">
        @foreach($cleaners as $cleaner)
        <div class="listing-column lcd-4 lc-6">
            <div class="card_search_result">
                <div class="like_img">
                    <input type="checkbox" class="like_1">
                    <img src="{{asset('storage/images/'.$cleaner->image)}}">
                </div>
                <div class="bottom_card_text">
                    <div class="name_str">
                        <a href="javascript::void(0)" class="name_s">{{$cleaner->name}}</a>
                        <div class="m-hide">
                            <img src="assets/images/icons/star.svg">
                            4.5<span> (211)</span>
                        </div>

                    </div>
                    <div class="routine_text">
                        <p class="font-semibold">Routine - Every 2 Weeks</p>
                        <p class="font-medium">2,700 sq ft</p>
                        <p class="font-regular">Est Time : 3 shours</p>
                        <div class="badges_insurnce_img">
                            <img src="assets/images/badges.svg">
                            <img src="assets/images/insurance.svg">
                        </div>
                    </div>

                    <div class="btn_rate">
                        <b>$150</b>
                        <a href="{{route('profile',$cleaner->id)}}"><button class="btn_view d-none d-md-block">View</button></a>
                        <div class="td-hide rating-mobile-listing-design">
                            <img src="assets/images/icons/star.svg">
                            4.5<span> (211)</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>