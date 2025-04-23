<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emergency;

class EmergencyController extends Controller
{
    public function create()
    {
        return view('emergency.report');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'location' => 'required'
        ]);

        Emergency::create([
            'user_id' => auth()->id(),
            'type' => $request->type,
            'location' => $request->location,
        ]);

        return redirect('/dashboard')->with('success', 'Emergency reported!');
    }

    public function updateStatus(Request $request, $id)
    {
        $emergency = \App\Models\Emergency::findOrFail($id);
        $emergency->status = $request->status;
        $emergency->save();

        return redirect()->back()->with('success', 'Emergency status updated.');
    }
}
