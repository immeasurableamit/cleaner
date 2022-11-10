<div>
    <section class="light-banner customer-account-page" style="background-image: url('assets/images/white-pattern.png')">
        <div class="container">
            <div class="customer-white-wrapper">
                <div class="row no-mrg">
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 no-padd">
                        <div class="blue-bg-wrapper bar_left">
                            <div class="blue-bg-heading">
                                <h4>Settings</h4>
                            </div>
                            @include('layouts.common.sidebar')
                            <div class="blue-logo-block text-center max-width-100">
                                <a href="javascript::void(0)"><img src="{{asset('assets/images/logo/logo.svg')}}"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 no-padd">
                        <div class="row no-mrg">
                            <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 no-padd cleaner_account_section">
                                <div class="customer-account-forms">
                                    <div class="form-headeing-second mb-4">
                                        <h3 class="border-bottom pb-3">Account Photo</h3>
                                    </div>
                                    <div class="customer-avatar-upload-div">
                                        <div class="customer-avatar-upload">
                                            <div class="customer-avatar-edit">
                                                <input type='file' id="upload" accept=".png, .jpg, .jpeg" enctype="multipart/form-data" wire:model="image" />
                                                <label for="upload">Upload a profile pic</label>
                                            </div>
                                            <div class="customer-avatar-preview position-relative">
                                                <div id="uploaded" style="background-image: url('/storage/images/$user->image');">
                                                    <img src="{{ asset('storage/images/'.$user->image) }}" id="customerimagePreview">
                                                    <a href="javascript::void(0)" wire:click="imageUpload({{$user->id}})"><i class="fas fa-save"></i></a>
                                                </div>
                                            </div>

                                            <div class="lawyer_profile-img mb-3">
                                                <!-- <div class="circle" id="uploaded">
                                                        <img class="profile-pic" src="">
                                                    </div> -->
                                                <div class="p-image">
                                                    <!-- <span class="pencil_icon"><i class="fa-solid fa-pencil upload-button"></i></span> -->
                                                    <!-- <input class="file-upload" id="upload" type="file" accept="image/*" /> -->
                                                    <input type="hidden" name="image" id="upload-img" />
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
                                                    <input type="email" value="{{$user->email}}" wire:model="email">
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
                                                    <p>{{$user->UserDetails->address}}</p>
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
                                                        <input type="text" value="{{@$user->userDetails->timeZone->name}}" disabled/>
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
                                                    <p>{{$user->UserDetails->about}}</p>
                                                    <div class="action-block">
                                                        <span class="edit"><a href="javascript::void(0)" class="link-design-2" wire:click="editData({{auth()->user()->id}}, 'about')">Edit</a></span>
                                                    </div>
                                                    @endif
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@section('script')

@include('layouts.common.cropper')

@endsection