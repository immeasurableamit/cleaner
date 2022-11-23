<?php

namespace App\Http\Livewire\Cleaner\Notification;

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
        // dd('jdfjk');
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
        return view('livewire.cleaner.notification.notification', ['cleanerDetail' => $cleanerDetails]);
    }
}
