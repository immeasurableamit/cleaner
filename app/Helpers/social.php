<?php

use App\Models\Setting;


function socialLinks()
{
    $socialProfile = Setting::find('1');
    // $socialProfile = Setting::findOrFail('1');

    if($socialProfile){

        return  $socialProfile;

    }else{
        return  $socialProfile = '';
    }


}
