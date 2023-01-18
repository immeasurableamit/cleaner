<div>
    <div class="customer-account-forms">
        <div class="form-headeing-second mb-4">
            <h3 class="border-bottom pb-3">Account Info</h3>
        </div>
        <div class="customer-avatar-upload-div">
            <div class="customer-avatar-upload">
                <div class="customer-avatar-edit">
                    <input type='file' id="upload" accept=".png, .jpg, .jpeg" enctype="multipart/form-data" />
                    <label for="upload">Upload a profile pic</label>
                </div>
                <div class="customer-avatar-preview position-relative">
                    <div id="uploaded" style="background-image: url('/storage/images/$user->image');">
                        <img src="{{ asset('storage/images/'.$user->image) }}" id="customerimagePreview">
                        <a href="javascript::void(0)" onclick="uploadImgViaLivewire('{{ $user->id }}')"><i class="fas fa-save"></i></a>
                    </div>
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
                <p>Upload a new profile photo.</p>
            </div>
        </div>
        <div class="h4-design">
            <h4>Account Information</h4>
        </div>
        <div class="customer-account-information cleaner_account_2 mt-4">
            <ul class="list-unstyled">
                <li class="d-flex justify-content-spacebw two_column">
                    <h6 class="title-label">Name:</h6>
                    <p class="name">{{$user->first_name}}</p>
                </li>
                <li class="position-relative">
                    <div class="d-flex justify-content-spacebw three_column edit_frm">
                        <h6 class="title-label">Phone:</h6>
                        @if (@$fieldStatus == true && $action == 'contact_number')
                        <input type="number" value="{{$user->contact_number}}" wire:model="contact_number" />
                        <span class="edit"><a class="link-design-2" wire:click="updateData('contact_number')"><i class="fas fa-save"></i></a></span>
                        <span class="cancel"><a href="javascript::void(0)" class="link-design-2" wire:click="cancle"><i class="fas fa-times"></i></a></span>
                        @else
                        <p class="phone"><a href="tel:+1 512-559-9582">{{$user->contact_number}}</a></p>
                        <div class="action-block">
                            <span class="edit"><a href="javascript::void(0)" wire:click="editData('{{auth()->user()->id}}', 'contact_number')">Edit</a></span>
                        </div>
                        @endif
                    </div>
                </li>
                <li class="position-relative">
                    <div class="d-flex justify-content-spacebw three_column edit_frm">
                        <h6 class="title-label">Email:</h6>
                        @if (@$fieldStatus == true && $action == 'email')
                        <input type="email" value="{{$user->email}}" wire:model="email" >
                        <span style="color:red"> @error('email'){{$message}} @enderror </span>
                        <span class="edit"><a class="link-design-2" wire:click="emailupdate('email')"><i class="fas fa-save"></i></a></span>
                        <span class="cancel"><a href="javascript::void(0)" class="link-design-2" wire:click="cancle"><i class="fas fa-times"></i></a></span>
                        @else
                        <p class="mail">{{$user->email}}</p>
                        <div class="action-block">
                            <span class="edit"><a href="javascript::void(0)" class="link-design-2" wire:click="editData('{{auth()->user()->id}}', 'email')">Edit</a></span>
                        </div>
                        @endif
                    </div>
                </li>
                <li class="position-relative">
                    <div class="d-flex justify-content-spacebw three_column edit_frm">
                        <h6 class="title-label">Service Address:</h6>
                        @if (@$fieldStatus == true && $action == 'address')
                        <input type="text" value="{{$user->UserDetails->address}}" wire:model="address" />
                        <span class="save-icn-btn"><a class="link-design-2" wire:click="updateData('address')"><i class="fas fa-save"></i></a></span>
                        <span class="cancel"><a href="javascript::void(0)" class="link-design-2" wire:click="cancle"><i class="fas fa-times"></i></a></span>
                        @else
                        <p>{{@$user->UserDetails->address}}</p>
                        <div class="action-block">
                            <span class="edit"><a href="javascript::void(0)" class="link-design-2" wire:click="editData('{{auth()->user()->id}}', 'address')">Edit</a></span>
                        </div>
                        @endif
                    </div>
                </li>
                <li class="position-relative">
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
                        <span class="save-icn-btn"><a class="link-design-2" wire:click="updateData('timezone')"><i class="fas fa-save"></i></a></span>
                        <span class="cancel"><a href="javascript::void(0)" class="link-design-2" wire:click="cancle"><i class="fas fa-times"></i></a></span>
                        @else
                        <div class="time-zone-select-design">
                            <input type="text" value="{{@$user->userDetails->timeZone->name}}" disabled />
                        </div>
                        <div class="action-block">
                            <span class="edit"><a href="javascript::void(0)" class="link-design-2" wire:click="editData('{{auth()->user()->id}}', 'timezone')">Edit</a></span>
                        </div>
                        @endif
                    </form>
                </li>
            </ul>
        </div>
        <div class="h4-design mt-4 padding-about-frm-right">
            <h4>About</h4>
        </div>
        <div class="customer-account-information cleaner_account_2 about-updation-wrap">
            <ul class="list-unstyled">
                <li class="position-relative">
                    <div class="d-flex justify-content-spacebw three_column edit_frm">
                        @if (@$fieldStatus == true && $action == 'about')
                        <!-- <input type="text" value="{{$user->UserDetails->about}}" wire:model="about" /> -->
                        <textarea value="" wire:model="about"></textarea>
                        <span class="save-icn-btn"><a class="link-design-2" wire:click="updateData('about')"><i class="fas fa-save"></i></a></span>
                        <span class="cancel"><a href="javascript::void(0)" class="link-design-2" wire:click="cancle"><i class="fas fa-times"></i></a></span>
                        @else
                        <p>{{@$user->UserDetails->about}}</p>
                        <div class="action-block">
                            <span class="edit"><a href="javascript::void(0)" class="link-design-2" wire:click="editData({{auth()->user()->id}}, 'about')">Edit</a></span>
                        </div>
                        @endif
                    </div>
                </li>
            </ul>
        </div>



        <div class="h4-design mt-4 padding-about-frm-right">
            <h4>Social Information</h4>
        </div>

        <div class="customer-account-information cleaner_account_2 mt-4">
            <ul class="list-unstyled">

                <li class="position-relative">
                    <div class="d-flex justify-content-spacebw three_column edit_frm">
                        <h6 class="title-label">Facebook:</h6>

                        @if (@$fieldStatus == true && $action == 'facebook')
                        <input class="border-text" type="text" value="{{$user->UserDetails->facebook}}" wire:model="facebook" />
                        <span class="edit"><a class="link-design-2" wire:click="updateData('facebook')"><i class="fas fa-save"></i></a></span>
                        <span class="cancel"><a href="javascript::void(0)" class="link-design-2" wire:click="cancle"><i class="fas fa-times"></i></a></span>
                        @else
                        <p class="facebook"><a href="javascript::void(0)">{{$user->UserDetails->facebook}}</a></p>
                        <div class="action-block">
                            <span class="edit"><a href="javascript::void(0)" wire:click="editData('{{auth()->user()->id}}', 'facebook')">Edit</a></span>
                        </div>
                        @endif
                    </div>
                </li>

                <li class="position-relative">
                    <div class="d-flex justify-content-spacebw three_column edit_frm">
                        <h6 class="title-label">Twitter:</h6>

                        @if (@$fieldStatus == true && $action == 'twitter')
                        <input type="text" value="{{$user->UserDetails->twitter}}" wire:model="twitter" />
                        <span class="edit"><a class="link-design-2" wire:click="updateData('twitter')"><i class="fas fa-save"></i></a></span>
                        <span class="cancel"><a href="javascript::void(0)" class="link-design-2" wire:click="cancle"><i class="fas fa-times"></i></a></span>
                        @else
                        <p class="twitter"><a href="javascript::void(0)">{{$user->UserDetails->twitter}}</a></p>
                        <div class="action-block">
                            <span class="edit"><a href="javascript::void(0)" wire:click="editData('{{auth()->user()->id}}', 'twitter')">Edit</a></span>
                        </div>
                        @endif
                    </div>
                </li>

                <li class="position-relative">
                    <div class="d-flex justify-content-spacebw three_column edit_frm">
                        <h6 class="title-label">Instagram:</h6>

                        @if (@$fieldStatus == true && $action == 'instagram')
                        <input type="text" value="{{$user->UserDetails->instagram}}" wire:model="instagram" />
                        <span class="edit"><a class="link-design-2" wire:click="updateData('instagram')"><i class="fas fa-save"></i></a></span>
                        <span class="cancel"><a href="javascript::void(0)" class="link-design-2" wire:click="cancle"><i class="fas fa-times"></i></a></span>
                        @else
                        <p class="instagram"><a href="javascript::void(0)">{{$user->UserDetails->instagram}}</a></p>
                        <div class="action-block">
                            <span class="edit"><a href="javascript::void(0)" wire:click="editData('{{auth()->user()->id}}', 'instagram')">Edit</a></span>
                        </div>
                        @endif
                    </div>
                </li>

                <li class="position-relative">
                    <div class="d-flex justify-content-spacebw three_column edit_frm">
                        <h6 class="title-label">Linkedin:</h6>

                        @if (@$fieldStatus == true && $action == 'linkedin')
                        <input type="text" value="{{$user->UserDetails->linkedin}}" wire:model="linkedin" />
                        <span class="edit"><a class="link-design-2" wire:click="updateData('linkedin')"><i class="fas fa-save"></i></a></span>
                        <span class="cancel"><a href="javascript::void(0)" class="link-design-2" wire:click="cancle"><i class="fas fa-times"></i></a></span>
                        @else
                        <p class="linkedin"><a href="javascript::void(0)">{{$user->UserDetails->linkedin}}</a></p>
                        <div class="action-block">
                            <span class="edit"><a href="javascript::void(0)" wire:click="editData('{{auth()->user()->id}}', 'linkedin')">Edit</a></span>
                        </div>
                        @endif
                    </div>
                </li>
            </ul>
        </div>




{{-- 
        <div class="customer-account-information cleaner_account_2 about-updation-wrap">
            <form>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <button type="button" class="btn btn-danger">Facebook</button>
                    </div>
                    <input type="url" class="form-control" wire:model="facebook">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <button type="button" class="btn btn-danger">Twitter</button>
                    </div>
                    <input type="url" class="form-control" wire:model="twitter">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <button type="button" class="btn btn-danger">Instagram</button>
                    </div>
                    <input type="url" class="form-control" wire:model="instagram">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <button type="button" class="btn btn-danger">Linkedin</button>
                    </div>
                    <input type="url" class="form-control" wire:model="linkedin">
                </div>

                <div class="form-group mb-3">
                    <button type="button" class="btn btn-danger" wire:click="socialInfo">Save</button>
                </div>
            </form>
        </div>
        --}}

    </div>
</div>
@section('script')
<script>
    function uploadImgViaLivewire(user_id) {
        var base64_string = $("#upload-img").val();
        var data = {
            user_id,
            base64_string
        };
        Livewire.emit('imgUploaded', data);
    }
</script>
@include('layouts.common.cropper')
@endsection