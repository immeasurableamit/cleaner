@php
$days = \App\Models\User::getDays();
@endphp


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
                            <span>from</span>
                            <span class="d-block d-lg-none">-</span>
                            <span>to</span>
                        </div>
                        <div class="y_text add">
                            <span></span>
                        </div>
                    </div>
                    <div class="availability_sheet">

                        @foreach($days as $day)
                            @php
                            $hours = $user->cleanerHours()->where('day', $day)->get();
                            @endphp

                        <div class="availbility_cover {{ $day }} {{ count($hours)>0 ? 'show' : '' }}">
                            <div class="availability_row">

                                <div class="btn_switch">
                                    <div class="form-check form-switch form-design-switch-1" data-day="{{ $day }}">
                                        <input class="form-check-input" type="checkbox" name="day[{{$day}}][selected]" {{ count($hours)>0 ? 'checked' : '' }}>
                                        <label class="form-check-label d-none d-md-block" for="">{{ $day }}</label>
                                        <label class="form-check-label d-block d-md-none" for="">{{ $day }}</label>
                                    </div>
                                </div>


                                <div class="time_input">
                                    <div class="addNewHoursLayout {{ $day }}  time-schedule-addon">

                                        @if(count($hours)>0)
                                        @foreach($hours as $i => $hour)
                                        @php
                                        $j = $i+1;
                                        @endphp
                                        <div class="time-input-addon layout layout-{{$j}}">

                                            {!! Form::hidden('day['.$day.'][data]['.$j.'][id]', @$hour->id) !!}

                                            {!! Form::hidden('day['.$day.'][data]['.$j.'][delete]', 'no', ['class'=>'delete']) !!}

                                            {!! Form::time('day['.$day.'][data]['.$j.'][from_time]', @$hour->from_time ?? null, ['class' => ($errors->has('from_time') ? ' is-invalid' : '')]) !!}
                                            <span class="d-none d-md-inline">-</span>
                                            {!! Form::time('day['.$day.'][data]['.$j.'][to_time]', @$hour->to_time ?? null, ['class' => ($errors->has('to_time') ? ' is-invalid' : '')]) !!}

                                            @if($i>0)
                                            <button type="button" class="border-0 bg-none btn-empty deleteLayout" data-day="{{ $day }}" data-id="{{$j}}">
                                                <img src="{{ asset('assets/images/icons/delete_2.svg') }}">
                                            </button>
                                            @endif
                                        </div>
                                        @endforeach
                                        @else
                                        <div class="time-input-addon layout layout-1">
                                            {!! Form::time('day['.$day.'][data][1][from_time]', null, ['class' => ($errors->has('from_time') ? ' is-invalid' : '')]) !!}
                                            <span class="d-none d-md-inline">-</span>
                                            {!! Form::time('day['.$day.'][data][1][to_time]', null, ['class' => ($errors->has('to_time') ? ' is-invalid' : '')]) !!}
                                        </div>
                                        @endif

                                    </div>
                                </div>
                                <div class="add_more">
                                    <button type="button" class="border-0 bg-none add-time-slots" data-day="{{ $day }}">+</button>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                    <button type="submit" class="btn_blue mt-4">Save</button>
                </div>
            </div>
        </div>
    </form>
</div>
