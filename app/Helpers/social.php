<?php

use App\Models\Setting;


function socialLinks()
{
    $socialProfile = Setting::findOrFail('1');

    return  $socialProfile;
}
