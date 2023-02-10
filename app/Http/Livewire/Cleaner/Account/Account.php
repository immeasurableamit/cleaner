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
    public $fieldStatus = false, $action, $actionData;

    public $facebook, $twitter, $instagram, $linkedin;



    use WithFileUploads;

    protected $listeners = ['imgUploaded' => 'storeUploadedImage'];

    public function mount()
    {
        $details = auth()->user()->UserDetails;

        $this->facebook = $details->facebook;
        $this->twitter = $details->twitter;
        $this->instagram = $details->instagram;
        $this->linkedin = $details->linkedin;
    }

    public function rules()
    {
        // dd($this->actionData);
        return [
            'address' => 'required',
            'contact_number' => 'required|max:10',

        ];
    }


    public function storeUploadedImage(array $data)
    {
        if ($data['base64_string']) {
            $image = $data['base64_string']; //bace64 image
            $id    = $data['user_id'];
            $user      = User::find($id);
            $folderPath = public_path('/storage/images');
            $filename = (new Base64Image)->save($image, $folderPath);
            $user->image = $filename;
            $user->save();

            return redirect()->route('cleaner.account');
        } else {
            return $this->alert("error", "Please select Image");
        }
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
        if ($action == 'facebook') {
            $this->facebook = $user->UserDetails->facebook;
        }
        if ($action == 'twitter') {
            $this->twitter = $user->UserDetails->twitter;
        }
        if ($action == 'instagram') {
            $this->instagram = $user->UserDetails->instagram;
        }
        if ($action == 'linkedin') {
            $this->linkedin = $user->UserDetails->linkedin;
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
        $this->actionData = $action;

        if ($this->userId) {
            $user = User::find($this->userId);
            $userdetail = $user->UserDetails;

            // if ($action == 'name') {
            //     $name = explode(' ', $this->name);
            //     $user->first_name = @$name[0];
            //     $user->last_name = @$name[1];
            // }
            if ($action == 'contact_number') {
                $this->validate([
                    'contact_number' => 'required|max:10',
                ]);
                $user->contact_number = $this->contact_number;
            }


            $user->update();
            $this->alert('success', 'Detail Updated successfully');

            if ($action == 'address') {
                $userdetail->address = $this->address;
            }
            if ($action == 'about') {
                $userdetail->about = $this->about;
            }

            if ($action == 'timezone') {
                $userdetail->timezone = $this->timezone;
            }

            if ($action == 'facebook') {
                $this->validate([
                    'facebook' => 'url',
                ]);
                $userdetail->facebook = $this->facebook;
            }

            if ($action == 'twitter') {
                $this->validate([
                    'twitter' => 'url',
                ]);
                $userdetail->twitter = $this->twitter;
            }
            if ($action == 'instagram') {
                $this->validate([
                    'instagram' => 'url',
                ]);
                $userdetail->instagram = $this->instagram;
            }

            if ($action == 'linkedin') {
                $this->validate([
                    'linkedin' => 'url',
                ]);
                $userdetail->linkedin = $this->linkedin;
            }

            $userdetail->save();
            $this->alert('success', 'Detail Updated successfully');
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




    public function socialInfo($userId, $action)
    {
        // dd($userId, $action);
        $details = auth()->user()->UserDetails;

        if ($action == 'facebook') {
            $details->facebook = $this->facebook;
        }

        $details->twitter = $this->twitter;
        $details->instagram = $this->instagram;
        $details->linkedin = $this->linkedin;
        $details->save();

        $this->fieldStatus = true;
    }


    public function render()
    {
        $user = User::findOrFail(auth()->user()->id);

        $timezones = Time_zone::all();
        //  $this->timezone = $user->userDetails->timezone;
        return view('livewire.cleaner.account.account', ['user' => $user], ['timezones' => $timezones]);
    }
}
