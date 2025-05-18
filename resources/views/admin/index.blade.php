@extends('admin.dashboard')

@section('admin-title', 'Dashboard')

@section('admin-content')
    <div class="dashboard-stats">
        <div class="stat-card">
            <div class="stat-card-icon">
                <i class="fas fa-users"></i>
            </div>
            <div class="stat-card-title">Total Users</div>
            <div class="stat-card-value">{{ $userCount }}</div>
        </div>
        
        <div class="stat-card">
            <div class="stat-card-icon">
                <i class="fas fa-exclamation-circle"></i>
            </div>
            <div class="stat-card-title">Open Complaints</div>
            <div class="stat-card-value">{{ $openComplaintsCount }}</div>
        </div>
        
        <div class="stat-card">
            <div class="stat-card-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="stat-card-title">Resolved Complaints</div>
            <div class="stat-card-value">{{ $resolvedComplaintsCount }}</div>
        </div>
        
        <div class="stat-card">
            <div class="stat-card-icon">
                <i class="fas fa-chart-line"></i>
            </div>
            <div class="stat-card-title">This Month</div>
            <div class="stat-card-value">{{ $monthlyComplaintsCount }}</div>
        </div>
    </div>
    
    <h3>Recent Complaints</h3>
    <table class="data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Subject</th>
                <th>Status</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($recentComplaints as $complaint)
            <tr>
                <td>#{{ $complaint->id }}</td>
                <td>{{ $complaint->user->name }}</td>
                <td>{{ $complaint->subject }}</td>
                <td>
                    <span class="status-badge status-{{ $complaint->status }}">
                        {{ ucfirst($complaint->status) }}
                    </span>
                </td>
                <td>{{ $complaint->created_at->format('M d, Y') }}</td>
                <td>
                    <a href="{{ route('admin.complaints.show', $complaint->id) }}" class="action-btn view-btn">
                        <i class="fas fa-eye"></i> View
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection