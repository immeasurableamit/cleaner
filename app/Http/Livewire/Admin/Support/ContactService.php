<?php

namespace App\Http\Livewire\Admin\Support;

use Livewire\Component;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;

class ContactService extends Component
{

    use LivewireAlert;
    use WithPagination;
    public $searchRecord;
    
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
        $contacts = Contact::paginate(5);

         if(!empty($this->searchRecord)){
            $vl = $this->searchRecord;
              $contacts = Contact::where(function ($query) use ($vl) {
                $query->where('name', 'LIKE', '%'.$vl.'%')
                      ->orWhere('email', 'LIKE', '%'.$vl.'%');
            })->paginate(5);
          }
        return view('livewire.admin.support.contact-service', ['contacts'=>$contacts]);
    }
}
