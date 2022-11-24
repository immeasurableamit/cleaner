<?php

namespace App\Http\Livewire;

use App\Models\UserDetails;
use Livewire\Component;

class CleanerHeader extends Component
{

    public function cleanerLiveStatus($id)
    {
        $cleaner = UserDetails::find($id);
       
        if ($cleaner->is_active == '1') {
            $cleaner->is_active = '0';
            $cleaner->save();
        } else {
            $cleaner->is_active = '1';
            $cleaner->save();
        }
    }

    public function render()
    {
        $cleanerStatus = UserDetails::where('user_id', auth()->user()->id)->first();
        return view('livewire.cleaner-header', compact('cleanerStatus'));
    }
}
