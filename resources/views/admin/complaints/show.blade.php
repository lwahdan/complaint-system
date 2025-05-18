@extends('admin.dashboard')

@section('admin-title', 'Display Complaint Details')

@section('admin-content')
    <div class="complaint-details">
        <h1>Complaint ID: {{ $complaint->id }}</h1>
        <p><strong>User:</strong> {{ $complaint->user->name }}</p>
        <p><strong>Subject:</strong> {{ $complaint->title }}</p>
        <p><strong>Description:</strong> {{ $complaint->description }}</p>
        <p>
            <strong>Status:</strong>
            <span class="status-{{ str_replace(' ', '-', strtolower($complaint->status)) }}">
                {{ ucfirst($complaint->status) }}
            </span>
        </p>
        <p><strong>Created At:</strong> {{ $complaint->created_at->format('M d, Y') }}</p>
    </div>

@endsection
