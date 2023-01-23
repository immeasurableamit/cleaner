<div class="team_services">
<div class="services-alternate-wrap-sec">
        <div class="alternative-service-block">
            
            @foreach($serviceData as $t => $type)

            <div class="alternate-service-header">
                <div class="row">
                    <div class="col-xl-6 col-md-6 col-sm-12">
                        <div class="home_cleaning_div">
                            <div class="card_header_tittle">
                                <h3>{{ $type['title'] }}</h3>
                                <p> enter your rate to match what you would charge
                                for 1,500 sq ft - prices will scale up or down from there</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- One Time Row -->
            <div class="card_service_row">
                <div class="row pb-3">
                    @foreach(@$type['services'] as $s => $service)
                    <div class="col-xl-6 col-md-6 col-sm-12">
                        <div class="btn_header_service py-3">
                            <h4 class="mb-0 btn_blue">{{ $service['title'] }}</h4>
                            <div class="form-check form-switch heading heading-toggle {{$service['checked']=='on'?'active-toggle':''}}">
                            <input class="check form-check-input" wire:model="serviceData.{{$t}}.services.{{$s}}.checked" wire:click="serviceAction({{$t}}, {{$s}})" type="checkbox">
                        </div>
                        </div>

                      
                        
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            @if(@$service['items'])
                            @foreach($service['items'] as $i => $item)

                                @include('cleaner.services.livewireform')
                               
                            @endforeach
                            @endif

                            @if($service['home_discount']=='1')

                                @if($discounts)
                                @foreach($discounts as $discount)
                                <div class="card_row_3">
                                    <span class="est">{{$discount->title}}</span>
                                    <div class="incremnt_decrmnt number for_alternative">
                                        <span class="minus" wire:click="discountAction({{$discount->id}}, 'minus')">-</span>
                                        <input type="text" wire:model="discountData.{{$discount->id}}.discount">
                                        <span class="plus" wire:click="discountAction({{$discount->id}}, 'plus')">+</span>
                                    </div>
                                    @error ('discountAction.'.$discount->id.'.discount') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                @endforeach
                                <button class="btn btn-success btn-sm" wire:click="discountStore">Save</button>
                                @endif
                            @endif

                            @if($service['title']=='Custom Offerings')
                                <button type="button" wire:click="addServices({{$t}}, {{$s}})">+ Add Services</button>
                            @endif
                        </div>
                        <div class="col-md-6 what_included">

                            <div class="card_header_tittle pt-0">
                                <h3>Edit "What's Included"</h3>
                            </div>

                            <div class="form-grouph textarea-design mb-2">
                                <textarea wire:model="included.{{$service['id']}}.data" placeholder="Describe what's included"></textarea>
                                @error ('included.'.$service["id"].'.data') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <button class="btn_blue" wire:click="storeIncluded">Save</button>

                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach


            <button type="button" class="btn_blue" wire:click="saveData">Submit</button>

        </div>
    </div>
</div>
