@extends('admin.dashboard')

@section('admin-title', 'Edit Complaint')

@section('admin-content')
    <div class="container mt-5">
        <h3>Update Complaint Status (ID: {{ $complaint->id }})</h3>

        <form method="POST" action="{{ route('admin.complaints.update', $complaint->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-select" required>
                    <option value="pending" {{ $complaint->status === 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="in-progress" {{ $complaint->status === 'in-progress' ? 'selected' : '' }}>In Progress
                    </option>
                    <option value="resolved" {{ $complaint->status === 'resolved' ? 'selected' : '' }}>Resolved</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Update Status</button>
            <a href="{{ route('admin.complaints') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
