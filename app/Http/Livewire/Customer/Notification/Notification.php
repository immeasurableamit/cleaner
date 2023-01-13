<?php

namespace App\Http\Livewire\Customer\Notification;

use Livewire\Component;
use App\Models\UserDetails;

class Notification extends Component
{

    public function smsMarketingStatus($id)
    {

        $smsMarketing = UserDetails::find($id);
        if ($smsMarketing->sms_marketing == '1') {
            $smsMarketing->sms_marketing = '0';
            $smsMarketing->save();
        } else {
            $smsMarketing->sms_marketing = '1';
            $smsMarketing->save();
        }
    }
    public function emailMarketingStatus($id)
    {
        $smsMarketing = UserDetails::find($id);
        if ($smsMarketing->email_marketing == '1') {
            $smsMarketing->email_marketing = '0';
            $smsMarketing->save();
        } else {
            $smsMarketing->email_marketing = '1';
            $smsMarketing->save();
        }
    }
    public function render()
    {
        $cleanerDetails = UserDetails::where('user_id', auth()->user()->id)->first();

        // dd($cleanerDetails);
        return view('livewire.customer.notification.notification', ['cleanerDetail' => $cleanerDetails]);
    }
}
