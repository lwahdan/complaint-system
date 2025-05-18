<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();
        // Redirect admins
        if ($user->role === 'admin') {
            return redirect()->route('admin.index');
        }
        $totalComplaints = Complaint::where('user_id', $user->id)->count();
        $pendingComplaints = Complaint::where('user_id', $user->id)->where('status', 'pending')->count();
        $resolvedComplaints = Complaint::where('user_id', $user->id)->where('status', 'resolved')->count();
        $complaints = Complaint::where('user_id', $user->id)->get();
        return view('user.dashboard', compact('user', 'totalComplaints', 'pendingComplaints', 'resolvedComplaints' , 'complaints'));
    }
}
