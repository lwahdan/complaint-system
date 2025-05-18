<?php

namespace App\Http\Controllers;

use App\Models\AuditLog;
use App\Models\Complaint;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    public function store(Request $request)
    {
        // ✅ Step 1: Validate input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // ✅ Step 2: Create the complaint
        $complaint = Complaint::create([
            'user_id' => auth()->id(),
            'title' => $validated['title'],
            'description' => $validated['description'],
            'status' => 'pending',
        ]);

        // ✅ Step 3: Log the action (non-repudiation)
        AuditLog::create([
            'user_id' => auth()->id(),
            'action' => 'Submitted a new complaint (ID: ' . $complaint->id . ')',
            'ip_address' => $request->ip(),
        ]);

        // ✅ Step 4: Redirect with success message
        return redirect()->route('user.dashboard')->with('success', 'Complaint submitted successfully.');
    }
}
