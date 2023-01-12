<div>
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
                <div class="row">
                    @foreach(@$type['services'] as $s => $service)
                    <div class="col-xl-6 col-md-6 col-sm-12">
                        <div class="btn_header_service py-3">
                            <h4 class="mb-0 btn_blue">{{ $service['title'] }}</h4>
                        </div>

                        <div class="form-check form-switch heading heading-toggle {{$service['checked']=='on'?'active-toggle':''}}">
                            <input class="check form-check-input" wire:model="serviceData.{{$t}}.services.{{$s}}.checked" wire:click="serviceAction({{$t}}, {{$s}})" type="checkbox">
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            @foreach($service['items'] as $i => $item) 

                                @include('cleaner.services.livewireform')
                               
                            @endforeach
                        </div>
                        <div class="col-md-6">
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
