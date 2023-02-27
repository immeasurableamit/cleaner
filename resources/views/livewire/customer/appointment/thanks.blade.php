<!-- Checkout Page -->
<section class="light-banner build-checkout-page" style="background-image: url('/assets/images/white-pattern.png')">
    <div class="container">
        <!-- progressbar -->
        <ul id="progressbar">
            <li class="active">Summary</li>
            <li class="active">Payment Details</li>
            <li class="active">Order success</li>
        </ul>

        <fieldset>
            <!-- 3 -->
            <div class="final-steps-sec">
                <div class="row no-mrg">
                    <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 no-padd">
                        <div class="blue-bg-wrapper">
                            <div class="checkout_div">
                                <div>
                                    <h4>Checkout</h4>
                                    <p>Order risk free - You are protected by Canary Clean's<b> 100% Satisfaction
                                            Money Back Guarantee!</b> </p>
                                </div>
                            </div>
                            <div class="blue-logo-block text-center max-width-100">
                                <a href="#"><img src="/assets/images/logo/logo.svg"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 no-padd">
                        <div class="something_amazing_div">
                            <h3><span style="color:var(--primary);">Congrats!</span> Your cleaning is scheduled!
                            </h3>
                        </div>
                        <div class="built_text_div">
                            <div class="schedule-bock-search-img">
                                <div class="three_imgs text-center pb-2">
                                    <img src="/assets/images/3_step.png" class="img-fluid">
                                </div>
                            </div>
                            <div class="schedule-block-searccntnt">
                                <div class="schduled-text-div">
                                    <label class="schedule_label">Provider</label>
                                    <span class="schedule_value-text text-capitalize">{{ $order->cleaner->name }}</span>
                                </div>
                                <div class="schduled-text-div">
                                    <label class="schedule_label">Address</label>
                                    <span class="schedule_value-text">{{ $order->address }}</span>
                                </div>
                                <div class="schduled-text-div">
                                    <label class="schedule_label">Service</label>
                                    <span
                                        class="schedule_value-text">{{ $order->serviceOrderItem()->service_item->service->title }}
                                        - {{ $order->serviceOrderItem()->service_item->title }}</span>
                                </div>

                                @if (count($order->addonsOrderItems()) > 0)
                                    <div class="schduled-text-div">
                                        <label class="schedule_label">Addons</label>
                                        <span class="schedule_value-text">

                                            @foreach ($order->addonsOrderItems() as $addonOrderItem)
                                                {{ $addonOrderItem->service_item->title }}
                                                @if (!$loop->last)
                                                    ,
                                                @endif
                                            @endforeach
                                        </span>
                                    </div>
                                @endif


                                <div class="schduled-text-div">
                                    <label class="schedule_label">Start Date/Time</label>
                                    <span
                                        class="schedule_value-text">{{ $order->cleaning_datetime->toDayDateTimeString() }}</span>

                                    <div class="dropdown add_calender">
                                        <button class="bg-none dropdown-toggle link-design-2 no-hover" type="button" id="dropdownMenuButton1"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Add to calendar
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <a class="link-design-2" href="{{ $link->google() }}" target="_blank"><i
                                                    class="fa-brands fa-google"></i></a>

                                            <a class="link-design-2" href="{{ $link->webOffice() }}" target="_blank"> <i
                                                    class="fa-brands fa-microsoft"></i></a>

                                            <a class="link-design-2" href="{{ $link->ics() }}" target="_blank"><i
                                                    class="fa-brands fa-apple"></i> </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="schduled-text-div">
                                    <label class="schedule_label">Payment Method</label>
                                    <span
                                        class="schedule_value-text text-capitalize">{{ str_replace('_', ' ', $order->payment_method) }}</span>
                                </div>

                            </div>
                            <div class="sub-totel-text">
                                <div class="sub-totel-text-block">
                                    <p class="label">Subtotal</p>
                                    <p class="price">${{ $order->subtotal }}</p>
                                </div>
                                @if ( $order->discount > 0 )
                                <div class="sub-totel-text-block">
                                    <p class="label"><b>Discount -{{ $order->discount_title }} ({{ $order->discount_percentage }}%)</b></p>
                                    <p class="price">${{ $order->discount }}</p>
                                </div>
                                @endif
                                <div class="sub-totel-text-block">
                                    <p class="label">Tax</p>
                                    <p class="price">${{ $order->tax }}</p>

                                </div>
                                <div class="sub-totel-text-block">
                                    <p class="label">Transaction Fees</p>
                                    <p class="price">${{ $order->transaction_fees }}</p>
                                </div>
                                <div class="sub-totel-text-block">
                                    <p class="label"><strong>Total</strong></p>
                                    <p class="price"><strong>${{ $order->total }}</strong></p>
                                </div>
                            </div>
                            <div class="third_textarea_div">
                                <textarea placeholder="Notes for cleaner (optional).." class="" wire:model="notes"></textarea>
                            </div>

                            <div class="btn_nxt_prs">
                                <label for="next3" class="btn_b" wire:click="saveOrderNotes"><a
                                        href="{{route('messages')}}" style="color:#fff;">Message Provider</a></label>
                            </div>
                            <a  class="d-block pb-3">Please inform your provider about
                                any future changes or cancellations as soon as possible. </a>
                            <div class="py-3 border-top cancel_order_div">
                                <p>Something Wrong? <span class="cancel-order_span"><a href="javascript::void(0)"
                                            wire:click="alertConfirm({{ $order->id }})">Cancel order</a> and start again.</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="button" name="previous" class="d-none previous action-button" id="back3"
                value="Previous" />
            <input type="button" name="next" class="d-none next action-button" id="next3" value="Next" />
        </fieldset>
    </div>

</section>


 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js" ></script>


<script type="text/javascript">


// $(window).on('hashchange', function() {

//     var url = $(location).attr('href');
//     // Add a new history state and redirect to the home page
//     window.history.replaceState({url: "/" }, "", "/");
//     window.location.href = url;


// });


// $(document).ready(function() {

//     var url = $(location).attr('href');
//     console.log(url, 'urllll');

//   if (window.history && window.history.pushState) {

//     window.history.pushState('/home', null, url);
//     $(window).on('popstate', function() {
//       window.location.href = '/home';
//     });
//   }
// });

//

    // if (window.history && window.history.pushState) {

    //     $(window).on('popstate', function() {
    //         debugger;
    //         window.location = "{{ route('index') }}";
    //     });
    // }
// });

  </script>
