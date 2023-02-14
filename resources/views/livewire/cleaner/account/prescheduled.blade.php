<div>
    <div class="prescheduled_section">
        <div class="form-headeing-second py-3">
            <h4 class="border-0">Prescheduled Off-Time</h4>
            {{-- <a href="#" class="link-design-2">View common holidays around the world</a> --}}
            </div>

          <div class="row ">
            <div class="col-lg-12 col-xl-9 col-sm-12 col-md-12">
                @foreach($offTime as $time)
                <div class="row prescheduled_row">
                    <div class="col-md-6 col-5">
                        <label>{{ date('F d, Y', strtotime($time->date)) }}</label>
                    </div>
                    <div class="col-md-6 col-7 p-0">
                       <span>{{ @$time->from_time ? date('h:ia', strtotime($time->from_time)).' - '.date('h:ia', strtotime($time->to_time)) : 'All Day' }}</span>
                       <button type="button" class="border-0 bg-none btn_delete" wire:click="delete({{$time->id}})"><img src="{{ asset('assets/images//icons/delete_2.svg') }}"></button>
                    </div>
                </div>
                @endforeach



                <div class="prescheduled_off-time">
                @foreach($dataArray as $i => $data)

                <div class="append_row_preschduled row pb-2">
                    <div class="col-md-4 col-sm-12">
                        <div class="input-design">
                           {{-- <input type="date" min="{{date('Y-m-d')}}" wire:model="dataArray.{{$i}}.date"> --}}

                            <input type="date" min="{{date('m-d-y')}}" wire:model="dataArray.{{$i}}.date" name="begin"
        placeholder="mm-dd-yyyy" value="">
                            @error('dataArray.'.$i.'.date')<div class="alert ">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-12">
                        <div class="preschedule-time-details">
                            <input type="time" wire:model="dataArray.{{$i}}.from_time">
                            @error('dataArray.'.$i.'.from_time')<div class="alert ">{{ $message }}</div>@enderror
                            <span class="slash">-</span>
                            <input type="time" wire:model="dataArray.{{$i}}.to_time">
                            @error('dataArray.'.$i.'.to_time')<div class="alert ">{{ $message }}</div>@enderror

                            @if($i==0)
                            <button class="btn_c" type="button" wire:click="addLayout">Add</button>
                            @else
                            <button class="btn_c" type="button" wire:click="removeLayout({{$i}})">Remove</button>
                            @endif
                        </div>
                    </div>
                </div>

                @endforeach
                </div>



            </div>

          </div>
          <button class="btn_blue mt-4" type="button" wire:click="store">Save</button>
     </div>
</div>
