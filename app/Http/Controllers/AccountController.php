<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function getPassword()
    {

        return view('account/change_password');
    }

    public function postPassword(Request $request)
    {
        $user = $request->user();

        if(!Hash::check($request->get('current_password'), $user->password)){
            return redirect()->back()-witherrors([
                'current_password' => 'the current password is not valid'
            ]);
        }

        $this->validate($request, [
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);

        $user->password = bcrypt($request->get('password'));
        $user->save();

        return redirect('account')
            ->with('alert', 'Your password has been changed');
    }

    public function editProfile(Request $request)
    {
        $user = $request->user();
        return view('account/edit_profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = $request->user();

        $this->validate($request, [
            'name' => 'required|min:2'
        ]);

        $user->fill($request->only(['name']));
        $user->save();

        return redirect('account')
            ->with('alert', 'Your profile has been update');
    }
}
