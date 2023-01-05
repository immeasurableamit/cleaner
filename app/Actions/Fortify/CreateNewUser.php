<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\UserDetails;
use App\Models\State;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input )
    {

        if ($input['user_type'] == 'cleaner') {

            Validator::make(
                $input,
                [
                    'first_name' => ['required', 'string', 'max:150'],
                    'last_name' => ['required', 'string', 'max:150'],
                    'email' => [
                        'required',
                        'string',
                        'email',
                        'max:150',
                        Rule::unique(User::class),
                    ],
                    'password' => 'required',
                    'password_confirmation' => 'required|same:password',
                    'contact_number' => 'required',
                    'address' => 'required',
                    'city' => 'required',
                    'state' => 'required|exists:states,id',
                    'zip_code' => 'required',
                    'day' => 'required',
                    'month' => 'required',
                    'year' => 'required',
                    'ssn_or_tax' => 'required',
                    'apt_or_unit' => 'required',
                    'payment_method' => 'required',
                    'about' => 'required',
                    'image' => 'required',
                ],

                [
                    'password_confirmation.required' => 'The confirm password field is required.',
                    'password_confirmation.same' => 'Password and Confirm Password do not match.',
                ]
            )->validate();

            $user = new User;
            $user->first_name = $input['first_name'];
            $user->last_name = $input['last_name'];
            $user->email = $input['email'];
            $user->contact_number = $input['contact_number'];
            $user->password = Hash::make($input['password']);
            $user->role = $input['user_type'];

            //...

            if ($input['image'] && strpos($input['image'] , "data:") !== false) {
                $image = $input['image'];
                $folderPath = ('storage/images/');
                if (!is_dir($folderPath)) {
                    mkdir($folderPath, 0775, true);
                    chown($folderPath, exec('whoami'));
                }
                $image_parts = explode(";base64,", $image);
                $image_type_aux = explode("image/", $image_parts[0]);
                $image_base64 = base64_decode($image_parts[1] ?? null) ?? null;
                $file_name = $user->id . '-' . md5(uniqid() . time()) . '.png';
                $imageFullPath = $folderPath . $file_name;
                file_put_contents($imageFullPath, $image_base64);
                $user->image = $file_name;
            }

            $user->save();

            $userDetail = new UserDetails();
            $userDetail->user_id = $user->id;
            $userDetail->states_id = $input['state'];
            $userDetail->about = $input['about'];
            $userDetail->dob = $input['year'] . '-' . $input['month'] . '-' . $input['day'];
            $userDetail->ssn_or_tax = $input['ssn_or_tax'];
            $userDetail->address = $input['address'];
            $userDetail->apt_or_unit = $input['apt_or_unit'];
            $userDetail->city = $input['city'];
            $userDetail->zip_code = $input['zip_code'];
            $userDetail->payment_method = $input['payment_method'];

            $userDetail->latitude = $input['latitude'];
            $userDetail->longitude = $input['longitude'];

            $userDetail->save();

        } else {

            Validator::make(
                $input,
                [
                    'first_name' => ['required', 'string', 'max:150'],
                    'last_name' => ['required', 'string', 'max:150'],
                    'email' => [
                        'required',
                        'string',
                        'email',
                        'max:150',
                        Rule::unique(User::class),
                    ],
                    'password' => 'required',
                    'password_confirmation' => 'required|same:password',
                    'contact_number' => 'required',
                    'address' => 'required',
                    'city' => 'required',
                    'state' => 'required',
                    'zip_code' => 'required',
                    'apt_or_unit' => 'required',
                    'payment_method' => 'required',
                    'about' => 'required',
                    'image' => 'required',
                ],

                [
                    'password_confirmation.required' => 'The confirm password field is required.',
                    'password_confirmation.same' => 'Password and Confirm Password do not match.',
                ]
            )->validate();

            $user = new User;
            $user->first_name = $input['first_name'];
            $user->last_name = $input['last_name'];
            $user->email = $input['email'];
            $user->password = Hash::make($input['password']);
            $user->contact_number = $input['contact_number'];
            $user->role = $input['user_type'];

            if ($input['image'] && strpos($input['image'] , "data:") !== false) {
                $image = $input['image'];
                $folderPath = ('storage/images/');
                if (!is_dir($folderPath)) {
                    mkdir($folderPath, 0775, true);
                    chown($folderPath, exec('whoami'));
                }
                $image_parts = explode(";base64,", $image);
                $image_type_aux = explode("image/", $image_parts[0]);
                $image_base64 = base64_decode($image_parts[1] ?? null) ?? null;
                $file_name = $user->id . '-' . md5(uniqid() . time()) . '.png';
                $imageFullPath = $folderPath . $file_name;
                file_put_contents($imageFullPath, $image_base64);
                $user->image = $file_name;

            }
            $user->save();

            $userDetail = new UserDetails();
            $userDetail->user_id = $user->id;
            $userDetail->address = $input['address'];
            $userDetail->city = $input['city'];
            $userDetail->states_id = $input['state'];
            $userDetail->zip_code = $input['zip_code'];
            $userDetail->apt_or_unit = $input['apt_or_unit'];
            $userDetail->payment_method = $input['payment_method'];
            $userDetail->about = $input['about'];
            $userDetail->latitude = $input['latitude'];
            $userDetail->longitude = $input['longitude'];
            $userDetail->save();


        }

        Mail::to( $user )->send(new WelcomeMail($user));
        return $user;
    }




















































    //         if ($input['user_type'] == "customer") {

    //             Validator::make($input, [
    //                 // 'first_name' => ['required', 'string', 'max:100'],
    //                 // 'last_name' => ['required', 'string', 'max:100'],
    //                 // 'email' => ['required','email', 'max:255', Rule::unique(User::class),],
    //                 // // 'image' => ['required', 'max:2048'],
    //                 // 'contact_number' =>  ['required'],
    //                 // // 'password' => ['required','confirmed'],

    //                 // 'address' =>  ['required'],
    //                 // 'apt_or_unit' =>  ['required'],
    //                 // 'city' => ['required', 'string', 'max:100'],
    //                 // 'state' => ['required'],
    //                 // 'zip_code' => ['required','max:50'],
    //                 // 'term' => ['required'],
    //             ], [
    //                 // 'contact_number.required' => 'phone number field is required.',
    //                 // 'term.required' => 'please confirm term and conditions.',
    //             ])->validate();
    //         } else {


    //             Validator::make($input, [
    //                 'first_name' => ['required', 'string', 'max:100'],
    //                 'last_name' => ['required', 'string', 'max:100'],
    //                 'email' => ['required', 'email', 'max:255', Rule::unique(User::class),],
    //                 // 'image' => ['required', 'max:2048'],
    //                 'contact_number' =>  ['required'],
    //                 // 'password' => ['required','confirmed'],
    //                 'address' =>  ['required'],
    //                 'apt_or_unit' =>  ['required'],
    //                 'city' => ['required', 'string', 'max:100'],
    //                 'state' => ['required'],
    //                 'zip_code' => ['required', 'max:50'],
    //                 'about' => ['required'],
    //                 'ssn_or_tax' => ['required'],
    //                 'day' => ['required'],
    //                 'month' => ['required'],
    //                 'year' => ['required'],
    //                 // 'term' => ['required'],
    //             ], [
    //                 // 'contact_number.required' => 'phone number field is required.',
    //                 // 'term.required' => 'please confirm term and conditions.',
    //                 // 'ssn_or_tax.required' => '9 Digit SSN or Tax ID field is required',
    //             ])->validate();
    //         }
    // dd($input);

    //         $user = new User;

    //         // if ($input['image'] && strpos($input['image'], "data:") !== false) {

    //         //     $image = $input['image'];

    //         //     $folderPath = ('storage/images/');
    //         //     if (!is_dir($folderPath)) {
    //         //         mkdir($folderPath, 0775, true);
    //         //         chown($folderPath, exec('whoami'));
    //         //     }
    //         //     $image->getClientOriginalName();
    //         //     $image_parts = explode(";base64,", $image);
    //         //     $image_type_aux = explode("image/", $image_parts[0]);
    //         //     $image_base64 = base64_decode($image_parts[1] ?? null) ?? null;
    //         //     $file_name = $user->id . '-' . md5(uniqid() . time()) . '.png';
    //         //     $imageFullPath = $folderPath . $file_name;
    //         //     file_put_contents($imageFullPath, $image_base64);

    //         //     //...
    //         //     $user->image = $file_name;
    //         // }


    //         $user->role = $input['user_type'];
    //         $user->first_name = $input['first_name'];

    //         $user->last_name = $input['last_name'];
    //         $user->email = $input['email'];
    //         $user->contact_number = $input['contact_number'];
    //         $user->password = Hash::make($input['password']);
    //         $user->save();


    //             // dd($input['day']);
    //         $detail = new UserDetails;
    //         if ($input['ssn_or_tax'] && $input['day'] && $input['month'] && $input['year']) {
    //             $detail->dob = $input['year'] . '-' . $input['month'] . '-' . $input['day'];
    //             $detail->ssn_or_tax = $input['ssn_or_tax'];
    //         }
    //         $detail->user_id = $user->id;
    //         $detail->states_id = $input['state'];
    //         $detail->about = $input['about'];
    //         $detail->address = $input['address'];
    //         $detail->apt_or_unit = $input['apt_or_unit'];
    //         $detail->states_id = $input['state'];
    //         $detail->city = $input['city'];
    //         $detail->zip_code = $input['zip_code'];
    //         $detail->payment_method = $input['payment_method'];
    //         $detail->save();

    //         return $user;
    //     }
}
