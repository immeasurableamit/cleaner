<div>
    <div class="msg_togles mb-3">
        <span>SMS Marketing Messages</span>

        <div class="form-check form-switch">
            @if($cleanerDetail->sms_marketing == 1)

            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" wire:click="smsMarketingStatus({{$cleanerDetail->id}})" checked>
            @else
            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" wire:click="smsMarketingStatus({{$cleanerDetail->id}})">
            @endif
        </div>
    </div>
    <div class="msg_togles mb-4">
        <span>Email Marketing Messages</span>

        <div class="form-check form-switch">
            @if($cleanerDetail->email_marketing == 1)
            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" wire:click="emailMarketingStatus({{$cleanerDetail->id}})" checked>
            @else
            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" wire:click="emailMarketingStatus({{$cleanerDetail->id}})">
            @endif
        </div>
    </div>
</div>