<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class PasswordChangeController extends Controller
{
    public function showChangePasswordForm()
    {
        return view('auth.passwords.change');
    }

    public function changePassword(Request $request)
    {
        $data = $request->validate([
            'oldPassword'   => 'required',
            'password'      => 'required|confirmed',
        ]);
        if (Hash::check($request->oldPassword, auth()->user()->password)) {
            auth()->user()->update([
                'password' => Hash::make($data['password'])
            ]);
            return redirect(route('home'))->with('message', 'Your password is changed successfully');
        } else {
            return redirect(route('home'))->with('error', 'Password does not match');
        }
    }
}
