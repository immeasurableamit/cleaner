<?php

namespace App\Http\Livewire\Admin\Cleaner;

use Livewire\Component;
use App\Models\Transaction;

class CleanerHistory extends Component
{
    public $userId;
    public $transactions;

     public function mount()
    {
        $this->transactions = Transaction::where('user_id', $this->userId)
        ->where('status', '=', 'success')
        ->latest()->get();
    }

    public function render()
    {
        return view('livewire.admin.cleaner.cleaner-history');
    }
}
