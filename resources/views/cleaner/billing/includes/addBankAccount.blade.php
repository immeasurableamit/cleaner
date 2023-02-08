<div class="biling_edit_form">

    @if ( $errors->has('stripe_error') )    
    <div class="alert alert-danger" role="alert">
        {{ $errors->first('stripe_error') }}        
    </div>
    @elseif ( $bank->payouts_enabled == 0 )
    <div class="alert alert-warning" role="alert">
      Payouts are not enabled for your account
    </div>
    @endif

    <form action="{{ route('cleaner.billing.bankInfoStore') }}" method="POST">
        @csrf

        <div class="form-headeing-second pt-3">
            <h4 class="border-0 mb-0">Payout Bank Account Details</h4>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-grouph input-design mb-30">
                    <input type="text" placeholder="Account Holder Name" value="{{ $bank->account_holder_name }}" name="account_holder_name">
                    @error('account_holder_name')
                        <div class="help-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
            <div class="form-grouph input-design mb-30">
                <input type="text" placeholder="Account Number" name="account_number" value="{{ $bank->account_number }}">
                @error('account_number')
                    <div class="help-block">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-grouph input-design mb-30">
                <input type="text" placeholder="Routing Number" name="routing_number" value="{{ $bank->routing_number }}">
                @error('routing_number')
                    <div class="help-block">{{ $message }}</div>
                @enderror
            </div>
        </div>
        </div>


        <div class="text-center row">
            <div class="col-12 pb-2">
            @if ( $bank->account_number )
                <a  class="btn_blue" href="{{ route('cleaner.billing.delete') }}">Delete Bank Account</a>
            @else
                <button class="btn_c" type="submit">Save</button>
            @endif
            </div>
            @if ( $bank->payouts_enabled == 0 )
            <div class="col-12 pt-3">
                <a href="{{ route('cleaner.billing.stripeConnectUpdate') }}" class="btn_blue" role="button" type="button">Update Stripe Account</a>
            </div>
            @endif
        </div>
    </form>


</div>
