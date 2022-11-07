<?php

namespace App\Http\Livewire\Cleaner;

use Livewire\Component;
use App\Models\User;
use App\Models\UserDetails;
use App\Models\Time_zone;
use Livewire\WithFileUploads;

class Account extends Component
{

    public $email, $timezone, $first_name, $last_name, $contact_number, $address, $about, $image;
    public $oldEmail;
    public $fieldStatus = false, $action;
    use WithFileUploads;

    // public function rules()
    // {
    //     return [
    //         'email' =>'required|email',
    //     ]
    // }
    public function editData($userId, $action)
    {

        $user = User::find($userId);
        $this->userId = $userId;
        if ($action == 'name') {
            $this->name = $user->name;
        }
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
            if ($action == 'name') {
                $name = explode(' ', $this->name);
                $user->first_name = @$name[0];
                $user->last_name = @$name[1];
            }
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
            'email' => 'required|email'
        ]);

        $user = User::find($this->userId);
        // dd($user);
        if ($action == 'email') {
            $oldEmail = $user->email;
            // dd($oldEmail );
            // $user->email = $this->email;
            if ($oldEmail != $this->email) {
                $user->update([
                    'email_verified_at' => null
                ]);
                $user->sendEmailVerificationNotification();
            }
        }
        $user->update();
    }

    public function imageUpload($id)
    {

        if ($id) {
            $user = User::find($id);

            // $image_base64 = base64_decode($this->image ?? null) ?? null;
            // dd($this->image, $image_base64);
            $user->image = $this->image;

            $this->image->store('users', 'storage/images');

            // if ($user->image && strpos($user->image, "data:") !== false) {
            //     $this->image = $user->image;
            //     dd($this->image);
            //     $folderPath = ('storage/images/');
            //     if (!is_dir($folderPath)) {
            //         mkdir($folderPath, 0775, true);
            //         chown($folderPath, exec('whoami'));
            //     }

            //     $image_parts = explode(";base64,", $image);
            //     $image_type_aux = explode("image/", $image_parts[0]);
            //     $image_base64 = base64_decode($image_parts[1] ?? null) ?? null;
            //     $file_name = $user->id . '-' . md5(uniqid() . time()) . '.png';
            //     $imageFullPath = $folderPath . $file_name;
            //     file_put_contents($imageFullPath, $image_base64);

            //     //...
            //     $user->image = $file_name;
            // }
            $user->save();
        }
    }

    public function render()
    {
        $user = User::findOrFail(auth()->user()->id);
        //dd($user->userDetails->timezone);
        $timezones = Time_zone::all();
        //  $this->timezone = $user->userDetails->timezone;

        return view('livewire.cleaner.account', ['user' => $user], ['timezones' => $timezones]);
    }
}
