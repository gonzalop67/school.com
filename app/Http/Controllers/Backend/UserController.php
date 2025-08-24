<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\ClassModel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function change_password()
    {
        $data['meta_title'] = "Change Password";
        return view('backend.change_password');
    }

    public function update_password(Request $request)
    {
        if ($request->new_password == $request->confirm_password) {
            $user = User::getSingle(Auth::user()->id);
            if (Hash::check($request->old_password, $user->password)) {
                $user->password = Hash::make($request->new_password);
                $user->save();
                return redirect()->back()->with('success', 'Password Successfully Updated!');
            } else {
                return redirect()->back()->with('error', 'Old Password is not correct!');
            }
        } else {
            return redirect()->back()->with('error', 'New Password and Confirm Password does not match!');
        }
    }
}
