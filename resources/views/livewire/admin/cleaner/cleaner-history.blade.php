<div>
    @if($transactions->count()>0)
    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
        <div class="detail-div-block">
            <h4>Account history log</h4>
            <div class="inner-white-wrapper account-history-log max-251px">
                @foreach($transactions as $transaction)
                <p>{{$transaction->created_at->format('m/d/Y - h:ia')}} <strong>- Payout -</strong> <span class="success">{{$transaction->action}}</span> ${{$transaction->amount}}</p>
                @endforeach
            </div>
        </div>
    </div>
    @endif

</div>