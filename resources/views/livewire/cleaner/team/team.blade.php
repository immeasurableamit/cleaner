<div class="team_row">
    <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 no-padd cleaner_team_section">
        <div class="customer-account-forms pe-5 pb-2">
            <div class="h4-design text-end">

                <h4>Team Size: {{ $teamMemberCounts }} </h4>
            </div>
            <div class="form-headeing-second border-bottom pb-3">
                <h3 class="mb-0">Team Info</h3>

                <span>Add additional team members below</span>

            </div>

            <!-- Modal -->


        </div>
    </div>
    <!-- End Model-->
    <div class="teams-table-layout-view">
        <div class="row">

            @foreach ($teamMembers as $teamMember)
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-2">
                    <div class="select-date-toggles overflow-hidden teamCard-{{ $teamMember->id }} ">
                        <button class="service_toggle_s removeCard-{{ $teamMember->id }}"
                            data-id="{{ $teamMember->id }}"></button>
                        <div class="service-main-service-column">

                            <div class="altrntive_rw">
                                <p class="appointment_label">Name</p>
                                <p class="app-value">{{ $teamMember->name }}</p>
                            </div>
                            <div class="altrntive_rw">
                                <p class="appointment_label">Insured?</p>
                                <p @class([
                                    'app-value',
                                    'text-success' => strtolower($teamMember->insured) == 'yes',
                                    'text-danger' => strtolower($teamMember->insured) == 'no',
                                ])><strong>{{ $teamMember->insured }}</strong></p>
                            </div>
                            <div class="altrntive_rw">
                                <p class="appointment_label">Phone</p>
                                <p class="app-value"><a href="tel:512-558-5876">{{ $teamMember->contact_number }}</a>
                                </p>
                            </div>
                            <div class="altrntive_rw">
                                <p class="appointment_label">Email</p>
                                <p class="app-value"><a href="mailto:example@email.com">{{ $teamMember->email }}</a>
                                </p>
                            </div>
                            <div class="altrntive_rw">
                                <p class="appointment_label">Address</p>
                                <p class="app-value location">{{ $teamMember->address }}</p>
                            </div>
                            <div class="altrntive_rw">
                                <p class="appointment_label">SSN/TIN</p>
                                <p class="app-value">{{ $teamMember->ssn_or_tax }}</p>
                            </div>

                        </div>
                        <div class="d-flex two-column justify-content-spacebw">

                            <a href="javascript::void(0)" type="submit" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#updateModal" wire:click="edit({{ $teamMember->id }})"
                                class="edit-member">Edit Member</a>
                            <a href="javascript::void(0)" wire:click="deleteConfirm({{ $teamMember->id }})"
                                class="red-bordered-full-btn remove-member">Remove Member</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="pt-3">
            <button type="button" class="submit-design mb-2 btn_blue" style="background-color:var(--secondary);"
                data-bs-toggle="modal" data-bs-target="#teamModal">
                Add Team Members
            </button>
        </div>
    </div>

    <!-- updateModel -->
    <div wire:ignore.self class="modal fade modal_style" id="updateModal" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog pop-up-form">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="form-heading-h4 text-center" id="exampleModalLabel">Add Team Members</h5>
                    <button type="button" class="btn_close" data-bs-dismiss="modal" id="updateModalClose"
                        aria-label="Close" style="border:0px;">X</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-grouph input-design mb-2 col-md-6">
                            <div class="form-grouph select-design mb-2">
                                <label>First Name</label>
                                <input type="text" wire:model="first_name" />
                                @error('first_name')
                                    <div class="alert ">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-grouph input-design mb-2 col-md-6">
                            <div class="form-grouph select-design mb-2">
                                <label>Last Name</label>
                                <input type="text" wire:model="last_name" />
                                @error('last_name')
                                    <div class="alert ">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-sm-12 col-md-6">
                            <div class="form-grouph select-search-design select-design mb-2">
                                <label>Insured</label>
                                <select wire:model="insured" class="form-control selct_2"
                                    style="box-shadow: 0px 15px 50px rgb(16 85 135 / 15%);">
                                    <option value="" selected>Choose Insured</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            @error('insured')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-grouph input-design mb-2 col-md-6">
                            <div class="form-grouph select-design mb-2">
                                <label>Phone</label>
                                <input type="number" wire:model="contact_number" />
                                @error('contact_number')
                                    <div class="alert ">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-grouph input-design mb-2 col-md-6">
                            <div class="form-grouph select-design mb-2">
                                <label>Email</label>
                                <input type="email" wire:model="email" disabled />
                                @error('email')
                                    <div class="alert ">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-grouph input-design mb-2 col-md-6">
                            <div class="form-grouph select-design mb-2">
                                <label>Address</label>
                                <input type="address" wire:model="address" />
                                @error('address')
                                    <div class="alert ">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-grouph input-design mb-2 col-md-6">
                            <div class="form-grouph select-design mb-2">
                                <label>SSN/TIN</label>
                                <input type="number" wire:model="ssn_or_tax" />
                                @error('ssn_or_tax')
                                    <div class="alert ">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-sm-12 col-md-12">
                        <div class="text-center pt-3">
                            {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}

                            <a href="javascript::void(0)" wire:click="update()"
                                class="subit-btn-2 btn_c w-50">Update</a>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
    <!-- end updateModel -->

    <div wire:ignore.self class="modal fade modal_style" id="teamModal" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog pop-up-form">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="form-heading-h4 text-center" id="exampleModalLabel">Add Team Members</h5>
                    <button type="button" class="btn_close" data-bs-dismiss="modal" id="closeexample"
                        aria-label="Close" style="border:0px;">X</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-sm-12 col-md-6">
                            <div class="form-grouph select-design mb-2">
                                <label>First Name</label>
                                <div class="form-grouph input-design mb-2 col-md-12">
                                    <input type="text" wire:model="first_name"
                                        placeholder="Enter your First Name" />
                                </div>
                                @error('first_name')
                                    <div class="alert ">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-sm-12 col-md-6">
                            <div class="form-grouph select-design mb-2">
                                <label>Last Name</label>
                                <div class="form-grouph input-design mb-2 col-md-12">
                                    <input type="text" wire:model="last_name"
                                        placeholder="Enter your Last Name" />
                                </div>
                                @error('last_name')
                                    <div class="alert ">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-sm-12 col-md-6">
                            <div class="form-grouph select-search-design select-design mb-2">
                                <label>Insured</label>
                                <select wire:model="insured" class="form-control selct_2"
                                    style="box-shadow: 0px 15px 50px rgb(16 85 135 / 15%);">
                                    <option value="" selected>Choose Insured</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            @error('insured')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-xl-6 col-lg-6 col-sm-12 col-md-6">
                            <div class="form-grouph select-design mb-2">
                                <label>Phone</label>
                                <div class="form-grouph input-design mb-2 col-md-12">
                                    <input type="number" wire:model="contact_number" placeholder="Contact Number" />
                                </div>
                                @error('contact_number')
                                    <div class="alert ">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-sm-12 col-md-6">
                            <div class="form-grouph select-design mb-2">
                                <label>Email</label>
                                <div class="form-grouph input-design mb-2 col-md-12">
                                    <input type="email" wire:model="email" placeholder="Enter your Email" />
                                </div>
                                @error('email')
                                    <div class="alert ">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-sm-12 col-md-6">
                            <div class="form-grouph select-design mb-2">
                                <label>Address</label>
                                <div class="form-grouph input-design mb-2 col-md-12">
                                    <input type="address" id='address' wire:model="address"
                                        placeholder="Enter your Address" />
                                </div>
                                @error('address')
                                    <div class="alert ">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-sm-12 col-md-6">
                            <div class="form-grouph select-design mb-2">
                                <label>SSN/TIN</label>
                                <div class="form-grouph input-design mb-2 col-md-12">
                                    <input type="number" wire:model="ssn_or_tax" placeholder="Enter your SSN/TIN" />
                                </div>
                                @error('ssn_or_tax')
                                    <div class="alert ">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="col-xl-12 col-lg-12 col-sm-12 col-md-12">
                        <div class="text-center pt-3">
                            {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>  --}}
                            <button wire:click="store()" class="btn_c w-50">Save</button>
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>

    @push('scripts')
        <script>
            window.addEventListener('load', () => {
                var address_input_in_banner = document.getElementById('address');

                makeAddressInputAutocompletable(address_input_in_banner, (gmap_place) => {
                    debugger;
                    document.getElementById('latitude').value = gmap_place.geometry.location.lat();
                    document.getElementById('longitude').value = gmap_place.geometry.location.lng();
                })
            });
        </script>


        <script>
            // function fillAddressFieldsInForm(gmap_place)
            //     {
            //         debugger;
            //       var parsed_gmap_place = parseGmapPlace( gmap_place );

            //       if ( parsed_gmap_place.city ) {
            //         document.getElementById('city').value = parsed_gmap_place.city;
            //       }

            //       if ( parsed_gmap_place.zip ) {
            //         document.getElementById('zip').value = parsed_gmap_place.zip;
            //       }

            //       document.getElementById('latitude').value  = parsed_gmap_place.lat;
            //       document.getElementById('longitude').value = parsed_gmap_place.lng;

            //     }


            // window.addEventListener('load', function() {

            //       var address_input = document.getElementById('address');

            //       makeAddressInputAutocompletable( address_input, fillAddressFieldsInForm );
            //     //   debugger;
            //     });
        </script>

        <script>
            window.livewire.on('close-modal', (id, action) => {
                var id = id;
                // console.log("hellooooooooooooooooooooooooooooooooooo");
                $("#updateModalClose").click();
                $('.removeCard-' + id).unbind();
                if (action == 'success') {
                    location.reload();
                }
            });

            window.livewire.on('showCard', (id) => {
                var id = id;
                $('.teamCard-'+ id).addClass('show');
            });
        </script>

<script>
    $('.btn_close').click(function() {
        location.reload();
    });
</script>


        {{-- <script>
            $('.remove-member').click(function() {
                $(".select-date-toggles").addClass("show");
            });
        </script> --}}
    @endpush
    <style>
        .alert {
            color: red;
        }
    </style>
</div>
