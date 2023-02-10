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
    public $user_id, $userId;
    protected $listeners = ['destroy', 'changeStatus'];

     public function confirmStatus($id)
    {
        $this->userId = $id;
        $this->alert('', 'Are you sure do you want to change status?', [
            'toast' => false,
            'position' => 'center',
            'showCancelButton' => true,
            'cancelButtonText' => 'Cancel',
            'showConfirmButton' => true,
            'confirmButtonText' => 'Change it',
            'onConfirmed' => 'changeStatus',
            'timer' => null
        ]);
    }
    
    public function changeStatus($id)
  
    {
        if($this->userId){
        $contact = Contact::find($this->userId);
        $contact->update([
            'status' => 1,
        ]);

        $name = 'Admin';
        Mail::to($contact->email)->send(new ContactMail($contact));
        $this->alert('success', 'Email sent for status close');

        }
    }

      public function deleteConfirm($id)
    {
        $this->user_id = $id;
        $this->alert('', 'Are you sure do want to delete?', [
            'toast' => false,
            'position' => 'center',
            'showCancelButton' => true,
            'cancelButtonText' => 'No',
            'showConfirmButton' => true,
            'confirmButtonText' => 'Yes',
            'onConfirmed' => 'destroy',
            'timer' => null
        ]);
    }

     public function destroy($id)
    {   
        if($this->user_id){
            
        Contact::find($this->user_id)->delete();
        $this->alert('success', 'Deleted successfully');
        }
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
