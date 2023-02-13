<div>

    <div class="services-alternate-wrap-sec">

        @foreach ($types as $type)
            <!-- Type-Service-Items block -->
            <div class="alternative-service-block">

                <!-- Type -->
                <div class="alternate-service-header">
                    <div class="row">
                        <div class="col-xl-6 col-md-6 col-sm-12">
                            <div class="home_cleaning_div">
                                <div class="card_header_tittle">
                                    <h3>{{ $type->title }}</h3>
                                    <p> enter your rate to match what you would charge
                                        for 1,500 sq ft - prices will scale up or down from there</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Type End -->

                @foreach ($type->services as $service)
                    <!-- Services-->
                    <div class="card_service_row">

                        <div class="row pb-3">

                            <!-- Service name -->
                            <div class="col-xl-6 col-md-6 col-sm-12">
                                <div class="btn_header_service py-3">
                                    <h4 class="mb-0 btn_blue">{{ $service->title }}</h4>
                                    <!--  <div class="form-check form-switch heading-toggle active-toggle">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                            </div> -->
                                </div>
                            </div>
                            <!-- Service name end -->

                            <!-- Info  -->
                            <div class="row" style="padding-left: 0%;">
                                <!-- Service items -->
                                <div class="col-md-6">
                                    @foreach ($service->items as $item)
                                        <!-- Service item -->
                                        <div class="col-12">

                                            @if (is_null($item->cleaner_service))
                                                <div class="card_collapse_service common_card_service">
                                                @elseif ($item->cleaner_service->status == '1')
                                                    <div @class([
                                                        'card_collapse_service',
                                                        'common_card_service',
                                                        'show',
                                                        'show-2' => in_array($item->id, $activeServiceItemsIds),
                                                    ])
                                                        data-service-item-id="{{ $item->id }}">
                                                    @else
                                                        <div class="card_collapse_service common_card_service">
                                            @endif

                                            <!-- Service item header -->
                                            <div class="heder_row">
                                                <h3>{{ $item->title }}</h3>
                                                <div class="form-check form-switch" data-item-id="{{ $item->id }}">

                                                    @if (is_null($item->cleaner_service))
                                                        <input class="form-check-input" type="checkbox" checked>
                                                    @elseif ($item->cleaner_service->status == '1')
                                                        <input class="form-check-input" type="checkbox">
                                                    @else
                                                        <input class="form-check-input" type="checkbox" checked>
                                                    @endif

                                                </div>
                                            </div>
                                            <!-- Service item header -->

                                            <!-- Service item collapsed content -->
                                            @if (empty($item->cleaner_service))
                                                <div class="card-edit-content">
                                                    <p class="price-area-text"><span class="price_span">$0</span> <span
                                                            class="area_span">per 1,500 sq ft</span></p>
                                                    <p class="time">0:00 hrs</p>
                                                    <p class="card_toggle_s">Edit</p>
                                                </div>
                                            @else
                                                <div class="card-edit-content">
                                                    <p class="price-area-text"><span
                                                            class="price_span">${{ $item->cleaner_service->priceForSqFt(1500) }}</span>
                                                        <span class="area_span">per 1,500 sq ft</span>
                                                    </p>
                                                    <p class="time">
                                                        {{ $item->cleaner_service->durationForSqFt(1500) }}hrs</p>
                                                    <p class="card_toggle_s">Edit</p>
                                                </div>
                                            @endif
                                            <!-- Service item collapsed content end -->

                                            <!-- Service item expanded content -->
                                            @if (empty($item->cleaner_service))
                                                <div class="card-second-content">
                                                    <div class="card_row_3">
                                                        <span class="est">Price per sq ft (in USD)</span>
                                                        <div class="incremnt_decrmnt number for_alternative">
                                                            <span class="minus">-</span>
                                                            <input type="text" value="1" />
                                                            <span class="plus">+</span>
                                                        </div>
                                                    </div>
                                                    <div class="card_row_3">
                                                        <span class="est">Est Duration</span>
                                                        <div class="incremnt_decrmnt number for_alternative">
                                                            <span class="minus">-</span>
                                                            <input type="text" value="1" />
                                                            <span class="plus">+</span>
                                                        </div>
                                                    </div>
                                                    <div class="btn_text">
                                                        <p class="text_3">This would equal.... <span
                                                                class="price">$0</span>
                                                            on the
                                                            average <span class="area">1,500 sq</span> ft home</p>
                                                        <button class="btn_blue">Save</button>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="card-second-content">
                                                    <div class="card_row_3">
                                                        <span class="est">Price per sq ft (in USD)</span>
                                                        <div class="incremnt_decrmnt number for_alternative">
                                                            <span class="minus">-</span>
                                                            <input type="text"
                                                                value="{{ $item->cleaner_service->price }}"
                                                                id="price-{{ $item->cleaner_service->id }}" />
                                                            <span class="plus">+</span>
                                                        </div>
                                                    </div>
                                                    <div class="card_row_3">
                                                        <span class="est">Est Duration</span>
                                                        <div class="incremnt_decrmnt number for_alternative">
                                                            <span class="minus">-</span>
                                                            <input type="text"
                                                                value="{{ $item->cleaner_service->duration }}"
                                                                id="duration-{{ $item->cleaner_service->id }}" />
                                                            <span class="plus">+</span>
                                                        </div>
                                                    </div>
                                                    <div class="btn_text">
                                                        <p class="text_3">This would equal.... <span
                                                                class="price">${{ $item->cleaner_service->priceForSqFt(1500) }}</span>
                                                            on the
                                                            average <span class="area">1,500 sq</span> ft home</p>
                                                        <button class="btn_blue"
                                                            onclick="updateCleanerService('{{ $item->cleaner_service->id }}')">Save</button>
                                                    </div>
                                                </div>
                                            @endif
                                            <!-- Service item expanded content ended -->
                                        </div>
                                        <!-- Service item end -->

                                </div>
                @endforeach
<!-- Services end -->

@if ( $newCustomServiceCardOpen && $service->does_offer_customization )

<!-- Custom service card -->
<div class="col-12">
    <div class="card_collapse_service common_card_service show show-2">
        <div class="heder_row">
            <div class="form-grouph input-design mb-2 w-75">
                <input placeholder="Enter Service Name" id="custom-service-title">
            </div>    
        </div>
        <div class="card-second-content">
           <div class="card_row_3">
            <span class="est">Price (in USD)</span>
            <div class="incremnt_decrmnt number for_alternative">
            <span class="minus">-</span>
            <input type="text" value="1" id="custom-service-price">
            <span class="plus">+</span>   
        </div>
        </div>
        <div class="card_row_3">
            <span class="est">Est Duration</span>
            <div class="incremnt_decrmnt number for_alternative">
                <span class="minus">-</span>
                <input type="text" value="1" id="custom-service-duration">
                <span class="plus">+</span>   
            </div>
        </div>
        <div class="card_row_3">
            <span class="est">Frequency</span>
            <div class="incremnt_decrmnt number for_alternative w-100">
                Allow recurring job?

                <div class="" style="width: 100%">
                    <input class=""  type="checkbox"  id="custom-service-recurring">
                </div>
            </div>
        </div>
        <div class="btn_text">
        {{-- <p class="text_3">This would equal.... <span class="price">$300</span> on the average <span class="area">1,500 sq</span> ft home</p> --}}
        <button class="btn_blue" onclick="addCustomService('{{ $service->id }}')">Save</button>
        </div>
        </div>
    </div>
   </div>
<!-- Custom service card end -->
@endif
@if ( $service->does_offer_customization )
<!-- Add custom service -->
<div class="col-12"><button class="btn_blue mx-md-2  my-2" wire:click="$toggle('newCustomServiceCardOpen')">{{ $newCustomServiceCardOpen ? 'Cancel' : 'Add service' }}</button></div>
<!-- Add custom service -->
@endif 
            </div>
            <!-- Service items end -->
            
            <!--- Included -->
            <div class="col-md-6 ">

                <div class="card_header_tittle pt-0">
                    <h3 style="color:var(--primary)" class="link-design-2"><svg style="height: 1rem;"
                            class="svg-inline--fa fa-pen-to-square pe-2" aria-hidden="true" focusable="false"
                            data-prefix="fas" data-icon="pen-to-square" role="img"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                            <path fill="currentColor"
                                d="M490.3 40.4C512.2 62.27 512.2 97.73 490.3 119.6L460.3 149.7L362.3 51.72L392.4 21.66C414.3-.2135 449.7-.2135 471.6 21.66L490.3 40.4zM172.4 241.7L339.7 74.34L437.7 172.3L270.3 339.6C264.2 345.8 256.7 350.4 248.4 353.2L159.6 382.8C150.1 385.6 141.5 383.4 135 376.1C128.6 370.5 126.4 361 129.2 352.4L158.8 263.6C161.6 255.3 166.2 247.8 172.4 241.7V241.7zM192 63.1C209.7 63.1 224 78.33 224 95.1C224 113.7 209.7 127.1 192 127.1H96C78.33 127.1 64 142.3 64 159.1V416C64 433.7 78.33 448 96 448H352C369.7 448 384 433.7 384 416V319.1C384 302.3 398.3 287.1 416 287.1C433.7 287.1 448 302.3 448 319.1V416C448 469 405 512 352 512H96C42.98 512 0 469 0 416V159.1C0 106.1 42.98 63.1 96 63.1H192z">
                            </path>
                        </svg><!-- <i class="fas fa-edit pe-2"></i> Font Awesome fontawesome.com -->Edit
                        "What's Included"</h3>
                </div>

                <div class="form-grouph textarea-design mb-2">
                    <textarea id="description-service-{{ $service->id }}"
                        placeholder="Please enter what your services include for the various services offered by you.">{{ $service->cleaner_service_description->description ?? '' }}</textarea>
                </div>

                <button class="btn_blue" onclick="storeServiceDescription('{{ $service->id }}')">Save</button>
                <div class="stng_price">
                    <h3><img src="https://canarycleaners.smallbizplace.com/assets/images/icons/!!.svg">Setting
                        Prices</h3>
                    <p><i>Set Prices at the</i> <b>square foot level </b> ensure simple and consistent
                        pricing.
                        You can see what that price will equal for an average 1,500 sq ft 3 bed 2 bath home
                        above the “Save” button.</p>
                </div>
                <div class="stng_price">
                    <h3><img src="https://canarycleaners.smallbizplace.com/assets/images/icons/!!.svg">
                        Setting
                        Est. Durations</h3>
                    <p><i>Set Estimated Duration based on how long you would expect a </i><b>standard 1,500
                            sq
                            ft home </b> <i> to take <i style="text-decoration:underline;">on
                                average</i></i>.
                        Time and price quotes for customers are then <i>automatically generated </i> on the
                        customer’s unique home size.
                    </p>
                    <p><i> Time and price changes for individual customers can be updated from your
                            schedule.</i></p>
                </div>

            </div>
            <!--- Included end -->

    </div>
    <!-- Info End  -->

</div>
<!-- Service end -->

</div>


@endforeach

@if ($loop->iteration === 1)
    <!-- Discounts -->
    <div class="home-quotes-sec">
        <div class="bigger-home-save-link">
            <a href="#" class="link-design-2 py-3"> Bigger homes save you time on travel and setup. We recommend
                offering sq ft discounts to large and extra-large sized homes. Standard discounts are 10% and 20%.</a>
        </div>
        <div class="home-discount-counter">
            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12">
                @foreach ($discounts as $discount)
                    <div class="incremnt_input_div py-3">

                        <div class="incremnt_decrmnt number">
                            <input type="text" value="{{ $discount->cleaner_discount->discount ?? '0' }}"
                                onchange="upsertDiscountPercentage( '{{ $discount->id }}', this.value )">
                            <span class="plus">+</span>
                            <span class="minus">-</span>
                        </div>
                        <h5>{{ $discount->title }}</h5>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="btn_text_service">
            <p>A note about Est Durations: We recommend you start on the higher side and lower if you find you are
                completing jobs faster. Find a rule-of-thumb guide <a href="#" class="link-design-2">here.</a>
            </p>
        </div>
    </div>
    <!-- Discounts end -->
@endif
</div>
<!-- Type-Service-Items block end -->
@endforeach

</div>
<script>

    function addFunctionalityInMinusAndPlusButton()
    {

        $(".minus").unbind('click');
        $(".plus").unbind('click');

        $('.minus').click(function() {
            var $input = $(this).parent().find('input');
            var count = parseInt($input.val()) - 1;
            count = count < 1 ? 1 : count;
            $input.val(count);
            $input.change();
            return false;
        });
        
        $('.plus').click(function() {
            var $input = $(this).parent().find('input');
            var count = parseInt($input.val()) + 1;
            $input.val(count);
            $input.change();
            return false;
        });
    }


    function updateCleanerService(cleanerServiceId) {
        let price = document.getElementById(`price-${cleanerServiceId}`).value;
        let duration = document.getElementById(`duration-${cleanerServiceId}`).value;
        @this.call('updateCleanerService', cleanerServiceId, {
            price,
            duration
        });
    }

    function updateActiveServiceItemsIds() {
        let activeServcieItemsIds = [];

        $(".show-2").map((index, elem) => {
            let serviceItemId = $(elem).attr('data-service-item-id');
            activeServcieItemsIds.push(serviceItemId);
        });

        @this.set('activeServiceItemsIds', activeServcieItemsIds);
    }

    function storeServiceDescription(serviceId) {
        let description = document.getElementById(`description-service-${serviceId}`).value;
        @this.call('storeServiceDescription', serviceId, description);
    }

    function upsertDiscountPercentage(discountId, percentage) {
        @this.call('upsertDiscount', discountId, percentage)
    }

    function addCustomService(service_id)
    {
        let title = document.getElementById('custom-service-title').value;
        let price = document.getElementById('custom-service-price').value;
        let duration = document.getElementById('custom-service-duration').value;
        let recurring = document.getElementById('custom-service-recurring').checked;

        @this.call( 'storeCustomServiceItem', service_id, { title, price, duration, recurring });

    }
    function makeCardsToggleable()
    {
        $(".common_card_service .form-switch").unbind('click');
        $(".card_toggle_s").unbind('click');
        $('.heading-toggle').unbind('click');
        $(".common_card_service .form-switch").click(function() {
            $(this).parents('.common_card_service').toggleClass("show");
            $(this).parents('.common_card_service').removeClass("show-2");
            let itemId = $(this).attr('data-item-id');
            @this.call('toggleService', itemId);
            if ($(this).parents('.card_service_row').find(".common_card_service").hasClass('show')) {
                $(this).parents('.card_service_row').find(".heading-toggle").addClass('active-toggle');
            } else {
                $(this).parents('.card_service_row').find(".heading-toggle").removeClass(
                    'active-toggle');
            }
        });
        $(".card_toggle_s").click(function() {
            $(this).parents('.common_card_service').toggleClass("show-2");
            updateActiveServiceItemsIds();
        });

        $('.heading-toggle').click(function() {
            $(this).toggleClass('active-toggle');
            if ($(this).parents('.card_service_row').find(".common_card_service").hasClass('show')) {
                $(this).parents('.card_service_row').find(".common_card_service").removeClass('show');
            } else {
                $(this).parents('.card_service_row').find(".common_card_service").addClass('show');
            }
        });
        $('.heading-toggle').click(function() {
            if ($(this).parents('.card_service_row').find(".common_card_service").hasClass('show-2')) {
                $(this).parents('.card_service_row').find(".common_card_service").removeClass('show-2');
            }
        });
    }

    $(document).ready(function() {
        makeCardsToggleable();
        addFunctionalityInMinusAndPlusButton();    
    });

    window.addEventListener('componentRendered', () => {
        makeCardsToggleable();
        addFunctionalityInMinusAndPlusButton();

    })

</script>
</div>
