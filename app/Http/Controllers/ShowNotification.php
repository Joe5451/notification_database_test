<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Notifications\MessageNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class ShowNotification extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $user = Auth::user();
        // Notification::send($user, new MessageNotification('測試'));

        $notifications = $user->unreadNotifications;

        return view('admin', compact('notifications'));
    }
}
