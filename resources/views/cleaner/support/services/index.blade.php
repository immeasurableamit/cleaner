@extends('layouts.cleanerapp')
@section('content')
<section class="light-banner customer-account-page" style="background-image: url('../assets/images/white-pattern.png')">
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
                            <a href="{{ route('index') }}"><img src="{{asset('assets/images/logo/logo.svg')}}"></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 no-padd">

                    <div class="row no-mrg">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 no-padd cleaner_availability_section">
                            <div class="customer-account-forms ">
                                <div class="form-headeing-second border-bottom pb-3 top_heading">
                                    <h3 class="mb-0">Your Services</h3>
                                </div>

                                <div class="service_text border-0">
                                    <p>Canary Clean makes it easy to get started! Enter your price and time estimates below to help us give prospective customers an idea of your time and costs.<b>Prices and times are automatically scaled and can be adjusted at any time. </b>  </p>
                                    <p>Remember - you will still review any jobs before accepting them, having the chance to raise or lower the price or estimated duration. You can also reach out to the customer at anytime before or after accepting.</p>
                                </div>
                                <h5 class="bg_ylow_h5">Offer Services, Set Prices, and Durations</h5>
                                <!-- home cleaning -->
                                <div class="services-alternate-wrap-sec">
                                    {!! Form::open(['route' => 'cleaner.services.post', 'method'=>'post']) !!}
                                        <div class="alternative-service-block">

                                            @foreach($types as $type)
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
                                            <!-- One Time Row -->
                                            <div class="card_service_row type_{{$type->id}}">
                                                <div class="row">
                                                    @foreach($type->services as $service)
                                                    <div class="col-xl-6 col-md-6 col-sm-12">
                                                        <div class="btn_header_service py-3">
                                                            <h4 class="mb-0 btn_blue">{{ $service->title }}</h4>
                                                        </div>

                                                        @if(in_array($service->id, $cservicesItems))
                                                            <div class="form-check form-switch heading heading-toggle active-toggle service_{{$service->id}}" data-service="{{$service->id}}">
                                                                <input class="check form-check-input" name="service[{{$service->id}}][checked]" type="checkbox" checked>
                                                            </div>
                                                        @else
                                                            <div class="form-check form-switch heading heading-toggle service_{{$service->id}}" data-service="{{$service->id}}">
                                                                <input class="check form-check-input" name="service[{{$service->id}}][checked]" type="checkbox">
                                                            </div>
                                                        @endif

                                                    </div>
                                                    <div class="row body_service_{{$service->id}}">
                                                        <div class="col-md-6">
                                                            @foreach($service->servicesItems as $i => $item)
                                                                @foreach($cservices as $j => $cservice)
                                                                    @if($j==$i)
                                                                    @if($cservice->services_items_id == $item->id)
                                                                    @include('cleaner.services.form', ['showClass'=>'show', 'cservice'=>$cservice])
                                                                    @else
                                                                    @include('cleaner.services.form')
                                                                    @endif
                                                                    @endif
                                                                @endforeach
                                                            @endforeach
                                                        </div>
                                                        <div class="col-md-6">
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            @endforeach


                                            <button type="submit" class="btn btn-success">Submit</button>

                                        </div>
                                    {!! Form::close() !!}
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


@section('script')
<script>
    $(document).ready(function(){
        $(".form-switch.heading").on('click', function(){

            var service = $(this).attr('data-service');

            $('.body_service_'+ service +' .common_card_service').removeClass("show-2");

            if($(this).find('input').prop('checked') == true){
                $('.heading-toggle.service_'+ service).addClass('active-toggle');
                $('.body_service_'+ service +' .common_card_service').addClass("show");
                $('.body_service_'+ service +' .common_card_service input.check').prop('checked', true);
            }
            else {
                $('.heading-toggle.service_'+ service).removeClass('active-toggle');
                $('.body_service_'+ service +' .common_card_service').removeClass("show");
                $('.body_service_'+ service +' .common_card_service input.check').prop('checked', false);
            }
        });

        $(".form-switch.body").on('click', function(){

            var service = $(this).attr('data-service');
            var item = $(this).attr('data-item');

            $('.item_'+ item +'.common_card_service').removeClass("show-2");

            if($(this).find('input').prop('checked') == true){
                $('.body_service_'+ service +' .common_card_service.item_'+item).addClass("show");

                $('.heading-toggle.service_'+ service).addClass('active-toggle');
                $('.heading-toggle.service_'+ service +' input.check').prop('checked', true);
            }
            else {
                $('.item_'+ item +'.common_card_service').removeClass("show");

                if (!$('.body_service_'+ service +' .common_card_service').hasClass('show')){
                    $('.heading-toggle.service_'+ service).removeClass('active-toggle');
                    $('.heading-toggle.service_'+ service +' input.check').prop('checked', false);
                }
            }
        });


        $(".card_toggle_s").on('click', function(){
            var item = $(this).attr('data-item');

            $('.common_card_service.item_'+item).toggleClass("show-2");
        });


       /* $('.heading-toggle').click(function() {
            $(this).toggleClass('active-toggle');
            if ($(this).parents('.card_service_row').find(".common_card_service").hasClass('show')){
                $(this).parents('.card_service_row').find(".common_card_service").removeClass('show');
            } else {
                $(this).parents('.card_service_row').find(".common_card_service").addClass('show');
            }
        });*/


      /*$(".card_toggle_s").click(function(){
        $(this).parents('.common_card_service').toggleClass("show-2");
      });
      $('.heading-toggle').click(function() {
            $(this).toggleClass('active-toggle');
            if ($(this).parents('.card_service_row').find(".common_card_service").hasClass('show')){
                $(this).parents('.card_service_row').find(".common_card_service").removeClass('show');
            } else {
                $(this).parents('.card_service_row').find(".common_card_service").addClass('show');
            }
        });
        $('.heading-toggle').click(function() {
            if ($(this).parents('.card_service_row').find(".common_card_service").hasClass('show-2')){
                $(this).parents('.card_service_row').find(".common_card_service").removeClass('show-2');
            }
        });*/


        $(document).ready(function() {
          $('.minus').click(function () {
            var $input = $(this).parent().find('input');
            var count = parseInt($input.val()) - 1;
            count = count < 1 ? 1 : count;
            $input.val(count);
            $input.change();
            return false;
          });
          $('.plus').click(function () {
            var $input = $(this).parent().find('input');
            $input.val(parseInt($input.val()) + 1);
            $input.change();
            return false;
          });
        });
    });
</script>
@endsection
