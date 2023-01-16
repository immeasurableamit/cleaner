<?php

namespace App\Http\Livewire\Admin\Customer;

use Livewire\Component;
use App\Models\Transaction;

class AccountHistory extends Component
{
    public $userId;
    public $transactions;

    public function mount()
    {
        $this->transactions = Transaction::where('user_id', $this->userId)->latest()->get();
    }

    public function render()
    {
        return view('livewire.admin.customer.account-history');
    }
}
