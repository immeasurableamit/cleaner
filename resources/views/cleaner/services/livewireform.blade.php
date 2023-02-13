<div class="card_collapse_service common_card_service {{$item['checked']?'show':''}} {{ $item['toogle'] ? 'show-2' : '' }}">
    <div class="heder_row">
        @if($item['custom'])
            @if($item['toogle'])
            <div class="form-grouph input-design mb-2">
                <input wire:model="serviceData.{{$t}}.services.{{$s}}.items.{{$i}}.title" placeholder="Enter Service Name">
            </div>
            @else
            <h3>{{ $item['title'] }}</h3>
            @endif
        @else
        <h3>{{ $item['title'] }}</h3>
        @endif

        <div class="form-check form-switch body heading-toggle {{$item['checked']?'active-toggle':''}}">

        	<input class="check form-check-input" wire:model="serviceData.{{$t}}.services.{{$s}}.items.{{$i}}.checked" type="checkbox">

        </div>
    </div>
    <h1>fhdgkjfdhgk</h1>
    <div class="card-edit-content">
        <p class="price-area-text"><span class="price_span">${{@$item['price']}}</span> <span class="area_span">per sq ft</span></p>
        <p class="time">{{@$item['duration']}} hrs</p>
        <p class="card_toggle_s" wire:click="showService({{$t}}, {{$s}}, {{$i}})">Edit</p>
    </div>
    <div class="card-second-content">
        <div class="card_row_3">
            <span class="est">Price / sq ft (USD)</span>
            <div class="incremnt_decrmnt number for_alternative">
                <span class="minus" wire:click="servicePrice({{$t}}, {{$s}}, {{$i}}, 'minus')">-</span>
                <input type="text" wire:model="serviceData.{{$t}}.services.{{$s}}.items.{{$i}}.price">

                <span class="plus" wire:click="servicePrice({{$t}}, {{$s}}, {{$i}}, 'plus')">+</span>
            </div>
        </div>
        <div class="card_row_3">
            <span class="est">Est Duration (Hours)</span>
            <div class="incremnt_decrmnt number for_alternative">
                <span class="minus" wire:click="serviceDuration({{$t}}, {{$s}}, {{$i}}, 'minus')">-</span>
                <input type="text" wire:model="serviceData.{{$t}}.services.{{$s}}.items.{{$i}}.duration">
                <span class="plus" wire:click="serviceDuration({{$t}}, {{$s}}, {{$i}}, 'plus')">+</span>
            </div>
        </div>
        @if($item['custom'])
        <div class="card_row_3">
            <span class="est">Frequency</span>
            <div class="incremnt_decrmnt number for_alternative">
                Allow recurring job?

                <div class="form-check form-switch body heading-toggle {{$item['is_recurring']?'active-toggle':''}}">
                    <input class="check form-check-input" wire:model="serviceData.{{$t}}.services.{{$s}}.items.{{$i}}.is_recurring" type="checkbox">
                </div>
            </div>
        </div>
        @endif
        <?php
        $price = 1500 *@$item['price'];
        ?>
        <div> <p>Your quote would be <b>$ {{ $price}} </b>for a customer with a 1,500 sq ft 3 bed 2 bath home </p> </div>
        <div class="btn_text">
            <button type="button" class="btn_blue" wire:click="saveData">Save</button>
        </div>
    </div>
</div>
