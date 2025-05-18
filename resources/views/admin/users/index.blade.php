@extends('admin.dashboard')

@section('admin-title', 'Users Management')

@section('admin-content')
    <div class="content-filters">
        {{-- <form action="{{ route('admin.users') }}" method="GET" class="filter-form"> --}}
            {{-- <div class="search-field"> --}}
                {{-- <input type="text" name="search" placeholder="Search users..." value="{{ request('search') }}"> --}}
                {{-- <button type="submit"> --}}
                    {{-- <i class="fas fa-search"></i> --}}
                {{-- </button> --}}
            {{-- </div> --}}
{{--              --}}
            {{-- <div class="filter-select"> --}}
                {{-- <select name="role"> --}}
                    {{-- <option value="">All Roles</option> --}}
                    {{-- <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option> --}}
                    {{-- <option value="user" {{ request('role') == 'user' ? 'selected' : '' }}>User</option> --}}
                {{-- </select> --}}
            {{-- </div> --}}
{{--              --}}
            {{-- <div class="filter-select"> --}}
                {{-- <select name="status"> --}}
                    {{-- <option value="">All Status</option> --}}
                    {{-- <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option> --}}
                    {{-- <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option> --}}
                {{-- </select> --}}
            {{-- </div> --}}
{{--              --}}
            {{-- <button type="submit" class="filter-btn">Filter</button> --}}
            {{-- <a href="{{ route('admin.users') }}" class="reset-btn">Reset</a> --}}
        {{-- </form> --}}
        
        <a href="{{ route('admin.users.create') }}" class="add-btn">
            <i class="fas fa-plus"></i> Add User
        </a>
    </div>

    <table class="data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Created</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>#{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ ucfirst($user->role) }}</td>
                <td>{{ $user->created_at->format('M d, Y') }}</td>
                <td > 
                    <a href="{{ route('admin.users.edit', $user->id) }}" class="action-btn edit-btn">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    
                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this user?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="action-btn delete-btn">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection