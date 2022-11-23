<?php

namespace App\Http\Controllers\Cleaner\notification;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class NotificationController extends Controller
{
    public function index()
    {
        $title = array(
            'title' => 'Notification',
            'active' => 'notification',
        );

        $user = auth()->user();
        
        return view('cleaner.notification.notification', compact('title', 'user'));
    }

    
}
