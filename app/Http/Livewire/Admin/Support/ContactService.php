<?php

namespace App\Http\Livewire\Admin\Support;

use Livewire\Component;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ContactService extends Component
{

    use LivewireAlert;
    
    public function statusClose($id)
  
    {
        $contact = Contact::find($id);
        $contact->update([
            'status' => 1,
        ]);

        $name = 'Admin';
        Mail::to($contact->email)->send(new ContactMail($contact));
        $this->alert('success', 'Email sent for status close');
    }

     public function destroy($id)
    {
        Contact::find($id)->delete();
        $this->alert('success', 'Deleted successfully');
    }
   

    public function render()
    {
         $contacts = Contact::all();

        return view('livewire.admin.support.contact-service', compact('contacts'));
    }
}
