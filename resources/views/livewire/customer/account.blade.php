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
                                                    <input type="email" placeholder="Enter Email" style="display: none;">
                                                    <p class="mail"><a href="mailto:ajone235@gmail.com">{{$user->email}}</a></p>
                                                    <div class="action-block">
                                                        <button class="edit">Edit</button>
                                                        <button class="save-icn-btn"><i class="fas fa-save"></i></button>
                                                        <button class="cancel"><i class="fas fa-times"></i></button>
                                                    </div>
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
                                                    <div class="time-zone-select-design" style="display: none;">
                                                        <select name="timezone_offset" id="timezone-offset" class="select-custom-design">
                                                            <option value="-12:00">(GMT -12:00) Eniwetok, Kwajalein</option>
                                                            <option value="-11:00">(GMT -11:00) Midway Island, Samoa</option>
                                                            <option value="-10:00">(GMT -10:00) Hawaii</option>
                                                            <option value="-09:50">(GMT -9:30) Taiohae</option>
                                                            <option value="-09:00">(GMT -9:00) Alaska</option>
                                                            <option value="-08:00">(GMT -8:00) Pacific Time (US &amp; Canada)</option>
                                                            <option value="-07:00">(GMT -7:00) Mountain Time (US &amp; Canada)</option>
                                                            <option value="-06:00">(GMT -6:00) Central Time (US &amp; Canada), Mexico City</option>
                                                            <option value="-05:00">(GMT -5:00) Eastern Time (US &amp; Canada), Bogota, Lima</option>
                                                            <option value="-04:50">(GMT -4:30) Caracas</option>
                                                            <option value="-04:00">(GMT -4:00) Atlantic Time (Canada), Caracas, La Paz</option>
                                                            <option value="-03:50">(GMT -3:30) Newfoundland</option>
                                                            <option value="-03:00">(GMT -3:00) Brazil, Buenos Aires, Georgetown</option>
                                                            <option value="-02:00">(GMT -2:00) Mid-Atlantic</option>
                                                            <option value="-01:00">(GMT -1:00) Azores, Cape Verde Islands</option>
                                                            <option value="+00:00" selected="selected">(GMT) Western Europe Time, London, Lisbon, Casablanca</option>
                                                            <option value="+01:00">(GMT +1:00) Brussels, Copenhagen, Madrid, Paris</option>
                                                            <option value="+02:00">(GMT +2:00) Kaliningrad, South Africa</option>
                                                            <option value="+03:00">(GMT +3:00) Baghdad, Riyadh, Moscow, St. Petersburg</option>
                                                            <option value="+03:50">(GMT +3:30) Tehran</option>
                                                            <option value="+04:00">(GMT +4:00) Abu Dhabi, Muscat, Baku, Tbilisi</option>
                                                            <option value="+04:50">(GMT +4:30) Kabul</option>
                                                            <option value="+05:00">(GMT +5:00) Ekaterinburg, Islamabad, Karachi, Tashkent</option>
                                                            <option value="+05:50">(GMT +5:30) Bombay, Calcutta, Madras, New Delhi</option>
                                                            <option value="+05:75">(GMT +5:45) Kathmandu, Pokhara</option>
                                                            <option value="+06:00">(GMT +6:00) Almaty, Dhaka, Colombo</option>
                                                            <option value="+06:50">(GMT +6:30) Yangon, Mandalay</option>
                                                            <option value="+07:00">(GMT +7:00) Bangkok, Hanoi, Jakarta</option>
                                                            <option value="+08:00">(GMT +8:00) Beijing, Perth, Singapore, Hong Kong</option>
                                                            <option value="+08:75">(GMT +8:45) Eucla</option>
                                                            <option value="+09:00">(GMT +9:00) Tokyo, Seoul, Osaka, Sapporo, Yakutsk</option>
                                                            <option value="+09:50">(GMT +9:30) Adelaide, Darwin</option>
                                                            <option value="+10:00">(GMT +10:00) Eastern Australia, Guam, Vladivostok</option>
                                                            <option value="+10:50">(GMT +10:30) Lord Howe Island</option>
                                                            <option value="+11:00">(GMT +11:00) Magadan, Solomon Islands, New Caledonia</option>
                                                            <option value="+11:50">(GMT +11:30) Norfolk Island</option>
                                                            <option value="+12:00">(GMT +12:00) Auckland, Wellington, Fiji, Kamchatka</option>
                                                            <option value="+12:75">(GMT +12:45) Chatham Islands</option>
                                                            <option value="+13:00">(GMT +13:00) Apia, Nukualofa</option>
                                                            <option value="+14:00">(GMT +14:00) Line Islands, Tokelau</option>
                                                        </select>
                                                    </div>
                                                    <p class=""><a href="#">-5:00 GMT (Central US) - Current Time 11:11am</a></p>
                                                    <div class="action-block">
                                                        <button class="edit">Edit</button>
                                                        <button class="save-icn-btn"><i class="fas fa-save"></i></button>
                                                        <button class="cancel"><i class="fas fa-times"></i></button>
                                                    </div>
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