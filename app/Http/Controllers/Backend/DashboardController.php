<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    function dashboard()
    {
        $data['meta_title'] = "Dashboard";
        return view('backend.dashboard', $data);
    }
}
