<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emergency;

class DashboardController extends Controller
{
    public function userDashboard()
    {
        $emergencies = auth()->user()->emergencies;
        return view('dashboard.user', compact('emergencies'));
    }

    public function adminDashboard()
    {
        $emergencies = \App\Models\Emergency::latest()->get();
        return view('dashboard.admin', compact('emergencies'));
    }
}
