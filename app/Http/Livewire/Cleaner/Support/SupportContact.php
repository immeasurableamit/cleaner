<?php

namespace App\Http\Livewire\Cleaner\Support;

use Livewire\Component;
use App\Models\Contact;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class SupportContact extends Component
{

        use LivewireAlert;

    public $name, $order_number, $email, $phone, $message, $user_id;

     private function resetInputFields(){
        $this->name = '';
        $this->order_number = '';
        $this->email = '';
        $this->phone = '';
        $this->message = '';
    }

   public function rules()
    {
        return [
            'name' => 'required',
            'order_number' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required',
        ];
    }

    public function store(){

        $this->validate();
        $id = auth()->user()->id;

        $contact = new Contact;
        $contact->user_id = $id;
        $contact->status = 0;
        $contact->name = $this->name;
        $contact->order_number = $this->order_number;
        $contact->email = $this->email;
        $contact->phone = $this->phone;
        $contact->message = $this->message;
       

        $contact->save();
        $this->alert('success', 'Message sent');
        $this->resetInputFields();
    }

    public function render()
    {
        return view('livewire.cleaner.support.support-contact');
    }
}
