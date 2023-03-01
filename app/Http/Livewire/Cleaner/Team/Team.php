<?php

namespace App\Http\Livewire\Cleaner\Team;
use App\Models\CleanerTeam;
use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;

use Livewire\Component;

class Team extends Component
{
    use LivewireAlert;
    public $first_name, $last_name, $email, $address, $ssn_or_tax, $insured, $contact_number, $name, $user_id, $apartment;
    public $updateMode = false;
    public $toggleStatus = false;
    protected $listeners = ['delete', 'refreshComponent' => '$refresh', 'cancelled'] ;

    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'insured' => 'required',
            'contact_number' => 'required|min:10',
            'email' => 'required|email|unique:cleaner_teams',
            // 'address' => 'required',
            'ssn_or_tax' => 'required',
            'apartment' => 'required',

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
        // dd('kkhh');
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
        $user->apartment = $this->apartment;
        // dd( $this->address);

        $user->save();
        // $this->emit('close-modal');
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
        $this->apartment = $user->apartment;

        $this->dispatchBrowserEvent('openModal');
    }

    public function update()
    {
        $validateData = $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'contact_number' => 'required',
            'address' => 'required',
            'ssn_or_tax' => 'required',
            'insured' => 'required',
            'apartment' =>'required',
        ]);
        if ($this->user_id) {

            $user = CleanerTeam::find($this->user_id);
            $user->first_name = $this->first_name;
            $user->last_name = $this->last_name;
            $user->contact_number = $this->contact_number;
            $user->address = $this->address;
            $user->ssn_or_tax = $this->ssn_or_tax;
            $user->insured = $this->insured;
            $user->apartment = $this->apartment;
            $user->save();

            // $user->update([
            //     'first_name' => $this->first_name,
            //     'last_name' => $this->last_name,
            //     'contact_number' => $this->contact_number,
            //     'address' => $this->address,
            //     'ssn_or_tax' => $this->ssn_or_tax,
            //     'insured' => $this->insured,
            //     'apartment' => $this->apartment,
            // ]);
            $this->emit('close-modal', $this->user_id, 'success');

            $this->updateMode = false;
        }
        // return redirect()->route('cleaner.team');
        $this->alert('success', 'Updated successfully');
    }


    public function deleteConfirm($iid)
    {
        $this->user_id = $iid;

        $this->alert('', 'Are you sure do want to delete team member?', [
			'toast' => false,
			'position' => 'center',
			'showCancelButton' => true,
			'cancelButtonText' => 'No',
			'showConfirmButton' => true,
			'confirmButtonText' => 'Yes',
			'onConfirmed' => 'delete',
            'onDismissed' => 'cancelled',
			'timer' => null
		]);

        $this->emit('refreshComponent');
    }

    public function cancelled()
    {
        $this->emit("showCard", $this->user_id);
    }

    public function delete()
    {
        if ($this->user_id) {
            CleanerTeam::find($this->user_id)->delete();
        }
        $this->alert('success', 'Deleted successfully');
        return redirect()->route('cleaner.team');
    }

    public function render()
    {
        $teamMemberCounts = CleanerTeam::where('user_id', auth()->user()->id)->count()+1;

        $teamMembers = CleanerTeam::where('user_id', auth()->user()->id)->get();
        return view('livewire.cleaner.team.team', compact('teamMemberCounts', 'teamMembers'));
    }
}
