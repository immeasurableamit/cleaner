<div class="card_collapse_service common_card_service item_{{ $item->id }} {{@$showClass}}">
    <div class="heder_row">
        <h3>{{ $item->title }}</h3>
        <div class="form-check form-switch body heading-toggle" data-service="{{$service->id}}" data-item="{{$item->id}}">

        @if ( ! $cservice ) 
            <input class="check form-check-input" name="service[{{$service->id}}][item][{{$item->id}}][checked]" type="checkbox">
        @else
            <input class="check form-check-input" name="service[{{$service->id}}][item][{{$item->id}}][checked]" type="checkbox" {{@$cservice->status == '1' ? 'checked' : ''}}>
        @endif
            <input class="check form-check-input" name="service[{{$service->id}}][item][{{$item->id}}][id]" value="{{ $item->id }}" type="hidden">
        </div>
    </div>
    <div class="card-edit-content">
        <p class="price-area-text"><span class="price_span">${{@$cservice->price ?? '1'}}</span> <span class="area_span">per sq ft</span></p>
        <p class="time">{{@$cservice->duration ?? '1'}} hrs</p>
        <p class="card_toggle_s" data-item="{{$item->id}}">Edit</p>
    </div>
    <div class="card-second-content">
        <div class="card_row_3">
            <span class="est">Price per sq ft (in USD)</span>
            <div class="incremnt_decrmnt number for_alternative">
                <span class="minus">-</span>
                <input type="text" value="{{@$cservice->price ?? '1'}}" name="service[{{$service->id}}][item][{{$item->id}}][price]">
                <span class="plus">+</span>
            </div>
        </div>
        <div class="card_row_3">
            <span class="est">Est Duration</span>
            <div class="incremnt_decrmnt number for_alternative">
                <span class="minus">-</span>
                <input type="text" value="{{@$cservice->duration ?? '1'}}" name="service[{{$service->id}}][item][{{$item->id}}][duration]">
                <span class="plus">+</span>
            </div>
        </div>
        <div class="btn_text">
            {{--<p class="text_3">{{ $item->description }}</p>--}}
            <button type="submit" class="btn_blue">Save</button>
        </div>
    </div>
</div>
