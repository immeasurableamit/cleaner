<?php

namespace App\Http\Livewire\Customer\Account;
use App\Models\User;
use App\Models\UserDetails;
use App\Models\Time_zone;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use App\Base64Image;

class Account extends Component
{
    use LivewireAlert;
    public $first_name, $contact_number, $userId, $email, $oldEmail, $address;

    public $fieldStatus = false, $action;

    protected $listeners = ['imgUploaded' => 'storeUploadedImage'];

    public function rules()
    {
        return [
            'email' => 'required',
            'address' => 'required',
            // 'image' =>'required',
            'contact_number' => 'required|max:10',

        ];
    }

    public function storeUploadedImage(array $data)
    {
        // dd($data['base64_string']);
        if($data['base64_string']){
            $image = $data['base64_string']; //bace64 image
            $id    = $data['user_id'];
            $user      = User::find($id);
            $folderPath = public_path('/storage/images');
            $filename = (new Base64Image)->save($image, $folderPath);
            $user->image = $filename;
            $user->save();
            return redirect()->route('customer.account');

        }else{
            return $this->alert("error", "Please select Image");
        }

    }


    public function edit($userId, $action)
    {

        $user = User::find($userId);
        $this->userId = $userId;
        if ($action == 'contact_number') {
            $this->contact_number = $user->contact_number;
        }
        if ($action == 'email') {
            $this->email = $user->email;
        }
        if ($action == 'address') {
            $this->address = $user->UserDetails->address;
        }
        // if ($action == 'timezone') {
        //     $this->timezone = $user->UserDetails->timezone;
        // }
        if ($action == 'image') {
            $this->image = $user->image;
        }

        $this->action = $action;

        $this->fieldStatus = true;
    }

    public function update($action)
    {
        $this->validate();
        if ($this->userId) {

            $user = User::find($this->userId);
            $userdetail = $user->UserDetails;

            if ($action == 'contact_number') {
                $user->contact_number = $this->contact_number;

            }
            $user->update();
            if ($action == 'address') {

                $userdetail->address = $this->address;
            }
            // if ($action == 'timezone') {

            //     $userdetail->timezone = $this->timezone;
            // }
            $userdetail->update();
            $this->fieldStatus = false;
        }

    }

    public function cancle()
    {
        $this->fieldStatus = false;
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
        return redirect()->route('customer.account');
        }
    }

    public function render()
    {
        $user = User::findOrFail(auth()->user()->id);
        $timezones = Time_zone::all();
        return view('livewire.customer.account.account',['user' => $user], ['timezones' => $timezones]);
    }
}
