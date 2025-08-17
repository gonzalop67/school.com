<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function school_list()
    {
        $data['meta_title'] = "School";
        return view('backend.school.list', $data);
    }

    public function create_school()
    {
        $data['meta_title'] = "Create School";
        return view('backend.school.create', $data);
    }
}
