<?php

namespace App\Http\Livewire\Cleaner;

use Livewire\Component;
use App\Models\CleanerTeam;
use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;


class Team extends Component
{
    use LivewireAlert;
    public $first_name, $last_name, $email, $address, $ssn_or_tax, $insured, $contact_number, $name;
    public $updateMode = false;
    public $toggleStatus = false;


    // public function mount()
    // {
    //     $user= CleanerTeam::first();
    //     $this->first_name = $user->first_name;
    // }

    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'insured' => 'required',
            'contact_number' => 'required',
            'email' => 'required',
            'address' => 'required',
            'ssn_or_tax' => 'required',

        ];
    }

    public function toggleShow()
    {
        $this->toggleStatus = true;
    }

    public function togglehidden()
    {
        $this->toggleStatus = false;
    }

    public function store()
    {

        $this->validate();
        $id = auth()->user()->id;

        $user = new CleanerTeam;
        $user->user_id = $id;
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->insured = $this->insured;
        $user->contact_number = $this->contact_number;
        $user->email = $this->email;
        $user->address = $this->address;
        $user->ssn_or_tax = $this->ssn_or_tax;

        $user->save();
        $this->emit('close-modal');
        $this->alert('success', 'Save successfully');
    }

    public function edit($id)
    {
        $this->updateMode = true;

        $user = CleanerTeam::find($id);
        $this->user_id = $id;
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->insured = $user->insured;
        $this->contact_number = $user->contact_number;
        $this->email = $user->email;
        $this->address = $user->address;
        $this->ssn_or_tax = $user->ssn_or_tax;
    }

    public function update()
    {
        if ($this->user_id) {

            $user = CleanerTeam::find($this->user_id);
            $user->update([
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'contact_number' => $this->contact_number,
                'address' => $this->address,
                'ssn_or_tax' => $this->ssn_or_tax,

            ]);
            $this->emit('close-modal');
            $this->updateMode = false;
            // $this->emitUp('updateclosemodal');
            $this->alert('success', 'Updated successfully');
            
           
        }
    }

    // public function deleteConfirm($iid)
    // {
      
    //     $this->user_id = $iid;
    //     $this->dispatchBrowserEvent('swal:confirm', [
    //         'type' => 'warning',
    //         'message' => 'Are you sure?',
    //         'text' => 'If deleted, you will not be able to recover this imaginary file!',
            
    //     ]);
    // }

    // public function delete()
    // {

    //     if ($this->user_id ) {
    //         // dd($this->user_id);
    //         User::find($this->user_id )->delete();
    //         $this->dispatchBrowserEvent('swal:modal', [
    //             'type' => 'success',
    //             'message' => 'User Delete Successfully!',
    //             'text' => 'It will not list on users table soon.'
    //         ]);
    //     }
    // }



    public function destroy($id)
    {
        CleanerTeam::find($id)->delete();
    }

    public function render()
    {
        $teamCleaner = CleanerTeam::all()->count();
        // dd($teamCleaner);
        $user = CleanerTeam::all();
        
        return view('livewire.cleaner.team', compact('user','teamCleaner'));
    }
}
