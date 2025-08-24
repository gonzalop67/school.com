<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\ClassModel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ParentController extends Controller
{
    public function parent_list()
    {
        $data['getRecord'] = User::getParent(Auth::user()->id, Auth::user()->is_admin);
        $data['meta_title'] = "Parent";
        return view('backend.parent.list', $data);
    }

    public function create_parent()
    {
        $data['getSchool'] = User::getSchoolAll();
        $data['meta_title'] = "Create Parent";
        return view('backend.parent.create', $data);
    }

    public function insert_parent(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users'
        ]);

        $user                    = new User;
        $user->name              = trim($request->name);
        $user->last_name         = trim($request->last_name);
        $user->gender            = trim($request->gender);
        $user->mobile_number     = trim($request->mobile_number);
        $user->occupation        = trim($request->occupation);
        $user->address           = trim($request->address);
        $user->permanent_address = trim($request->permanent_address);
        $user->email             = trim($request->email);
        $user->password          = Hash::make($request->password);
        $user->status            = trim($request->status);

        $user->is_admin = 7;

        if (Auth::user()->is_admin == 1 || Auth::user()->is_admin == 2) {
            $user->created_by_id = $request->school_id;
        } else {
            $user->created_by_id = Auth::user()->id;
        }

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

        return redirect('panel/parent')->with('success', "Parent successfully created");
    }

    public function edit_parent($id)
    {
        $data['getRecord'] = User::getSingle($id);
        $data['meta_title'] = "Edit Parent";
        return view('backend.parent.edit', $data);
    }

    public function update_parent($id, Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email,' . $id
        ]);

        $user                    = User::getSingle($id);
        $user->name              = trim($request->name);
        $user->last_name         = trim($request->last_name);
        $user->gender            = trim($request->gender);
        $user->mobile_number     = trim($request->mobile_number);
        $user->occupation         = trim($request->occupation);
        $user->address           = trim($request->address);
        $user->permanent_address = trim($request->permanent_address);
        $user->email             = trim($request->email);

        if (!empty($request->password)) {
            $user->password      = Hash::make($request->password);
        }

        $user->status            = trim($request->status);
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

        return redirect('panel/parent')->with('success', "Parent successfully updated");
    }

    public function delete_parent($id)
    {
        $user = User::getSingle($id);
        $user->is_delete = 1;
        $user->save();

        return redirect()->back()->with('success', "Parent successfully deleted");
    }
}
