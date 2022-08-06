<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;
use App\Notifications\MessageNotification;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $validator = Validator::make($credentials,
        [
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        if (!$validator->fails()) {
            if (Auth::attempt($credentials)) {
                $user = Auth::user();
                Auth::login($user);

                // $message = date('Y-m-d H:i:s') . ' 登入';

                Notification::send($user, new MessageNotification($user));

                return redirect('/admin');
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }
    }
}
