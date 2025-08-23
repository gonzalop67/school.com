<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function student_list()
    {
        $data['getRecord'] = User::getTeacher(Auth::user()->id, Auth::user()->is_admin);
        $data['meta_title'] = "Student";
        return view('backend.student.list', $data);
    }

    public function create_student()
    {
        $data['getSchool'] = User::getSchoolAll();
        $data['meta_title'] = "Create Student";
        return view('backend.student.create', $data);
    }
}
