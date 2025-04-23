<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emergency;

class AdminController extends Controller
{
    public function index()
    {
        $emergencies = Emergency::orderBy('created_at', 'desc')->get();
        return view('admin.emergencies', compact('emergencies'));
    }

    public function updateStatus(Request $request, $id)
    {
        $emergency = Emergency::findOrFail($id);
        $emergency->status = $request->status;
        $emergency->save();

        return back()->with('success', 'Status updated!');
    }
}
