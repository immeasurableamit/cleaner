<div>
    <div class="customer-avatar-upload-div">
        <div class="customer-avatar-upload">
            <div class="customer-avatar-edit">
                <input type='file' id="upload" accept=".png, .jpg, .jpeg" />
                <label for="upload">Upload a Profile Pic</label>
            </div>
            <div class="customer-avatar-preview position-relative">

            @if ( $user->image )
                <div id="uploaded" style='background-image: {{ url("/storage/images/$user->image") }}'>
                    <img src="{{ asset('storage/images/'.$user->image) }}" id="customerimagePreview">

                    <a href="javascript::void(0)" onclick="uploadImgViaLivewire('{{ $user->id }}')" ><i class="fas fa-save"></i></a>

                </div>
            @else
                <div id="uploaded" style="background-image: {{ asset('/assets/images/iconshow.png') }}">
                    <img src="{{ asset('/assets/images/iconshow.png') }}" id="customerimagePreview">
                    <a href="javascript::void(0)" onclick="uploadImgViaLivewire('{{ $user->id }}')" ><i class="fas fa-save"></i></a>
                </div>
            @endif
            </div>


            <div class="lawyer_profile-img mb-3">
                    <!-- <div class="circle" id="uploaded">
                                                        <img class="profile-pic" src="">
                                                    </div> -->
                    <div class="p-image">
                        <!-- <span class="pencil_icon"><i class="fa-solid fa-pencil upload-button"></i></span> -->
                        <!-- <input class="file-upload" id="upload" type="file" accept="image/*" /> -->
                        <input type="hidden" name="image" id="upload-img">
                    </div>
                </div>

        </div>
        <div class="h3-p-design">
            <h3>Profile Photo</h3>
            <p>Upload a New Profile Photo.</p>
        </div>
    </div>
    <div class="h4-design">
        <h4>Account Information</h4>
    </div>
    <div class="customer-account-information cleaner_account_2 mt-4">
        <ul class="list-unstyled">
            <li class="d-flex justify-content-spacebw two_column">
                <h6 class="title-label">Name:</h6>
                <p class="name">{{@$user->name}}</p>
                <div class="action-block">
                </div>
            </li>

            <li class="position-relative">
                <form class="d-flex justify-content-spacebw three_column edit_frm">
                    <h6 class="title-label">Phone:</h6>
                    @if (@$fieldStatus == true && $action == 'contact_number')
                    <input type="number" value="{{$user->contact_number}}" wire:model="contact_number" />
                    <span style="color:red"> @error('contact_number'){{$message}} @enderror </span>
                    <span class="edit"><a class="link-design-2" wire:click="update('contact_number')"><i class="fas fa-save"></i></a></span>
                    <span class="cancel"><a href="javascript::void(0)" class="link-design-2" wire:click="cancle"><i class="fas fa-times"></i></a></span>
                    @else
                    <p class="phone"><a href="tel:+1 512-559-9582">{{@$user->contact_number}}</a></p>
                    <div class="action-block">
                        <span class="edit"><a href="javascript::void(0)" wire:click="edit('{{auth()->user()->id}}', 'contact_number')" class="link-design-2">Edit</a></span>
                    </div>
                    @endif
                </form>
            </li>

            <li class="position-relative">
                <form class="d-flex justify-content-spacebw three_column edit_frm">
                    <h6 class="title-label">Email:</h6>
                    @if (@$fieldStatus == true && $action == 'email')

                    <input type="email" value="{{$user->email}}" wire:model="email">
                    <span style="color:red"> @error('email'){{$message}} @enderror </span>
                    <span class="edit"><a class="link-design-2" wire:click="emailupdate('email')"><i class="fas fa-save"></i></a></span>
                    <span class="cancel"><a href="javascript::void(0)" class="link-design-2" wire:click="cancle"><i class="fas fa-times"></i></a></span>
                    @else
                    <p class="mail">{{$user->email}}</p>
                    <div class="action-block">
                        <span class="edit"><a href="javascript::void(0)" class="link-design-2" wire:click="edit('{{auth()->user()->id}}', 'email')">Edit</a></span>
                    </div>
                    @endif
                </form>
            </li>

            <li class="position-relative">
                <form class="d-flex justify-content-spacebw three_column edit_frm">
                    <h6 class="title-label">Service Address:</h6>
                    @if (@$fieldStatus == true && $action == 'address')
                    <input type="text" value="{{$user->UserDetails->address}}" wire:model="address" />
                    <span style="color:red"> @error('address'){{$message}} @enderror </span>
                    <span class="save-icn-btn"><a class="link-design-2" wire:click="update('address')"><i class="fas fa-save"></i></a></span>
                    <span class="cancel"><a href="javascript::void(0)" class="link-design-2" wire:click="cancle"><i class="fas fa-times"></i></a></span>
                    @else
                    <p>{{@$user->UserDetails->address}}</p>
                    <div class="action-block">
                        <span class="edit"><a href="javascript::void(0)" class="link-design-2" wire:click="edit('{{auth()->user()->id}}', 'address')">Edit</a></span>
                    </div>
                    @endif
                </form>
            </li>
          {{--  <li class="position-relative">
                <form class="d-flex justify-content-spacebw three_column edit_frm">
                    <h6 class="title-label"> Timezone:</h6>
                    @if (@$fieldStatus == true && $action == 'timezone')
                    <div class="time-zone-select-design">
                        <select wire:model="timezone" id="timezone-offset">
                            <option>Select Time Zone</option>
                            @foreach($timezones as $timezone)
                            <option value="{{$timezone->id}}">{{$timezone->name}}{{$timezone->current_utc_offset}}{{$timezone->is_currently_dst}}</option>
                            @endforeach
                        </select>
                    </div>
                    <span class="save-icn-btn"><a class="link-design-2" wire:click="update('timezone')"><i class="fas fa-save"></i></a></span>
                    <span class="cancel"><a href="javascript::void(0)" class="link-design-2" wire:click="cancle"><i class="fas fa-times"></i></a></span>
                    @else

                    <div class="time-zone-select-design">
                        <input type="text" value="{{@$user->userDetails->timeZone->name}}" disabled />
                    </div>
                    <div class="action-block">
                        <span class="edit"><a href="javascript::void(0)" class="link-design-2" wire:click="edit('{{auth()->user()->id}}', 'timezone')">Edit</a></span>
                    </div>
                    @endif

                </form>
            </li> --}}
        </ul>
    </div>
</div>
@section('script')

<script>
    function uploadImgViaLivewire(user_id)
    {

        var base64_string = $("#upload-img").val();
        console.log(base64_string, "rudra");
        var data = { user_id, base64_string };
        Livewire.emit('imgUploaded', data );
    }

</script>
@include('layouts.common.cropper')

@endsection
