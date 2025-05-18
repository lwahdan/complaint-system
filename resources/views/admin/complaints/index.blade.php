@extends('admin.dashboard')

@section('admin-title', 'Complaints Management')

@section('admin-content')
    <div class="content-filters">
        <form method="GET" action="{{ route('admin.complaints') }}" class="mb-3">
            <div class="filter-select">
                <select name="status" onchange="this.form.submit()">
                    <option value="">All Status</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="in-progress" {{ request('status') == 'in-progress' ? 'selected' : '' }}>In Progress
                    </option>
                    <option value="resolved" {{ request('status') == 'resolved' ? 'selected' : '' }}>Resolved</option>
                </select>
            </div>
        </form>
    </div>

    <table class="data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Subject</th>
                <th>Status</th>
                <th>Created</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($complaints as $complaint)
                <tr>
                    <td>#{{ $complaint->id }}</td>
                    <td>{{ $complaint->user->name }}</td>
                    <td>{{ $complaint->title }}</td>
                    <td>
                        <span class="status-badge status-{{ $complaint->status }}">
                            {{ ucfirst(str_replace('_', ' ', $complaint->status)) }}
                        </span>
                    </td>
                    <td>{{ $complaint->created_at->format('M d, Y') }}</td>
                    <td>
                        <a href="{{ route('admin.complaints.show', $complaint->id) }}" class="action-btn view-btn">
                            <i class="fas fa-eye"></i> View
                        </a>

                        <a href="{{ route('admin.complaints.edit', $complaint->id) }}" class="action-btn edit-btn">
                            <i class="fas fa-edit"></i> Update
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
