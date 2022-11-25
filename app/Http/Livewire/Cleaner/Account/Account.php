<?php

namespace App\Http\Livewire\Cleaner\Account;

use App\Models\User;
use App\Models\UserDetails;
use App\Models\Time_zone;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Str;
use App\Base64Image;

use Livewire\Component;

class Account extends Component
{
    use LivewireAlert;
    public $email, $timezone, $first_name, $last_name, $contact_number, $address, $about, $image;
    public $oldEmail;
    public $fieldStatus = false, $action;
    use WithFileUploads;

    protected $listeners = ['imgUploaded' => 'storeUploadedImage'];


    public function storeUploadedImage(array $data)
    {
        $image = $data['base64_string']; //bace64 image 
        $id    = $data['user_id'];
        $user      = User::find($id);
        $folderPath = public_path('/storage/images');
        $filename = (new Base64Image)->save($image, $folderPath);
        $user->image = $filename;
        $user->save();
    }

    public function editData($userId, $action)
    {

        $user = User::find($userId);
        $this->userId = $userId;
        // if ($action == 'name') {
        //     $this->name = $user->name;
        // }
        if ($action == 'contact_number') {
            $this->contact_number = $user->contact_number;
        }
        if ($action == 'email') {
            $this->email = $user->email;
        }
        if ($action == 'address') {
            $this->address = $user->UserDetails->address;
        }
        if ($action == 'about') {
            $this->about = $user->UserDetails->about;
        }
        if ($action == 'timezone') {
            $this->timezone = $user->UserDetails->timezone;
        }
        if ($action == 'image') {
            $this->image = $user->image;
        }
        $this->action = $action;

        $this->fieldStatus = true;
    }

    public function cancle()
    {
        $this->fieldStatus = false;
    }

    public function updateData($action)
    {

        if ($this->userId) {
            $user = User::find($this->userId);
            $userdetail = $user->UserDetails;
            // if ($action == 'name') {
            //     $name = explode(' ', $this->name);
            //     $user->first_name = @$name[0];
            //     $user->last_name = @$name[1];
            // }
            if ($action == 'contact_number') {
                $user->contact_number = $this->contact_number;
            }
            // if ($action == 'email') {
            //     $user->email = $this->email;
            // }

            $user->update();

            if ($action == 'address') {
                $userdetail->address = $this->address;
            }
            if ($action == 'about') {
                $userdetail->about = $this->about;
            }

            if ($action == 'timezone') {

                $userdetail->timezone = $this->timezone;
                //   dd($userdetail->timezone );
            }

            $userdetail->update();
            $this->fieldStatus = false;
        }
    }

    public function emailupdate($action)
    {
        $validateData = $this->validate([
            'email' => 'required|email|unique:users'
        ]);

        $user = User::find($this->userId);

        if ($action == 'email') {
            $oldEmail = $user->email;
            if ($oldEmail != $this->email) {
                $user->email_verified_at =  null;
                $user->email = $this->email;
                $user->save();
                $user->sendEmailVerificationNotification();
            }
            return redirect()->route('cleaner.account');
        }
    }

    // public function imageUpload($id)
    // {

    //     if ($id) {
    //         $user = User::find($id);

    //         $image = $this->image;

    //     }
    // }
    public function render()
    {
        $user = User::findOrFail(auth()->user()->id);

        $timezones = Time_zone::all();
        //  $this->timezone = $user->userDetails->timezone;
        return view('livewire.cleaner.account.account', ['user' => $user], ['timezones' => $timezones]);
    }
}
