<?php

namespace App\Http\Livewire\Admin\Profile;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Profile extends Component
{
     use WithFileUploads;
     use LivewireAlert;
    public $roles;
    public $old_image;
    public $first_name, $last_name, $password, $email, $file;


    public function mount(){
    
        $this->roles = User::where('role', '=', 'admin')->first();
        $this->first_name = $this->roles->first_name;
        $this->last_name = $this->roles->last_name;
        // $this->password = $this->roles->password;
        $this->email = $this->roles->email;
        $this->file = $this->roles->image;
  
    }

        public function update()
    {   

        $this->old_image = User::where('role', '=', 'admin')->first();

        $validatedDate = $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'file' => 'required|max:1024',
        ]);
        if(is_string($this->file)){
        
        $this->roles->image = $this->old_image->image;
    
        }
        else{
        $filename = $this->file->store('storage/images','public');
        $this->roles->image = $filename;

        } 

        

        if($this->first_name){
            $this->roles->first_name = $this->first_name;
        }
        if($this->last_name){
            $this->roles->last_name = $this->last_name;
        }
        if($this->password){
            $this->roles->password = Hash::make($this->password);
        }
        if($this->email){
            $this->roles->email = $this->email;
        }

        $this->roles->update();
        $this->alert('success', 'Profile updated');
        // session()->flash('message', 'Updated Successfully.');

    }

    public function render()
    {   
        // $this->roles = User::where('role', '=', 'admin')->first();

        return view('livewire.admin.profile.profile');
    }
}
