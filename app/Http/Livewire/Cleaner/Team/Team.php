<?php

namespace App\Http\Livewire\Cleaner\Team;
use App\Models\CleanerTeam;
use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;

use Livewire\Component;

class Team extends Component
{
    use LivewireAlert;
    public $first_name, $last_name, $email, $address, $ssn_or_tax, $insured, $contact_number, $name;
    public $updateMode = false;
    public $toggleStatus = false;
    protected $listeners = ['delete'] ;

    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'insured' => 'required',
            'contact_number' => 'required|min:10',
            'email' => 'required|email|unique:cleaner_teams',
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
        return redirect()->route('cleaner.team');
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
        $validateData = $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'contact_number' => 'required',
            'address' => 'required',
            'ssn_or_tax' => 'required'
        ]);
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
            $this->emit('postAdded', $this->user_id, 'success');
            $this->updateMode = false;
            $this->alert('success', 'Updated successfully');
        }
        // return redirect()->route('cleaner.team');
    }

    public function showHide($id)
    {
        // dd($id);
        $this->emit('postAdded', $id, 'success');

    }

    public function deleteConfirm($iid)
    {
        $this->user_id = $iid;

        $this->alert('warning', 'Are you sure do want to delete?', [
			'toast' => false,
			'position' => 'center',
			'showCancelButton' => true,
			'cancelButtonText' => 'Cancel',
			'showConfirmButton' => true,
			'confirmButtonText' => 'Delete it',
			'onConfirmed' => 'delete',
			'timer' => null
		]);

    }

    public function delete()
    {
        if ($this->user_id) {
            CleanerTeam::find($this->user_id)->delete();
        }
        $this->alert('success', 'Deleted successfully');
    }

    public function render()
    {
        $teamMemberCounts = CleanerTeam::where('user_id', auth()->user()->id)->count();

        $teamMembers = CleanerTeam::where('user_id', auth()->user()->id)->get();
        return view('livewire.cleaner.team.team', compact('teamMemberCounts', 'teamMembers'));
    }
}
