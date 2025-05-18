<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\AuditLog;
use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        $userCount = User::count();
        $complaintCount = Complaint::count();
        $auditLogCount = AuditLog::count();
        $openComplaintsCount = Complaint::where('status', 'pending')->count();
        $resolvedComplaintsCount = Complaint::where('status', 'resolved')->count();
        $monthlyComplaintsCount = Complaint::whereMonth('created_at', date('m'))->count();
        $recentComplaints = Complaint::latest()->take(5)->get();
        return view('admin.dashboard', compact('userCount', 'complaintCount', 'auditLogCount', 'openComplaintsCount', 'resolvedComplaintsCount', 'monthlyComplaintsCount', 'recentComplaints'));
    }

    //user
    public function viewUsers()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function createUser()
    {
        return view('admin.users.create');
    }

    public function storeUser(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|in:user,admin',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
        ]);

        return redirect()->route('admin.users')->with('success', 'User created successfully.');
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6|confirmed',
            'role' => 'required|in:user,admin',
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->role = $validated['role'];

        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return redirect()->route('admin.users')->with('success', 'User updated successfully.');
    }

    public function destroyUser($id, Request $request)
    {
        // Prevent deleting yourself (optional safety check)
        if (auth()->id() == $id) {
            return redirect()->back()->with('error', 'You cannot delete your own account.');
        }

        $user = User::findOrFail($id);
        $userName = $user->name;

        $user->delete();

        // Optional: Log this action
        AuditLog::create([
            'user_id' => auth()->id(),
            'action' => "Deleted user: {$userName} (ID: {$id})",
            'ip_address' => $request->ip(),
        ]);

        return redirect()->back()->with('success', 'User deleted successfully.');
    }

    //complaints
    public function viewComplaints(Request $request)
    {
        $status = $request->query('status');

        $complaints = Complaint::with('user')
            ->when($status, function ($query) use ($status) {
                $query->where('status', $status);
            })
            ->latest()
            ->get();

        return view('admin.complaints.index', compact('complaints', 'status'));

        // $complaints = Complaint::all();
        // return view('admin.complaints.index', compact('complaints'));
    }

    public function showComplaint($id)
    {
        $complaint = Complaint::findOrFail($id);
        return view('admin.complaints.show', compact('complaint'));
    }

    public function editComplaint($id)
    {
        $complaint = Complaint::findOrFail($id);
        return view('admin.complaints.edit', compact('complaint'));
    }

    public function updateComplaint(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,in-progress,resolved',
        ]);

        $complaint = Complaint::findOrFail($id);
        $oldStatus = $complaint->status;
        $complaint->status = $request->status;
        $complaint->save();

        // Optional: log the update
        AuditLog::create([
            'user_id' => auth()->id(),
            'action' => "Updated complaint #{$complaint->id} status from '{$oldStatus}' to '{$request->status}'",
            'ip_address' => $request->ip(),
        ]);

        return redirect()->route('admin.complaints')->with('success', 'Complaint status updated successfully.');
    }

    public function viewAuditLogs()
    {
        $auditLogs = AuditLog::all();
        return view('admin.audit-logs.index', compact('auditLogs'));
    }

    public function dashboard_index()
    {
        $userCount = User::count();
        $complaintCount = Complaint::count();
        $auditLogCount = AuditLog::count();
        $openComplaintsCount = Complaint::where('status', 'pending')->count();
        $resolvedComplaintsCount = Complaint::where('status', 'resolved')->count();
        $monthlyComplaintsCount = Complaint::whereMonth('created_at', date('m'))->count();
        $recentComplaints = Complaint::latest()->take(5)->get();
        return view('admin.index', compact('userCount', 'complaintCount', 'auditLogCount', 'openComplaintsCount', 'resolvedComplaintsCount', 'monthlyComplaintsCount', 'recentComplaints'));
    }
}
