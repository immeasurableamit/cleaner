<div class="biling_edit_form">
    <div class="alert alert-warning" role="alert"> 
        Fill bank details to <strong>Enable Payouts</strong>
    </div>
    <form action="{{ route('cleaner.billing.bankInfoStore') }}" method="POST">
        @csrf

        <div class="form-headeing-second pt-3">
            <h4 class="border-0 mb-0">Payout Bank Account Details</h4>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-grouph input-design mb-30">
                    <input type="text" placeholder="Account Holder Name" name="account_holder_name">
                    @error('account_holder_name')
                        <div class="help-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
            <div class="form-grouph input-design mb-30">
                <input type="text" placeholder="Account Number" name="account_number">
                @error('account_number')
                    <div class="help-block">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-grouph input-design mb-30">
                <input type="text" placeholder="Routing Number" name="routing_number">
                @error('routing_number')
                    <div class="help-block">{{ $message }}</div>
                @enderror
            </div>
        </div>
        </div>

       
        <div class="text-center">

            <button class="btn_c" type="submit">Save</button>
        </div>
    </form>
</div>
