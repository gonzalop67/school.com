<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TeacherController extends Controller
{
    public function teacher_list()
    {
        $data['meta_title'] = "Teacher";
        return view('backend.teacher.list', $data);
    }

    public function create_teacher()
    {
        $data['meta_title'] = "Create Teacher";
        return view('backend.teacher.create', $data);
    }

    public function insert_teacher(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users'
        ]);

        $user                    = new User;
        $user->name              = trim($request->name);
        $user->last_name         = trim($request->last_name);
        $user->gender            = trim($request->gender);
        $user->date_of_birth     = trim($request->date_of_birth);
        $user->date_of_joining   = trim($request->date_of_joining);
        $user->mobile_number     = trim($request->mobile_number);
        $user->marital_status    = trim($request->marital_status);
        $user->address           = trim($request->address);
        $user->permanent_address = trim($request->permanent_address);
        $user->qualification     = trim($request->qualification);
        $user->work_experience   = trim($request->work_experience);
        $user->note              = trim($request->note);
        $user->email             = trim($request->email);
        $user->password          = Hash::make($request->password);
        $user->status            = trim($request->status);

        $user->is_admin = 5;
        $user->created_by_id = Auth::user()->id;
        $user->save();

        if (!empty($request->file('profile_pic'))) {
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis') . Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/profile/', $filename);

            $user->profile_pic = $filename;
            $user->save();
        }

        return redirect('panel/teacher')->with('success', "Teacher successfully created");
    }
}
