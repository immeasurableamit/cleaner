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

                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 no-padd">
                        <div class="row no-mrg">
                            <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 no-padd">
                                <div class="customer-account-forms">
                                    <div class="form-headeing-second">
                                        <h4>Account Photo</h4>
                                    </div>
                                    <form>
                                        <div class="customer-avatar-upload-div">
                                            <div class="customer-avatar-upload">
                                                <div class="customer-avatar-edit">
                                                    <input type='file' id="customerimageUpload" accept=".png, .jpg, .jpeg" />
                                                    <label for="customerimageUpload">Upload a profile pic</label>
                                                </div>
                                                <div class="customer-avatar-preview position-relative">

                                                    <div id="uploaded" style="background-image: url('/storage/images/$user->image');">
                                                        <img src="{{ asset('storage/images/'.$user->image) }}" id="customerimagePreview">
                                                        <a href="javascript::void(0)" wire:click=""><i class="fas fa-save"></i></a>
                                                    </div>

                                                    <!-- <div id="customerimagePreview" style="background-image: url(assets/images/thumbnail.png);">
                                                        <button class="delete-btn"><img src="assets/images/icons/delete.svg"></button>
                                                    </div> -->
                                                </div>
                                            </div>
                                            <div class="h3-p-design">
                                                <h3>Profile Photo</h3>
                                                <p>Upload a new profile photo.</p>
                                            </div>
                                        </div>
                                    </form>
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
                                                <form class="d-flex justify-content-spacebw three_column edit_frm">
                                                    <h6 class="title-label">Phone:</h6>
                                                    @if (@$fieldStatus == true && $action == 'contact_number')
                                                    <input type="number" value="{{$user->contact_number}}" wire:model="contact_number" />
                      
                                                    <span class="edit"><a class="link-design-2" wire:click="update('contact_number')"><i class="fas fa-save"></i></a></span>
                                                    <span class="cancel"><a href="javascript::void(0)" class="link-design-2" wire:click="cancle"><i class="fas fa-times"></i></a></span>
                                                    @else
                                                    <p class="phone"><a href="tel:+1 512-559-9582">{{$user->contact_number}}</a></p>
                                                    <div class="action-block">
                                                        <span class="edit"><a href="javascript::void(0)" wire:click="edit('{{auth()->user()->id}}', 'contact_number')">Edit</a></span>
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
                                                    <span class="save-icn-btn"><a class="link-design-2" wire:click="update('address')"><i class="fas fa-save"></i></a></span>
                                                    <span class="cancel"><a href="javascript::void(0)" class="link-design-2" wire:click="cancle"><i class="fas fa-times"></i></a></span>
                                                    @else
                                                    <p>{{$user->UserDetails->address}}</p>
                                                    <div class="action-block">
                                                        <span class="edit"><a href="javascript::void(0)" class="link-design-2" wire:click="edit('{{auth()->user()->id}}', 'address')">Edit</a></span>
                                                    </div>
                                                    @endif
                                                </form>
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
                                                    <span class="save-icn-btn"><a class="link-design-2" wire:click="update('timezone')"><i class="fas fa-save"></i></a></span>
                                                    <span class="cancel"><a href="javascript::void(0)" class="link-design-2" wire:click="cancle"><i class="fas fa-times"></i></a></span>
                                                    @else
                                                    <div class="time-zone-select-design">
                                                        <select wire:model="timezone" id="timezone-offset">
                                                            <option>{{$user->userDetails->timezone}} </option>
                                                            <option>Select Time Zone</option>
                                                        </select>
                                                    </div>
                                                    <div class="action-block">
                                                        <span class="edit"><a href="javascript::void(0)" class="link-design-2" wire:click="edit('{{auth()->user()->id}}', 'timezone')">Edit</a></span>
                                                    </div>
                                                    @endif
                                                </form>
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