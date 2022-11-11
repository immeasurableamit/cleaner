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
                            <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 no-padd cleaner_team_section">
                                <div class="customer-account-forms pe-5">
                                    <div class="h4-design text-end">

                                        <h4>Team Size: {{$teamMemberCounts}} </h4>
                                    </div>
                                    <div class="form-headeing-second border-bottom pb-3">
                                        <h3 class="mb-0">Team Info</h3>

                                        <span>Add additional team members below</span>
                                        <button type="button" class="btn btn-primary" style="float:right;" data-bs-toggle="modal" data-bs-target="#teamModal">
                                            Add Team Members
                                        </button>
                                    </div>

                                    <!-- Modal -->
                                    <div wire:ignore.self class="modal fade" id="teamModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Add Team Members</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" id="closeexample" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">

                                                    <div class="altrntive_rw">
                                                        <p class="appointment_label">First Name</p>
                                                        <input type="text" wire:model="first_name" placeholder="Enter your First Name" />
                                                        @error('first_name')<div class="alert ">{{ $message }}</div>@enderror
                                                    </div>
                                                    <div class="altrntive_rw">
                                                        <p class="appointment_label">Last Name</p>
                                                        <input type="text" wire:model="last_name" />
                                                        @error('last_name')<div class="alert ">{{ $message }}</div>@enderror
                                                    </div>
                                                    <div class="altrntive_rw">
                                                        <p class="appointment_label">Insured?</p>
                                                        <input type="text" wire:model="insured" />
                                                        @error('insured')<div class="alert ">{{ $message }}</div>@enderror

                                                    </div>
                                                    <div class="altrntive_rw">
                                                        <p class="appointment_label">Phone</p>
                                                        <input type="number" wire:model="contact_number" />
                                                        @error('contact_number')<div class="alert ">{{ $message }}</div>@enderror
                                                    </div>
                                                    <div class="altrntive_rw">
                                                        <p class="appointment_label">Email</p>
                                                        <input type="email" wire:model="email" />
                                                        @error('email')<div class="alert ">{{ $message }}</div>@enderror
                                                    </div>
                                                    <div class="altrntive_rw">
                                                        <p class="appointment_label">Address</p>
                                                        <input type="address" wire:model="address" />
                                                        @error('address')<div class="alert ">{{ $message }}</div>@enderror
                                                    </div>
                                                    <div class="altrntive_rw">
                                                        <p class="appointment_label">SSN/TIN</p>
                                                        <input type="number" wire:model="ssn_or_tax" />
                                                        @error('ssn_or_tax')<div class="alert ">{{ $message }}</div>@enderror
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button wire:click="store()" class="btn btn-primary">Save</button>
                                                    </div>

                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!-- End Model-->


                            <div class="teams-table-layout-view">
                                <div class="row">
                                    @foreach($teamMembers as $teamMember)
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-2">
                                        <div class="select-date-toggles overflow-hidden ">


                                            <button class="service_toggle_s" data-id="{{$teamMember->id}}"></button>
                                            <div class="service-main-service-column">

                                                <div class="altrntive_rw">
                                                    <p class="appointment_label">Name</p>
                                                    <p class="app-value">{{$teamMember->name}}</p>
                                                    @error('name')<div class="alert ">{{ $message }}</div>@enderror
                                                </div>
                                                <div class="altrntive_rw">
                                                    <p class="appointment_label">Insured?</p>
                                                    <p class="app-value green"><strong>Yes</strong></p>
                                                </div>
                                                <div class="altrntive_rw">
                                                    <p class="appointment_label">Phone</p>
                                                    <p class="app-value"><a href="tel:512-558-5876">{{$teamMember->contact_number}}</a></p>
                                                </div>
                                                <div class="altrntive_rw">
                                                    <p class="appointment_label">Email</p>
                                                    <p class="app-value"><a href="mailto:example@email.com">{{$teamMember->email}}</a></p>
                                                </div>
                                                <div class="altrntive_rw">
                                                    <p class="appointment_label">Address</p>
                                                    <p class="app-value location">{{$teamMember->address}}</p>
                                                </div>
                                                <div class="altrntive_rw">
                                                    <p class="appointment_label">SSN/TIN</p>
                                                    <p class="app-value">{{$teamMember->ssn_or_tax}}</p>
                                                </div>

                                            </div>
                                            <div class="d-flex two-column justify-content-spacebw">

                                                <a href="javascript::void(0)" type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateModal" wire:click="edit({{$teamMember->id}})" class="edit-member">Edit Member</a>
                                                <a href="javascript::void(0)" wire:click="deleteConfirm({{$teamMember->id}})" class="red-bordered-full-btn remove-member">Remove Member</a>
                                            </div>
                                        </div>

                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- updateModel -->

    <div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Team Members</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" id="updateModalClose" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="altrntive_rw">
                        <p class="appointment_label">First Name</p>
                        <input type="text" wire:model="first_name" />
                        @error('first_name')<div class="alert ">{{ $message }}</div>@enderror
                    </div>
                    <div class="altrntive_rw">
                        <p class="appointment_label">Last Name</p>
                        <input type="text" wire:model="last_name" />
                        @error('last_name')<div class="alert ">{{ $message }}</div>@enderror
                    </div>
                    <div class="altrntive_rw">
                        <p class="appointment_label">Insured?</p>
                        <input type="text" wire:model="insured" />
                        @error('insured')<div class="alert ">{{ $message }}</div>@enderror

                    </div>
                    <div class="altrntive_rw">
                        <p class="appointment_label">Phone</p>
                        <input type="number" wire:model="contact_number" />
                        @error('contact_number')<div class="alert ">{{ $message }}</div>@enderror
                    </div>
                    <div class="altrntive_rw">
                        <p class="appointment_label">Email</p>
                        <input type="email" wire:model="email" disabled />
                        @error('email')<div class="alert ">{{ $message }}</div>@enderror
                    </div>
                    <div class="altrntive_rw">
                        <p class="appointment_label">Address</p>
                        <input type="address" wire:model="address" />
                        @error('address')<div class="alert ">{{ $message }}</div>@enderror
                    </div>
                    <div class="altrntive_rw">
                        <p class="appointment_label">SSN/TIN</p>
                        <input type="number" wire:model="ssn_or_tax" />
                        @error('ssn_or_tax')<div class="alert ">{{ $message }}</div>@enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                        <a href="javascript::void(0)" wire:click="update()" class="btn btn-primary">Update</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end updateModel -->

   
</div>