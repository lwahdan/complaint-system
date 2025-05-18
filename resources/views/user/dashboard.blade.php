@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        </div>

        <script>
            // Auto-dismiss after 3 seconds
            setTimeout(function() {
                let alert = document.getElementById('success-alert');
                if (alert) {
                    alert.classList.remove('show');
                    alert.classList.add('fade');
                }
            }, 3000);
        </script>
    @endif

    <div class="dashboard-container">
        <!-- User Information Panel -->
        <div class="user-info-panel">
            <div class="user-profile">
                <div class="profile-image">
                    <i class="fas fa-user-circle"></i>
                </div>
                <div class="user-details">
                    <h2>{{ $user->name }}</h2>
                    <p>{{ $user->email }}</p>
                    <p>Member since: {{ $user->created_at->format('M Y') }}</p>
                </div>
            </div>

            <div class="user-stats">
                <div class="stat-box">
                    <span class="stat-number">{{ $totalComplaints ?? 0 }}</span>
                    <span class="stat-label">Total Complaints</span>
                </div>
                <div class="stat-box">
                    <span class="stat-number">{{ $pendingComplaints ?? 0 }}</span>
                    <span class="stat-label">Pending</span>
                </div>
                <div class="stat-box">
                    <span class="stat-number">{{ $resolvedComplaints ?? 0 }}</span>
                    <span class="stat-label">Resolved</span>
                </div>
            </div>
        </div>

        <!-- Main Dashboard Content -->
        <div class="dashboard-content">
            <div class="section-header">
                <h3>Your Dashboard</h3>
                <div class="action-buttons">
                    <button id="new-complaint-btn" class="btn-primary">New Complaint</button>
                    <form action="{{ route('logout') }}" method="POST" class="logout-form">
                        @csrf
                        <button type="submit" class="btn-logout">Logout</button>
                    </form>
                </div>
            </div>

            <!-- Recent Complaints Section -->
            <div class="recent-complaints">
                <h4>Recent Complaints</h4>
                <div class="complaints-table-container">
                    <table class="complaints-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Subject</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($complaints ?? [] as $complaint)
                                <tr>
                                    <td>#{{ $complaint->id }}</td>
                                    <td>{{ Str::limit($complaint->title, 30) }}</td>
                                    <td>{{ Str::limit($complaint->description, 100) }}</td>
                                    <td><span
                                            class="status-badge status-{{ $complaint->status }}">{{ ucfirst($complaint->status) }}</span>
                                    </td>
                                    <td>{{ $complaint->created_at->format('d M, Y') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="no-complaints">No complaints found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Create Complaint Modal -->
        <div id="complaint-modal" class="modal">
            <div class="modal-content">
                <span class="close-modal">&times;</span>
                <h2>Submit a New Complaint</h2>
                <form action="{{ route('complaints.store') }}" method="POST" class="complaint-form">
                    @csrf
                    <div class="form-group">
                        <label for="title">Subject</label>
                        <input type="text" id="title" name="title" value="{{ old('title') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" rows="5" required>{{ old('description') }}</textarea>
                    </div>
                    <div class="form-buttons">
                        <button type="button" class="btn-cancel">Cancel</button>
                        <button type="submit" class="btn-submit">Submit Complaint</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Modal functionality
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('complaint-modal');
            const newComplaintBtn = document.getElementById('new-complaint-btn');
            const closeModal = document.querySelector('.close-modal');
            const cancelBtn = document.querySelector('.btn-cancel');

            newComplaintBtn.addEventListener('click', function() {
                modal.style.display = 'block';
            });

            closeModal.addEventListener('click', function() {
                modal.style.display = 'none';
            });

            cancelBtn.addEventListener('click', function() {
                modal.style.display = 'none';
            });

            window.addEventListener('click', function(event) {
                if (event.target == modal) {
                    modal.style.display = 'none';
                }
            });
        });
    </script>
@endsection
