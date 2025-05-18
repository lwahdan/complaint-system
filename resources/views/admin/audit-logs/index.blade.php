@extends('admin.dashboard')

@section('admin-title', 'Audit Logs')

@section('admin-content')
    <table class="data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Action</th>
                <th>IP Address</th>
                <th>Date & Time</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($auditLogs as $log)
                <tr>
                    <td>#{{ $log->id }}</td>
                    <td>{{ $log->user ? $log->user->name : 'System' }}</td>
                    <td>
                        <span class="action-badge action-{{ $log->action }}">
                            {{ ucfirst($log->action) }}
                        </span>
                    </td>
                    <td>{{ $log->ip_address }}</td>
                    <td>{{ $log->created_at->format('M d, Y H:i:s') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
