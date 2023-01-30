<?php

namespace App\Http\Livewire\Admin\Profile;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Base64Image;

class Profile extends Component
{
     use WithFileUploads;
     use LivewireAlert;
    public $roles;
    public $old_image;
    public $first_name, $last_name, $password, $email, $file;
    protected $listeners = ['imgUploaded' => 'storeUploadedImage'];

    public function mount(){
    
        $this->roles = User::where('role', '=', 'admin')->first();
        $this->first_name = $this->roles->first_name;
        $this->last_name = $this->roles->last_name;
        // $this->password = $this->roles->password;
        $this->email = $this->roles->email;
        $this->file = $this->roles->image;
  
    }

      public function storeUploadedImage(array $data)
    {
        if($data['base64_string']){
            $image = $data['base64_string']; //bace64 image
            $user     = User::where('role', '=', 'admin')->first();
            $folderPath = public_path('/admin/images');
            $filename = (new Base64Image)->save($image, $folderPath);
            $user->image = $filename;
            $user->save();
            $this->alert('success', 'Profile updated');
            return redirect(route('admin.profile'));
        }else{
            return $this->alert("error", "Please select Image");
        }

    } 

        public function update()
    {   

        $this->old_image = User::where('role', '=', 'admin')->first();

        $validatedDate = $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            // 'file' => 'required|max:1024',
        ]);
        if(is_string($this->file)){
        
        $this->roles->image = $this->old_image->image;
    
        }
        // else{
        // $filename = $this->file->store('storage/images','public');
        // $this->roles->image = $filename;

        // } 

        

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

    }

    public function render()
    {   
        // $this->roles = User::where('role', '=', 'admin')->first();

        return view('livewire.admin.profile.profile');
    }
}
