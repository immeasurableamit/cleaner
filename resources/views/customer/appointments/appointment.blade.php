@extends('layouts.app')

@section('content')

<h1>Working....................</h1>
<div>
    <!-- <label>Date</label> -->
    <input type="text" name="date_time" id="date_time" hidden></input>

</div>

<div>


    {{-- @if($date)   --}}
    <div class="date_show">
        <div class="d_text">
            <span class="bg_yellow">Date:</span>

        </div>
        <p class="d-none d-md-block">Future recurring cleanings will be scheduled in the nearest availabel time slot. Please contact your cleaner if you need to reschedule any cleanings.</p>
    </div>
    <div class="row block_start_time">
        <div class="col-md-3 select-design">
            <div class="selecti-box">
                <select class="select-custom-design" id="time-selector">
                    <option>select option</option>


                    {{-- <option value="{{ date('H:i:s', strtotime() }}"> time option select</option> --}}
                    {{-- <option value="{{ date('H:i:s', strtotime($slot['time'])) }}" {{ $slot['is_free']=='no' ? 'disabled' : '' }}>{{ $slot['time'] }}</option> --}}

                </select>
            </div>
        </div>
        @error ('time') <span class="help-block text-danger">{{ $message }}</span> @enderror
    </div>
{{-- @endif  --}}

    <div class="d-flex two-column justify-content-spacebw">
        <a href="{{route('customer.appointment.updateScheduleAppointment')}}" class="btn btn-primary"> Update</a>
        <a href="{{route('customer.appointment.index')}}" class="btn btn-primary">Back</a>
    </div>
</div>

<!--  -->






<script src="https://cdn.jsdelivr.net/npm/litepicker/dist/litepicker.js"></script>
<script>
    function init() {
        // debugger;
        var $dayArray = @json($dayArray);
        // console.log($dayArray);

        const picker = new Litepicker({

            element: document.getElementById('date_time'),
            numberOfMonths: 3,
            numberOfColumns: 3,
            inlineMode: true,
            lockDaysFilter: (day) => {
                const d = day.getDay();

                if (!$dayArray.includes(d)) {

                    return true;
                }

                return false;
            },

            setup: (picker) => {

                picker.on('selected', (date) => {

                    console.log(date, 'aman');

                });
            },


        });

    }

    window.addEventListener('load', () => {

        init();
    });
</script>

@endsection