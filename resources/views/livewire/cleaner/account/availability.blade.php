<div>


    <div class="gernal-availity-sec">
        <form action="{{ route('cleaner.availability.time') }}" method="post">
        @csrf
            <div class="row">
                <div class="col-xl-10 col-lg-12 col-md-12">
                    <div class="form-headeing-second gernal-availity-heading">
                        <h4 class="border-0">General Availability</h4>
                    </div>
                    <div class="form_availibility">
                        <div class="yellow_header_availibility">

                            <div class="y_text day_of_weak">
                                <span>Day of Week</span>
                            </div>
                            <div class="y_text from_to">
                                <span>From</span>
                                <span class="d-block d-lg-none">-</span>
                                <span>To</span>
                            </div>
                            <div class="y_text add">
                                <span style="visibility:hidden;">Add</span>
                            </div>
                            <div class="y_text delete">
                                <span style="visibility: hidden;">Delete</span>
                            </div>
                        </div>
                        <div class="availability_sheet">

                            @foreach($days as $day => $dat)
                            <div class="availbility_cover {{ $day }} {{ $dat['selected'] ? 'show' : '' }}">
                                <div class="availability_row">

                                    <div class="btn_switch">
                                        <div class="form-check form-switch form-design-switch-1" data-day="{{ $day }}">
                                            <input class="form-check-input" type="checkbox" wire:model="days.{{$day}}.selected">
                                            <label class="form-check-label d-none d-md-flex" for="">{{ $day }}</label>
                                            <label class="form-check-label d-flex d-md-none" for="">{{ $day }}</label>
                                        </div>
                                    </div>


                                    <div class="time_input">
                                        <div class="time-schedule-addon">

                                            @foreach($dat['data'] as $i => $data)

                                            @if(@$data['delete']=='no')
                                            <div class="time-input-addon">
                                                <input type="time" wire:model="days.{{$day}}.data.{{$i}}.from_time">

                                                @error('days.'.$day.'.data.'.$i.'.from_time')<div class="alert d-inline">{{ $message }}</div>@enderror
                                                <span class="d-none d-md-inline">-</span>
                                                <input type="time" wire:model="days.{{$day}}.data.{{$i}}.to_time">
                                                @error('days.'.$day.'.data.'.$i.'.to_time')<div class="alert d-inline to">{{ $message }}</div>@enderror

                                                @if($i>0)
                                                <button type="button" class="border-0 bg-none btn_deleter" wire:click="deleteLayout('{{$day}}', '{{$i}}')">
                                                    <img src="{{asset('assets/images/icons/delete_2.svg')}}">
                                                </button>
                                                @endif
                                            </div>
                                            @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="add_more">
                                        <button type="button" class="border-0 bg-none add-time-slots" wire:click="addLayout('{{$day}}')">+</button>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                        <button type="button" wire:click="store" class="btn_blue mt-4">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>
