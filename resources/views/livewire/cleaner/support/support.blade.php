<div>

    <!-- past-service -->
    <div class="form-headeing-second mt-4">
        <h4 class="border-0 mb-0">Get Help With an Issue</h4>
    </div>
    <div class="get-more-issue-wrap">
        <form wire:submit.prevent="storeSupportRequest">
            <div class="issue_card_section">
                <form>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-grouph select-design mb-30 width-mx-50">
                                <label>Select a Job</label>
                                <div wire:ignore>
                                <select class="select-custom-design" id="job-selector">
                                    <option></option>

                                    @foreach ($completedOrders as $order)

                                        <option value="{{ $order->id }}" @if ( $order->id == $selectedOrderId ) selected @endif>{{ $order->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                                @error ('selectedOrderId') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-sm-12 col-md-6">
                            <div class="form-grouph select-design mb-30">
                                <label>Issue</label>
                                <div wire:ignore>
                                    <select class="select-custom-design" id="issues-selector">
                                        <option></option>
                                        @foreach ( $issues as $type => $explanation )
                                            <option value="{{ $type }}" @if ( $type == $issue ) selected @endif>{{ $explanation }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                @error ('issue') <span class="text-danger">{{ $message }}</span> @enderror

                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-sm-12 col-md-6">
                            <div class="form-grouph select-design mb-30">
                                <label>Requested Resolution</label>

                                <div wire:ignore>
                                    <select class="select-custom-design" id="resolutions-selector">
                                        <option></option>
                                        @foreach ( $resolutions as $type => $explanation )
                                            <option value="{{ $type }}" @if ( $type == $requestedResolution ) selected @endif>{{ $explanation }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error ('requestedResolution') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                        </div>
                        @if ( $issue == "other" )
                        <div class="col-md-12">
                            <div class="form-grouph input-design mb-30">
                                <input type="text" wire:model="otherIssueExplaination" placeholder="If you selected Other - explain">
                                @error ('otherIssueExplaination') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        @endif
                        <div c  lass="col-md-12">
                            <textarea wire:model="description" placeholder="Please describe your issue and/or requested resolution in detail."></textarea>
                            @error ('description') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 pt-3">
                            <button class="btn_c d-block w-100" >Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </form>
    </div>

    <script>
        function integrateSelect2() {

            $("#job-selector").select2({
                placeholder: 'Select Job',
            });

            $("#job-selector").on('select2:select', function(e) {
                var data = e.params.data;
                @this.set('selectedOrderId', data.id)
            });

            $("#issues-selector").select2({

                placeholder: 'Select an Issue',
            });

            $("#issues-selector").on('select2:select', function(e) {
                var data = e.params.data;
                @this.set('issue', data.id)
            });

            $("#resolutions-selector").select2({
                placeholder: 'Select Resolutions',
            });

            $("#resolutions-selector").on('select2:select', function(e) {
                var data = e.params.data;
                @this.set('requestedResolution', data.id)
            });
        }


        window.addEventListener('cleaerSelectionsInSelectors', () => {
            $("#job-selector").val(null).trigger('change');
            $("#issues-selector").val(null).trigger('change');
            $("#resolutions-selector").val(null).trigger('change');
        });

        window.addEventListener('load', () => {
            integrateSelect2();
        });
    </script>

    @if ( $errors->any() )
    <script> console.log(  "{{  json_encode( $errors->all() ) }}" ) </script>
    <script> console.log(  @json( $errors->all() ) ) </script>
    @endif
</div>

